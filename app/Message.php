<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['name', 'title', 'email', 'message_text'];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
