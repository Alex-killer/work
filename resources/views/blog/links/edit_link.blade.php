<div class="modal fade" id="exampleModalToggle1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
     tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Добавить ссылку</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('blog.link.store') }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
{{--                    @foreach ($linkList as $linkOption)--}}
{{--                        <option value="{{ $linkOption->material_id }}"--}}
{{--                                @if($linkOption->material_id == $material->id) selected @endif>--}}
{{--                        </option>--}}
                        <div class="form-floating mb-3">
                            <input name ="title" type="text" class="form-control" placeholder="Добавьте подпись"
                                   id="floatingModalSignature"
                                   value="#">
                            <label for="floatingModalSignature">Подпись</label>
                            <div class="invalid-feedback">
                                Пожалуйста, заполните поле
                            </div>

                        </div>
                        <div class="form-floating mb-3">
                            <input name="description" type="text" class="form-control" placeholder="Добавьте ссылку" id="floatingModalLink" value="#" required>
                            <label for="floatingModalLink">Ссылка</label>
                            <div class="invalid-feedback">
                                Пожалуйста, заполните поле
                            </div>
                            {{--            <option selected>Выберите категорию</option>--}}
                            {{--            @foreach($linkList as $linkOption)--}}
                            {{--                <option value="{{ $typeOption->id }}"--}}
                            {{--                        @if($typeOption->id == $material->type_id) selected @endif>--}}
                            {{--                    {{ $typeOption->id }}. {{ $typeOption->title }}--}}
                            {{--                </option>--}}
                            {{--            @endforeach--}}
                        </div>
{{--                    @endforeach--}}
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </form>
        </div>
    </div>
</div>
