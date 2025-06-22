<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as ContractsTranslatable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Service extends Model implements ContractsTranslatable
{
    use Translatable;

    public $translatedAttributes = ['title'];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $appends = ['display_image'];

    public function portofolios()
    {
        return $this->hasMany(Portofolio::class);
    }

    public function getDisplayImageAttribute()
    {
        return asset('storage/' . $this->image);
    }
}