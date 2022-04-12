<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;


    protected $fillable = ['name_en', 'name_ar', 'description_en', 'description_ar', 'image'];

    protected $hidden = ['updated_at', 'image'];

    protected $appends = ['img'];

    ##### Accessories
    public function getCreatedAtAttribute($value)
    {
        $carbonDate = new Carbon($value);
        return $carbonDate->diffForHumans();
    }

    public function getImgAttribute()
    {
        return asset('') . $this->image;
    }
    #############

    public function name()
    {
        return config('app.locale') == 'ar' ? $this->name : $this->name_en;
    }
    public function brief()
    {
        return config('app.locale') == 'ar' ? $this->brief : $this->brief_en;
    }
    public function description()
    {
        return config('app.locale') == 'ar' ? $this->description : $this->description_en;
    }
}
