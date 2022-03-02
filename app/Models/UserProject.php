<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProject extends Model
{
    use HasFactory;

    protected $table = 'user_projects';
    protected $fillable = ['name', 'email', 'level_id'];

    public function levels()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
}