<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h3 fw-bold mb-0">Accueil des articles</h2>
        <a href="index.php?action=ajouter" class="btn btn-primary">
            + Ajouter un article
        </a>
    </div>

    <div class="row g-4">
        <?php foreach ($db->query("SELECT * FROM posts", "Article") as $post) : ?>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body d-flex flex-column">
                        <div class="text-muted small mb-2">
                            <?= htmlspecialchars($post->getDate()) ?>
                        </div>

                        <h5 class="card-title mb-3">
                            <a href="<?= htmlspecialchars($post->getURL()) ?>" class="text-decoration-none text-dark stretched-link">
                                <?= htmlspecialchars($post->title) ?>
                            </a>
                        </h5>
                            <?= $post->getExtrait() ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>