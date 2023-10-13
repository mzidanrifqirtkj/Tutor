<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Config;
class LoginController extends Controller
{
    //
    public function index()
    {
        $data = [
            'title' => 'Login  ' . Config::get("app.name"),
        ];
        return view('login.login', $data);
    }

}
