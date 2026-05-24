<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;


class City extends Model
{


    protected $table = 'cities';
    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
    protected $fillable = [
        'id','country_id','state_id','name','zip_code','background_image','created_at','updated_at'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}