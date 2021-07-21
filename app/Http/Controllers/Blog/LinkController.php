<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Link;
use App\Models\Material;
use Illuminate\Http\Request;

class LinkController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_link = new Link();
        $new_link->material_id = $request->material_id;
        $new_link->title = $request->title;
        $new_link->description = $request->description;
        $new_link->save();


        if ($new_link) {
            return redirect()->back() // делаем редирект на изменение
            ->with(['success' => 'Успешно сохранено']); // отправляем 'success'
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput(); // чтобы человек не потерял данные при ошибки
        }
    }

    public function edit(Link $link)
    {
        return view('blog.links.edit_link', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        $link->material_id = $request->material_id;
        $link->title = $request->title;
        $link->description = $request->description;
        $link->save();

        return redirect()->back()->withSuccess('Ссылка была успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        $link->delete();
        return redirect()->back()->withSuccess('Ссылка была успешно удалена');
    }
}
