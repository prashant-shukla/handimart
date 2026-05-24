<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class ManufacturerCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
    protected $fillable = [
        'id','parent_id','name','slug','description','created_at','updated_at'
    ];
}