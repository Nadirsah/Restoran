<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPicture extends Model
{
    use HasFactory;

    protected $fillable = ['about_id', 'picture', 'file_path'];

    public function about()
    {
        return $this->belongsTo(About::class);
    }
}
