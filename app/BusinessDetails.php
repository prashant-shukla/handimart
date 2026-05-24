<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class BusinessDetails extends Model
{
    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
    protected $fillable = [
        'user_id', 'company_name', 'phone', 'ccode', 'website', 'email', 'work_in', 'work_type', 'job_done', 'team_size', 'per_day_fee','skills','category','experience','establisment_year','number_employee','gts_number','gst_document','about_company','logo','export_certificate_no','export_certificate_document','ownership_type','pan_number','pan_document','tan_number','tan_document'
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}