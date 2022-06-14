<main class="section-main container">
    <h2 class="title-h2-main">Leé nuestro contenido</h2>

    <?php while($article = $articles['result']->fetch_object()): ?>
        <div id="articles_list">
            <article class="container entry-blog" id="entry_blog_<?=$article->id?>">
                <div class="content-blog">
                    <img src="<?=BASE_URL?>uploads/images/<?=$article->imagen?>" class="image-article" alt="imagen">
                    <div class="card">
                        <h2 class="title-blog"><?=$article->titulo?></h2>
                    <p class="paragraph-blog"><?= $article->contenido ?></p>

                    <p class="date">Publicado: <?= $article->fecha ?></p>

                    <?php if(isset($_SESSION['admin'])): ?>
                        <div>
                            <button type="button" class="button_edit button button_green" onclick="findPostById(this)" value="<?=$article->id?>">Editar</button>
                            <button type="button" class="button_delete button" id="button_delete_<?=$article->id?>" onclick="deletePostById(this)" value="<?=$article->id?>">Elminar</button>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </article><!-- article -->
        </div>
    <?php endwhile; ?>
</main> <!-- articles of main content -->