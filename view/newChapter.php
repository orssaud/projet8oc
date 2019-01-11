<?php $title = "Billet simple pour l'Alaska";
$bg="";
$classLog = "";
$classHome = "";
$classChapter = "active";
$classComment = "";
?>
<?php ob_start(); ?>
<div class="container">
	<br>
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
	<br><br>
	<script type="text/javascript" src="plugin/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="plugin/tinymce/jquery.tinymce.min.js"></script>
	<script type="text/javascript" src="plugin/tinymce/init.tinymce.js"></script>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/template/template.php'); ?>