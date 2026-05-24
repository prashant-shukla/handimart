<?php

namespace App;

use App\Country;
use App\City;
use App\State;
use App\CraftmanSkill;
use App\CraftmanCategory;
use App\BusinessDetails;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasRoles;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','first_name','last_name','role_id','public_name','website','facebook','twitter','instagram','pinterest','phone','biographical_info','image','user_id','new_added','phone_verified','otp','dob','gender','aadhar1','aadhar2','aadhar3','country','state','city','country_id','state_id','city_id','zip_code','address','ccode','is_approved','membership','user_page_count'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFirstNameAttribute($value)
    {
        return  Str::studly($value);
    }
    public function getLastNameAttribute($value)
    {
        return  Str::studly($value);
    }

    public function getUserNameAttribute($value)
    {
        return  Str::ucfirst($value);
    }

    public function getPublicNameAttribute($value)
    {
        return  Str::ucfirst($value);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    
    public function city(): BelongsTo {
        return $this->belongsTo(City::class, 'city_id');
    }
    
    public function state(): BelongsTo {
        return $this->belongsTo(State::class, 'state_id');
    }


    public function craftmanSkills()
    {
        return $this->hasMany('App\CraftmanSkill', 'user_id', 'id');
    }

    public function CraftmanCategory()
    {
        return $this->hasMany(CraftmanCategory::class, 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'userId', 'id');
    }

    public function businessDetails()
    {
        return $this->hasMany('App\BusinessDetails', 'user_id', 'id');
    }


    public function business(): HasOne {
        return $this->hasOne(BusinessDetails::class);
    }



    public function cities()
    {
        return $this->belongsTo('App\City', 'city', 'id');
    }

    public function states()
    {
        return $this->belongsTo('App\State', 'state', 'id');
    }

    public function designerSkills()
    {
        return $this->hasMany('App\DesignerSkill', 'user_id', 'id');
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}