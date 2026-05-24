<?php

namespace App;


use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;


class CraftmanCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
    protected $fillable = [
        'id','parent_id','name','slug','description','created_at','updated_at','user_id'
    ];

    /**
     * Get the user that owns the CraftmanCategory
     */
    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function getNameAttribute($value)
    {
        return  Str::ucfirst($value);
    }
    public function city() {
        return $this->belongsTo(City::class);
      }
}