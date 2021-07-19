@extends('blog.layouts.main_layout')

@section('title', 'Редактирование категории')

@section('content')
<div class="container">
    <h1 class="my-md-5 my-4">Редактировать категорию</h1>
    <!-- Плашка которая появляется сверху при сохранении -->
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-5 col-md-8">
            <form action="{{ route('blog.category.update', $category->id) }}" method="POST">
            @csrf
            @method('PATCH')
                <form>
                    <div class="form-floating mb-3">
                        <input type="text" value="{{ $category->name }}" name="name" class="form-control" id="id">
                            <label for="floatingName">Название</label>
                                <div class="invalid-feedback">
                                    Пожалуйста, заполните поле
                                </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Обновить</button>
                </form>
            </form>
        </div>
    </div>
</div>
@endsection
