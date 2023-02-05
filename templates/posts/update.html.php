<form action="index.php?type=post&action=change" method="post">
    <input type="hidden" name="idUpdate" value="<?= $post->getId()?>">
    <input type="text" name="titleUpdate" value="<?= $post->getTitle() ?>" id="">
    <input type="text" name="contentUpdate" value="<?= $post->getContent() ?>" id="">
    <button type="submit" class="btn btn-success">update</button>

</form>