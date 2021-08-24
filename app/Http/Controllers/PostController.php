<?php

namespace App\Http\Controllers;

use App\Models\likes;
use App\Models\Posts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function CreatePost(Request $request)
    {
        $posts = Posts::orderBy('created_at', 'desc')->paginate(5);
        $this->validate($request, [
            'text' => 'required|max:1000'
        ]);
        $post = new Posts();
        $post->text = $request['text'];
        $message = 'There was an error';
        if ($request->user()->posts()->save($post)) {
            $message = 'Post successfully created!';
        }
        return redirect()->route('home')->with(['message' => $message],['posts' => $posts]);
    }
    public function like(Request $request){
        $change_like=0;
        $like_s=$request->like_s;
        $post_id=2;
        $like=DB::table('likes')
            ->where('post_id',$post_id)
            ->where('user_id',Auth::user()->id)->first();
        if(!$like){
            $new_like=new likes();
            $new_like->post_id=$post_id;
            $new_like->user_id=Auth::user()->id;
            $new_like->type_id=1;
            $new_like->save();
            $is_like=1;
        }
        elseif($like->type_id==1){
            DB::table('likes')
                ->where('post_id',$post_id)
                ->where('user_id',Auth::user()->id)->delete();
            $is_like=0;
        }
        elseif($like->type_id==0){
            DB::table('likes')
                ->where('post_id',$post_id)
                ->where('user_id',Auth::user()->id)->update(['type_id'=>1]);
            $is_like=1;
            $change_like=1;
        }
        $response=array('is_like'=>$is_like,'change_like'=>$change_like);
        return response()->json($response,200);
    }

    public function dislike(Request $request){
        $change_dislike=0;
        $like_s=$request->like_s;
        $postid=2;
        $dislike=DB::table('likes')
            ->where('post_id',$postid)
            ->where('user_id',Auth::user()->id)->first();
        if(!$dislike){
            $new_like=new likes();
            $new_like->post_id=$postid;
            $new_like->user_id=Auth::user()->id;
            $new_like->type_id=0;
            $new_like->save();
            $is_dislike=1;
        }
        elseif($dislike->type_id==0){
            DB::table('likes')
                ->where('post_id',$postid)
                ->where('user_id',Auth::user()->id)->delete();
            $is_dislike=0;
        }
        elseif($dislike->type_id==1){
            DB::table('likes')
                ->where('post_id',$postid)
                ->where('user_id',Auth::user()->id)->update(['type_id'=>0]);
            $is_dislike=1;
            $change_dislike=1;
        }
        $response=array('is_like'=>$is_dislike,'change_dislike'=>$change_dislike);
        return response()->json($response,200);
    }

}
