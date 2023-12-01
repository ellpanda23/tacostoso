<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const AVAILABLE = 1;
    const UNAVAILABLE = 2;
    const UNCOUNTABLE = true;
    const COUNTABLE = false;

    use HasFactory;

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function storage()
    {
        return $this->hasOne(Storage::class);
    }

    // RELACION UNO A MUCHOS INVERSA
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function commands()
    {
        return $this->belongsToMany(Command::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }

}
