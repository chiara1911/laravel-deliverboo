<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = ['name', 'surname', 'email', 'address', 'phone', 'total_price'];
    public function dishes()
    {
        return $this->belongsToMany(Dish::class);
    }
    use HasFactory;
}
