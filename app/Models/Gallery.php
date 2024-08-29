<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'gallery';
    // protected $guarded = 'id';
    protected $fillable = [
        'judul',
        'description',
        'foto', // Tambahkan atribut 'foto' di sini
    ];
    protected $casts = [
        'foto' => 'json'
    ];
}
