<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    public $timestamps = false;
    
    public function target()
    {
        return $this->belongsTo(Target::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
