<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model 
{

    protected $guarded = [];
    protected $table = 'stages';
    public $timestamps = true;

    public function branche()
    {
        return $this->belongsTo('App\Models\Branch');
    }

}