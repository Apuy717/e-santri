<?php

namespace App\Http\Controllers\Persensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Persensi\Persensi;
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
        $jam_ahir = date('22:00:00');
        //dd($jam, $jam_ahir);
    	$tgl = date('Y:m:d');
    	$H =1;
        $wk =2;

        $user = User::where('NIM', $request->user_NIM)->get();
        $fn = [];
        $ln = [];
        $nim = [];
        foreach ($user as $u ) {
            $nim[] = $u->NIM;
            $fn[] = $u->first_name;
            $ln[] = $u->last_name;
        }
         $cek[] = $request->user_NIM;
        // if($cek == $nim){
        //     dd("sama");
        // }else{
        //     dd("tidak sama");
        // }
        //  dd($nim, $cek);
            $absen = Persensi::where('user_NIM', $request->user_NIM)->where('tgl',$tgl)->where('waktu_id', $request->waktu_id)->get();
            if (count($absen) > 0) {
                $absen['status']=false;
                $absen['first'] = $fn;
                $absen['last'] = $ln;
                $absen['message']="Telah Mengisi Daftar Hadir Sebelumnya !";
            }elseif ($jam < $jam_ahir) {
                if ($cek == $nim) {
                $absen = Persensi::create(['user_NIM'=>$request->user_NIM, 'tgl'=>$tgl, 'waktu'=>$jam, 'H'=>$H, 'waktu_id'=>$request->waktu_id]);
                $absen['status']=true;
                $absen['first'] = $fn;
                $absen['last'] = $ln;
                $absen['message']="Berhasil Absen";
            }else{
                $absen['request']=$request->user_NIM;
                $absen['status'] ="gagal";
                $absen['message']="Tidak Ada NIM INI";
            }
            }elseif($jam > $jam_ahir){
                $absen['status'] = "telat";
                $absen['message']="HAH Sayang sekali anda sudah telat";
            }
            return response()->json($absen); 
    }

    public function alfa_store(Request $request)
    {
    	//$user = User::all();
    	date_default_timezone_set('Asia/Jakarta');
    	$jam = date('H:i:s');
    	$tgl = date('Y:m:d');

        $absen = Persensi::select('user_NIM')->where('tgl', $tgl)->where('waktu_id', $request->waktu_id)->get();
        $user = User::select('NIM')->whereNotIn('NIM', $absen)->get();
        //dd($user);
         
        foreach ($user as $row) {
           $u = $row->NIM;
           $persensi = new Persensi;
           $persensi->user_NIM = $u;
           $persensi->tgl = $tgl;
           $persensi->waktu =$jam;
           $persensi->H =0;
           $persensi->waktu_id = $request->waktu_id;
           $persensi->save();
        }

        return redirect('/dashboard/persensi')->with('success', 'data berhasil auto alfa');
	    
    }
    // tampilkan hasil persensi 
    public function getAllPersensi(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $dat1 = $request->date1;
        $dat2 = $request->date2;
        if (empty($dat1 && $dat2)) {
            $date1 = date('Y:m:d');
            $date2 = date('Y:m:d');
        } else {
            $date1 = $request->date1;
            $date2 = $request->date2;
        }
        //dd($date1, $date2);

        $start_date = $date1 . ' 00:00:00';
        $end_date = $date2 . ' 23:59:00';


        $persensi = Persensi::whereBetween('tgl' , [$start_date , $end_date])->get();

        return view('admin/monitoring/index', ['persensi'=>$persensi]);
    }
	
}
