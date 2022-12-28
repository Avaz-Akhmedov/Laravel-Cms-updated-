<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Traits\SyncTags;
use App\Traits\UploadFile;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    use UploadFile, SyncTags;

    public function index(): View
    {
        $posts = Post::query()->latest()->with(["category"])->get();
        return view("admin.posts.index",compact("posts"));
    }

    public function show(Post $post): View
    {
        return view("admin.posts.show", compact("post"));
    }



    public function create(): View
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view("posts.create", compact("categories", "tags"));
    }



    public function store(StorePostRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            $fields = $request->validated();

            if ($image = $request->file("image")) {
                $fields["image"] = $this->upload($image, "images");
            }

            $post = Post::query()->create($fields);

            $this->syncTags($fields["tags"], $post);
        });
      return  to_route("admin.posts.index");
    }



    public function edit(Post $post): View
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view("posts.edit", compact("post", "categories", "tags"));
    }


    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        DB::transaction(function () use ($post, $request) {
            $fields = $request->validated();

            $this->syncTags($fields["tags"], $post);

            if ($image = $request->file("image")) {
                $this->delete($post->image);
                $fields["image"] = $this->upload($image, "images");
            }



            $post->update($fields);
        });

        return to_route("admin.posts.index");

    }

    public function destroy(Post $post): RedirectResponse
    {
        DB::transaction(function () use ($post) {
            $post->tags()->detach();
            $post->delete();
        });

        return to_route("admin.posts.index");
    }


    public function status(Post $post): RedirectResponse
    {
      $post->update(["is_active" => !$post->is_active]);
        return back();
    }


}
