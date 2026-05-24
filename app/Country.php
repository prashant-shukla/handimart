<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;


class Country extends Model
{
    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
    protected $fillable = [
        'id','name','short_name','country_code','created_at','updated_at'
    ];

  public function users()
  {
      return $this->hasOne(User::class, 'country_id', 'id');
  }
}