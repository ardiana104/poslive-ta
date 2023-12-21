<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Komentar extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'komentars';
    protected $fillable = [
        'nama', 'idpost', 'email', 'body'
    ];
}
