<?php $title = "Billet simple pour l'Alaska"; 
 $classLog = ""; 
 $classHome = "";
 $classChapter = ""; 
 $classComment = "";
 ?>

<?php ob_start(); ?>

  <p><a href="index.php">Retour à la liste des chapitres</a></p>

<form action="index.php?action=editSave" method="post">
        <div>
             <input type="hidden" id="id" name="id" value="<?= $post->id ?>">
        </div>
        <div class="form-group">
            <label for="title">Titre :</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= $post->title ?>"/>
        </div>
        <div class="form-group">
            <label for="chapter">Chapitre :</label>
            <textarea class="tinymce form-control" name="text" >
                 <?= $post->content; ?>
            </textarea>
        </div>
        
        <button type="submit" class="btn btn-primary" value="publier">Publier</button>
       
</form>

<script type="text/javascript" src="plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="plugin/tinymce/jquery.tinymce.min.js"></script>
<script type="text/javascript" src="plugin/tinymce/init.tinymce.js"></script>


<?php $content = ob_get_clean(); ?>

<?php require('view/template/template.php'); ?>