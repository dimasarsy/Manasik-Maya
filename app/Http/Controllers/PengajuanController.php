<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajuans = DB::table('pengajuans')
            ->where('user_id', '=', Auth::user()->id)
            ->get();
        // dd($pengajuans);
        return view('LandingPage.pengajuan.index', [
            "title" => "Manasik | Pengajuan Muthawif",
            "active" => "pengajuan",
            "pengajuans" => $pengajuans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengajuans1 = DB::table('pengajuans')
            ->where('user_id', '=', Auth::user()->id)
            // ->where('status', '=', 'review')
            ->select('pengajuans.status')
            ->get();

        $pengajuans2 = DB::table('pengajuans')
            ->where('user_id', '=', Auth::user()->id)
            // ->where('status', '=', 'Lolos')
            ->select('pengajuans.status')
            ->count();

        // dd($pengajuans1[0]->status);
        // dd($pengajuans2[0]->status);

        // kenapa kok 0?
        // karena jika admin masih ada yg review, user tidak bisa
        for ($i = 0; $i < $pengajuans2; $i++) {
            if ($pengajuans1[$i]->status == 'Review') {
                return redirect('/pengajuan')
                    ->with([
                        'error' => 'Data anda sedang di review'
                    ]);
            }
            if ($pengajuans1[$i]->status == 'Lolos') {
                return redirect('/pengajuan')
                    ->with([
                        'success' => 'Anda sudah lolos menjadi muthawif'
                    ]);
            }
        }
        return view('LandingPage.pengajuan.create', [
            "title" => "Manasik | Pengajuan Muthawif",
            "active" => "pengajuan",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $currFile = $request->file('ktp');
        $fileName1 = time() . '_' . $currFile->getClientOriginalName();
        Storage::putFileAs('public/ktp', $currFile, $fileName1);

        $currFile = $request->file('sertifikat');
        $fileName2 = time() . '_' . $currFile->getClientOriginalName();
        Storage::putFileAs('public/sertifikat', $currFile, $fileName2);


        $pengajuan = DB::table('pengajuans')->insert([
            'ktp' => $fileName1,
            'sertifikat' => $fileName2,
            'user_id' =>  Auth::user()->id,
            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
            "updated_at" => \Carbon\Carbon::now()  # new \Datetime()
        ]);
        if ($pengajuan) {
            return redirect('/pengajuan')
                ->with([
                    'success' => 'Post has been added successfully'
                ]);
        } else {
            return redirect('/pengajuan')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pengajuans = User::findOrFail(Auth::user()->id);
        $pengajuans->update([
            'role_id' => '3',
        ]);
        // dd($pengajuans);
        if ($pengajuans) {
            return redirect('/')
                ->with([
                    'success' => 'Selamat anda telah menjadi muthawif'
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengajuan $pengajuan)
    {
        //
    }
}
