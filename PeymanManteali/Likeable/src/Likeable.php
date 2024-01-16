<?php

namespace PeymanManteali\Likeable;

use Illuminate\Support\Facades\Auth;

/**
 * @method morphMany(string $class, string $string)
 */
trait likeable
{
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function like()
    {
        if ($this->isLiked()) {
            return null;
        }elseif($this->isDisliked()){
            $this->removeDislike();
        }
        return $this->likes()->create([
            'user_id' => Auth::user()->id,
            'vote' => 1
        ]);
    }

    public function dislike()
    {
        if ($this->isDisliked()) {
            return null;
        }elseif($this->isLiked()){
            $this->removeLike();
        }
        return $this->likes()->create([
            'user_id' => Auth::user()->id,
            'vote' => 0
        ]);
    }

    public function isLiked()
    {
        return $this->likes()->where('user_id', Auth::user()->id)
                ->where('vote', 1)
                ->first();
    }

    public function isDisliked()
    {
        return $this->likes()->where('user_id', Auth::user()->id)
                ->where('vote', 0)
                ->first();
    }

    public function removeLike()
    {
        if ($this->isLiked()) {
            return $this->isLiked()->delete();
        }
        return false;
    }

    public function removeDislike()
    {
        if ($this->isDisliked()) {
            return $this->isDisliked()->delete();
        }
        return false;
    }

    public function getLikeCountAttribute()
    {
        return $this->likes()
            ->where('vote', 1)
            ->count();
    }

    public function getDislikeCountAttribute()
    {
        return $this->likes()
            ->where('vote', 0)
            ->count();
    }
}
