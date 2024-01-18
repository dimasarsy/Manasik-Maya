<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HistoryTransactionController extends Controller
{
    public function HistoryTransaction()
    {
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('id', 'DESC');

        $paidOrders = collect();

        $orders->each(function ($order) use (&$paidOrders) {
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


            DB::table('orders')
                ->where('order_id', '=', $order->order_id)
                ->update(['status' => $response['transaction_status']]);

            $paidOrders->push($order);

            // if ($response['transaction_status'] == 'settlement') {
            //     DB::table('orders')
            //         ->where('order_id', '=', $order->order_id)
            //         ->update(['status' => 'settlement']);

            //     $paidOrders->push($order);
            //     // Schedule::where('id', $order->schedule_id)
            //     //     ->increment('participant', 1, ['increased_at' => Carbon::now()]);
            // } elseif ($response['transaction_status'] == 'pending') {
            //     DB::table('orders')
            //         ->where('order_id', '=', $order->order_id)
            //         ->update(['status' => 'pending']);

            //     $paidOrders->push($order);
            // } elseif ($response['transaction_status'] != 'pending' && $response['transaction_status'] != 'settlement') {
            //     DB::table('orders')
            //         ->where('order_id', '=', $order->order_id)
            //         ->update(['status' => 'failure']);

            //     $paidOrders->push($order);
            // }
        });

        // dd($paidOrders);

        return view('User.transaction_history', [
            "title" => "Manasik | History Transaction",
            "active" => "historyTransaction",
            "orders" => $paidOrders->simplePaginate(6),
            // "response" => $response
        ]);
    }


    public function DetailHistoryTransaction(Order $order)
    {
        $order = Order::where('id', $order->id)->first();

        return view('User.transaction_history_detail', [
            "title" => "Manasik | Detail History Transaction",
            "active" => "historyTransaction",
            "order" => $order,
        ]);
    }

    public function index()
    {
        $order =
            DB::table('orders')
            ->join('schedules', 'orders.schedule_id', '=', 'schedules.id')
            ->where('orders.user_id', '=',  Auth::user()->id)
            ->select('orders.*', 'schedules.*')
            ->get();

        $order_count = DB::table('orders')
            ->join('schedules', 'orders.schedule_id', '=', 'schedules.id')
            ->where('orders.user_id', '=',  Auth::user()->id)
            ->select('orders.*', 'schedules.*')
            ->count();

        // dd($order);

        for ($i = 0; $i < $order_count; $i++) {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.sandbox.midtrans.com/v2/" . $order[$i]->order_id . "/status",
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

            $response = curl_exec($curl);
            // if ($i < $order_count) {
            $responses[$i] = json_decode($response, true);
            // continue;
            // }
        }

        curl_close($curl);
        dd($responses);

        return view('User.transaction-history', [
            "title" => "Manasik | History Transaction",
            "active" => "historyTransaction",
            "responses" => $responses,
            'order' => $order,
        ]);
    }
}
