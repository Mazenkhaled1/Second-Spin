<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'description',
        'title',
        'location', 
        'location_details',
        'image',
        'story',
        'price',
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
    public function Cart()
    {
        return $this->hasMany(Cart::class);
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


