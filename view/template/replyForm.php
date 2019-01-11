<?php
if(!isset($_GET['comId'])){


?>
<!--<form action="index.php?action=post&amp;id=<?= $post->id; ?>&amp;comId=<?= $comment->id ?>#<?= $comment->id ?>" method="post">
    <button type="submit" class="btn btn-secondary "><i class="fas fa-reply"></i> épondre</button>
</form>-->
<a href="index.php?action=post&amp;id=<?= $post->id; ?>&amp;comId=<?= $comment->id ?>#<?= $comment->id ?>" class="replyLink" >répondre</a>
<?php
}
?>