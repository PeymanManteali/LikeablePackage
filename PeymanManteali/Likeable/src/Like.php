<?php

namespace PeymanManteali\Likeable;

use Illuminate\Database\Eloquent\Model;

class like extends model
{
    protected $fillable = ['vote', 'user_id', 'likeable_id', 'likeable_type'];

    public function likeable()
    {
        return $this->morphTo();
    }
}
