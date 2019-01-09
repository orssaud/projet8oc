<?php $title = "Billet simple pour l'Alaska"; 
$bg="bg";
 $classLog = ""; 
 $classHome = "";
 $classChapter = ""; 
 $classComment = "";

    function relativetime($sub){
                if($sub < 3600){// 1 min ago
                   if($sub < 60){
                    return 'maintenant';
                   }elseif($sub < 120){
                    return 'il y a 1 minute';
                   }else{
                    return 'il y a ' . round($sub/60) . ' minutes';
                   }
                }elseif($sub < 82800){//23 hours
                    if($sub < 7200){
                        return 'il y a 1 heure';
                    }else{
                        return 'il y a ' . round($sub/3600) . ' heures';
                    }
                }elseif($sub < 518400){ // 6 days
                    if($sub < 172800){ //2 days
                        return 'il y a 1 jour';
                    }else{
                        return 'il y a ' . round($sub/86400) . ' jours';
                    }
                }elseif($sub < 2592000){ // 1 month
                    if($sub < 1123200){ // 13 days
                        return 'il y a 1 semaine';
                    }
                    else{
                        return 'il y a ' . round($sub/604800) . ' semaines';
                    }
                }elseif($sub < 28886400){ // 48 week ~ 1 year
                    if($sub < 3628800){ // 6 week
                        return 'il y a 1 mois';
                    }else{
                        return 'il y a ' . round($sub/2563200) . ' mois';
                    }

                }else{
                    if($sub < 47174400){//1.5 year
                        return 'il y a 1 an';
                    }else{
                        return 'il y a ' . round($sub/31449600) . ' ans';
                    }
                }
            }



 ?>


<?php ob_start(); ?>

<div class="caption">
    
            <h3>
                
             
                <?= $post->title; ?>
                
            </h3>
            
            
               
</div>
<br>

     <em class="grey"> <?php 

setlocale (LC_TIME, 'fr_FR.utf8','fra');
echo strftime('Le %A %d %B %Y à %Hh%M', strtotime($post->chapter_date));

                ?></em>
        

        <div class="chapter">
            <?php
                if (isset($_SESSION['id']) && isset($_SESSION['account'])){
               // var_dump($post);
              ?> 
            
            

              <?php require('template/editMenu.php'); ?>
              

            <?php      
                }
            ?>

            <p>
                <?= $post->content; ?>
            </p>
        </div>
        <br>
        <p><a href="index.php">Retour à la liste des chapitres</a></p>
        <br>

 <hr class="hrComment rounded">
 <br>


<div id="comments">
    
 <h2>Commentaires</h2>
<br>        


<form action="index.php?action=addComment&amp;id=<?= $post->id; ?>#comments" method="post">
    <div class="form-group">

             <input type="hidden" id="byAuthor" name="byAuthor" <?php
                if (isset($_SESSION['id']) && isset($_SESSION['account'])){
               // var_dump($post);
                    echo('value="1"');
                }
                else{
                     echo('value="0"');
                }
              ?> />
      
        <div class="row">
            <div class="col-md-4">
        <label class="grey" for="author">Auteur :</label><br />
        <input class="form-control" type="text" id="author" name="author" required <?php
                if (isset($_SESSION['id']) && isset($_SESSION['account'])){
               // var_dump($post);
                    echo('value="Jean Forteroche"');
                }
              ?> />
                </div></div>
    </div>
    <div class="row">
            <div class="col-md-6">
    <div class="form-group">
        <label class="grey" for="comment">Commentaire :</label><br />
        <textarea class="form-control" id="comment" name="comment" required></textarea>
         </div></div>
    </div>
   <button type="submit" class="btn btn-primary">Commenter</button>
</form>
<br>







   <?php require('template/comment.php'); ?>




</div>
<br>
<script type="text/javascript" src="./public/js/reported.js"></script>
<?php $content = ob_get_clean(); ?>

<?php require('view/template/template.php'); ?>