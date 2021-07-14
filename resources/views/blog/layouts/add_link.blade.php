
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
     tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Добавить ссылку</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="Добавьте подпись"
                           id="floatingModalSignature">
                    <label for="floatingModalSignature">Подпись</label>
                    <div class="invalid-feedback">
                        Пожалуйста, заполните поле
                    </div>

                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="Добавьте ссылку" id="floatingModalLink">
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
        </div>
