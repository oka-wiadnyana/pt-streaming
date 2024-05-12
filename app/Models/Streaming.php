<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Streaming extends Model
{
    use HasFactory;
    public $guarded=[];
    protected $keyType = 'string';

    public $incrementing = false;

   

    public static function booted() {
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

}
