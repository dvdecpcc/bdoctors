<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    protected $fillable = ['name'];

    public function users() {
        return $this->belongsToMany('App\User');
    }
}
