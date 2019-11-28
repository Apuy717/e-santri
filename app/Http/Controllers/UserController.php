<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Santri;
use App\Ortu;
use Sentinel;

class UserController extends Controller
{
    public function index()
    {
    	$user = User::where('NIM', Sentinel::getUser()->NIM)->get();
    	$santri = Santri::where('user_NIM', Sentinel::getUser()->NIM)->get();
    	$ortu = Ortu::where('users_nim', Sentinel::getUser()->NIM)->get();
    	return view('santri/index', ['user'=>$user])->with(['santri'=>$santri])->with(['ortu'=>$ortu]);
    }
}
