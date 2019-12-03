<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ortu;

class OrtuController extends Controller
{
    public function ad()
    {
    	return view('santri/ortu/ad');
    }

     public function store(Request $request)
    { 
        $this->validate($request, [
			'gambar' => 'file|image|mimes:jpeg,png,jpg|max:2048',
		]);
 
          $file = $request->file('gambar');
            if ($file > 0){
                $nama_file = time()."_".$file->getClientOriginalName();
                $tujuan_upload = 'public/santri/ortu';
                $file->move($tujuan_upload,$nama_file);
		}else{
			$nama_file ='kosong';
		}
 

      $san = Ortu::where('users_NIM', $request->users_NIM)->get();
       //dd(count($san));
        if (count($san) > 0) {
            return redirect('/user')->with('success', 'NIM sudah ada sebelumnya...!');
        }else{

            Ortu::create([
            	'users_NIM' => $request->users_NIM,
            	'nama_ayah' => $request->nama_ayah,
            	'nama_ibu' => $request->nama_ibu,
            	'tgl_lahir' => $request->tgl_lahir,
            	'agama' => $request->agama,
            	'pengamal' => $request->pengamal,
            	'negara' => $request->negara,
            	'pendidikan_akhir' => $request->pendidikan_akhir,
            	'jurusan' => $request->jurusan,
            	'alamat' => $request->alamat,
            	'no_hp' => $request->no_hp,
            	'pekerjaan' => $request->pekerjaan,
            	'penghasilan' => $request->penghasilan,
            	'gambar' => $nama_file
        	]);
        }
        return redirect('/user')->with('success', 'Data Berhasil Di Tambahkan..!!'); 
    }

    public function edit($id)
    {
        $ortu = Ortu::find($id);
        return view('/santri/ortu/edit', ['ortu'=>$ortu]);
    }
    public function update($id, Request $request)
    {
          $this->validate($request, [
            'gambar' => 'file|image|mimes:jpeg,png,jpg|max:10120',
        ]);
 
        // menyimpan data file yang diupload ke variabel $file
          $file = $request->file('gambar');
            if ($file > 0){
                $nama_file = time()."_".$file->getClientOriginalName();
                $tujuan_upload = 'santri/ortu';
                $file->move($tujuan_upload,$nama_file);
            }else{
                $ortu = Ortu::find($id);
                $nama_file = $ortu->gambar;
                //dd($nama_file);
                }

        $ortu = Ortu::find($id);
        $ortu->nama_ayah = $request->nama_ayah;
        $ortu->nama_ibu = $request->nama_ibu;
        $ortu->tgl_lahir = $request->tgl_lahir;
        $ortu->agama = $request->agama;
        $ortu->pengamal = $request->pengamal;
        $ortu->negara = $request->negara;
        $ortu->pendidikan_akhir = $request->pendidikan_akhir;
        $ortu->jurusan = $request->jurusan;
        $ortu->alamat = $request->alamat;
        $ortu->no_hp = $request->no_hp;
        $ortu->pekerjaan = $request->pekerjaan;
        $ortu->penghasilan = $request->penghasilan;
        $ortu->gambar = $nama_file;
        $ortu->save();
        
        return redirect('/user')->with('success', 'Data Orang Tua Berhasil DIubah');
    }
}
