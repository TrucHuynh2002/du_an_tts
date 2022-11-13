<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class congviec extends Model
{
    protected $table = 'congviec';
    protected $primaryKey = 'id_congviec';
    public $timestamps = false;
    // public $dateFormat = 'dd/mm/yyyy H:i:s';
    protected $fillable = [
    'ten_congviec',
    'id_nhom',
    'tien_do',
    'ngay_batdau',
    'ngay_ketthuc',
    'updated_at',
    'created_at'
    ];
}
