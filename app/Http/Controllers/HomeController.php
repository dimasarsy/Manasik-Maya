<?php

namespace App\Http\Controllers;

use App\Models\Filter;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        // $pengajuans = DB::table('pengajuans')
        // ->where('user_id', '=', Auth::user()->id)
        // ->get();
        
        return view('LandingPage.home', [
            "title" => "Manasik | Home",
            "active" => "home",
            // "pengajuans" => $pengajuans
        ]);
    }

    public function level()
    {
        return view('LandingPage.level', [
            "title" => "Manasik | Level",
            "active" => "level",
        ]);
    }

    public function marketplace()
    {
        $activeFilter = 'no';
        $schedules = Schedule::where('status', "available")->where('date', '>=', date('Y-m-d'));
        $schedulesCollection = collect();

        // foreach ($schedules as $schedule) {
        //     $result = DB::table('orders')
        //         ->where('schedule_id', '$schedule->id')
        //         ->selectRaw('COUNT(orders.id) AS participant')
        //         ->get();
        //     $schedulesCollection
        // }

        if (request('searchName')) {
            $schedules = Schedule::where('status', "available")->where('date', '>=', date('Y-m-d'))->where('author', 'like', '%' . request('searchName') . '%');
        }

        if (request('searchDate')) {
            $schedules = Schedule::where('status', "available")->where('date', request('searchDate'));
        }

        if (request('submit') == 'thisWeek') {
            $schedules = Schedule::where('status', "available")->whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
            $activeFilter = 'thisWeek';
        }

        if (request('submit') == 'thisMonth') {
            $schedules = Schedule::where('status', "available")->whereMonth('date', date('m'));
            $activeFilter = 'thisMonth';
        }

        if (request('submit') == 'thisYear') {
            $schedules = Schedule::where('status', "available")->whereYear('date', date('Y'));
            $activeFilter = 'thisYear';
        }

        return view('Marketplace.marketplace', [
            "title" => "Manasik | Marketplace",
            "active" => "marketplace",
            "activeFilter" => $activeFilter,
            "schedules" => $schedules->simplePaginate(6),
        ]);
    }
}
