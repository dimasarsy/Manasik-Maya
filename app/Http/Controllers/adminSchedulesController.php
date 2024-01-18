<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Schedule;

class adminSchedulesController extends Controller
{
    public function index() {
        $schedules = DB::table('Schedules')
            ->get();
            // dd($schedules);
        return view('admin-dashboard.schedules.index', ['schedules' => $schedules]);
    }
}
