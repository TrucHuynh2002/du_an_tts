<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'file';
    public $timestamps = false;
    protected $fillable = [
    'ten_file'
    ];
}
