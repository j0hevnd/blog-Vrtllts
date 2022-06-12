<header class="site-header" style="background-image: url(<?=BASE_URL?>assets/img/login.jpg);">
    <div class="login" >
        <div class="div-form form">
            <img src="<?=BASE_URL?>assets/img/logo2501.png" class="login-img" alt="Imagén de virtual blog">
            <hr style="width: 90%">
            <form class="form-login form" action="<?=BASE_URL?>user/login" method="POST">
                <h2 style="font-size: 2rem; color: white; font-family: Helvetica; padding: 1.5rem">Iniciar sesión</h2>
                <input type="email" name="email" id="email" placeholder="Correo electrónico">
                <input type="password" name="password" id="password" placeholder="Contraseña">
                <input type="submit" class="button" value="Iniciar Sesión">
            </form>
        </div>
    </div>
</header>
