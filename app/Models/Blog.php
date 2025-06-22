<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $appends = ['display_image'];

    public function images()
    {
        return $this->hasMany(BlogImage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getDisplayImageAttribute()
    {
        return asset('storage/' . $this->cover);
    }
}
