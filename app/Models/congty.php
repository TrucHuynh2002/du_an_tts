<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class congty extends Model
{
    protected $table = 'congty';
    protected $primaryKey = 'id_congty';
    public $timestamps = false;
    protected $fillable = [
    'ten_congty',
    'dia_chi',
    'ma_sothue',
    'sdt',
    'nguoi_daidien'
    ];

}
