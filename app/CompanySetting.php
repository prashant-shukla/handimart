<?php

namespace App;
  
use Illuminate\Database\Eloquent\Model;
  
class CompanySetting extends Model
{
    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
    protected $fillable = [
        'company_name', 'contact_person','address','country','city','state','zip_code','email','career_email','ccode','phone','mobile','mobile_2','fax','website_link','website_name','google_plus','youtube','twitter','linkedin','facebook','instagram','logo','dark_logo','favicon','company_profile_logo'
    ];
}