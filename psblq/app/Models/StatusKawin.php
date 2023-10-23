<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusKawin extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'tb_status_kawin';
    protected $primaryKey = 'status_kawin_id';
    public $incrementing = true;
    public  $timestamps = true;

    protected $casts = [
        'created_at' => 'datetime:d F Y, H:i:s',
        'updated_at' => 'datetime:d F Y, H:i:s',
        'deleted_at' => 'datetime:d F Y, H:i:s',
    ];
}
