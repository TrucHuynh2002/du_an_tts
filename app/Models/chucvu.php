<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chucvu extends Model
{
    protected $table = 'chucvu';
    protected $primaryKey = 'id_chucvu';
    public $timestamps = false;
    protected $fillable = [
        'ten_chucvu'
    ];
}
