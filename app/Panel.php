<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panel extends Model{
    protected $table = 'panels';

    public function station(){
        return $this->belongsTo('App\Station');
    }

    public function media(){
        return $this->belongsTo('App\Media');
    }

    public function panel_type(){
        return $this->belongsTo('App\PanelType');
    }

}
