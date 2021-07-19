<?php


use App\Http\Controllers\Blog\MainController;
use App\Http\Controllers\Blog\MaterialController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('index');

$groupData = [
    'namespace' => 'App\Http\Controllers\Blog', // путь до самого контроллера
    'prefix'    => '/', // отображение в адресной строке (url)
];
Route::group($groupData, function () {
    $methods = ['index', 'show', 'edit', 'update', 'create', 'store', 'destroy']; //index - список всех категорий edit - редактирование update - когда нажимаем сохранить идем сюда create - создание категории store - переходим сюда, когда нажимаем на кнопку создать
    Route::resource('materials', 'MaterialController')
            ->only($methods) // для каких методов нужно создать маршруты
            ->names('blog.material');

    Route::resource('categories', 'CategoryController')
        ->only($methods)
        ->names('blog.category');

    Route::resource('link', 'LinkController')
        ->only($methods)
        ->names('blog.link');
});

