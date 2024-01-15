<?php

namespace PeymanManteali\Likeable;

use Illuminate\Database\Eloquent\Model;

class like extends model
{
    protected $fillable = ['vote', 'user_id'];

    public function likeable()
    {
        return $this->morphTo();
    }
}
