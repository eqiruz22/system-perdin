<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    protected $table = 'zones';
    protected $guarded = ['id'];

    public function level()
    {
        return $this->hasMany(Level::class, 'zone_id');
    }
}