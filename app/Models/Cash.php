<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    use HasFactory;

    const ACTIVE = 1;
    const CLOSED = 2;

    protected $guarded = ['id'];

    public function movements()
    {
        return $this->hasMany(Movement::class);
    }

    // RELACION UNO A UNO
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $appends = [
        'actual_amount',
        'total_ingress',
        'total_egress',
    ];

    // Atributo personalizado para el costo total de la comanda
    public function getActualAmountAttribute()
    {
        $sum = 0;

        // Iterar sobre cada orden de la comanda
        foreach ($this->movements as $movement) {
            // Sumar el costo de cada producto en la orden
            $movement->type == 1 ? $sum += $movement->amount : $sum -= $movement->amount;
        }

        return $sum;
    }

    // Atributo personalizado para el costo total de la comanda
    public function getTotalIngressAttribute()
    {
        $sum = 0;

        // Iterar sobre cada orden de la comanda
        foreach ($this->movements as $movement) {
            // Sumar el costo de cada producto en la orden
            if($movement->type == 1)
                $sum += $movement->amount;
        }

        return $sum;
    }

    // Atributo personalizado para el costo total de la comanda
    public function getTotalEgressAttribute()
    {
        $sum = 0;

        // Iterar sobre cada orden de la comanda
        foreach ($this->movements as $movement) {
            // Sumar el costo de cada producto en la orden
            if($movement->type != 1)
                $sum += $movement->amount;
        }

        return $sum;
    }

}
