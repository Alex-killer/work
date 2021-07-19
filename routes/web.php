<?php


use App\Http\Controllers\Blog\MainController;
use App\Http\Controllers\Blog\MaterialController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('index');

$groupData = [
    'namespace' => 'App\Http\Controllers\Blog',
    'prefix'    => '/',
];
Route::group($groupData, function () {
    $methods = ['index', 'show', 'edit', 'update', 'create', 'store', 'destroy'];
    Route::resource('materials', 'MaterialController')
            ->only($methods)
            ->names('blog.material');

    Route::resource('categories', 'CategoryController')
        ->only($methods)
        ->names('blog.category');

    Route::resource('link', 'LinkController')
        ->only($methods)
        ->names('blog.link');
});

