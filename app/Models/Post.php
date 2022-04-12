<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Post extends Model
{
    use Sluggable, SearchableTrait;

    protected $guarded = [];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ], 'slug_en' => [
                'source' => 'title_en'
            ]
        ];
    }

    protected $searchable = [
        'columns'   => [
            'posts.title'       => 10,
            'posts.title_en'       => 10,
            'posts.description' => 10,
            'posts.description_en' => 10,
        ],
    ];

    public function title()
    {
        return config('app.locale') == 'ar' ? $this->title : $this->title_en;
    }
    public function url_slug()
    {
        return config('app.locale') == 'ar' ? $this->slug : $this->slug_en;
    }
    public function description()
    {
        return config('app.locale') == 'ar' ? $this->description : $this->description_en;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function scopePost($query)
    {
        return $query->where('post_type', 'post');
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'posts_tags');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function approved_comments()
    {
        return $this->hasMany(Comment::class)->whereStatus(1);
    }

    public function media()
    {
        return $this->hasMany(PostMedia::class);
    }

    public function status()
    {
        return $this->status == 1 ? __('BackEnd/general.active') : __('BackEnd/general.Inactive');
    }
}
