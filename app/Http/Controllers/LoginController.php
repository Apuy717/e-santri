<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Activation;
use App\User;
use App\Role\Role;
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
            'NIM' => 'required|max:19|unique:users',
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:10240',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50'
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('gambar');

        $nama_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'public/santri/verif';
        $file->move($tujuan_upload, $nama_file);
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

            if (Sentinel::authenticate($request->all())) {
                $slug = Sentinel::getUser()->roles()->first()->slug;

                if (Sentinel::getUser()->roles()->first()->slug == 'admin')
                    return redirect('/dashboard');
                elseif (Sentinel::getUser()->roles()->first()->slug == 'super admin')
                    return redirect('/dashboard');
                elseif (Sentinel::getUser()->roles()->first()->slug == 'user')
                    return redirect('/user');
            } else {
                return redirect()->back()->with(['error' => 'Email / Password anda salah / akun anda belum terverifikasi.']);
            }
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            return redirect()->back()->with(['error' => "Anda Di Blokir terlalu banyak salah kata sandi Harap tunggu  $delay seconds"]);
        } catch (NotActivatedException $e) {
            return redirect()->back()->with(['error' => 'akun anda belum terverifikasi Harap Hubungi Pengurus Pondok']);
        }
    }

    public function logout()
    {
        Sentinel::logout();

        return redirect('/');
    }

    public function role()
    {
        $role = Role::with('user')->get();
        return view('SuperAdmin/role', ['role' => $role]);
    }

    public function edtRole($id, Request $request)
    {
        $role = Role::where('user_id', $id)->update(['role_id' => $request->role_id]);
        return redirect('/dashboard/role')->with('success', 'Role Berhasil Di Update...!');
    }
}
