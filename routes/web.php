<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$groupData = [
    'namespace' => 'App\Http\Controllers\Blog', // путь до самого контроллера
    'prefix'    => '/', // отображение в адресной строке (url)
];
Route::group($groupData, function () {
    $methods = ['index', 'show', 'edit', 'update', 'create', 'store', 'destroy']; //index - список всех категорий edit - редактирование update - когда нажимаем сохранить идем сюда create - создание категории store - переходим сюда, когда нажимаем на кнопку создать
    Route::resource('/', 'MaterialController')
        ->only($methods) // для каких методов нужно создать маршруты
        ->names('blog.material');

    Route::resource('categories', 'CategoryController')
        ->only($methods)
        ->names('blog.category');

    Route::resource('tag', 'TagController')
        ->only($methods)
        ->names('blog.tag');
});
