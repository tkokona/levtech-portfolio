<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wish;
use App\Models\Post;
use App\Models\User;

class WishController extends Controller
{
    public function request(Post $post) 
    {
      
        return view('wishes/request')->with(['post' => $post]);
    }
    
    public function store(Post $post, Request $request, Wish $wish)
    {
        $input = $request['wish'];
        $input += ['user_id' => $request->user()->id];
        
        
        $wish->fill($input)->save();
        return redirect('/wishes/show/' .$post->id.'/'. $wish->id);
    }
    
    public function show(Post $post, User $user, Wish $wish)
    {
        return view('wishes/show')->with(['post' => $post, 'wish' => $wish]);
    }
    
    public function index()
    {
        $wishes=Wish::where('user_id',\Auth::user()->id)->get();
        $posts=Post::all();
        return view('wishes/index',['posts'=>$posts, 'wishes'=>$wishes]);
    }
    
     public function check(Post $post, User $user, Wish $wish)
   {
       return view('wishes/check')->with(['post' => $post, 'wish' => $wish]);
   }
   
    public function delete(Wish $wish){
        $wish->delete();
        return redirect('/wishes');
    }
}
