<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class State extends Model
{
    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
    protected $fillable = [
        'id','country_id','name','short_name','created_at','updated_at'
    ];
}