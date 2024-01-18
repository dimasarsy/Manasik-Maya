<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\DB;

class adminPengajuanMuthawifController extends Controller
{
    public function index()
    {
        $pengajuans = DB::table('Pengajuans')
            ->where('Pengajuans.foto', '=', null)
            ->where('Pengajuans.name', '=', null)
            ->join('Users', 'Pengajuans.user_id', '=', 'Users.id')
            ->select('Pengajuans.*', 'Users.name as uname')
            ->get();
        // dd($pengajuans);
        return view('admin-dashboard.pengajuans.index', ['pengajuans' => $pengajuans]);
    }
    public function update(Request $request, $id)
    {
        $pengajuans = Pengajuan::findOrFail($id);

        $pengajuans->update([
            'status' => $request->status,
        ]);



        // dd($pengajuans);
        if ($pengajuans) {
            return redirect('admin/pengajuan-muthawif')
                ->with([
                    'success' => 'Post has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }
}
