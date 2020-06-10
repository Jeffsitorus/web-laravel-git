<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = ['slug','judul','deskripsi'];
}
