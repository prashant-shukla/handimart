<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class Job extends Model
{
    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
    protected $fillable = [
        'user_id', 'category_id', 'name','description','phone','ccode','website','email','address','country','city','state','zip_code','job_type','tags','url_email','company_name','tagline','video_url','twitter','logo','job_status','previewed','closing_date','budget'
    ];
}