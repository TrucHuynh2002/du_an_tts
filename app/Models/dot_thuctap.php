<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dot_thuctap extends Model
{
    protected $table = 'dot_thuctap';
    protected $primaryKey = 'id_dot';
    public $timestamps = false;
    protected $fillable = [
    'ten_dot',
    'id_congty'
    ];
}
