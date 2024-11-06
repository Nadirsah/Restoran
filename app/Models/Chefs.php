<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Chefs extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable = [
        'name',
        'position',
        'social',
        'picture',
        'file_path',
    ];
    public $translatable = ['position'];
}
