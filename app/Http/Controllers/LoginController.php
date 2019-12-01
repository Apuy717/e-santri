<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Activation;
use App\User;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;

class LoginController extends Controller
{
	public function register()
	{
		return view('login/register');
	}

	public function postRegister(Request $request)
	{
        $this->validate($request, [
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:10240',
        ]);
 
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('gambar');
 
        $nama_file = time()."_".$file->getClientOriginalName();
 
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'public/santri/verif';
        $file->move($tujuan_upload,$nama_file);
        //dd($nama_file);
		// $user = Sentinel::register($request->all());
        $user = Sentinel::register([
                                    'NIM' => $request->NIM,
                                    'email' => $request->email,
                                    'password' => $request->password,
                                    'permissions' => $request->password,
                                    'first_name' => $request->first_name,
                                    'last_name' => $request->last_name,
                                    'gambar' => $nama_file,
                                    ]);

        $activation = Activation::create($user);

		$role = Sentinel::findRoleBySlug('user');
		$role->users()->attach($user);

		return redirect('/')->with('success', 'selamat anda berhasil Registrasi');
	}

    public function postLogin(Request $request)
    {
        try {

            if (Sentinel::authenticate($request->all())){
            $slug = Sentinel::getUser()->roles()->first()->slug;

                if (Sentinel::getUser()->roles()->first()->slug == 'admin')
                    return redirect('/dashboard');
                        elseif (Sentinel::getUser()->roles()->first()->slug == 'user')
                            return redirect('/user');
                    } else {
                        return redirect()->back()->with(['error' => 'Email / Password anda salah / akun anda belum terverifikasi.']);

                        }
                
            } catch (ThrottlingException $e) {
                $delay = $e->getDelay();
                return redirect()->back()->with(['error' => "You are banned for $delay seconds"]);

            } catch (NotActivatedException $e) {
                return redirect()->back()->with(['error' => 'akun anda belum terverifikasi Harap Hubungi Pengurus Pondok']);
            }
    }

    public function logout()
    {
    	Sentinel::logout();

    	return redirect('/');
    }
}
?>
