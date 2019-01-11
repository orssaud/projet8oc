<?php $title = "Billet simple pour l'Alaska";
$bg="bg";
$classLog = "";
$classHome = "";
$classChapter = "";
$classComment = "";
?>
<?php ob_start(); ?>
<div class="caption">
	
	<h3>
	
	<p>
		Le chapitre n'existe pas encore...
		<br>
		<a href="./index.php">Retour à la page d'accueil</a>
	</p>
	
	</h3>
	
	
	
</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/template/template.php'); ?>