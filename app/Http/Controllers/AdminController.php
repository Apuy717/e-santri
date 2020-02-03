<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Santri;
use App\Asrama;
use Activation;
use Sentinel;

class AdminController extends Controller
{
	public function admin()
	{
		$santri = Santri::all();
		$categories = [];
		foreach ($santri as $s) {
			$categories[] = $s->jk;
			$tes = count($categories);
		}

		$sa = Santri::where('jk', 'L')->get();
		$data = [];
		foreach ($sa as $s) {
			$data[] = $s->jk;
			$L = count($data);
		}

		$san = Santri::where('jk', 'P')->get();
		$dat = [];
		foreach ($san as $sa) {
			$dat[] = $sa->jk;
			$P = count($dat);
		}

		$asrama = Asrama::all();
		$dataAs = [];
		foreach ($asrama as $asr) {
			$datAs[] = $asr->asrama;
		}
		//dd($datAs);

		return view('admin/admin', ['tes' => $tes])->with(['L' => $L])->with(['P' => $P])->with(['datAs' => $datAs]);
	}
	public function verif()
	{
		// $user = User::all();
		$user = DB::table('users')
			->leftJoin('activations', 'activations.user_id', '=', 'users.id')
			->where('completed', 0)
			->get();
		// dd($user);
		return view('admin/user/verifikasi', ['user' => $user]);
	}

	public function aktif($email, $activationCode)
	{
		$user = User::whereEmail($email)->first();
		$sentinel = Sentinel::findById($user->id);
		if (Activation::complete($sentinel, $activationCode)) {
			return redirect('/dashboard/verifikasi')->with('success', 'akun berhasil diverifikasi');
		} else {
		}
	}
}
