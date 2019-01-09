<?php $title = "Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>

  <p><a href="index.php">Retour à la liste des chapitres</a></p>

<form action="index.php?action=save" method="post">
    
        <div>
            <label for="title">titre</label><br />
            <input type="text" id="title" name="title" />
        </div>
        <div>
            <textarea class="tinymce" name="text"></textarea>
        </div>
        <div>
            <input type="submit" value="publier" />
        </div>
</form>


<script type="text/javascript" src="plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="plugin/tinymce/jquery.tinymce.min.js"></script>
<script type="text/javascript" src="plugin/tinymce/init.tinymce.js"></script>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>