<?php

namespace App\Http\Controllers\Pendidikan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Fakultas;
use App\Prodi;
use App\Smester;

class PendidikanController extends Controller
{
    public function index()
    {
    	$fakultas = Fakultas::all();
    	$prodi = Prodi::all();
    	return view('admin/pendidikan/index', ['fakultas'=>$fakultas])->with(['prodi'=>$prodi]);
    }

    public function newfak(Request $request)
    {
    	Fakultas::create([ 'fakultas' =>$request->fakultas]);

    	return redirect('/dashboard/pendidikan')->with('success', 'Fakultas Berhasil Ditambahkan.');
    }
    public function delfak($id)
    {
    	$fakultas = Fakultas::find($id);
    	$fakultas->delete();
    	return redirect('/dashboard/pendidikan')->with('success', 'Fakultas Berhasil Di Hapus..!');
    }

    public function newpro(Request $request)
    {
    	Prodi::create([ 'fakultas_id' =>$request->fakultas_id, 'prodi'=>$request->prodi]);

    	return redirect('/dashboard/pendidikan')->with('success', 'prodi Berhasil Ditambahkan.');
    }
    public function delpro($id)
    {
    	$prodi = Prodi::find($id);
    	$prodi->delete();
    	return redirect('/dashboard/pendidikan')->with('success', 'Fakultas Berhasil Di Hapus..!');
    }
}
