<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;


class CraftmanSkill extends Model
{
    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
    protected $fillable = [
        'id','name','description','created_at','updated_at','user_id'
    ];

    /**
     * Get the craftmanSkills that owns the User
     */
    // In the Craftman model
    public function city() {
      return $this->belongsTo(City::class);
    }

    public function searchCraftman()
     {
      $craftmen = Craftman::with('city')->get();
        return view('pages.search-craftman', compact('craftmen'));
     } 
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}