@extends('blog.layouts.main_layout')

@section('title', 'Материалы')

@section('content')
<div class="container">
    <h1 class="my-md-5 my-4">Добавить материал</h1>
    <!-- Плашка которая появляется сверху при сохранении -->
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-5 col-md-8">
            <form action="{{ route('blog.material.store') }}" method="POST">
                @csrf
            <form>
                <div class="form-floating mb-3">
                    <select name="category_id"
                            id="category_id"
                            class="form-control"
                            placeholder="Выберите категорию"
                            required>
                        <option selected>Выберите тип</option>
                        @foreach($categoryList as $categoryOption)
                            <option value="{{ $categoryOption->id }}"
                                    @if($categoryOption->id == $item->category_id) selected @endif>
                                {{ $categoryOption->title }}
                            </option>
                        @endforeach
                    </select>
                    <label for="floatingSelectType">Тип</label>
                    <div class="invalid-feedback">
                        Пожалуйста, выберите значение
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <select name="type_id"
                            id="type_id"
                            class="form-control"
                            placeholder="Выберите категорию"
                            required>
                        <option selected>Выберите категорию</option>
                        @foreach($typeList as $typeOption)
                            <option value="{{ $typeOption->id }}"
                                    @if($typeOption->id == $item->type_id) selected @endif>
                                {{ $typeOption->id }}. {{ $typeOption->title }}
                            </option>
                        @endforeach
                    </select>
                    <label for="floatingSelectCategory">Категория</label>
                    <div class="invalid-feedback">
                        Пожалуйста, выберите значение
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input name="title" type="text" class="form-control" placeholder="Напишите название" id="floatingName">
                    <label for="floatingName">Название</label>
                    <div class="invalid-feedback">
                        Пожалуйста, заполните поле
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input name="author" type="text" class="form-control" placeholder="Напишите авторов" id="floatingAuthor">
                    <label for="floatingAuthor">Авторы</label>
                    <div class="invalid-feedback">
                        Пожалуйста, заполните поле
                    </div>
                </div>
                <div class="form-floating mb-3">
            <textarea name="description" class="form-control" placeholder="Напишите краткое описание" id="floatingDescription"
                      style="height: 100px"></textarea>
                    <label for="floatingDescription">Описание</label>
                    <div class="invalid-feedback">
                        Пожалуйста, заполните поле
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Добавить</button>
            </form>
        </div>
    </div>
</div>
@endsection
