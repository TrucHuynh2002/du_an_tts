<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class congviec extends Model
{
    protected $table = 'congviec';
    protected $primaryKey = 'id_congviec';
    public $timestamps = false;
    protected $fillable = [
    'ten_congviec',
    'id_nhom'
    ];
}
