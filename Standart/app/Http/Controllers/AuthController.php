<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Firebase\JWT\JWT;

use Firebase\JWT\Key;
use App\Models\Pendaftar;
use Illuminate\Http\Request;
use App\Models\User;
use DateTimeImmutable;
use DB;
use Exception;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;


class AuthController extends Controller
{

    public function index()
    {
        $data = [
            'title' => 'Dashboard  ' . Config::get("app.name"),
        ];
        return view('dashboard.dashboard', $data);
    }

    public function register(Request $request)
    {
        $data = [
            'title' => 'Register  ' . Config::get("app.name"),
        ];
        return view('auth.register', $data);
    }

    public function proses_login(Request $request)
    {
        request()->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ]
        );

        $kredensil = $request->only('email', 'password');

        if (Auth::attempt($kredensil)) {
            $user = Auth::user();
            $data = User::findOrFail($user->id);
            $data->last_login = now();
            $data->save();
            if ($user->level == 'admin') {
                return redirect('dashboard')->with('success', 'Selamat datang ' . $user->name);
            } elseif ($user->level == 'user') {
                if ($user->level == 'admin') {
                    return redirect('dashboard')->with('success', 'Selamat datang ' . $user->name);
                } elseif ($user->level == 'user') {
                    if ($user->verif_qonun == 'yes') {
                        return redirect('dashboard/formulir')->with('success', 'Selamat datang ' . $user->name);
                    } else {
                        return redirect('dashboard/qonun')->with('success', 'Selamat datang ' . $user->name);
                    }
                    // return redirect()->intended('editor');
                }
                return redirect('dashboard');
                // return redirect()->intended('/');
            } else {
                return redirect()->back()->with('error', 'Email atau Password salah');
                // ->withInput()
                // ->withErrors(['error' => 'Kombinasi Email dan Password Tidak Sesuai.']);
            }
        }
    }

    public function proses_register(Request $request)
    {
        $validator = validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required',]);

        if ($validator->fails()) {
            return redirect('')->back()
                ->withErrors($validator)
                ->withInput();
        }
        request()->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ]
        );
        $emailchecking = User::where('email', $request->email)->first();

        if ($emailchecking) {
            return redirect('register')->with('error', 'Email Telah digunakan');
        }
        if ($request->password != $request->konfirm_password) {
            return redirect('register')->with('error', 'Konfirmasi Password tidak sesuai');
        }
        $user = new User;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->level = 'user';
        $user->verif_qonun = 'no';
        $user->password = bcrypt(request('password'));
        $user->save();
        $pendaftar = new Pendaftar;
        $pendaftar->user_id = $user->id;
        $pendaftar->save();
        // $mailcek = Mail::to($request->email)->send(new \App\Mail\TestMail($user));

        return redirect('login')->with('success', 'Berhasil Membuat Akun');
    }
}
