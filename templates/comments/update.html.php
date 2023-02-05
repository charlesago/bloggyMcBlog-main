

     <form action="index.php?type=comment&action=change" method="post">
         <input type="hidden" name="id" value="<?=$comment->getId() ?>">
         <input type="text" name="content" value="<?=$comment->getContent() ?>">
         <button class="btn btn-success" type="submit">Send</button>
     </form>