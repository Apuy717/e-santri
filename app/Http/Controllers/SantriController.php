<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Santri;
use App\Kamar;
use App\Smester;
use App\Prodi;

class SantriController extends Controller
{
    public function index()
    {
	   	 $santri =Santri::all();
    	return view('admin/index',['santri'=> $santri]);
    }

    public function new()
    {
        $kamar = Kamar::all();
        $smester = Smester::all();
        $prodi = Prodi::all();
    	return view('santri/tambah',['kamar'=>$kamar, 'smester'=>$smester, 'prodi'=>$prodi]);
    }
    
    public function store(Request $request)
    { 
        $this->validate($request, [
			'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:10120',
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('gambar');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	 // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'public/santri/img';
		$file->move($tujuan_upload,$nama_file);
        
      $san = Santri::where('user_NIM', $request->user_NIM)->get();
       //dd(count($san));
        if (count($san) > 0) {
            return redirect('/user')->with('success', 'NIM sudah ada sebelumnya...!');
        }else{
            Santri::create([
            	'user_NIM' => $request->user_NIM,
        		'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
        		'jk' => $request->jk,
        		'anake_ke' => $request->anake_ke,
        		'alamat' => $request->alamat,
        		'no_hp' => $request->no_hp,
        		'sosial_media' => $request->sosial_media,
        		'gambar' => $nama_file,
        		'kamar_id' => $request->kamar_id,
        		'smester_id' => $request->smester_id,
        		'prodi_id' => $request->prodi_id,
                'awal_mondok' => $request->awal_mondok,
                'asal_sekolah' => $request->asal_sekolah,
                'status' => $request->status,
                'madrasah_id'=>$request->madrasah_id,
                'kls_id'=>$request->kls_id
        	]);
        }
        return redirect('/user')->with('success', 'Data Berhasil Di Tambahkan..!!'); 
    }

    public function delete($id)
    {
    	$santri = Santri::find($id);
    	$santri->delete();
    	return redirect('dashboard')->with('success','Data Berhasil DiHapus..!');

    }

    public function edit($id)
    {   
        $santri = Santri::find($id);
        $kamar = Kamar::all();
        $smester = Smester::all();
        $prodi = Prodi::all();
        return view('santri/edit', ['santri'=>$santri, 'kamar'=>$kamar, 'smester'=>$smester, 'prodi'=>$prodi]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:10120',
            
        ]);
 
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('gambar');
 
        $nama_file = time()."_".$file->getClientOriginalName();
 
                // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'public/santri/img';
        $file->move($tujuan_upload,$nama_file);

        $santri = Santri::find($id);
        $santri->user_NIM = $request->user_NIM;
        $santri->asal_sekolah = $request->asal_sekolah;
        $santri->tgl_lahir = $request->tgl_lahir;
        $santri->tempat_lahir = $request->tempat_lahir;
        $santri->jk = $request->jk;
        $santri->anake_ke = $request->anake_ke;
        $santri->alamat = $request->alamat;
        $santri->no_hp = $request->no_hp;
        $santri->sosial_media = $request->sosial_media;
        $santri->gambar = $nama_file;
        $santri->kamar_id = $request->kamar_id;
        $santri->smester_id = $request->smester_id;
        $santri->prodi_id = $request->prodi_id;
        $santri->awal_mondok = $request->awal_mondok;
        $santri->status = $request->status;
        $santri->madrasah_id = $request->madrasah_id;
        $santri->kls_id = $request->kls_id;

        $santri->save();
        return redirect('/user')->with('success', 'Selamat Data Berhasil DiUpdate...!');
    }

    public function detile($NIM)
    {
        //dd($NIM);
        $sntr = Santri::where('NIM', $NIM)->get();
        $ortu = Ortu::where('santri_NIM', $NIM)->get();
        return view('santri/detile',['santri'=> $sntr])->with(['ortu'=>$ortu]);
    }
}
