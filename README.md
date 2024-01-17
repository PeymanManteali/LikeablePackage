# LikeablePackage
for laravel  8.x  or above
## Installation

Use the package manager [composer](https://getcomposer.org) to install Likeable.

```bash
composer require peyman-manteali/likeable
```

## Usage

```php
class post extends Model
{
    use PeymanManteali\Likeable
}
```
## Methods
```php
    $post->likes(); 
    // Collection (Illuminate\Database\Eloquent\Collection)
    // of existing likes and dislikes for this post.

    $post->like(); // like the post for current user.
    $post->dislike(); // dislike the post for current user.
    
    $post->removeLike(); // remove like from this post for current user.
    $post->removeDislike(); // remove dislike from this post for current user.
    
    $post->isLiked(); // check if current user liked the post.
    $post->isDisliked(); // check if current user disliked the post.
    
    $post->likeCount; // get Total count of likes.
    $post->dislikeCount; // get Total count of dislikes.
    
    Post::likedBy($userId) // find only posts where user liked them.
    Post::dislikedBy($userId) // find only posts where user disliked them.
    
```
___
<h3 style="text-align: center;">License [MIT](https://choosealicense.com/licenses/mit/)</h3>
<p style="text-align: center;">Developed by Peyman Manteali</p>
<p style="text-align: center; line-height:0.1em; font-weight:lighter;">payman.manteali@gmail.com</p>
