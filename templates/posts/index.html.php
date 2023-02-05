
<?php foreach ($posts as $post) :  ?>


    <div class="post mt-3">
        <h3><?= $post->getTitle() ?></h3>
        <p><?= $post->getContent() ?></p>
        <a href="index.php?type=post&action=show&id=<?= $post->getId() ?>" class="btn btn-success">Lire</a>
    </div>

<?php endforeach; ?>

