<?php
namespace App\Services;

use App\Models\Comment;
class CommentService
{
    public static function getComments()
    {
        return Comment::orderBy('created_at', 'DESC')->get();
    }

    public function checkOwnComment(int $user_id, int $comment_id): bool
    {
        $comment = Comment::where('id', $comment_id)->first();
        if (!$comment) {
            return false;
        }

        return $comment->user_id === $user_id;
    }
}