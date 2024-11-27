<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chefs_social extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'chefs_id',
        'social_url',
    ];

    public function getChefs()
    {
        return $this->hasOne(Chefs::class, 'id','chefs_id');
    }
}
