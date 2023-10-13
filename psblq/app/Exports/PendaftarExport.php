<?php

namespace App\Exports;

use App\Models\Pendaftar;
use Maatwebsite\Excel\Concerns\FromView;

use Illuminate\Contracts\View\View;

class PendaftarExport implements FromView
{
    public function view(): View
    {
        return view('excel.pendaftar', [
            'datas' => Pendaftar::with(['kecamatan', 'kabupaten', 'provinsi', 'kelurahan', 'range_penghasilan_ayah', 'range_penghasilan_ibu', 'range_penghasilan_wali', 'pendidikan_ayah', 'pendidikan_ibu', 'pendidikan_wali', 'pendidikan_terakhir_santri'])->get()
        ]);
    }
}
