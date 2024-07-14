<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlasifikasiPerkara extends Model
{
    use HasFactory;
    public $table = 'klasifikasi_perkara';
    public $guarded = [];
}
