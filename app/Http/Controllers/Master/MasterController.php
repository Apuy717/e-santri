<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Asrama;
use App\Santri;
use Sentinel;

class MasterController extends Controller
{
    public function index(Request $request)
    {
        // $santri = Santri::all();
        // $user = User::all();
        // return view('admin/santri/index', ['santri' => $santri])->with(['user' => $user]);

        // $user = User::with(['santri',  'santri.kamar'])->where('NIM', 1971771701)->get();
        //dd($user);
        $asr = Asrama::all();

        $req = $request->keyword;
        if (empty($req)) {
            $santri = DB::table('users')
                ->leftJoin('santri', 'users.NIM', '=', 'santri.user_NIM')
                ->leftJoin('kamar', 'kamar.id', '=', 'santri.kamar_id')
                ->leftJoin('asrama', 'asrama.id', '=', 'kamar.asrama_id')
                ->leftJoin('smester', 'smester.id', '=', 'santri.smester_id')
                ->leftJoin('prodi', 'prodi.id', '=', 'santri.prodi_id')
                ->leftJoin('fakultas', 'fakultas.id', '=', 'prodi.fakultas_id')
                ->leftJoin('madrasah', 'madrasah.id', '=', 'santri.madrasah_id')
                ->leftJoin('kls', 'kls.id', '=', 'santri.kls_id')
                ->get();

            // dd($santri);
            return view('admin/santri/index', ['santri' => $santri, 'asr' => $asr]);
        } else {
            $santri = DB::table('users')
                ->leftJoin('santri', 'users.NIM', '=', 'santri.user_NIM')
                ->leftJoin('kamar', 'kamar.id', '=', 'santri.kamar_id')
                ->leftJoin('asrama', 'asrama.id', '=', 'kamar.asrama_id')
                ->leftJoin('smester', 'smester.id', '=', 'santri.smester_id')
                ->leftJoin('prodi', 'prodi.id', '=', 'santri.prodi_id')
                ->leftJoin('fakultas', 'fakultas.id', '=', 'prodi.fakultas_id')
                ->leftJoin('madrasah', 'madrasah.id', '=', 'santri.madrasah_id')
                ->leftJoin('kls', 'kls.id', '=', 'santri.kls_id')
                ->where('asrama', $req)->get();
            // dd($santri);
            return view('admin/santri/index', ['santri' => $santri, 'asr' => $asr]);
        }

        //return response()->json($santri);
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
