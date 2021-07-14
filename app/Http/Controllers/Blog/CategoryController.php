<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'ASC')->paginate(10);

        return view('blog.categories.list_category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Category(); // создаем объект класса пустой, в нем нет данных
        $categoryList = Category::all();

        return view('blog.categories.create_category',
            compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input();
        $new_category = (new Category())->create($data);

        //return redirect()->back()->withSuccess('Категория успешно добавлена');
        if ($new_category) {
            return redirect()->back() // делаем редирект на изменение
            ->with(['success' => 'Успешно сохранено']); // отправляем 'success'
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput(); // чтобы человек не потерял данные при ошибки
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->withSuccess('Категория была успешно удалена');
    }
}
