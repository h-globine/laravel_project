<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;

class PostController extends Controller
{
    public function post(){


        $categories = Category::all();

        $posts = Post::all();



        return view('posts.post',['categories' => $categories,'posts' => $posts]);
    }


    public function addPost(Request $request){
        $this->validate($request,[
            'post_body' => 'required',
            'post_title' => 'required',
            'category_id' => 'required'

        ]);

        $post = new Post();
        $post->post_body = $request->input('post_body');
        $post->post_title = $request->input('post_title');
        $post->category_id = $request->input('category_id');
        $post->post_image = 'http://localhost/uploads/b54098375f1328cc59702b21f100f22e.jpg';
        $post->user_id = Auth::user()->getAuthIdentifier();

        $post->save();
        return redirect('/post')->with('response','Post Added Successfully');
    }
}
