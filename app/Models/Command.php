<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    use HasFactory;

    const ACTIVE = 1;
    const PAID = 2;

    protected $guarded = ['id'];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function products()
    {
        return $this->belongsToMany(Product::class, 'command_product')->withPivot('quantity');
    }

    public function movement()
    {
        return $this->hasOne(Movement::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    protected $appends = [
        'total_cost'
    ];

    // Atributo personalizado para el costo total de la comanda
    public function getTotalCostAttribute()
    {
        $totalCost = 0;

        // Iterar sobre cada orden de la comanda
        foreach ($this->orders as $order) {
            // Sumar el costo de cada producto en la orden
            $totalCost += $order->product->cost;
        }

        return $totalCost;
    }

}
