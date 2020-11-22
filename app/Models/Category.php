<?php

namespace App\Models;

use App\Models\Product;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Category extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('cover_image')
            ->registerMediaConversions(function (Media $media = null) {
                $this->addMediaConversion('thumb')
                    ->width('500')
                    ->height('500');
            });
    }

    public function getCoverImageAttribute()
    {
        $image = $this->getMedia('cover_image')->first();
        return [
            'original' => $image ? env('APP_URL') . $image->getUrl() : null,
            'thumb' => $image ? env('APP_URL') . $image->getUrl('thumb') : null
        ];
    }
}
