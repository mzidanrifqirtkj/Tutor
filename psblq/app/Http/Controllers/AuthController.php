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
    //
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
    
    public function lupa_password(Request $request)
    {
        $data = [
            'title' => 'Lupa Password',
        ];
        return view('auth.lupa_password', $data);
    }
    public function change_password(Request $request)
    {
        $data = [
            'title' => 'Ubah Password',
        ];
        return view('auth.change_password', $data);
    }

    public function proses_change_password(Request $request)
    {
        $token = request('token');
        $secretKey  = Config::get("app.jwt_key");
        try {
            $token = JWT::decode($token, new Key($secretKey, 'HS512'));
            $now = new DateTimeImmutable();
        } catch (Exception $e) {
            return redirect('login')->with('error', 'Token Not Valid ' . $e->getMessage());
        }
        if ($request->password != $request->konfirm_password) {
            return redirect()->back()->with('error', 'Konfirmasi Password tidak sesuai');
        }
        $user = User::where('email', $token->email)->first();
        $user->password = bcrypt(request('password'));
        $user->save();
        return redirect('login')->with('success', 'Berhasil merubah password');
    }
    public function proses_lupa_password(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect('lupa_password')->with('error', 'Email Not Found');
        }
        $secretKey  = Config::get("app.jwt_key");
        $user->email_forgot_password = date('Y-m-d H:i:s');
        $user->save();

        $issuedAt   = new DateTimeImmutable();
        $data = [
            'iat'  => $issuedAt->getTimestamp(),
            'expire'     => $issuedAt->modify('+6 minutes')->getTimestamp(),
            'iat'  => $issuedAt->getTimestamp(),
            'user_id' => $user->id,
            'email' => $user->email,
        ];
        $token = JWT::encode(
            $data,
            $secretKey,
            'HS512'
        );
        $params = [
            'user' => $user,
            'url' => url('change_password') . '?token=' . $token,
            'path' => 'change_password',
        ];
        $mailcek = Mail::to($request->email)->send(new \App\Mail\LupaPassword($params));

        return redirect('login')->with('success', 'Silahkan Cek Email anda');
    }

    public function proses_register(Request $request)
    {
        $validator = Validator::make($request->all(), ['email' => 'required|email', 'password' => 'required', 'name' => 'required',]);

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
        $mailcek = Mail::to($request->email)->send(new \App\Mail\TestMail($user));

        return redirect('login')->with('success', 'Berhasil Membuat Akun');
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

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return  redirect('/');
    }
}
