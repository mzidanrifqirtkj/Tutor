<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Pendaftar;
use App\Models\Pendidikan;
use App\Models\Provinsi;
use App\Models\RangePenghasilan;
use App\Models\Santri;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Charts\SantriChart;
use App\Http\Controllers\PendaftarController;

use Illuminate\Support\Facades\Config;

class DashboardController extends Controller
{
    //
    public function index(Request $request, SantriChart $SantriChart)
    {
        $limit = request('limit') ? request('limit') : 10;
        $jenis_kelamin = $request->jenis_kelamin ? $request->jenis_kelamin : '';
        $status_sowan = $request->status_sowan ? $request->status_sowan : '';
        $q = $request->q ? $request->q : '';
        $pendaftar = Pendaftar::with(['kecamatan', 'kabupaten', 'provinsi', 'kelurahan'])->when($jenis_kelamin, function ($query) use ($jenis_kelamin,) {
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
        $jumlahsantriaktif = Santri::status('aktif')->get()->count();
        $jumlahsantritidakaktif = santri::status('non_aktif')->get()->count();
        $data = [
            'title' => 'Dashboard  ' . Config::get("app.name"),
            'jumlahsantriaktif' => $jumlahsantriaktif,
            'jumlahsantritidakaktif' => $jumlahsantritidakaktif,
            'jumlahsemua' => $jumlahsemua,
            'jumlahlaki' => $jumlahlaki,
            'status_sowan' => $status_sowan,
            'jumlahperempuan' => $jumlahperempuan,
            'jenis_kelamin' => $jenis_kelamin,
            'jumlahsowan' => $jumlahsowan,
            'SantriChart' => $SantriChart->build(),
            'q' => $q,
        ];
        return view('dashboard.dashboard', $data);
    }

    public function qonun(Request $request)
    {
        $tidakmengikuti = $request->tidakmengikuti ? 'on' : '';
        $sanggupperaturan = $request->sanggupperaturan ? 'on' : '';
        $mengikuti6thn = $request->mengikuti6thn ? 'on' : '';
        if ($tidakmengikuti == 'on' && $sanggupperaturan == 'on' && $mengikuti6thn == 'on') {
            $user = User::findOrFail(Auth::user()->id);
            $user->verif_qonun = 'yes';
            $user->save();
            return redirect('dashboard/formulir')->with('success', 'Silahkan Melanjutkan Mengisi');
        }
        $data = [
            'title' => 'Qonun  ' . Config::get("app.name"),
        ];
        return view('dashboard.qonun', $data);
    }
    public function getKabupaten(Request $request)
    {
        $Data =  Kabupaten::where('province_id', $request->id)
            ->get();

        if ($Data) {
            return response()->json([
                'status' => true,
                'data' => $Data,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Not Found',
            ], 400);
        }
    }
    public function getKecamatan(Request $request)
    {
        $Data =  Kecamatan::where('regency_id', $request->id)
            ->get();

        if ($Data) {
            return response()->json([
                'status' => true,
                'data' => $Data,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Not Found',
            ], 400);
        }
    }
    public function getKelurahan(Request $request)
    {
        $Data =  Kelurahan::where('district_id', $request->id)
            ->get();

        if ($Data) {
            return response()->json([
                'status' => true,
                'data' => $Data,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Not Found',
            ], 400);
        }
    }

    public function download(Request $request)
    {
        $data = [
            'title' => 'Download  ' . Config::get("app.name"),
        ];
        return view('dashboard.download', $data);
    }
    public function formulir(Request $request)
    {
        $pendaftar = Pendaftar::where('user_id', Auth::user()->id)->first();
        $pendidikan = Pendidikan::get();
        $penghasilan = RangePenghasilan::get();

        $provinsi = Provinsi::get();
        $kabupaten = Kabupaten::where('province_id', $pendaftar->kd_provinsi)->get();
        $kecamatan = Kecamatan::where('regency_id', $pendaftar->kd_kabupaten)->get();
        $kelurahan = Kelurahan::find($pendaftar->kd_kelurahan);
        $data = [
            'title' => 'Formulir  ' . Config::get("app.name"),
            'pendaftar' => $pendaftar,
            'provinsi' => $provinsi,
            'pendidikan' => $pendidikan,
            'penghasilan' => $penghasilan,
            'kabupaten' => $kabupaten,
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
        ];
        return view('dashboard.formulir', $data);
    }
    public function formulir_kedua(Request $request)
    {
        $pendaftar = Pendaftar::where('user_id', Auth::user()->id)->first();

        $provinsi = Provinsi::get();
        $pendidikan = Pendidikan::get();
        $penghasilan = RangePenghasilan::get();
        $data = [
            'title' => 'Formulir  ' . Config::get("app.name"),
            'pendaftar' => $pendaftar,
            'provinsi' => $provinsi,
            'pendidikan' => $pendidikan,
            'penghasilan' => $penghasilan,
        ];
        return view('dashboard.formulir_kedua', $data);
    }

    public function downloadberkas(Request $request)
    {

        $pendaftar = Pendaftar::with(['kecamatan', 'kabupaten', 'provinsi', 'kelurahan', 'range_penghasilan_ayah', 'range_penghasilan_ibu', 'range_penghasilan_wali', 'pendidikan_terakhir_santri', 'pendidikan_ayah', 'pendidikan_ibu', 'pendidikan_wali'])->where('user_id', Auth::user()->id)->first();
        $type = request('type');
        if (!$type) {
            return redirect('dashboard/download')->with('error', 'Pastikan Memilih Type');
        }
        if ($pendaftar->jenis_kelamin == 'L') {
            $jenis_kelamin = 'Laki-Laki';
        } else if ($pendaftar->jenis_kelamin == 'P') {
            $jenis_kelamin = 'Perempuan';
        } else {
            $jenis_kelamin = '';
        }
        $nama_provinsi = "";
        $nama_kabupaten = "";
        $nama_kecamatan = "";
        $nama_kelurahan = "";
        $pendidikan_terakhir = "";
        if ($pendaftar->provinsi) {
            $nama_provinsi = $pendaftar->provinsi->name ? $pendaftar->provinsi->name : '';
        }
        if ($pendaftar->pendidikan_terakhir_santri) {
            $pendidikan_terakhir = $pendaftar->pendidikan_terakhir_santri->pendidikan ? $pendaftar->pendidikan_terakhir_santri->pendidikan : '';
        }
        if ($pendaftar->kecamatan) {
            $nama_kecamatan = $pendaftar->kecamatan->name ? $pendaftar->kecamatan->name : '';
        }
        if ($pendaftar->kabupaten) {
            $nama_kabupaten = $pendaftar->kabupaten->name ? $pendaftar->kabupaten->name : '';
        }
        if ($pendaftar->kelurahan) {
            $nama_kelurahan = $pendaftar->kelurahan->name ? $pendaftar->kelurahan->name : '';
        }
        $nama_wali =  $pendaftar->nama_wali;
        $alamat_wali = $pendaftar->alamat_wali;
        $no_telp_wali =  $pendaftar->no_telp_wali;
        $pekerjaan_wali =  $pendaftar->pekerjaan_wali;
        if ($type == 'pernyataan') {
            $pernyataan = new \PhpOffice\PhpWord\TemplateProcessor(public_path('word/2.SURAT_PERNYATAAN.docx'));
            $pernyataan->setValue('pendaftar', $pendaftar);
            $pernyataan->setValue('nama', $pendaftar->nama);
            $pernyataan->setValue('nis', $pendaftar->nis);
            $pernyataan->setValue('nama_wali', $nama_wali);
            $pernyataan->setValue('alamat', $pendaftar->alamat);
            $pernyataan->setValue('no_telp', $pendaftar->no_telp);
            $pernyataan->setValue('pekerjaan_wali', $pendaftar->pekerjaan_wali);
            try {
                $pernyataan->saveAs(public_path('word/SURAT_PERNYATAAN-' . Auth::user()->email . '.docx'));
            } catch (Exception $e) {
                return $e;
            }
            return response()->download(public_path('word/SURAT_PERNYATAAN-' . Auth::user()->email . '.docx'));
        } else if ($type == 'kesanggupan') {
            $kesanggupan = new \PhpOffice\PhpWord\TemplateProcessor(public_path('word/3.SURAT_PERNYATAAN_KESANGGUPAN.docx'));
            $kesanggupan->setValue('pendaftar', $pendaftar);
            $kesanggupan->setValue('nama', $pendaftar->nama);
            $kesanggupan->setValue('tempat_lahir', $pendaftar->tempat_lahir);
            $kesanggupan->setValue('tanggal_lahir', $pendaftar->tanggal_lahir);
            $kesanggupan->setValue('nama_wali', $nama_wali);
            $kesanggupan->setValue('no_telp_wali', $no_telp_wali);
            $kesanggupan->setValue('alamat', $pendaftar->alamat);
            $kesanggupan->setValue('alamat_wali', $pendaftar->alamat_wali);
            $kesanggupan->setValue('no_telp_ayah', $pendaftar->no_telp_ayah);
            $kesanggupan->setValue('no_telp', $pendaftar->no_telp);
            $kesanggupan->setValue('nis', $pendaftar->nis);
            $kesanggupan->setValue('pekerjaan_wali', $pendaftar->pekerjaan_wali);
            try {
                $kesanggupan->saveAs(public_path('word/SURAT_PERNYATAAN_KESANGGUPAN-' . Auth::user()->email . '.docx'));
            } catch (Exception $e) {
                return $e;
            }
            return response()->download(public_path('word/SURAT_PERNYATAAN_KESANGGUPAN-' . Auth::user()->email . '.docx'));
        } else if ($type == 'mukim') {
            $mukim = new \PhpOffice\PhpWord\TemplateProcessor(public_path('word/1FORM_MUKIM.docx'));
            $mukim->setImageValue('foto', array('path' => public_path($pendaftar->gambar), 'width' => 120, 'height' => 160));
            $mukim->setValue('nama', $pendaftar->nama);
            $mukim->setValue('pendaftar', $pendaftar);
            $mukim->setValue('nama_wali', $nama_wali);
            $mukim->setValue('nis', $pendaftar->nis);
            $mukim->setValue('organisasi', $pendaftar->organisasi);
            $mukim->setValue('pendidikan_terakhir', $pendidikan_terakhir);
            $mukim->setValue('tempat_lahir', $pendaftar->tempat_lahir);
            $mukim->setValue('tanggal_lahir', $pendaftar->tanggal_lahir);
            $mukim->setValue('nama_rt', $pendaftar->rt);
            $mukim->setValue('nama_rw', $pendaftar->rw);
            $mukim->setValue('kode_pos', $pendaftar->kode_pos);
            $mukim->setValue('nama_ayah', $pendaftar->nama_ayah);
            $mukim->setValue('nama_ibu', $pendaftar->nama_ibu);
            $mukim->setValue('pekerjaan_wali', $pekerjaan_wali);
            $mukim->setValue('jenis_kelamin', $jenis_kelamin);
            $mukim->setValue('nama_provinsi', $nama_provinsi);
            $mukim->setValue('nama_kecamatan', $nama_kecamatan);
            $mukim->setValue('nama_kabupaten', $nama_kabupaten);
            $mukim->setValue('nama_kelurahan', $nama_kelurahan);
            $mukim->setValue('alamat_wali', $alamat_wali);
            $mukim->setValue('alamat', $pendaftar->alamat);
            $mukim->setValue('aktivitas_di_luar', $pendaftar->aktivitas_di_luar);
            $mukim->setValue('no_telp', $pendaftar->no_telp);
            $mukim->setValue('no_telp_wali', $no_telp_wali);
            $mukim->setValue('pekerjaan_wali', $pendaftar->pekerjaan_wali);
            try {
                $mukim->saveAs(public_path('word/1FORM_MUKIM-' . Auth::user()->email . '.docx'));
            } catch (Exception $e) {
                return $e;
            }
            return response()->download(public_path('word/1FORM_MUKIM-' . Auth::user()->email . '.docx'));
        }
    }
}
