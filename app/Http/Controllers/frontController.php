<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\postsRequest;
use App\Http\Requests\updatePostRequest;
use Illuminate\Support\Facades\Storage;

use App\Post;
use App\Category;
use App\Tag;
use App\User;
class frontController extends Controller
{
    //
    //////START FRONT END FUNCTIONSS
    public function allPosts()
    {
        //
        $users = User::all();
        $posts = Post::orderBy('created_at', 'desc')->take(10)->get();
        $cat_name = Category::all();
        return view('frontend.allposts', compact('posts', 'cat_name', 'users'));

    }
    public function homepage() {
      $users = User::all();
      $posts = Post::all();
      $cat_name = Category::all();
      $random = Post::orderByRaw('RAND()')->take(6)->get();

      return view('welcome', compact('posts', 'cat_name', 'users', 'random'));
    }

    //////END FRONT END FUNCTIONSS
}
