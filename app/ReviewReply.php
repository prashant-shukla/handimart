<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class ReviewReply extends Model
{
    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
    protected $fillable = [
        'review_id', 'sender_id', 'reply', 'create_at', 'updated_at'
    ];
}