<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Sluggable;

    protected $fillable = ['title'];

    public function sluggable(): array
    {   
        #Значение поля 'title' преобразуется в транслит и пишется в поле 'slug'
        return [ 'slug' => [ 'source' => 'title' ] ];
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
