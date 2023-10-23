<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BkPelanggaran extends Model
{
    use HasFactory;

    protected $table = 'bk_pelanggarans';

    protected $fillable = ['keterangan'];
    protected $with = ['BkJenisPelanggaran', 'keteranganProses'];

    public function keu_siswa () {
        return $this->belongsTo(Siswa::class,'id_siswa');
    }
    public function keu_kelas () {
        return $this->belongsTo(Kelas::class,'id_kelas');
    }
    public function keu_ruang () {
        return $this->belongsTo(Ruang::class,'id_ruang');
    }
    public function keu_program () {
        return $this->belongsTo(Program::class,'id_program');
    }

    public function keu_jenjang () {
        return $this->belongsTo(Jenjang::class,'id_jenjang');
    }

    

    public function user()
    {
        return $this->belongsTo(User::class, 'id_bk', 'id');
    }

    public function keteranganProses()
    {
        return $this->belongsTo(BkStatusProcesHukum::class, 'keterangan', 'id');
    }

    public function BkJenisPelanggaran()
    {
        return $this->belongsTo(BkJenisPelanggaran::class, 'id_pelanggaran', 'id');
    }
}
