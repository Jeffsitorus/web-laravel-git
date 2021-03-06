<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = ['slug', 'judul', 'deskripsi', 'category_id', 'thumbnail'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getTakeImageAttribute()
    {
        return "/storage/" . $this->thumbnail;
    }
}
