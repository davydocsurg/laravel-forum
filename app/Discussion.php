<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Notifications\ReplyMarkedAsBest;

class Discussion extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'channel_id', 'slug'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function markAsBestReply(Reply $reply)
    {
        $this->update([
            'reply_id' => $reply->id
        ]);

        $reply->owner->notify(new ReplyMarkedAsBest($reply->discussion));
    }

    public function bestReply()
    {
        return $this->belongsTo(Reply::class, 'reply_id');
    }
}
