<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    //
    use SoftDeletes;

    public function venue()
    {
        return $this->belongsTo(Venue::class, 'venue_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
