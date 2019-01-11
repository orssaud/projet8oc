<?php $title = "Billet simple pour l'Alaska";
$bg="bg";
$classLog = "";
$classHome = "active";
$classChapter = "";
$classComment = "";
?>
<?php ob_start(); ?>
<div class="container">
  <br>
  <?php
  foreach ($posts as $post){
  ?>
  <a class="news" href="index.php?action=post&id=<?= $post->id ?>"  title="Lire la suite !">
    
    <?php
    
    if ($posts[0]->id === $post->id){
    echo '<div class="new shadow p-3 mb-5 bg-white rounded"';
      }else{
      echo '<div class="shadow p-3 mb-5 bg-white rounded"';
        }
        ?>
        ">
        <h2>
        <?= $post->title ?>
        
        <?php
        
        if ($posts[0]->id === $post->id){
        echo '<br><span class="badge badge-danger">Nouveau !</span>';
        }
        ?>
        
        </h2>
        <em class="grey"> <?php
        setlocale (LC_TIME, 'fr_FR.utf8','fra');
        // local version
        // echo utf8_encode(strftime('Le %A %d %B %Y &agrave; %Hh%M', strtotime($post->chapter_date));
        // serveur version
        echo strftime('Le %A %d %B %Y &agrave; %Hh%M', strtotime($post->chapter_date));
        ?></em>
        <p>
          <?= substr(strip_tags(str_replace('&nbsp;','<br>',$post->content), '<br>'),0,500); ?>...
          
          
        </p>
      </div>
    </a>
    
    <?php
    }
    ?>
  </div>
  <?php $content = ob_get_clean(); ?>
  <?php require('view/template/template.php'); ?>