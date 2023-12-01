<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;

    const INCOME = 1;
    const EXPENSES = 2;

    protected $guarded = ['id'];

    public function cash()
    {
        return $this->belongsTo(Cash::class);
    }

    public function command()
    {
        return $this->belongsTo(Command::class);
    }

}
