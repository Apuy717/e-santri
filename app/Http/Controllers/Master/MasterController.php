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
        return view('admin/santri/index', ['santri' => $santri])->with(['user' => $user]);
    }
    public function qrcode($NIM)
    {
        $user = User::with('santri')->where('NIM', $NIM)->get();
        return response()->json($user);
    }
    public function detApi($NIM)
    {
        $user = User::with(['santri', 'santri.ortu', 'santri.kls', 'santri.madrasah'])->where('NIM', $NIM)->get();

        return response()->json($user);
    }
}
