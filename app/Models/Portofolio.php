<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as ContractsTranslatable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model {
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $appends = ['display_image'];

    public function service() {
        return $this->belongsTo(Service::class);
    }

    public function getDisplayImageAttribute() {
        return asset('storage/' . $this->image);
    }
}

