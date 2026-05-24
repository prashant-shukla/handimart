<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class ImageGallery extends Model
{
    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
    protected $fillable = [
        'user_id', 'images','description'
    ];
}