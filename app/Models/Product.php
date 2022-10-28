<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const   DRAFT = 0,
            PUBLISHED = 1;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function subcategory() {
        return $this->belongsTo(Subcategory::class);
    }

    public function colors() {
        return $this->belongsToMany(Color::class);
    }

    public function sizes() {
        return $this->hasMany(Size::class);
    }

    public function images() {
        return $this->morphMany(Image::class, 'imageable');
    }
}
