<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Streaming extends Model
{
    use HasFactory;
    public $guarded = [];
    protected $keyType = 'string';

    public $incrementing = false;



    public static function booted()
    {
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }


    public function hakim_ketua(): BelongsTo
    {
        return $this->belongsTo(Hakim::class, 'hk');
    }
    public function hakim_anggota1(): BelongsTo
    {
        return $this->belongsTo(Hakim::class, 'ha1');
    }
    public function hakim_anggota2(): BelongsTo
    {
        return $this->belongsTo(Hakim::class, 'ha2');
    }
    public function panitera_pengganti(): BelongsTo
    {
        return $this->belongsTo(PaniteraPengganti::class, 'pp');
    }
}
