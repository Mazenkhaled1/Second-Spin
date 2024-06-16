<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charity extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
    ];

    public static function scopeSearch($query,$word){
        $query->where('name','like','%'.$word.'%');
    }
}
