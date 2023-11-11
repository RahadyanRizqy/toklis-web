<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectricToken extends Model
{
    use HasFactory;

    protected $table = 'electric_tokens';

    protected $guarded = [
        'id'
    ];
}
