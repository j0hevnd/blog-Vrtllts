<div class="modal">
    <div class="modal-container" id="modal_container">
        <div clas1s="nothing">

            <span id="close" onclick="modalClose()">X</span>
            <h2>Ingresa una nueva entrada</h2>
            <form action="#" method="POST" enctype="multipart/form-data">
                <div>
                    <div class="form-grid">
                        <input type="text" name="title" placeholder="Titulo">
                        <input type="text" name="email" placeholder="Correo electronico">
                    </div>
                    <div class="form-grid grid-tmp">
                        <label for="image">Imagén</label>
                        <input type="file" name="image">
                    </div>
                    <textarea name="content" id="content" cols="88" rows="10"
                        placeholder="Ingresa el contenido de tu entrada"></textarea>
                </div>
                <input type="submit" class="button button_green" value="Agregar">
            </form>
        </div>
    </div>
</div> <!-- modal -->