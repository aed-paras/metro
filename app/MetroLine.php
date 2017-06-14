<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetroLine extends Model{
    protected $table = 'metro_lines';

    public function stations(){
        return $this->hasMany('App\Station');
    }

    public function city(){
        return $this->belongsTo('App\City');
    }

}
