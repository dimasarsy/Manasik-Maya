<?php

namespace App\Http\Controllers;

use App\Models\Filter;
use App\Models\Schedule;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Mockery\Undefined;

// use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class ScheduleController extends Controller
{
    public function showScheduleDetail(Schedule $schedule)
    {
        //protect if user want to showKeyboardDetail (deleted keyboard) directly from url
        // if ($keyboard->status == "nonAvailable") {
        //     return redirect('/');
        // }
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                //  'gross_amount' => 10000,
            ),
            'item_details' => array(
                [
                    'id' => $schedule['id'],
                    'price' => $schedule['price'],
                    'quantity' => 1,
                    'name' => $schedule['name']
                ]
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->first_name,
                'last_name' => Auth::user()->last_name,
                'email' => Auth::user()->email,
                'phone' => '08111222333',
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // dd($snapToken);

        $schedules = Schedule::where('status', "available")->where('date', '>=', date('Y-m-d'))->where('id', '!=', $schedule->id)->inRandomOrder()->limit(9);

        return view('Schedule_View.scheduleDetail', [
            "title" => "Manasik | Schedule Detail",
            "active" => "schedule",
            "schedule" => $schedule,
            "schedules" => $schedules->simplePaginate(3),
            'snap_token' => $snapToken
        ]);
    }

    public function payment_post(Request $request, $id)
    {
        //RANDTEXT for ref_code//

        // $pass = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);
        // echo $pass;

        // dd($pass);

        //RANDTEXT for ref_code//

        $json = json_decode($request->get('json'));
        // dd($id);
        $order = new Order();
        $order->status = $json->transaction_status;
        $order->user_id = Auth::user()->id;
        $order->uname = Auth::user()->username;
        $order->email = Auth::user()->email;
        $order->number = Auth::user()->name;
        $order->schedule_id = $id;
        $order->transaction_id = $json->transaction_id;
        $order->order_id = $json->order_id;
        $order->gross_amount = $json->gross_amount;
        $order->payment_type = $json->payment_type;
        $order->payment_code = isset($json->payment_code) ? $json->payment_code : null;
        $order->pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;
        return $order->save() ? redirect(url('/historyTransaction'))->with('success', 'Jadwalmu Berhasil di Order!') : redirect(url('/marketplace'))->with('alert-failed', 'Terjadi kesalahan');

        // dd();
    }

    // public function showAddSchedule()
    // {

    //     return view("Muthawif.addSchedule", [
    //         "title" => "Manasik | Add Schedule",
    //         "active" => "addSchedule",
    //     ]);
    // }

    public function storeSchedule(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required|unique:schedules|min:5",
            "price" => "required|integer|min:1000",
            "description" => "required|min:5",
            "image" => "required",
            "date" => "required",
            "starttime" => "required",
            "endtime" => "required",
        ]);

        $currFile = $request->file('image');

        $fileName = time() . '_' . $currFile->getClientOriginalName();
        Storage::putFileAs('public/image', $currFile, $fileName);

        $schedule = new Schedule;
        $schedule->name = $validatedData['name'];
        $schedule->price = $validatedData['price'];
        $schedule->description = $validatedData['description'];
        $schedule->image = $fileName;
        $schedule->date = $validatedData['date'];
        $schedule->starttime = $validatedData['starttime'];

        $time_start = explode(':', $schedule->starttime);
        $hour_start = $time_start[0];
        $minute_start = $time_start[1];

        $schedule->endtime = $validatedData['endtime'];

        $time_end = explode(':', $schedule->endtime);
        $hour_end = $time_end[0];
        $minute_end = $time_end[1];

        $date_start = new Carbon($schedule->date);
        $date_end = new Carbon($schedule->date);

        $schedule->availableScheduleDate = $date_start->addHours($hour_start)->addMinutes($minute_start);
        $schedule->dueDateSchedule = $date_end->addHours($hour_end)->addMinutes($minute_end);
        $schedule->status = "available";
        $schedule->user_id = Auth::user()->id;

        $schedule->save();
        return redirect('/mySchedule')->with('success', 'Berhasil Menambahkan Jadwal Baru!');
    }

    public function destroy(Schedule $schedule)
    {
        //softDelete
        Schedule::where('id', $schedule->id)->update(
            [
                "status" => "deleted",
            ]
        );

        return back()->with('success', 'Schedule has been deleted!');
    }

    public function showUpdateSchedule(Schedule $schedule)
    {

        //protect if user want to update schedule (deleted schedule) directly from url
        if ($schedule->status == "not available") {
            return redirect('/');
        }

        return view('Muthawif.updateSchedule', [
            "title" => "Manasik | Update Schedule",
            "schedule" => $schedule,
            "active" => "updateSchedule",
        ]);
    }

    public function updateSchedule(Request $request, Schedule $schedule)
    {
        if ($request->name == $schedule->name) {
            $validatedData = $request->validate([
                "name" => "required|min:5",
                "price" => "required|integer|min:1",
                "description" => "required|min:20",
                "image" => "image|file",
                "date" => "required",
                "starttime" => "required",
                "endtime" => "required",
            ]);
            $validatedData['name'] = $schedule->name;

            $time_start  = explode(':', $validatedData['starttime']);
            $hour_start  = $time_start[0];
            $minute_start  = $time_start[1];

            $time_end  = explode(':', $validatedData['endtime']);
            $hour_end  = $time_end[0];
            $minute_end  = $time_end[1];

            $date_start = new Carbon($validatedData['date']);
            $date_end = new Carbon($validatedData['date']);
            $validatedData['availableScheduleDate'] =  $date_start->addHours($hour_start)->addMinutes($minute_start);
            $validatedData['dueDateSchedule'] =  $date_end->addHours($hour_end)->addMinutes($minute_end);

            $validatedData['notifyStatus'] =  'not notified';
            $validatedData['emailNotifyStatus'] =  'not notified';
        } else {
            $validatedData = $request->validate([
                "name" => "required|unique:schedules|min:5",
                "price" => "required|integer|min:1",
                "description" => "required|min:20",
                "image" => "image|file",
                "date" => "required",
                "starttime" => "required",
                "endtime" => "required",
            ]);

            $time_start  = explode(':', $validatedData['starttime']);
            $hour_start  = $time_start[0];
            $minute_start  = $time_start[1];

            $time_end  = explode(':', $validatedData['endtime']);
            $hour_end  = $time_end[0];
            $minute_end  = $time_end[1];

            $date_start = new Carbon($validatedData['date']);
            $date_end = new Carbon($validatedData['date']);
            $validatedData['availableScheduleDate'] =  $date_start->addHours($hour_start)->addMinutes($minute_start);
            $validatedData['dueDateSchedule'] =  $date_end->addHours($hour_end)->addMinutes($minute_end);

            $validatedData['notifyStatus'] =  'not notified';
            $validatedData['emailNotifyStatus'] =  'not notified';
        }

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete('public/image/' . $request->oldImage);
            }
            $currFile = $request->file('image');
            $fileName = $currFile->getClientOriginalName();
            Storage::putFileAs('public/image', $currFile, $fileName);
            $validatedData['image'] = $fileName;
        }

        if (
            $request->name == $schedule->name && $request->price == $schedule->price &&
            $request->description == $schedule->description &&
            $request->file('image') == null && $request->date == $schedule->date &&
            $request->starttime == $schedule->starttime && $request->endtime == $schedule->endtime
        ) {
            return redirect('/')->with('noUpdate', 'Tidak Ada Perubahan Pada Jadwal!');
        }

        Schedule::where('id', $schedule->id)->update($validatedData);

        return redirect('/' . 'scheduleDetail/' . $schedule->id)->with('success', 'Jadwal Berhasil di Perbaharui!');
    }

    public function showMySchedule()
    {
        $muthawifSchedules = Schedule::where('user_id', Auth::user()->id)->where('status', "available")->where('date', '>=', date('Y-m-d'));

        $orders = Order::where('user_id', Auth::user()->id);
        $schedules = collect();

        $orders->each(function ($order) use (&$schedules) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.sandbox.midtrans.com/v2/" . $order->order_id . "/status",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_POSTFIELDS => "\n\n",
                CURLOPT_HTTPHEADER => array(
                    "Accept: application/json",
                    "Content-Type: application/json",
                    "Authorization: Basic U0ItTWlkLXNlcnZlci1EQmw5OFdBX3NnZ2U2eGRGU2hucXVqWjY6"
                ),
            ));

            $respond = curl_exec($curl);
            $response = json_decode($respond, true);

            if ($response['transaction_status'] == 'settlement') {
                $schedule = Schedule::where('id', $order->schedule_id)->first();

                if ($schedule->status == "available" && $schedule->date >= date('Y-m-d')) {
                    $schedules->push($schedule);
                }
            }
        });

        // dd($muthawifSchedules);
        // dd($schedules);

        $totalMuthawifSchedules = $muthawifSchedules->count();
        $totalSchedules = $schedules->count();


        return view('Schedule_View.mySchedule', [
            "title" => "Manasik | My Schedule",
            "active" => "mySchedule",
            "schedules" => $schedules->simplePaginate(2),
            "muthawifSchedules" => $muthawifSchedules->simplePaginate(2),
            "totalMuthawifSchedules" => $totalMuthawifSchedules,
            "totalSchedules" => $totalSchedules,
        ]);
    }

    public function showScheduleHistory()
    {
        $schedule =
            Schedule::where('user_id', Auth::user()->id)
            ->where('status', "not available");

        return view('Muthawif.scheduleHistory', [
            "title" => "Manasik | Schedule History",
            "active" => "scheduleHistory",
            "schedules" => $schedule->simplePaginate(6),
        ]);
    }
}
