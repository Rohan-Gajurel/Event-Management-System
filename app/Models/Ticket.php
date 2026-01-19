<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    //
    use SoftDeletes;

    public function event(){
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
