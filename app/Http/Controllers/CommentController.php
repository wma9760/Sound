<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Audio;

class CommentController extends Controller
{
    public function store(Request $req)
    { $req->validate([
        'comment' => 'max:255',
    ]);
        $comment = new Comment;

        $comment->comment = $req->comment;

        $comment->user()->associate($req->user());

        $comment->parent_id = null;
        $track = Audio::find($req->track_id);

        $track->comments()->save($comment);

        return back();
    }

    public function replyStore(Request $req)
    {
        $reply = new Comment();

        $reply->comment = $req->get('comment');

        $reply->user()->associate($req->user());

        $reply->parent_id = $req->get('comment_id');

        $track = Audio::find($req->get('track_id'));

        $track->comments()->save($reply);

        return back();

    }
}