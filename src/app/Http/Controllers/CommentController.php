<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Services\CommentService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class CommentController extends Controller
{
    public function store(Request $request)
    {    
        $request->validate([
            'comment' => 'required|max:140',
        ]);
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->shop_id = $request->shop_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();

        return back()
            ->with('success', 'コメント投稿に成功しました');
    }

    public function destroy(Request $request, CommentService $CommentService)
    {
        $comment = Comment::find($request->comment_id);
        
        if (!$CommentService->checkOwnComment(Auth::user()->id, $comment->id)) {
            throw new AccessDeniedHttpException();
        }
        $comment->delete();
        return back()
            ->with('success', 'コメント削除に成功しました');
    }
}
