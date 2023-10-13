<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warga extends Model
{
    use HasFactory, SoftDeletes, Uuid;

    protected $table = 'tb_wargas';
    protected $primaryKey = 'warga_id';
    public $incrementing = false;
    public  $timestamps = true;

    protected $casts = [
        'created_at' => 'datetime:d F Y, H:i:s',
        'updated_at' => 'datetime:d F Y, H:i:s',
        'deleted_at' => 'datetime:d F Y, H:i:s',
    ];
    public function rt()
    {
        return $this->belongsTo(RT::class, 'rt_id');
    }
    public function statusdalamkeluarga()
    {
        return $this->belongsTo(StatusDalamKeluarga::class, 'status_dalam_keluarga_id');
    }
    public function pendidikan()
    {
        return $this->belongsTo(Pendidikan::class, 'pendidikan_id');
    }
    public function agama()
    {
        return $this->belongsTo(Agama::class, 'id_agama', 'id_agama');
    }
    public function statuskawin()
    {
        return $this->belongsTo(StatusKawin::class, 'status_kawin_id');
    }
}
