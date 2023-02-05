
<div class="post mt-3">
    
        <h3><?= $post->getTitle() ?></h3>

    <img src="http://localhost/bloggyMcBlog/images/<?= $post->getImage() ?>" alt="">
<p><?= $post->getContent() ?></p>
<a href="index.php?type=post&action=remove&id=<?= $post->getId() ?>" class="btn btn-danger">supprimer</a>
<a href="index.php?type=post&action=change&id=<?= $post->getId() ?>" class="btn btn-warning">Update</a>



<a href="index.php" class="btn btn-success">retour</a>
</div>


    <?php foreach ($comments as $comment): ?>

        <hr>




        <p><strong><?= $comment->getContent() ?></strong></p>
        <a href="index.php?type=comment&action=remove&id=<?= $comment->getId() ?>" class="btn btn-danger"><strong>X</strong></a>
        <a href="index.php?type=comment&action=change&id=<?= $comment->getId() ?>" class="btn btn-warning"><strong>update</strong></a>

        <hr>
        <hr>

            <?php endforeach; ?>

<hr>

<form method="post" class="form" action="index.php?type=comment&action=create">
    <input class="form-control"  type="text" name="content" placeholder="add a comment">
    <input name="post_id" class="form-control" type="hidden" value="<?= $post->getId() ?>">
    <button class="btn btn-success" type="submit">Send</button>
</form>