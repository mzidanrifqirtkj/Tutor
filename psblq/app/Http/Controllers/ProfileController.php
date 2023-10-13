<?php

namespace App\Http\Controllers;

use App\Models\Asrama;
use App\Models\Lembaga;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function index()
    {
        $user = User::find(auth()->user()->id);
        $data = [
            'title' => 'Profile  ' . Config::get("app.name"),
            'data' => $user,
        ];
        return view('profile.profile', $data);
    }
    public function data(Request $request)
    {
        $user = User::find(auth()->user()->id);
        return response()->json([
            'status' => true,
            'data' => $user,
        ], 200);
    }
    public function ubah_password(Request $request)
    {
        $user = User::find(auth()->user()->id);
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with([
                'error' => 'Password Lama Tidak benar',
            ]);
        }
        // if(Hash::check($request->password,$user->password)) {
        //     // Right password
        // } 
        $user->password = bcrypt(request('konf_password'));
        $user->save();
        if ($user) {
            return redirect()->back()->with([
                'success' => 'Berhasil merubah data',
            ]);
        } else {
            return redirect()->back()->with([
                'error' => 'Gagal merubah data',
            ]);
        }
    }
    public function edit_profile(Request $request)
    {
        $user = User::find(auth()->user()->id);
        // $user->username = request('username');
        $user->name = request('name');
        $user->email = request('email');
        $user->save();
        if ($user) {
            return redirect()->back()->with([
                'berhasil' => 'Berhasil merubah data',
            ]);
        } else {
            return redirect()->back()->with([
                'error' => 'Gagal merubah data',
            ]);
        }
    }
}
