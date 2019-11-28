<?php

namespace App\Http\Controllers\Persensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\persensi\Persensi;
use App\User;

class AbsenController extends Controller
{
    public function index()
    {
    	return view('admin/persensi/index');
    }

    public function store(Request $request)
    {
    	date_default_timezone_set('Asia/Jakarta');
    	$jam = date('H:i:s');
    	$tgl = date('Y:m:d');
    	$H =1;
        $wk =2;

        $user = User::where('NIM', $request->user_NIM)->get();
        $fn = [];
        $ln = [];
        foreach ($user as $u ) {
            $fn[] = $u->first_name;
            $ln[] = $u->last_name;
        }
        
        $absen = Persensi::where('user_NIM', $request->user_NIM)->where('tgl',$tgl)->where('waktu_id', $request->waktu_id)->get();
        if (count($absen) > 0) {
            $absen['status']=false;
            $absen['first'] = $fn;
            $absen['last'] = $ln;
            $absen['message']="Telah Mengisi Daftar Hadir Sebelumnya !";
        } else {
            $absen = Persensi::create(['user_NIM'=>$request->user_NIM, 'tgl'=>$tgl, 'waktu'=>$jam, 'H'=>$H, 'waktu_id'=>$request->waktu_id]);
            $absen['status']=true;
            $absen['first'] = $fn;
            $absen['last'] = $ln;
            $absen['message']="Berhasil Absen";
        }
        return response()->json($absen);
    }

    public function alfa_store(Request $request)
    {
    	$user = User::all();
    	date_default_timezone_set('Asia/Jakarta');
    	$jam = date('H:i:s');
    	$tgl = date('Y:m:d');

        $absen = Persensi::all();

        $cek =[];
    		foreach ($user as $row) {
            $cek[] = $row->NIM;
	   	 }
        // dd($cek);

         // $abss =[];
         // foreach () {
         // $abss = Persensi::where('user_NIM', $cek)->where('tgl',$tgl)->where('waktu_id', $request->waktu_id)->get();
         // }
         // dd($abss);

	    	return redirect('/dashboard/persensi')->with('success', 'data berhasil auto alfa');
    }
	
}
