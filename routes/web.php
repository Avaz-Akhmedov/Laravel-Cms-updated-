<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\{
    CategoryController,
    HomeController,
    PageController,
};

use Illuminate\Support\Facades\Route;


Route::view("/", "home.welcome")->name("home");



Route::get("/posts", [HomeController::class,"index"])->name("posts.index");
Route::get("/posts/{post}", [HomeController::class, "show"])->name("posts.show");


Route::group(["middleware" => "auth", "prefix" => "admin"], function () {


    Route::view("/", "admin.dashboard")->name("admin.dashboard");

    Route::controller(PostController::class)->group(function () {
        Route::get("/posts", "index")->name("admin.posts.index");
        Route::get("/posts/create", "create")->name("posts.create");
        Route::post("/posts/create", "store")->name("posts.store");
        Route::get("/posts/{post}/edit", "edit")->name("posts.edit");
        Route::patch("/posts/{post}/edit", "update")->name("posts.update");
        Route::delete("/posts/{post}", "destroy")->name("posts.destroy");

        Route::get("/posts/{post}/status", "status")->name("posts.status");

        Route::get("/posts/{post}","show")->name("admin.posts.show");
    });


    Route::controller(CategoryController::class)->group(function () {
        Route::get("/categories", "index")->name("posts.category.index");
        Route::get("/categories/create", "create")->name("posts.category.create");
        Route::post("/categories/create", "store")->name("posts.category.store");
        Route::delete("/categories/{category}","destroy")->name("posts.category.destroy");

        Route::get("/categories/{category}/status", "status")->name("posts.category.status");
    });

    Route::controller(PageController::class)->group(function () {
        Route::get("/pages", "index")->name("admin.pages.index");
        Route::get("/pages/create", "create")->name("admin.pages.create");
        Route::post("/pages/create", "store")->name("admin.pages.store");
        Route::get("/pages/{page}/edit","edit")->name("admin.pages.edit");
        Route::patch("/pages/{page}/edit","update")->name("admin.pages.update");
        Route::delete("/pages/{page}","destroy")->name("admin.pages.destroy");

        Route::get("/pages/{page}/status", "status")->name("admin.pages.status");

    });



});


//LOGIN ADMIN
Route::controller(LoginController::class)->group(function () {
    Route::get("/auth/login", "showLoginForm")->name("login");
    Route::post("/auth/login", "login")->name("login.perform");
    Route::post("/logout", "logout")->name("logout.perform");
});
//LOGIN ADMIN


Route::get('{page}', [PageController::class, 'show'])->name("pages.show");

