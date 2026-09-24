<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">

            <!-- Lien de retour rapide -->
            <div class="mb-4">
                <a href="index.php" class="text-decoration-none text-muted small">
                    &larr; Retour à l'accueil
                </a>
            </div>

            <!-- En-tête de l'article -->
            <header class="mb-4 pb-3 border-bottom">
                <h1 class="fw-bold display-6 mb-3">
                    <?= htmlspecialchars($post->title) ?>
                </h1>
                <div class="text-secondary small d-flex align-items-center gap-2">
                    <span>Publié le <?= htmlspecialchars($post->getDate()) ?></span>
                </div>
            </header>

            <!-- Contenu de l'article -->
            <article class="article-content fs-5 text-dark lh-lg mb-5">
                <?= nl2br(htmlspecialchars($post->content)) ?>
            </article>

            <!-- Actions du bas -->
            <div class="pt-4 border-top">
                <a href="index.php" class="btn btn-outline-secondary">
                    &larr; Revenir aux articles
                </a>
            </div>

        </div>
    </div>
</div>