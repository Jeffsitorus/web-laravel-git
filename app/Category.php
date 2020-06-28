<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

date_default_timezone_set('Asia/Jakarta');
class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
