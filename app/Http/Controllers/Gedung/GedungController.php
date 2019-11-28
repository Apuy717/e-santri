<?php

namespace App\Http\Controllers\gedung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kamar;
use App\Asrama;

class GedungController extends Controller
{
    public function index()
    {
    	$kamar = Kamar::all();
    	$asrama = Asrama::all();
    	return view('admin/gedung/index', ['kamar'=>$kamar])->with(['asrama'=>$asrama]);
    }

    public function store(Request $request)
    {
    	Kamar::create([
    	'asrama_id' =>$request->asrama_id,
    	'kamar' => $request->kamar
    ]);
    	return redirect('dashboard/gedung')->with('success', 'Data Kamar Berhasil Ditambahkan.');
    }

    public function as(Request $request)
    {
    	Asrama::create([
    	'asrama' => $request->asrama
    ]);
    	return redirect('dashboard/gedung')->with('success', 'Data Asrama Berhasil Ditambahkan.');
    }

     public function delete($id)
    {
    	$kamar = Kamar::find($id);
    	$kamar->delete();
    	return redirect('dashboard/gedung')->with('success','Data Berhasil DiHapus..!');
    }

    public function del($id)
    {
    	$asrama = Asrama::find($id);
    	$asrama->delete();
    	return redirect('dashboard/gedung')->with('success','Data Berhasil DiHapus..!');
    }
}
