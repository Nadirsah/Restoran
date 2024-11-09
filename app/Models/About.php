<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class About extends Model
{
    use HasFactory,HasTranslations;

    protected $fillable = [
        'experience',
        'text',
        'picture',
        'file_path',
    ];

    public $translatable = ['text'];

    public function pictures()
    {
        return $this->hasMany(AboutPicture::class);
    }
}
