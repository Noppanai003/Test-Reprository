<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $fillable =
    [
        'title',
        'fname',
        'lname',
        'description',
        'content',
        'city_name',
        'amphur',
        'district',
        'postcode',
        'tel',
        'category_store_id',
        'category_id',
        'image',
        'image1'

    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function category_store()
    {
        return $this->belongsTo(category_store::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function hasTag($tagId)
    {
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }

    public function deleteImage()
    {
        Storage::delete($this->image);
    }
}
