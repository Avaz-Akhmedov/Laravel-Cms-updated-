<?php

namespace App\Http\Controllers;


use App\Models\Post;

class HomeController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $posts  = Post::query()->latest()->with("category")->get();

        return view("posts.index",compact("posts"));
    }


    public function show(Post $post): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view("posts.show",compact("post"));
    }


}
