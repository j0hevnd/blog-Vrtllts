<div class="modal">
    <div class="modal-container" id="modal_container">
        <div class="nothing">
            <span id="close" onclick="modalClose()">X</span>

            <?php if(isset($edit) && isset($article_edit) && is_object($article_edit)): ?>
                <h2>Editar entrada: <?=$article_edit->titulo?></h2>
                <?php $url_action = BASE_URL."article/addArticle&id=".$article_edit->id; ?>
            <?php else: ?>
                <h2>Ingresa una nueva entrada</h2>
                <?php $url_action = BASE_URL."article/addArticle"; ?>
            <?php endif; ?>

            <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
                <div>
                    <div class="form-grid">
                        <input type="text" name="title" 
                        value="<?=isset($article_edit) && is_object($article_edit)?$article_edit->titulo:''?>"
                        placeholder="Titulo" 
                        >
                        <input type="text" name="email" 
                        value="<?=isset($article_edit) && is_object($article_edit)?$article_edit->email_usuario:''?>"
                        placeholder="Correo electronico"
                        >
                    </div>
                    <div class="form-grid grid-tmp">
                        <label for="image">Imagén</label>
                        <input type="file" name="image" value="img.jpg">
                    </div>
                    <textarea name="content" id="content" cols="88" rows="10"
                        placeholder="Ingresa el contenido de tu entrada"><?=isset($article_edit) && is_object($article_edit)?$article_edit->contenido:''?></textarea>
                </div>
                

                <?php if(isset($edit) && isset($article_edit) && is_object($article_edit)): ?>
                    <input type="submit" class="button button_green" value="Actualizar">
                <?php else: ?>
                    <input type="submit" class="button button_green" value="Agregar">
                <?php endif; ?>


            </form>
        </div>
    </div>
</div> <!-- modal -->