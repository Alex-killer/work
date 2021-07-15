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
        $data = $request->input();
        $new_link = (new Link())->create($data);

        if ($new_link) {
            return redirect()->back() // делаем редирект на изменение
            ->with(['success' => 'Успешно сохранено']); // отправляем 'success'
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput(); // чтобы человек не потерял данные при ошибки
        }
    }

    public function edit($id)
    {
        $link = Link::findOrFail($id);

        return view('blog.links.edit_link',
            compact('link'));
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
