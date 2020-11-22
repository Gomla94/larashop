<?php

namespace App\Models;

use App\Models\Category;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Product extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = ['name', 'price', 'quantity', 'description', 'category_id'];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('product_cover_image')
            ->registerMediaConversions(function (Media $media = null) {
                $this->addMediaConversion('thumb')
                    ->width('500')
                    ->height('500');
            });
    }

    public function getCoverImageAttribute()
    {
        $image = $this->getMedia('product_cover_image')->first();
        return [
            'original' => $image ? asset(env('APP.URL') . $image->getUrl()) : null,
            // 'thumb' => $image ? asset($image->getUrl()) : null,
            'thumb' => $image ? env('APP_URL') . $image->getUrl() : null
        ];
    }
}
