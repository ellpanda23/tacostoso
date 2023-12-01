<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    const INGRESS = 1;
    const EGRESS = 2;

    use HasFactory;
}
