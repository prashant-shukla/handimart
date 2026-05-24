<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class JobType extends Model
{
    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
    protected $fillable = [
        'id','name', 'description'
    ];
}