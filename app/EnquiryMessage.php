<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class EnquiryMessage extends Model
{
    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
    protected $fillable = [
        'contact_id', 'sender_id', 'receiver_id', 'read_status', 'message', 'file', 'created_at', 'updated_at'
    ];
}