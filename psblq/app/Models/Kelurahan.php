<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;
    protected $table = 'villages';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public  $timestamps = true;

    
}
