<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category_store extends Model
{
    protected $fillable = ['name_store'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
