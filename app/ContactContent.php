<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class ContactContent extends Model
{
    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
    protected $fillable = [
        'heading_line', 'contact_heading', 'address_heading', 'work_with_us_heading', 'form_heading', 'created_at', 'updated_at'
    ];
}