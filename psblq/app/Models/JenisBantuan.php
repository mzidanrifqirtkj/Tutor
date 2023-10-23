<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisBantuan extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'tb_jenis_bantuan';
    protected $primaryKey = 'jenis_bantuan_id';
    public $incrementing = false;
    public  $timestamps = true;

    protected $casts = [
        'created_at' => 'datetime:d F Y, H:i:s',
        'updated_at' => 'datetime:d F Y, H:i:s',
        'deleted_at' => 'datetime:d F Y, H:i:s',
    ];
}
