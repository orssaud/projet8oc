<?php $title = "Billet simple pour l'Alaska"; 
 $classLog = ""; 
 $classHome = "active";
 $classChapter = ""; 
 $classComment = "";
 ?>


<?php ob_start(); ?>

        
        <p>Derniers chapitres :</p>
        

    <?php 
   
    /*
        if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])){ 
                echo("vous êtes connecté");

            require('view/menu.php'); 
        }*/
    ?>

        <?php

        foreach ($posts as $post){
        ?>
            <div class="news 

                      <?php 
                  
                      if ($posts[0]->id === $post->id){
                        echo 'jumbotron';
                    }
                   ?>

            ">
                <h3>
                    <?= $post->title ?>
                    <em>le <?= $post->chapter_date ?></em>

                      <?php 
                  
                      if ($posts[0]->id === $post->id){
                        echo '<span class="badge badge-secondary">New</span>';
                    }
                   ?>
       
                </h3>
                
                <p>
                    <?= substr(strip_tags(str_replace('&nbsp;','<br>',$post->content), '<br>'),0,150); ?>
                    <br />
                    <em><a href="index.php?action=post&id=<?= $post->id ?>">Commentaires</a></em>
                </p>
            </div>

  

        <?php
        }
        ?>


<?php $content = ob_get_clean(); ?>

<?php require('view/template/template.php'); ?>

