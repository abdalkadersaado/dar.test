<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Mindscms\Entrust\Traits\EntrustUserWithPermissionsTrait;
use Nicolaslopezj\Searchable\SearchableTrait;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, EntrustUserWithPermissionsTrait, SearchableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function receivesBroadcastNotificationsOn()
    {
        return 'App.User.' . $this->id;
    }

    protected $searchable = [
        'columns'   => [
            'users.name'        => 10,
            'users.username'    => 10,
            'users.email'       => 10,
            'users.mobile'      => 10,
            'users.bio'         => 10,
        ],
    ];

    public function profile()
    {

        return $this->hasOne(Profile::class)->withDefault();
    }

    public function partners()
    {
        return $this->hasMany(Partner::class);
    }

    public function report()
    {
        return $this->hasMany(FinancialReport::class, 'user_id', 'id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function report_comments()
    {
        return $this->hasMany(ReportComment::class, 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function status()
    {
        return $this->status == '1' ? __('BackEnd/user.active') : __('BackEnd/user.inactive');
    }

    public function userImage()
    {
        return $this->user_image != '' ? asset('assets/users/' . $this->user_image) : asset('assets/users/default.png');
    }
}
