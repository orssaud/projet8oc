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
<div id="comments">
        <h2>Commentaires</h2>


<form action="index.php?action=addComment&amp;id=<?= $post->id; ?>#comments" method="post">
    <div class="form-group">
         <div>
             <input type="hidden" id="byAuthor" name="byAuthor" <?php
                if (isset($_SESSION['id']) && isset($_SESSION['account'])){
               // var_dump($post);
                    echo('value="1"');
                }
                else{
                     echo('value="0"');
                }
              ?> />
        </div>
        <label for="author">Auteur</label><br />
        <input class="form-control" type="text" id="author" name="author" required <?php
                if (isset($_SESSION['id']) && isset($_SESSION['account'])){
               // var_dump($post);
                    echo('value="Jean Forteroche"');
                }
              ?> />
    </div>
    <div class="form-group">
        <label for="comment">Commentaire</label><br />
        <textarea class="form-control" id="comment" name="comment" required></textarea>
    </div>
   <button type="submit" class="btn btn-primary">Commenter</button>
</form>
<br>


        <?php
        foreach ($comments as $comment){
        ?>
        <div   <?php echo('id="'.$comment->id.'"');
                    if($comment->by_author == 1){
                        echo('class="alert alert-danger"');
                    }else{
                        echo('class="alert alert-primary"');
                    }
                ?> >
            <p><strong><?= $comment->author; ?></strong> le <?= $comment->comment_date; ?></p>
            <p><?=$comment->comment; ?></p>
             <?php
                if (isset($_SESSION['id']) && isset($_SESSION['account'])){
               // var_dump($post);
              ?> 

                <form action="index.php?action=deleteCommentPost&amp;id=<?= $comment->id ?>&amp;postId=<?= $post->id; ?>#comments" method="post">
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>
            
        
            <?php      
                }else{
            ?>

            <?php        if($comment->by_author == 0){ ?>
        <div id="report_<?= $comment->id ?>">
            <form action="index.php?action=reported&amp;id=<?= $post->id; ?>#<?= $comment->id ?>" method="post">
                <div>
                    <input type="hidden" id="idComment" name="idComment" value="<?= $comment->id ?>">
                </div>
                <div>
                   
                    <button class="btn reportButton" type="submit"><i class="fas fa-exclamation-triangle"></i></button>
                </div>
            </form>
        </div>
        <?php } }?>
        </div>
        
        <?php
        }
        ?>
</div>

<script type="text/javascript" src="./public/js/reported.js"></script>
<?php $content = ob_get_clean(); ?>

<?php require('view/template/template.php'); ?>