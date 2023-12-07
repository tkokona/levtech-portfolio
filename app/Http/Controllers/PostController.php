<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts=Post::where('user_id',\Auth::user()->id)->get();
        //Viewを返却するときは、return文の指定をview('Bladeファイル名の「.blade.php」より前の部分')と記載する。
        return view('posts/index',['posts'=>$posts,]);
        
    }
    
    public function rider()
    {
        $posts=Post::all();
        return view('/posts/rider')->with('posts', $posts);
    }
    
   public function search(Request $request)
   {
       $keyward=$request->departure_point;
        if(!empty($keyward)){
            $query=Post::query();
            $posts=$query->where('departure_point','LIKE', "%{$keyward}%")->get();
            // $message = "'$keyword'を含む投稿の検索が完了しました。";
            return view('/posts/search')->with(['posts'=>$posts]);
        }
        else {
            $message = "検索結果はありません。";
            return view('/posts/search')->with('message',$message);
        }
   }
    
    public function create()
    {
        return view('posts/create');
    }
    
    public function store(Request $request, Post $post)
    {
        $input = $request['post'];
        $post->user_id=$request->user()->id;
        $post->fill($input)->save();
        return redirect('/posts');
    }
    
    public function delete(Post $post){
        $post->delete();
        return redirect('/posts');
    }
}
