<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Posts;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function CreateComment(Request $request){
        $this->validate($request, [
            'text' => 'required|max:1000',
            'post_id'=>'required'
        ]);
        $comment = new Comments();
        $comment->text = $request['text'];
        $comment->post_id = $request['post_id'];
        $message = 'There was an error';
        if ($request->user()->comments()->save($comment)) {
            $message = 'Comment successfully created!';
        }
        return back()->with(['message' => $message],['comments' => $comment]);

    }
}
