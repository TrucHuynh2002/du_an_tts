<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitiet_nhom extends Model
{
    use HasFactory;
    protected $table = "chitiet_nhom";
    protected $fillable = [
        'id_nhom',
        'id_sv'
    ];
    protected $primary_key = "id_ctn";
}
