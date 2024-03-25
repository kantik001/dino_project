<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class DinoImage extends Model
{
    use HasFactory;

    public function getUrlAttribute()
    {
        return url('storage/' . $this->path);
    }


    public static function clearStorage() {
        $images = DinoImage::where('user_id', auth()->id())
            ->whereNull('dino_id')->get();

        foreach ($images as $image) {
            Storage::disk('public')->delete($image->path);
            $image->delete();
        }
    }
}
