<?php $title = "Billet simple pour l'Alaska";
$bg="bg";
$classLog = "";
$classHome = "";
$classChapter = "";
$classComment = "";
?>
<?php ob_start(); ?>
<div class="container">
  <div class="caption">
    
    <h3>
    
    
    <?= $post->title; ?>
    
    </h3>
    
    
    
  </div>
  <br>
  <em class="grey"> <?php
  setlocale (LC_TIME, 'fr_FR.utf8','fra');
        // local version
        // echo utf8_encode(strftime('Le %A %d %B %Y &agrave; %Hh%M', strtotime($post->chapter_date));
        // serveur version
        echo strftime('Le %A %d %B %Y &agrave; %Hh%M', strtotime($post->chapter_date));
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
    </div>
    <?php $content = ob_get_clean(); ?>
    <?php require('view/template/template.php'); ?>