<?php
namespace App\Events;

use App\Models\Comment;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class CommentPosted implements ShouldBroadcast
{
    use SerializesModels;

    public $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function broadcastOn()
    {
        return new Channel('comments.' );
    }

    public function broadcastWith()
    {
        return ['comment' => $this->comment];
    }
    public function broadcastAs()
    {
        return 'CommentPosted';
    }
}
