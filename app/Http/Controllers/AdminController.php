<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Santri;
use App\Asrama;
use Activation;
use Sentinel;
use File;

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
			$datAs[] = $asr->id;
		}

		$san = Santri::where('kamar_id', 'P')->get();
		$dat = [];
		foreach ($san as $sa) {
			$dat[] = $sa->jk;
			$P = count($dat);
		}
		//dd($datAs);
		// $as = Asrama::select('id')->get();
		// $graf = DB::table('santri')
		// 	->Join('kamar', 'kamar.id', '=', 'santri.kamar_id')
		// 	->where('asrama_id', $as)
		// 	->get();
		// $graf = Santri::with(['kamar'])->get()

		// dd($graf);
		// foreach ($graf as $gr) {
		// 	$g[] = $gr->asrama_id;
		// }
		// foreach ($as as $a) {
		// 	$ck[] = $a->id;
		// }


		// foreach ($graf as $ck) {
		// 	$datee[] = $ck->asrama;
		// 	if ($datAs === $ck->asrama) {
		// 	}
		// 	dd($datee);
		// }

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

	public function nodat()
	{
		$santri = Santri::select('user_NIM')->get()->toArray();
		$query = DB::table('users')
			->join('role_users', 'role_users.user_id', '=', 'users.id')
			->where('role_id', 2)
			->whereNotIn('NIM', $santri)
			->get();

		//dd($query);
		return view('admin/user/nodat', ['query' => $query]);
	}

	public function hapus($id)
	{
		$user = User::where('id', $id)->first();
		File::delete('public/santri/verif/' . $user->gambar);
		User::where('id', $id)->delete();
		return redirect()->back()->with('success', 'Data Berhasil Dihapus');
	}
}
