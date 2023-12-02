<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Post $post)
    {
        //Viewを返却するときは、return文の指定をview('Bladeファイル名の「.blade.php」より前の部分')と記載する。
        return view('posts/index')->with(['posts' => $post->getByLimit()]);
        //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
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
