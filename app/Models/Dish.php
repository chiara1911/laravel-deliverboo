<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Dish extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable=[ 'name', 'price', 'visible', 'description', 'ingredients', 'restaurant_id', 'image'];
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
   
}