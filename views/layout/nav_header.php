<div class="block-nav">
    <img src="assets/img/logo2501.png" class="main-logo" alt="Imagén logo">
    <div>
        <button class="button" onclick="openModal()">Agregar contenido</button>

        <?php if (isset($_SESSION['admin'])): ?>
            <a href="<?=BASE_URL?>user/logout" class="button">Cerrar sesión</a>
        <?php else: ?>
            <a href="<?=BASE_URL?>user/index" class="button">Iniciar Sesión</a>
        <?php endif; ?>
    </div>
</div>  <!-- block-nav -->