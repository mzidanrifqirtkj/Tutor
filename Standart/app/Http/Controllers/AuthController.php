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
}
