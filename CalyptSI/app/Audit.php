<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    public function target()
    {
        return $this->belongsTo(Target::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function access()
    {
        return $this->hasMany(Access::class);
    }
    public function notes()
    {
        return $this->hasMany(Note::class)->orderBy('created_at', 'desc');
    }
}
