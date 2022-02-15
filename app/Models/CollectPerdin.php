<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectPerdin extends Model
{
    use HasFactory;

    protected $table = 'collect_perdins';
    protected $guarded = ['id'];

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function userProject()
    {
        return $this->belongsTo(UserProject::class);
    }
}