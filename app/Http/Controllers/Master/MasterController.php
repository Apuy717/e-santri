<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Santri;
use Sentinel;

class MasterController extends Controller
{
    public function index()
    {
    	$santri = Santri::all();
    	$user = User::all();
    	return view('admin/santri/index',['santri'=>$santri])->with(['user'=>$user]);
    }
    public function detile($NIM)
    {
    $santri = Santri::where('user_NIM', $NIM)->get();
    $user = User::where('NIM', $NIM)->get();
    //dd($user);
    return view('admin/santri/detile', ['santri'=>$santri, 'user' =>$user]);
}
}
