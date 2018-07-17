<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Note extends Model
{
     
    protected $fillable = ['body','audit_id','user_id'];
    
    public function audit()
    {
        return $this->belongsTo(Audit::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
