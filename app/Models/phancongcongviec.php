<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phancongcongviec extends Model
{
    protected $table = 'phancong_congviec';
    protected $primaryKey = 'id_pccv';
    public $timestamps = false;
    protected $fillable = [
    'id_sv',
    'id_congviec',
    'tien_do',
    'trang_thai',
    'ghi_chu'
    ];
}
