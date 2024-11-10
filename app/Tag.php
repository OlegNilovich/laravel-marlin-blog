<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use Sluggable;
    use SoftDeletes;

    protected $fillable = ['title'];

    public function sluggable(): array
    {   
        #Значение поля 'title' преобразуется в транслит и пишется в поле 'slug'
        return [ 'slug' => [ 'source' => 'title' ] ];
    }
    
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tags', 'tag_id', 'post_id');
    }
}
