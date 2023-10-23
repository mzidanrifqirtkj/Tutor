<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Warga;
use DB;
use Illuminate\Support\Facades\Hash;

class WargaController extends Controller
{
    //
    public function index(Request $request)
    {
        $warga = Warga::where('status_warga', '=', 'aktif')->get();
        $data = [
            'title' => 'Warga  ' . env('APP_NAME'),
            'warga' => $warga
        ];
        return view('warga.warga', $data);
    }
    public function detail(Request $request)
    {
        $data = Warga::with(['rt', 'pendidikan', 'statuskawin', 'statusdalamkeluarga', 'agama'])->where('warga_id', $request->id)->first();
        $data = [
            'title' => 'Warga  ' . env('APP_NAME'),
            'data' => $data
        ];
        return view('warga.detail', $data);
    }
    public function tambah_warga(Request $request)
    {
        $data = [
            'title' => 'Warga  ' . env('APP_NAME'),
        ];
        return view('warga.tambah_warga', $data);
    }
    public function process_add_warga(Request $request)
    {
        $data = new Warga;
        $data->nik = $request->nik;
        $data->no_kk = $request->no_kk;
        $data->nama_warga = $request->nama_warga;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->pendidikan_id = $request->pendidikan_id;
        $data->golongan_darah = $request->golongan_darah;
        $data->status_kawin_id = $request->status_kawin_id;
        $data->status_dalam_keluarga_id = $request->status_dalam_keluarga_id;
        $data->pekerjaan_asli = $request->pekerjaan_asli;
        $data->keterangan_sosial = $request->keterangan_sosial;
        $data->keterangan_fisik = $request->keterangan_fisik;
        $data->organisasi_selain_rt = $request->organisasi_selain_rt;
        $data->tinggal = $request->tinggal;
        $data->email = $request->email;
        $data->umur = $request->umur;
        $data->save();
        if ($data) {
            return redirect()->back()->with([
                'berhasil' => 'Berhasil menambah data'
            ]);
        } else {
            return redirect('warga')->with([
                'gagal' => 'Data Error Found'
            ]);
        }
    }
}
