<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $table = 'levels';
    protected $fillable = [
        'name_level',
        'meals_allowance',
        'hardship',
        'rental_house_allowance',
        'pulsa_allowance',
        'hardship_allowance',
        'zone_id',
    ];
}