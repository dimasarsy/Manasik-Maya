<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Models\Schedule;
use App\Models\User;
use App\Notifications\userUpcomingScheduleNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class NotifyUpcomingScheduleToUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:userUpcomingSchedule';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will notify the upcoming schedule to muthawif from website';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $schedules =
            Schedule::where('status', "available")
            ->where('availableScheduleDate', '<=', Carbon::now()->addHour()->toDateTimeString())->get();

        $orders = Order::all();

        foreach ($orders as $order) {

            // Log::error('1');
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
            // Log::error('2');

            if ($response['transaction_status'] == 'settlement') {
                // Log::error('3');
                foreach ($schedules as $schedule) {
                    if ($order->schedule_id == $schedule->id) {
                        $user = User::where('id', $order->user_id)->first();
                        // Log::error('4');
                        $notification = DB::table('notifications')->where('data->user->id', $user->id)->where('data->schedule->id', $schedule->id)->get();
                        // Log::error('5');
                        if ($notification->isEmpty()) {
                            // Log::error('6');
                            if ($order->status_web_notification == 'not notified') {
                                $user->notify(new userUpcomingScheduleNotification($schedule));
                                // Log::error('7');
                                DB::table('orders')
                                    ->where('id', $order->id)
                                    ->update(['status_web_notification' => 'notified']);
                                // Log::error('8');
                            }
                        }
                    }
                }
            }

            $user = null;
        }

        $this->info('Success Notify Upcoming Schedule to The User');
    }
}
