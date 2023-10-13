<?php

namespace App\Http\Controllers;

use App\Exports\PendaftarExport;
use App\Models\Gambar;
use App\Models\Pendaftar;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;
use Excel;
use Illuminate\Support\Str;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class PendaftarController extends Controller
{

    public function delete(Request $request)
    {
        $pendaftar = Pendaftar::findOrFail($request->id);
        $pendaftar->delete();
        if ($pendaftar) {
            return redirect()->back()->with('success', 'Pendaftar dihapus');
        } else {
            return redirect()->back()->with('error', 'Pendaftar gagal dihapus');
        }
    }

    public function detail(Request $request)
    {
        $pendaftar = Pendaftar::with(['kecamatan', 'kabupaten', 'provinsi', 'kelurahan'])->findOrFail($request->id);
        $data = [
            'title' => 'Detail ',
            'pendaftar' => $pendaftar,
        ];
        return view('pendaftar.detail', $data);
    }
    public function downloadexcel()
    {
        return Excel::download(new PendaftarExport, 'pendaftar-' . date('Ymdhis') . '.xlsx');
    }

    public function index(Request $request)
    {
        $limit = request('limit') ? request('limit') : 10;
        $jenis_kelamin = $request->jenis_kelamin ? $request->jenis_kelamin : '';
        $status_sowan = $request->status_sowan ? $request->status_sowan : '';
        $q = $request->q ? $request->q : '';
        $pendaftar = Pendaftar::with(['kecamatan', 'kabupaten', 'provinsi', 'kelurahan', 'user'])->when($jenis_kelamin, function ($query) use ($jenis_kelamin,) {
            return $query->where('jenis_kelamin', $jenis_kelamin);
        })->when($status_sowan, function ($query) use ($status_sowan,) {
            return $query->where('sudah_sowan', $status_sowan);
        })->when($q, function ($query) use ($q,) {
            return $query->where('nama', 'LIKE', '%' . $q . '%');
        })->paginate($limit);
        $jumlahlaki = Pendaftar::where('jenis_kelamin', 'L')->get()->count();
        $jumlahsemua = Pendaftar::get()->count();
        $jumlahperempuan = Pendaftar::where('jenis_kelamin', 'P')->get()->count();
        $jumlahsowan = Pendaftar::where('sudah_sowan', 'Y')->get()->count();
        $data = [
            'title' => 'Pendaftar' . Config::get("app.name"),
            'pendaftar' => $pendaftar,
            'jumlahsemua' => $jumlahsemua,
            'jumlahlaki' => $jumlahlaki,
            'status_sowan' => $status_sowan,
            'jumlahperempuan' => $jumlahperempuan,
            'jenis_kelamin' => $jenis_kelamin,
            'jumlahsowan' => $jumlahsowan,
            'q' => $q,
        ];
        return view('pendaftar.pendaftar', $data);
    }

    public function tambah(Request $request)
    {
        $data = [
            'title' => 'Pendaftar' . Config::get("app.name"),
        ];
        return view('pendaftar.tambah', $data);
    }

    public function proses_update(Request $request)
    {
        $message = [
            'required' => ':attribute harus di isi',
        ];
        $cekvalidasi =  Validator::make($request->all(), [
            'no_telp' => 'required|max:15',
            'gambar' => 'mimes:jpeg,png,jpg',
            'gambar_kk' => 'mimes:jpeg,png,jpg',
        ], $message);
        if ($cekvalidasi->fails()) {
            return redirect()->back()->with('error', $cekvalidasi->messages()->first());
        }
        DB::beginTransaction();
        try {
            $pendaftar = Pendaftar::where('user_id', Auth::user()->id)->first();
            if (!$pendaftar) {
                return redirect()->back()->with('error', 'Pendaftar Tidak ditemukan');
            }
            $pendaftar->nama = $request->nama;
            $pendaftar->nik = $request->nik;
            $pendaftar->no_kk = $request->no_kk;
            $pendaftar->jenis_kelamin = $request->jenis_kelamin;
            $pendaftar->tempat_lahir = $request->tempat_lahir;
            $pendaftar->tanggal_lahir = $request->tanggal_lahir;
            $pendaftar->pendidikan_terakhir = $request->pendidikan_terakhir;
            $pendaftar->pendidikan_non_formal = $request->pendidikan_non_formal;
            $pendaftar->tahun_lulus = $request->tahun_lulus;
            $pendaftar->prestasi = $request->prestasi;
            $pendaftar->organisasi = $request->organisasi;
            $pendaftar->jabatan = $request->jabatan;
            $pendaftar->nisn = $request->nisn;
            $pendaftar->no_telp = $request->no_telp;
            $pendaftar->rt = $request->rt;
            $pendaftar->rw = $request->rw;
            $pendaftar->alamat = $request->alamat;
            $pendaftar->kd_provinsi = $request->kd_provinsi;
            $pendaftar->kd_kabupaten = $request->kd_kabupaten;
            $pendaftar->kd_kecamatan = $request->kd_kecamatan;
            $pendaftar->kd_kelurahan = $request->kd_kelurahan;
            $pendaftar->pendidikan_non_formal = $request->pendidikan_non_formal;
            $pendaftar->kode_pos = $request->kode_pos;
            $pendaftar->golongan_darah = $request->golongan_darah;
            $pendaftar->no_kip = $request->no_kip;
            $pendaftar->no_kks = $request->no_kks;
            $pendaftar->no_pkh = $request->no_pkh;
            if ($pendaftar->gambar == null) {
                if ($request->file('gambar')) {
                    $file_frontimage = $request->file('gambar');
                    $actual_filename_frontimage = $file_frontimage->getClientOriginalName();
                    $filename_frontimage = time() . '_' . $actual_filename_frontimage;
                    $path = public_path() . '/gambar/' . $request->nama;
                    if (!$path) {
                        File::makeDirectory($path, $mode = 0777, true, true);
                    }
                    $pendaftar->gambar = '/gambar/' . $request->nama . '/' . $filename_frontimage;
                    $tujuan_upload = $path;
                    $request->file('gambar')->move($tujuan_upload, $filename_frontimage);
                } else {
                    return redirect()->back()->with('error', 'Foto Harus di isi');
                }
            } else {
                if ($request->file('gambar')) {
                    $file_frontimage = $request->file('gambar');
                    $actual_filename_frontimage = $file_frontimage->getClientOriginalName();
                    $filename_frontimage = time() . '_' . $actual_filename_frontimage;
                    $path = public_path() . '/gambar/' . $request->nama;
                    if (!$path) {
                        File::makeDirectory($path, $mode = 0777, true, true);
                    }
                    $pendaftar->gambar = '/gambar/' . $request->nama . '/' . $filename_frontimage;
                    $tujuan_upload = $path;
                    $request->file('gambar')->move($tujuan_upload, $filename_frontimage);
                }
            }
            if ($pendaftar->gambar_kk == null) {
                if ($request->file('gambar_kk')) {
                    $file_frontimage = $request->file('gambar_kk');
                    $actual_filename_frontimage = $file_frontimage->getClientOriginalName();
                    $filename_frontimage = 'kk' . time() . '_' . $actual_filename_frontimage;
                    $path = public_path() . '/gambar/' . $request->nama;
                    if (!$path) {
                        File::makeDirectory($path, $mode = 0777, true, true);
                    }
                    $pendaftar->gambar_kk = '/gambar/' . $request->nama . '/' . $filename_frontimage;
                    $tujuan_upload = $path;
                    $request->file('gambar_kk')->move($tujuan_upload, $filename_frontimage);
                } else {
                    return redirect()->back()->with('error', 'Foto KK Harus di isi');
                }
            } else {
                if ($request->file('gambar_kk')) {
                    $file_frontimage = $request->file('gambar_kk');
                    $actual_filename_frontimage = $file_frontimage->getClientOriginalName();
                    $filename_frontimage = 'kk' . time() . '_' . $actual_filename_frontimage;
                    $path = public_path() . '/gambar/' . $request->nama;
                    if (!$path) {
                        File::makeDirectory($path, $mode = 0777, true, true);
                    }
                    $pendaftar->gambar_kk = '/gambar/' . $request->nama . '/' . $filename_frontimage;
                    $tujuan_upload = $path;
                    $request->file('gambar_kk')->move($tujuan_upload, $filename_frontimage);
                }
            }

            $pendaftar->save();
            DB::commit();
            return redirect('dashboard/formulir_kedua')->with('success', 'Silahkan Lengkapi Data Wali/Orangtua');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('dashboard/formulir')->with('error', $e->getMessage());
        }
    }

    public function proses_update_kedua(Request $request)
    {
        // $validator = Validator::make($request->all(), ['email' => 'required|email', 'password' => 'required', 'name' => 'required',]);

        // if ($validator->fails()) {
        //     return redirect('')->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }
        // request()->validate(
        //     [
        //         'email' => 'required',
        //         'password' => 'required',
        //     ]
        // );
        $message = [
            'required' => ':attribute harus di isi',
        ];
        $cekvalidasi =  Validator::make($request->all(), [
            'no_telp_ayah' => 'required|max:15',
            'no_telp_ibu' => 'required|max:15',
            'no_telp_wali' => 'required|max:15',
        ], $message);
        if ($cekvalidasi->fails()) {
            return redirect()->back()->with('error', $cekvalidasi->messages()->first());
        }
        $pendaftar = Pendaftar::where('user_id', Auth::user()->id)->first();
        if (!$pendaftar) {
            return redirect()->back()->with('error', 'Pendaftar Tidak ditemukan');
        }
        $pendaftar->nama_ayah = $request->nama_ayah;
        $pendaftar->alamat_ayah = $request->nama_ayah;
        $pendaftar->nik_ayah = $request->nik_ayah;
        $pendaftar->no_telp_ayah = $request->no_telp_ayah;
        $pendaftar->pendidikan_terakhir_ayah = $request->pendidikan_terakhir_ayah;
        $pendaftar->pekerjaan_ayah = $request->pekerjaan_ayah;
        $pendaftar->penghasilan_ayah = $request->penghasilan_ayah;
        $pendaftar->alamat_ayah = $request->alamat_ayah;
        $pendaftar->nama_ibu = $request->nama_ibu;
        $pendaftar->alamat_ibu = $request->alamat_ibu;
        $pendaftar->nik_ibu = $request->nik_ibu;
        $pendaftar->no_telp_ibu = $request->no_telp_ibu;
        $pendaftar->pendidikan_terakhir_ibu = $request->pendidikan_terakhir_ibu;
        $pendaftar->pekerjaan_ibu = $request->pekerjaan_ibu;
        $pendaftar->penghasilan_ibu = $request->penghasilan_ibu;
        $pendaftar->alamat_ibu = $request->alamat_ibu;
        $pendaftar->nama_wali = $request->nama_wali;
        $pendaftar->alamat_wali = $request->alamat_wali;
        $pendaftar->nik_wali = $request->nik_wali;
        $pendaftar->no_telp_wali = $request->no_telp_wali;
        $pendaftar->pendidikan_terakhir_wali = $request->pendidikan_terakhir_wali;
        $pendaftar->pekerjaan_wali = $request->pekerjaan_wali;
        $pendaftar->penghasilan_wali = $request->penghasilan_wali;
        $pendaftar->alamat_wali = $request->alamat_wali;

        $pendaftar->save();
        return redirect('dashboard/download')->with('success', 'Silahkan Mendownload Berkas');
    }
    public function proses_setelah_sowan(Request $request)
    {
        DB::beginTransaction();
        try {
            $pendaftar = Pendaftar::findOrFail($request->id);
            if ($pendaftar->sudah_sowan == 'Y') {
                return redirect()->back()->with('error', 'Pendaftar Sudah sowan dan memiliki NIS');
            }
            $pendaftar->sudah_sowan = 'Y';
            $pendaftar->save();

            $santri = new Santri;
            $santri->id_pendaftar = $pendaftar->id_pendaftar;
            $santri->user_id = $pendaftar->user_id;
            $santri->nis = AutoNis($pendaftar->jenis_kelamin);
            $santri->nama = $pendaftar->nama;
            $santri->gambar = $pendaftar->gambar;
            $santri->gambar_kk = $pendaftar->gambar_kk;
            $santri->nik = $pendaftar->nik;
            $santri->no_kk = $pendaftar->no_kk;
            $santri->jenis_kelamin = $pendaftar->jenis_kelamin;
            $santri->tempat_lahir = $pendaftar->tempat_lahir;
            $santri->tanggal_lahir = $pendaftar->tanggal_lahir;
            $santri->pendidikan_terakhir = $pendaftar->pendidikan_terakhir;
            $santri->pendidikan_non_formal = $pendaftar->pendidikan_non_formal;
            $santri->tahun_lulus = $pendaftar->tahun_lulus;
            $santri->prestasi = $pendaftar->prestasi;
            $santri->organisasi = $pendaftar->organisasi;
            $santri->jabatan = $pendaftar->jabatan;
            $santri->nisn = $pendaftar->nisn;
            $santri->no_telp = $pendaftar->no_telp;
            $santri->rt = $pendaftar->rt;
            $santri->rw = $pendaftar->rw;
            $santri->alamat = $pendaftar->alamat;
            $santri->kd_provinsi = $pendaftar->kd_provinsi;
            $santri->kd_kabupaten = $pendaftar->kd_kabupaten;
            $santri->kd_kecamatan = $pendaftar->kd_kecamatan;
            $santri->kd_kelurahan = $pendaftar->kd_kelurahan;
            $santri->kode_pos = $pendaftar->kode_pos;
            $santri->golongan_darah = $pendaftar->golongan_darah;
            $santri->no_kip = $pendaftar->no_kip;
            $santri->no_kks = $pendaftar->no_kks;
            $santri->no_pkh = $pendaftar->no_pkh;
            $santri->nama_ayah = $pendaftar->nama_ayah;
            $santri->alamat_ayah = $pendaftar->nama_ayah;
            $santri->nik_ayah = $pendaftar->nik_ayah;
            $santri->no_telp_ayah = $pendaftar->no_telp_ayah;
            $santri->pendidikan_terakhir_ayah = $pendaftar->pendidikan_terakhir_ayah;
            $santri->pendidikan_non_formal = $pendaftar->pendidikan_non_formal;
            $santri->pekerjaan_ayah = $pendaftar->pekerjaan_ayah;
            $santri->penghasilan_ayah = $pendaftar->penghasilan_ayah;
            $santri->nama_ibu = $pendaftar->nama_ibu;
            $santri->alamat_ibu = $pendaftar->alamat_ibu;
            $santri->nik_ibu = $pendaftar->nik_ibu;
            $santri->no_telp_ibu = $pendaftar->no_telp_ibu;
            $santri->pendidikan_terakhir_ibu = $pendaftar->pendidikan_terakhir_ibu;
            $santri->pekerjaan_ibu = $pendaftar->pekerjaan_ibu;
            $santri->penghasilan_ibu = $pendaftar->penghasilan_ibu;
            $santri->nama_wali = $pendaftar->nama_wali;
            $santri->alamat_wali = $pendaftar->alamat_wali;
            $santri->nik_wali = $pendaftar->nik_wali;
            $santri->no_telp_wali = $pendaftar->no_telp_wali;
            $santri->pendidikan_terakhir_wali = $pendaftar->pendidikan_terakhir_wali;
            $santri->pekerjaan_wali = $pendaftar->pekerjaan_wali;
            $santri->penghasilan_wali = $pendaftar->penghasilan_wali;
            $santri->save();
            DB::commit();

            return redirect('pendaftar')->with('success', 'Berhasil Membuat Nis Santri');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('pendaftar')->with('error', $e->getMessage());
        }
    }
    public function store(Request $request)
    {
        // $message = [
        //     'required' => ':attribute harus di isi',
        // ];
        // $cekvalidasi =  Validator::make($request->all(), [
        //     'nama' => 'required|max:50',
        //     'nik' => 'required|max:50',
        //     'no_telp_ayah' => 'required|max:13',
        //     'no_telp_ibu' => 'required|max:13',
        //     'no_telp_wali' => 'required|max:13',
        //     'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'keterangan' => 'required',
        // ], $message);
        // if ($cekvalidasi->fails()) {
        //     return redirect()->back()->with('error', $cekvalidasi->messages()->first());
        // }
        // $imageName = time() . '.' . $request->gambar->extension();

        // $request->gambar->move(public_path('gambar'), $imageName);
        // dd($request->nama);
        $data = new Pendaftar();
        $data->nis = $request->nis;
        $data->nama = $request->nama;
        $data->nik = $request->nik;
        $data->no_kk = $request->no_kk;
        $data->jenis_kelamin = $request->jenis_kelamin;
        // $data->tempat_lahir = $request->tempat_lahir;
        // $data->tanggal_lahir = $request->tanggal_lahir;
        // $data->pendidikan_id = $request->pendidikan_id;
        $data->nisn = $request->nisn;
        $data->no_telp = $request->no_telp;
        $data->alamat = $request->alamat;
        // $data->rt = $request->rt;
        // $data->rw = $request->rw;
        $data->nama_ayah = $request->nama_ayah;
        $data->alamat_ayah = $request->alamat_ayah;
        $data->no_telp_ayah = $request->no_telp_ayah;
        $data->pekerjaan_ayah = $request->pekerjaan_ayah;
        $data->penghasilan_ayah = $request->penghasilan_ayah;

        $data->nama_ibu = $request->keterangan_fisik;
        $data->alamat_ibu = $request->alamat_ibu;
        $data->no_telp_ibu = $request->no_telp_ibu;
        $data->pekerjaan_ibu = $request->pekerjaan_ibu;
        $data->penghasilan_ibu = $request->penghasilan_ibu;

        $data->nama_wali = $request->nama_wali;
        $data->alamat_wali = $request->alamat_wali;
        $data->no_telp_wali = $request->no_telp_wali;
        $data->pekerjaan_wali = $request->pekerjaan_wali;
        $data->penghasilan_wali = $request->penghasilan_wali;
        if ($request->file('gambar')) {
            // $file = $request->file('siswa_image');
            // $tujuan_upload = 'siswa_image';

            // // upload file
            // $cek->siswa_image = $file->move($tujuan_upload, uniqid() . $file->getClientOriginalName());
            $file_frontimage = $request->file('gambar');
            $actual_filename_frontimage = $file_frontimage->getClientOriginalName();
            $filename_frontimage = time() . '_' . $actual_filename_frontimage;
            $path = public_path() . '/gambar/' . $request->nama;
            if (!$path) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }

            $data->gambar = '/gambar/' . $request->nama . '/' . $filename_frontimage;
            $tujuan_upload = $path;
            $request->file('gambar')->move($tujuan_upload, $filename_frontimage);
        }

        // $data->gambar = 'gambar/' . $imageName;

        // menyimpan data file yang diupload ke variabel $file
        // $data = $request->file('file');

        // $nama_file = time()."_".$data->getClientOriginalName();

        //         // isi dengan nama folder tempat kemana file diupload
        // $tujuan_upload = 'data_file';
        // $data->move($tujuan_upload,$nama_file);

        // Pendaftar::create([
        // 	'file' => $nama_file,
        // 	'keterangan' => $request->keterangan,
        // ]);

        // return redirect()->back();

        $data->save();
        if ($data) {
            return redirect()->back()->with([
                'berhasil' => 'Berhasil menambah data'
            ]);
        } else {
            return redirect('pendaftar')->with([
                'gagal' => 'Data Error Found'
            ]);
        }
    }
}
