<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Level;

class Zone extends Model
{
    use HasFactory;

    protected $table = 'zones';
    protected $fillable = ['name'];

}