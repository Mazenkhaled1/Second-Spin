<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'title',
        'description',
        'location', 
        'location_details',
        'image',
        'story',
        'price',
        'status',
        'category_id',
        'user_id'
    ] ; 
  
    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public static function scopeSearch($query,$word){
        $query->where('title','like','%'.$word.'%')
              ->orWhere('description','like','%'.$word.'%');

    }


    public function scopeStatus($query)
    {
         $query->where('status','accepting') ;
    }
}


