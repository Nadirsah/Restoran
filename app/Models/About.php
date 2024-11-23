<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class About extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'experience',
        'text',
        'file_path',
    ];

    public $translatable = ['text'];

    public function pictures(): HasMany
    {
        return $this->hasMany(AboutPicture::class, 'about_id', 'id');
    }
}
