<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function commands()
    {
        return $this->hasMany(Command::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }

}
