<form action="index.php?action=addComment&amp;id=<?= $post->id; ?>#<?= $comment->id ?>" method="post">
    <div class="form-group">
        <div>
            <input type="hidden" id="comId" name="comId" value="<?= $comment->id ?>" />
        </div>
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
        <label for="author" class="grey">Auteur :</label><br />
        <div class="row">  
            <div class="col-md-6">  
        <input class="form-control" type="text" id="author" name="author" required <?php
                if (isset($_SESSION['id']) && isset($_SESSION['account'])){
               // var_dump($post);
                    echo('value="Jean Forteroche"');
                }
              ?> />
               </div> 
           </div>
    </div>
    <div class="form-group">
        <label for="comment" class="grey">Commentaire :</label><br />
        <textarea class="form-control" id="comment" name="comment" required></textarea>
    </div>
    <div class="row margin-0" >
      <!-- <div class=" col--sm-5 offset-1">   -->
   <button  type="submit" class="  btn btn-primary">Répondre</button>
      <!--  </div>-->
</form>

     <form    action="index.php?action=post&amp;id=<?= $post->id; ?>&amp;#<?= $comment->id ?>" method="post">
        <div class=" col-sm-1 ">  
            <button type="submit" class="btn btn-secondary ">Annuler</button>
            </div>
    </form>

</div>
<br>
