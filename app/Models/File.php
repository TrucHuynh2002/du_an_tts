<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'file';
    public $timestamps = true;
    protected $fillable = [
    'id_nhom',
    'ten_file'
    ];
}
