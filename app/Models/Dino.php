<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dino extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasFilter;

   // protected $appends = ['half_discount']; (включить, если не сработает getAttribute)

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function getHalfDiscountAttribute()
    {
        return $this->discount/2;
    }

    public function getFormatPriceAttribute()
    {
        return number_format($this->price, 2);
    }

    public function getFormatDiscountAttribute()
    {
        return number_format($this->discount, 2);
    }

    public function images() {
        return $this->hasMany(DinoImage::class);
    }



}
