<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Services extends Model
{
    use HasFactory,HasTranslations;

    protected $fillable = [
        'header',
        'text',
        'picture',
        'file_path',
    ];

    public $translatable = ['header', 'text'];
}
