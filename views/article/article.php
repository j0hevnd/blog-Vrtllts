<main class="section-main container">
    <h2 class="title-h2-main">Leé nuestro contenido</h2>

    <?php while($article = $articles['result']->fetch_object()): ?>
        <article class="container entry-blog">
            <div class="content-blog">
                <img src="<?=BASE_URL?>uploads/images/<?=$article->imagen?>" class="image-article" alt="imagen">
                <div class="card">
                    <h2 class="title-blog"><?=$article->titulo?></h2>
                    <p class="paragraph-blog"><?= $article->contenido ?></p>

                    <p class="date">Publicado: <?= $article->fecha ?></p>

                    <?php if(isset($_SESSION['admin'])): ?>
                        <div>
                            <button onclick="modalOpen()" class="button button_green">Editar</button>
                            <a href="#" class="button">Elminar</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </article><!-- article -->
    <?php endwhile; ?>
</main> <!-- articles of main content -->