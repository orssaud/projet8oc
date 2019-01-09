<?php $title = "Billet simple pour l'Alaska"; 
 $classLog = ""; 
 $classHome = "";
 $classChapter = ""; 
 $classComment = "";
 ?>


<?php ob_start(); ?>

    
        <p><a href="index.php">Retour à la liste des chapitres</a></p>

        <div class="news">
            <?php
                if (isset($_SESSION['id']) && isset($_SESSION['account'])){
               // var_dump($post);
              ?> 
            
            

              <?php require('template/editMenu.php'); ?>


            <?php      
                }
            ?>

            <h3>
                <?= $post->title; ?>
                <em>le <?= $post->chapter_date; ?></em>
            </h3>
            
            <p>
                <?= $post->content; ?>
            </p>
        </div>

        <h2>Commentaires</h2>

<form action="index.php?action=addComment&amp;id=<?= $post->id; ?>" method="post">
    <div class="form-group">
        <label for="author">Auteur</label><br />
        <input class="form-control" type="text" id="author" name="author" />
    </div>
    <div class="form-group">
        <label for="comment">Commentaire</label><br />
        <textarea class="form-control" id="comment" name="comment"></textarea>
    </div>
   <button type="submit" class="btn btn-primary">Commenter</button>
</form>


        <?php
        //var_dump($comments);
        foreach ($comments as $comment){
        ?>
            <p><strong><?= $comment->author; ?></strong> le <?= $comment->comment_date; ?></p>
            <p><?=$comment->comment; ?></p>

            <form action="index.php?action=reported&amp;id=<?= $post->id; ?>" method="post">
                <div>
                    <input type="hidden" id="idComment" name="idComment" value="<?= $comment->id ?>">
                </div>
                <div>
                    <input type="submit" value="Signaler"/>
                </div>
            </form>
        <?php
        }
        ?>



<?php $content = ob_get_clean(); ?>

<?php require('view/template/template.php'); ?>