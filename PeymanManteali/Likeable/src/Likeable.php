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
        }
        return $this->likes()->create([
            'user_id' => Auth::user(),
            'vote' => 1
        ]);
    }

    public function dislike()
    {
        return $this->likes()->create([
            'user_id' => Auth::user(),
            'vote' => 0
        ]);
    }

    public function isLiked()
    {
        return $like = $this->likes()->where('user_id', Auth::user())
                ->where('vote', 1)
                ->firstOrFail() ?? false;
    }

    public function isDisliked()
    {
        return $like = $this->likes()->where('user_id', Auth::user())
                ->where('vote', 0)
                ->firstOrFail() ?? false;
    }

    public function revokeLike()
    {
        $like = $this->isLiked();
        if ($like) {
            return $like->delete();
        }
        return false;
    }

    public function revokeDislike()
    {
        $dislike = $this->isDisliked();
        if ($dislike) {
            return $dislike->delete();
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
