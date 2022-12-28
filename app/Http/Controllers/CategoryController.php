<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;


class CategoryController extends Controller
{

    public function index(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $categories = Category::query()->withCount("posts")->get();

        return view("admin.categories.index", compact("categories"));
    }


    public function create(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view("admin.categories.create");
    }

    public function store(StoreCategoryRequest $request):RedirectResponse
    {



        Category::query()->create($request->validated());

        return to_route("posts.category.index");

    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return back();
    }

    public function status(Category $category): RedirectResponse
    {


        $category->update(["is_active" => !$category->is_active]);

        return back();

    }
}
