<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePageRequest;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;

class PageController extends Controller
{
    public function index(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $pages = Page::query()->latest()->get();

        return view("admin.pages.index", compact("pages"));
    }


    public function show(string $url): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $page = Page::query()->where('url', '=', $url)->firstOrFail();


        abort_if($page->is_active ==0,404);

        return view("admin.pages.show", compact("page"));
    }

    public function create(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view("admin.pages.create");
    }

    public function store(StorePageRequest $request): RedirectResponse
    {
        $fields = $request->validated();

        Page::query()->create($fields);

        return to_route("admin.pages.index");
    }


    public function edit(Page $page): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view("admin.pages.edit",compact("page"));
    }

    public function update(Page $page,StorePageRequest $request): RedirectResponse
    {

        $page->update($request->validated());

        return to_route("admin.pages.index");
    }

    public function destroy(Page $page): RedirectResponse
    {
        $page->delete();

        return to_route("admin.pages.index");
    }


    public function status(Page $page): RedirectResponse
    {

        $page->update(["is_active" => !$page->is_active]);

        return back();
    }


}
