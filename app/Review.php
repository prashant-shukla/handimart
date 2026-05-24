<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class Review extends Model
{
    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
    protected $fillable = [
        'job_id', 'sender_id','receiver_id','sender_name','receiver_name','title','description','ratings','image','created_at','updated_at'
    ];
}