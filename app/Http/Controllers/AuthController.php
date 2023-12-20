<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    function index()
    {
        $settings = Setting::select()->get();

        foreach ($settings as $setting) {
            $setting->logo = 'data:image/jpeg;base64,' . base64_encode($setting->logo);
            $setting->wallpaper = 'data:image/jpeg;base64,' . base64_encode($setting->wallpaper);
        }
        return view('auth.login', ['data' => $setting]);
    }
    function auth(Request $request)
    {

        $auth = User::select('id_user', DB::raw("AES_DECRYPT(id_user, 'nur') as username, AES_DECRYPT(password, 'windi') as passwd"))
            ->where('id_user', DB::raw("AES_ENCRYPT('" . $request->get('username') . "', 'nur')"))
            ->where('password', DB::raw("AES_ENCRYPT('" . $request->get('password') . "', 'windi')"))
            ->first();

        // $admin = Admin::select(DB::raw("AES_DECRYPT(usere, 'nur') as id_user"), DB::raw("AES_DECRYPT(usere, 'nur') as username, AES_DECRYPT(passworde, 'windi') as passwd"))
        //     ->where('usere', DB::raw("AES_ENCRYPT('" . $request->get('username') . "', 'nur')"))
        //     ->where('passworde', DB::raw("AES_ENCRYPT('" . $request->get('password') . "', 'windi')"))
        //     ->first();



        // if ($admin) {
        //     $isAuth = Auth::login($admin);
        //     $pegawai = (object)[
        //         'nik' => $admin->id_user, 'nama' => 'Admin', 'jbtn' => 'Admin Utama'
        //     ];
        //     $request->session()->put('pegawai', $pegawai);
        //     // return Auth::check();
        //     return redirect('/');
        // }
        if ($auth) {
            $isAuth = Auth::login($auth);
            $pegawai = \App\Models\Pegawai::where('nik', $auth->username)->first();
            $request->session()->put('pegawai', $pegawai);
            return redirect('/');
        } else {
            return back()->with(['error' => 'Gagal Login, Periksa username & password'])->withInput();
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
