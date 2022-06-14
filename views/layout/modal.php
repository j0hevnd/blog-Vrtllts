    <div class="modal">
    <div class="modal-container" id="modal_container">
        <div class="nothing">
            <span id="close" onclick="modalClose()">X</span>

            <h2 class="title_modal">Ingresa una nueva entrada</h2>

            <div id="response_modal"></div>
            <form method="POST" id="form_modal" enctype="multipart/form-data">
                <div>
                    <div class="form-grid">
                        <input type="text" name="title" class="title"
                        value="<?=isset($article_edit) && is_object($article_edit)?$article_edit->titulo:''?>"
                        placeholder="Titulo" 
                        >
                        <input type="text" name="email"  class='email'
                        value="<?=isset($article_edit) && is_object($article_edit)?$article_edit->email_usuario:''?>"
                        placeholder="Correo electronico"
                        >
                    </div>
                    <div class="form-grid grid-tmp">
                        <label for="image">Imagén</label>
                        <input type="file" name="image" value="img.jpg">
                    </div>
                    <textarea name="content" class="content" cols="88" rows="10"
                        placeholder="Ingresa el contenido de tu entrada"><?=isset($article_edit) && is_object($article_edit)?$article_edit->contenido:''?></textarea>
                </div>
                <button class="button button_green button_modal">Agregar</button> 
            </form>
        </div>
    </div>
</div> <!-- modal -->