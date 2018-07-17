<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    public $timestamps = false;
    
    protected $fillable = array('name');
    
    public function create($target)
    {
        $this->name = $target;
        $this->save();
    }
}
