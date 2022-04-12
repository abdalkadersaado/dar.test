<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function name()
    {
        return config('app.locale') == 'ar' ? $this->name : $this->name_en;
    }
}
