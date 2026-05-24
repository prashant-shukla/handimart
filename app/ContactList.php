<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class ContactList extends Model
{
    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
    protected $fillable = [
        'sender_id', 'receiver_id', 'sender_name', 'email', 'phone', 'attachments', 'message_heading', 'message', 'created_at', 'updated_at'
    ];
}