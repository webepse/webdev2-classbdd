<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">

                    <div class="d-flex align-items-center justify-content-between mb-4 pb-2 border-bottom">
                        <h2 class="h3 fw-bold mb-0">Ajouter un post</h2>
                        <a href="index.php" class="btn btn-sm btn-outline-secondary">← Retour</a>
                    </div>

                    <form method="POST" action="index.php?action=addpost">
                        <div class="mb-3">
                            <label for="title" class="form-label fw-semibold">Titre de l'article</label>
                            <input type="text" name="title" id="title" class="form-control <?= (isset($erreurTitle) && $erreurTitle) ? 'is-invalid' : '' ?>" placeholder="Ex: Mon premier article sur PHP" value="<?= htmlspecialchars($_POST['title'] ?? '') ?>">
                            <?php if (isset($erreurTitle) && $erreurTitle) : ?>
                                <div class="invalid-feedback">
                                    Veuillez remplir correctement le nom de l'article.
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <label for="content" class="form-label fw-semibold">Contenu</label>
                            <textarea name="content" id="content" class="form-control <?= (isset($erreurContent) && $erreurContent) ? 'is-invalid' : '' ?>" rows="8" placeholder="Rédigez votre article ici..." ><?= htmlspecialchars($_POST['content'] ?? '') ?></textarea>
                            <?php if (isset($erreurContent) && $erreurContent) : ?>
                                <div class="invalid-feedback">
                                    Veuillez remplir correctement le contenu de l'article.
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="index.php" class="btn btn-light border">Annuler</a>
                            <button type="submit" class="btn btn-primary px-4">Publier le post</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>