<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Link;
use App\Models\Material;
use App\Models\Type;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $builder = Material::with('category', 'type');

        if ($request->search) {
            $builder->where('title', 'ILIKE', '%' . $request->search . '%')
            ->orWhere('description', 'ILIKE', '%'. $request->search . '%')
            ->orWhereHas('category', function ($query) use ($request) {
                $query->where('name', 'ILIKE', '%' . $request->search . '%');
            });
        }

        $materials = $builder->orderBy('id', 'ASC')
            ->paginate(10);

        return view('blog.materials.list_material', compact('materials'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Category();
        $categoryList = Category::orderBy('id', 'ASC')->get();
        $typeList = Type::orderBy('id', 'ASC')->get();

        return view('blog.materials.create_material',
            compact('item', 'categoryList', 'typeList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input();
        $new_material = (new Material())->create($data);

        if ($new_material) {
            return redirect()->back()
            ->with(['success' => 'Успешно сохранено']); // отправляем 'success'
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput(); // чтобы человек не потерял данные при ошибки
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        $links = Link::where('material_id', '=', $material->id)->get();

        return view('blog.materials.view_material',
            compact('links', 'material'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $material = Material::findOrFail($id);
        $categoryList = Category::orderBy('id', 'ASC')->get();
        $typeList = Type::orderBy('id', 'ASC')->get();

        return view('blog.materials.edit_material',
            compact('material', 'categoryList', 'typeList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        $material->type_id = $request->type_id;
        $material->category_id = $request->category_id;
        $material->title = $request->title;
        $material->description = $request->description;
        $material->author = $request->author;
        $material->save();

        return redirect()->back()->withSuccess('Категория была успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->back()->withSuccess('Категория была успешно удалена');
    }
}
