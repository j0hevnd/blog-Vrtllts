<?php  
require_once "utils/recaptchalib.php";
?>
    <script src='https://www.google.com/recaptcha/api.js?render=6LfJIm8gAAAAAK6NRW0c8H_suhzB4Y7rxgk9NKlp'></script>
    <script>
        grecaptcha.ready(function() {
        grecaptcha.execute('6LfJIm8gAAAAAK6NRW0c8H_suhzB4Y7rxgk9NKlp', {action: 'ejemplo'})
        .then(function(token) {
        var recaptchaResponse = document.getElementById('recaptchaResponse');
        recaptchaResponse.value = token;
        });});
    </script>
    <div class="modal">
    <div class="modal-container" id="modal_container">
        <div class="nothing">
            <span id="close" onclick="modalClose()">X</span>

            <h2 class="title_modal">Ingresa una nueva entrada</h2>

            <div id="response"></div>
            <form method="POST" id="form_modal" enctype="multipart/form-data">
                <div>
                    <div class="form-grid">
                        <input type="text" name="title" id="title" class="title"
                        value="<?=isset($article_edit) && is_object($article_edit)?$article_edit->titulo:''?>"
                        placeholder="Titulo" 
                        >
                        <input type="text" name="email" id="email" class='email'
                        value="<?=isset($article_edit) && is_object($article_edit)?$article_edit->email_usuario:''?>"
                        placeholder="Correo electronico"
                        >
                    </div>
                    <div class="form-grid grid-tmp">
                        <label for="image">Imagén</label>
                        <input type="file" name="image" id="image" value="img.jpg">
                    </div>
                    <textarea name="content" class="content" id="content" cols="88" rows="10"
                        placeholder="Ingresa el contenido de tu entrada"><?=isset($article_edit) && is_object($article_edit)?$article_edit->contenido:''?></textarea>
                </div>
                <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                <button class="button button_green button_modal">Agregar</button> 
            </form>
        </div>
    </div>
</div> <!-- modal -->