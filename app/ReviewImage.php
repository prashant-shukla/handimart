<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class ReviewImage extends Model
{
    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
    protected $fillable = [
        'review_id', 'image', 'create_at', 'updated_at'
    ];
}