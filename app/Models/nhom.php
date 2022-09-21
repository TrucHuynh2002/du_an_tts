<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nhom extends Model
{
    protected $table = 'nhom';
    protected $primaryKey = 'id_nhom';
    public $timestamps = false;
    protected $fillable = [
    'ten_nhom',
    'id_dot',
    'de_tai',
    'id_nhomtruong'
    ];
}
