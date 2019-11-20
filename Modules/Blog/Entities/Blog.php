<?php

namespace Modules\Blog\Entities;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use Sluggable;

    protected $fillable = [
    	'title',
    	'slug',
    	'description',
    	'image',
    	'status',
    	'author',
    	'meta_keywords',
    	'meta_description',
    	'tab_title'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
