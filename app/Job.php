<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Job extends Model
{
    protected $guarded = [];

    
    
    public function client()
    {
        return $this->belongsTo('App\Client');
    }
    
}
