<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class EnquiryRoom extends Model
{
    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
    protected $fillable = [
        'user_id', 'room_user_id', 'created_at', 'updated_at'
    ];
}