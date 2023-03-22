<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Audio;
use App\Models\Vedio;
use App\Models\Vediocomment;

class VedioCommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Vediocomment();

        $comment->comment = $request->comment;

        $comment->user()->associate($request->user());

        $comment->parent_id = null;
        $vediotrack = Vedio::find($request->track_id);

        $vediotrack->comments()->save($comment);

        return back();
    }

    public function replyStore(Request $request)
    {
        $reply = new Vediocomment();

        $reply->comment = $request->get('comment');

        $reply->user()->associate($request->user());

        $reply->parent_id = $request->get('comment_id');

        $vediotrack = Vedio::find($request->get('track_id'));

        $vediotrack->comments()->save($reply);

        return back();

    }
}