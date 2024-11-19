<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Navbar extends Model
{
    use HasFactory,HasTranslations;
    protected $fillable = [
        'title',
        'text',
        'background_filename',
        'background_file_path',
        'picture',
        'image_file_path',
    ];

    public $translatable = ['title','text'];
}
