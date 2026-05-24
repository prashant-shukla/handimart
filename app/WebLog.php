<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebLog extends Model
{
    protected $table = 'web_logs';
    
    protected $fillable = ['id','visitor','user_page_count'];
}
