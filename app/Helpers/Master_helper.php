<?php

use App\Models\Agama;
use App\Models\JenisBantuan;
use App\Models\Pendidikan;
use App\Models\RT;
use App\Models\Santri;
use App\Models\StatusDalamKeluarga;
use App\Models\StatusKawin;
use App\Models\User;

function AutoNis($jenis_kelamin)
{
    $lastorderId = Santri::orderBy('created_at', 'desc')->first();
    $nis = '';
    if (!$lastorderId) {
        $kode = '001';
    } else {
        $kode = substr($lastorderId->nis, -3);
        // dd($kode);
        $kode = str_pad($kode + 1, 3, 0, STR_PAD_LEFT);
    }
    // dd($kode);
    // Get last 3 digits of last order id
    if ($jenis_kelamin == 'L') {
        $nis = date('y') . '1' . $kode;
    } else if ($jenis_kelamin == 'P') {
        $nis = date('y') . '2' . $kode;
    }
    return $nis;
}
function addButton($id, $text, $modal, $title)
{
    $data = '<button onclick="btnAddData()" id="' . $id . '" class="btn btn-sm btn-primary" title="' . $title . '" data-toggle="modal" data-target="#' . $modal . '"><i class="fas fa-pencil-alt"></i> ' . $text . '</button>';
    return $data;
}
// function getData()
// {
//     $data = User::where(DB::raw('md5(id_siswa)'), session('uid_sup'))->first();
//     return $data;
// }

function getCountData($tabel)
{
    $data = DB::table($tabel)->get()->count();
    return $data;
}
function getToko()
{

    $data = DB::table('tb_stores')->where(DB::raw('md5(kd_user)'), session('uid_sup'))->first();
    return $data;
}
function getID()
{
    return session('uid_sup');
}
function kdJab()
{
    return session('kd_role');
}
function namaJab()
{
    return session('nama_role');
}

function rupiah($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}
function search($link, $q)
{
    $data = '<form action="' . $link . '?' . http_build_query(request()->query()) . '" method="get">
    <div class="input-group input-group-sm">
        <input type="text" name="q" class="form-control o-search-input" placeholder="Search" value="' . $q . '">
        <span class="input-group-append">';
    if ($q <> '') {
        $data = $data . '<a href="' . $link . '" class="btn btn-secondary btn-sm" title="Reset">Reset</button></a>';
    }
    $data = $data . '<button type="submit" class="btn btn-warning btn-sm" title="Search"><i class="mdi mdi-account-search"></i></button>
        </span>
        </div>
        </form>';
    return $data;
}
function bgCard()
{
    return 'success';
}
function removeRupiah($text)
{
    $text = substr($text, 4);
    $text = str_replace(".", "", $text);
    return $text;
}
function modalFooter()
{
    $data = '<div class="col-md-12 text-center">
                <button type="button" class="btn btn-action-modal btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" id="SaveData" class="btn btn-action-modal btn-sm btn-' . bgCard() . '">Simpan</button>
                </form>
            </div>';
    return $data;
}
function footer($total, $links)
{
    $data = '
        <div class="row">
            <div class="col-md-6">
                <small class="font-weight-bold">Total Record : ' . $total . '</small>
            </div>
            <div class="col-md-6">
                ' . $links . '
            </div>
        </div>';
    return $data;
}
function modalFooterDetail()
{
    $data = '<div class="col-md-12 text-center">
                <button type="button" class="btn btn-action-modal btn-sm btn-secondary" data-dismiss="modal">Kembali</button>
            </div>';
    return $data;
}
function kosong()
{
    return '<span class="badge badge-danger">Kosong</span>';
}
function getDateLink()
{
    return '?' . md5(date('dmYHis'));
}
function tanggal($tanggal)
{
    if ($tanggal == null) {
        return 'Belum di setting';
    }
    $date       = new DateTime($tanggal);
    $tanggal    = $date->format('Y-m-d');
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split = explode('-', $tanggal);
    return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
}
function hari_ini($hari)
{
    switch ($hari) {
        case 'Sun':
            $hari_ini = "Minggu";
            break;

        case 'Mon':
            $hari_ini = "Senin";
            break;

        case 'Tue':
            $hari_ini = "Selasa";
            break;

        case 'Wed':
            $hari_ini = "Rabu";
            break;

        case 'Thu':
            $hari_ini = "Kamis";
            break;

        case 'Fri':
            $hari_ini = "Jumat";
            break;

        case 'Sat':
            $hari_ini = "Sabtu";
            break;

        default:
            $hari_ini = "Tidak di ketahui";
            break;
    }
    return $hari_ini;
}
function bulan($bln)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    return $bulan[(int)$bln];
}
function tanggaljam($tanggal)
{
    if ($tanggal == null) {
        return 'Belum di setting';
    }
    $date       = new DateTime($tanggal);
    $hari    = hari_ini($date->format('D'));
    $tanggal    = $date->format('Y-m-d');
    $jam    = $date->format('H:i:s');
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split = explode('-', $tanggal);
    return $hari . ', ' . $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0] . ' ' . $jam . ' WIB';
}
function rt()
{
    return RT::get();
}
function statuskawin()
{
    return StatusKawin::get();
}
function statusdalamkeluarga()
{
    return StatusDalamKeluarga::get();
}
function jenisbantuan()
{
    return JenisBantuan::get();
}
function agama()
{
    return Agama::get();
}
function pendidikan()
{
    return Pendidikan::get();
}
