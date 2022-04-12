<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Category extends Model
{

    use Sluggable, SearchableTrait;

    protected $guarded = [];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ], 'slug_en' => [
                'source' => 'name_en'
            ]
        ];
    }

    protected $searchable = [
        'columns'   => [
            'categories.name'       => 10,
            'categories.name_en'       => 10,
        ],
    ];

    public function name()
    {
        return config('app.locale') == 'ar' ? $this->name : $this->name_en;
    }

    public function description()
    {
        return config('app.locale') == 'ar' ? $this->description : $this->description_en;
    }

    public function url_slug()
    {
        return config('app.locale') == 'ar' ? $this->slug : $this->slug_en;
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function status()
    {
        return $this->status == 1 ? 'Active' : 'Inactive';
    }

    public function users()
    {

        return $this->hasMany(User::class);
    }
}
