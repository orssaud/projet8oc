<?php $title = "Billet simple pour l'Alaska"; 
$bg="";
 $classLog = ""; 
 $classHome = "";
 $classChapter = ""; 
 $classComment = "";
 ?>


<?php ob_start(); ?>
<div class="bg"></div>
	<div>
		<p>
			Le chapitre n'existe pas encore...
			<br>
			<a href="./index.php">Retour à la page d'accueil</a> 
		</p>
	</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template/template.php'); ?>