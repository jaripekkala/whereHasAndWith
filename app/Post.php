<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The post author.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
