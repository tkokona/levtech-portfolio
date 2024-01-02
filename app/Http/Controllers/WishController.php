<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wish;
use App\Models\Post;
use App\Models\User;
use App\Models\Management;

class WishController extends Controller
{
    public function request(Post $post) 
    {
        return view('/wishes/request')->with(['post' => $post]);
    }
    
    public function store(Post $post, Request $request, Wish $wish)
    {
        $input = $request['wish'];
        $input += ['user_id' => $request->user()->id];
        $wish->fill($input)->save();
        
        $wishId = $wish->id;
        $wishUserId = $wish->user_id;
        
        $management = new Management();
        $management->post_user_id = $post->user_id;  // wishesテーブルのpost_user_id
        $management->wish_user_id = $wishUserId;     // wishesテーブルのuser_id
        $management->wish_id = $wishId;              // wishesテーブルのid
        $management->save();
        
        return redirect('/wishes/show/' .$post->id.'/'. $wish->id);
    }
    
    public function show(Post $post, User $user, Wish $wish)
    {
        return view('/wishes/show')->with(['post' => $post, 'wish' => $wish]);
    }
    
    public function index()
    {
        $wishes=Wish::where('user_id',\Auth::user()->id)->get();
        $posts=Post::all();
        return view('/wishes/index',['posts'=>$posts, 'wishes'=>$wishes]);
    }
    
     public function check(Post $post, User $user, Wish $wish)
   {
       return view('/wishes/check')->with(['post' => $post, 'wish' => $wish]);
   }
   
   public function accept(Request $request, Post $post, Wish $wish)
   {
       $wish->update([
           'status'=>1
           ]);
       return redirect('/wishes/show/'.$post->id.'/'.$wish->id);
   }
   
   public function reject(Request $request, Post $post, Wish $wish)
   {
       $wish->update([
           'status'=>2
           ]);
       return redirect('/posts');
   }
   
   
    public function delete(Wish $wish)
    {
        $wish->delete();
        return redirect('/wishes');
    }
}
