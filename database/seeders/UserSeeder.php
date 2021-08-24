<?php

namespace Database\Seeders;

use App\Models\Comments;
use App\Models\favorites;
use App\Models\friends;
use App\Models\likes;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new User();
        $user->name='دينا';
        $user->email='dina@gmail.com';
        $user->password=bcrypt('123456');
        $user->save();

        $post=new Posts();
        $post->text='اهلا بالعالم';
        $post->user_id=$user->id;
        $post->save();

        $comment=new Comments();
        $comment->text='مرحبا بك';
        $comment->user_id=$user->id;
        $comment->post_id=$post->id;
        $comment->save();

        $like=new likes();
        $like->user_id=$user->id;
        $like->type='post';
        $like->type_id=1;
        $like->post_id=$post->id;
        $like->comment_id=$comment->id;
        $like->save();

        $friend=new friends();
        $friend->user_id=$user->id;
        $friend->friend_id=Null;
        $friend->save();

        $favorite=new favorites();
        $favorite->user_id=$user->id;
        $favorite->post_id=$post->id;
        $favorite->save();
    }
}
