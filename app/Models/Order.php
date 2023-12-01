<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const PENDIENTE = 1;
    const TERMINADO = 2;

    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function command()
    {
        return $this->belongsTo(Command::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

}
