<?php

namespace App\Exports;

use App\Models\Santri;
use Maatwebsite\Excel\Concerns\FromView;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class SantriExport implements FromView
{
    public function view(): View
    {
        return view('excel.santri', [
            'datas' => Santri::with(['kecamatan', 'kabupaten', 'provinsi', 'kelurahan', 'range_penghasilan_ayah', 'range_penghasilan_ibu', 'range_penghasilan_wali', 'pendidikan_ayah', 'pendidikan_ibu', 'pendidikan_wali', 'pendidikan_terakhir_santri'])->get()
        ]);
    }
}
