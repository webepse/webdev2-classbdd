<h1>Accueil de classbdd</h1>


<?php foreach($db->query("SELECT * FROM posts","Article") as $post) : ?>
    <div>
        <a href="<?= $post->getURL() ?>"><?= $post->title ?></a>
        <h3><?= $post->getDate(); ?></h3>
        <?= $post->getExtrait() ?>
    </div>
<?php endforeach; ?>