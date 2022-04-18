<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Likes extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'likes_dislikes';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}