<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\adminRolesController;
use App\Http\Controllers\adminOrdersController;
use App\Http\Controllers\adminSchedulesController;
use App\Http\Controllers\adminPengajuanMuthawifController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\HistoryTransactionController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/register', [RegisterController::class, "index"])->middleware('guest');
Route::post('/register', [RegisterController::class, "store"]);

Route::get('/login', [LoginController::class, "index"])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, "login"]);

Route::get('/change_password', [ChangePasswordController::class, "index"])->middleware('auth');
Route::post('/change_password', [ChangePasswordController::class, "update_password"])->middleware('auth');

Route::post('/logout', [LoginController::class, "logout"]);

Route::get('/', [HomeController::class, "home"]);
Route::get('/level', [HomeController::class, "level"])->name('level');
Route::get('/marketplace', [HomeController::class, "marketplace"]);

Route::get('/scheduleDetail/{schedule}', [ScheduleController::class, "showScheduleDetail"]);
Route::post('/scheduleDetail/{schedule}', [ScheduleController::class, "payment_post"]);

// Route::get('/addSchedule', [ScheduleController::class, "showAddSchedule"])->middleware('auth', 'auth.role:Muthawif');
Route::post('/addSchedule', [ScheduleController::class, "storeSchedule"])->middleware('auth', 'auth.role:Muthawif');

Route::get('/updateSchedule/{schedule}', [ScheduleController::class, "showUpdateSchedule"])->middleware('auth', 'auth.role:Muthawif');
Route::put('/updateSchedule/{schedule}', [ScheduleController::class, "updateSchedule"])->middleware('auth', 'auth.role:Muthawif');
Route::delete('/delete/{schedule}', [ScheduleController::class, "destroy"])->middleware('auth', 'auth.role:Muthawif');

Route::get('/mySchedule', [ScheduleController::class, "showMySchedule"])->middleware('auth');
Route::get('/scheduleHistory', [ScheduleController::class, "showScheduleHistory"])->middleware('auth', 'auth.role:Muthawif');
Route::get('/orders', [OrderController::class, "index"])->middleware('auth', 'auth.role:User');

Route::get('/historyTransaction', [HistoryTransactionController::class, "HistoryTransaction"])->middleware('auth', 'auth.role:User');
Route::get('/detailHistoryTransaction/{order}', [HistoryTransactionController::class, "DetailHistoryTransaction"])->middleware('auth', 'auth.role:User');

Route::get('/history-transaction', [HistoryTransactionController::class, "index"])->middleware('auth', 'auth.role:User');

Route::get('/pengajuan', [PengajuanController::class, "index"])->middleware('auth', 'auth.role:User');
Route::get('/pengajuan/create', [PengajuanController::class, "create"])->middleware('auth', 'auth.role:User');
Route::post('/pengajuan/store', [PengajuanController::class, "store"])->middleware('auth', 'auth.role:User');
Route::put('/pengajuan/update/{id}', [PengajuanController::class, "update"])->middleware('auth', 'auth.role:User');



Route::get('/markAsRead', function () {
    if (auth()->user()->unreadNotifications->count() != 0) {
        auth()->user()->unreadNotifications->markAsRead();
        // auth()->user()->unreadNotifications->update(['read_at' => now()]);
    }
    return redirect()->back();
})->name('markRead');

Route::get('/deleteAllNotification/{id}', function ($id) {
    if (auth()->user()->readNotifications->count() != 0) {
        DB::table('notifications')->where('data->user->id', $id)->delete();
    }
    return redirect()->back();
});


// Admin 
Route::get('/admin', [adminController::class, 'index'])->middleware('auth', 'auth.role:Admin');
Route::get('/admin/edit/{id}', [adminController::class, 'edit'])->middleware('auth', 'auth.role:Admin');
Route::put('/admin/update/{id}', [adminController::class, 'update'])->middleware('auth', 'auth.role:Admin');
Route::delete('/admin/delete/{id}', [adminController::class, 'delete'])->middleware('auth', 'auth.role:Admin');

Route::get('/admin/roles', [adminRolesController::class, 'index'])->middleware('auth', 'auth.role:Admin');
Route::get('/admin/roles/create', [adminRolesController::class, 'create'])->middleware('auth', 'auth.role:Admin');
Route::post('/admin/roles/store', [adminRolesController::class, 'create'])->middleware('auth', 'auth.role:Admin');
Route::get('/admin/roles/edit/{id}', [adminRolesController::class, 'edit'])->middleware('auth', 'auth.role:Admin');
Route::put('/admin/roles/update/{id}', [adminRolesController::class, 'update'])->middleware('auth', 'auth.role:Admin');

Route::get('/admin/orders', [adminOrdersController::class, 'index'])->middleware('auth', 'auth.role:Admin');

Route::get('/admin/schedules', [adminSchedulesController::class, 'index'])->middleware('auth', 'auth.role:Admin');

Route::get('/admin/pengajuan-muthawif', [adminPengajuanMuthawifController::class, 'index'])->middleware('auth', 'auth.role:Admin');
Route::put('/admin/pengajuan-muthawif/update/{id}', [adminPengajuanMuthawifController::class, 'update'])->middleware('auth', 'auth.role:Admin');
