<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class adminOrdersController extends Controller
{
    public function index()
    {
        $orders = DB::table('Orders')
            ->get();
        return view('admin-dashboard.orders.index', ['orders' => $orders]);
    }
}
