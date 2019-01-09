<?php $title = "Billet simple pour l'Alaska"; 
 $classLog = ""; 
 $classHome = "";
 $classChapter = "active"; 
 $classComment = "";
 ?>


<?php ob_start(); ?>

  <p><a href="index.php">Retour à la liste des chapitres</a></p>

<form action="index.php?action=save" method="post">
    
        <div class="form-group">
            <label for="title">Titre :</label>
            <input type="text" class="form-control" id="title" name="title" required/>
        </div>
        <div class="form-group">
            <label for="chapter">Chapitre :</label>
            <textarea class="tinymce form-control" name="text" ></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary" value="publier">Publier</button>
       
</form>

<script type="text/javascript" src="plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="plugin/tinymce/jquery.tinymce.min.js"></script>
<script type="text/javascript" src="plugin/tinymce/init.tinymce.js"></script>


<?php $content = ob_get_clean(); ?>

<?php require('view/template/template.php'); ?>