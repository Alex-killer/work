<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
     tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Добавить ссылку</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('blog.link.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                        <div>
                            <select name="material_id"
                                    id="material_id"
                                    class="form-select"
                                    required>
                            @foreach($linkList as $linkOption)
                                <option value="{{ $linkOption->material_id }}"

                                        @if($linkOption->material_id == $materials->id) selected @endif>
                                    {{ $linkOption->material_id }}
                                </option>
                            @endforeach



                        </div>
                        <div class="form-floating mb-3">
                            <input name="title" type="text" class="form-control" placeholder="Добавьте подпись"
                                   id="floatingModalSignature">
                            <label for="floatingModalSignature">Подпись</label>
                            <div class="invalid-feedback">
                                Пожалуйста, заполните поле
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="description" type="text" class="form-control" placeholder="Добавьте ссылку" id="floatingModalLink" required>
                            <label for="floatingModalLink">Ссылка</label>
                            <div class="invalid-feedback">
                                Пожалуйста, заполните поле
                            </div>

                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </form>
        </div>
    </div>
</div>
