<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Santri extends Model
{
    use HasFactory, SoftDeletes, Uuid;
    protected $table = 'tb_santri';
    protected $primaryKey = 'id_santri';
    public $incrementing = false;
    public  $timestamps = true;

    // public function scopeStatus($query, $status)
    // {
    //     return $query->where('status_santri', $status);
    // }

    public function scopeStatus($query, $status)
    {
        return $query->where('status_santri', $status);
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'kd_provinsi');
    }


    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'kd_kabupaten');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kd_kecamatan');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'kd_kelurahan');
    }
    public function range_penghasilan_ayah()
    {
        return $this->belongsTo(RangePenghasilan::class, 'penghasilan_ayah');
    }
    public function range_penghasilan_ibu()
    {
        return $this->belongsTo(RangePenghasilan::class, 'penghasilan_ibu');
    }
    public function range_penghasilan_wali()
    {
        return $this->belongsTo(RangePenghasilan::class, 'penghasilan_wali');
    }
    public function pendidikan_ayah()
    {
        return $this->belongsTo(Pendidikan::class, 'pendidikan_terakhir_ayah');
    }
    public function pendidikan_ibu()
    {
        return $this->belongsTo(Pendidikan::class, 'pendidikan_terakhir_ibu');
    }
    public function pendidikan_wali()
    {
        return $this->belongsTo(Pendidikan::class, 'pendidikan_terakhir_wali');
    }
    public function pendidikan_terakhir_santri()
    {
        return $this->belongsTo(Pendidikan::class, 'pendidikan_terakhir');
    }
}
