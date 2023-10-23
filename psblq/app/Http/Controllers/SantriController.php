<?php

namespace App\Http\Controllers;

use App\Exports\SantriExport;
use App\Models\Asrama;
use App\Models\Lembaga;
use App\Models\Santri;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;
use Excel;

use Illuminate\Support\Facades\Config;
class SantriController extends Controller
{
    //
    public function downloadexcel(Request $request)
    {
        return Excel::download(new SantriExport, 'santri-' . date('Ymdhis') . '.xlsx');
    }
    public function index(Request $request)
    {
        $jenis_kelamin = $request->jenis_kelamin ? $request->jenis_kelamin : '';

        $user = User::find(auth()->user()->id);
        $datas = Santri::when($jenis_kelamin, function ($query) use ($jenis_kelamin,) {
            return $query->where('jenis_kelamin', $jenis_kelamin);
        })->where('status_santri', 'aktif')->get();
        $data = [
            'title' => 'Santri  ' . Config::get("app.name"),
            'data' => $user,
            'datas' => $datas,
            'jenis_kelamin' => $jenis_kelamin,
        ];
        return view('santri.santri', $data);
    }
    public function tidak_aktif(Request $request)
    {
        $jenis_kelamin = $request->jenis_kelamin ? $request->jenis_kelamin : '';

        $user = User::find(auth()->user()->id);
        $datas = Santri::when($jenis_kelamin, function ($query) use ($jenis_kelamin,) {
            return $query->where('jenis_kelamin', $jenis_kelamin);
        })->where('status_santri', 'non_aktif')->get();
        $data = [
            'title' => 'Santri  ' . Config::get("app.name"),
            'data' => $user,
            'datas' => $datas,
            'jenis_kelamin' => $jenis_kelamin,
        ];
        return view('santri.tidak_aktif', $data);
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
        $user->password = bcrypt(request('konf_password'));
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
    public function detail(Request $request)
    {
        $santri = Santri::with(['kecamatan', 'kabupaten', 'provinsi', 'kelurahan'])->findOrFail($request->id);
        $data = [
            'title' => 'Detail ',
            'santri' => $santri,
        ];
        return view('santri.detail', $data);
    }
    public function delete(Request $request)
    {
        $santri = Santri::findOrFail($request->id);
        $santri->delete();
        if ($santri) {
            return redirect()->back()->with([
                'berhasil' => 'Berhasil merubah data',
            ]);
        } else {
            return redirect()->back()->with([
                'error' => 'Gagal merubah data',
            ]);
        }
    }
    public function ubah_status(Request $request)
    {
        $santri = Santri::findOrFail($request->id);
        if ($santri->status_santri == 'aktif') {
            $santri->status_santri = 'non_aktif';
        } else if ($santri->status_santri == 'non_aktif') {
            $santri->status_santri = 'aktif';
        }
        $santri->save();
        if ($santri) {
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
