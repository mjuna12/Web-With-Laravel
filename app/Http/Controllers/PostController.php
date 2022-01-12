<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if(request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' in ' . $author->name;
        }
        return view('posts',[
            "title"=>"All Posts",
            "active"=>'posts',
            "posts"=> Post::latest()->filter(request(['search', 'caategory', 'author']))->paginate()->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('post',[
            "title"=>"Single Post",
            "active"=>'posts',
            "post"=>$post
        ]);
    }
}
