<?php $title = "Billet simple pour l'Alaska";
$bg="";
$classLog = "";
$classHome = "";
$classChapter = "";
$classComment = "active";
// $_SESSION['newComments'] = 1;
?>
<?php ob_start(); ?>
<br>
<div>
	
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="light-grey nav-link <?php if($p == 0){echo('active');} ?>" id="new" href="./index.php?action=allComments&amp;p=0">Nouveau</a>
  </li>
  <li class="nav-item">
    <a class="light-grey nav-link <?php if($p == 1){echo('active');} ?>"  id="all" href="./index.php?action=allComments&amp;p=1">Tous</a>
  </li>
  <li class="nav-item">
    <a class="light-grey nav-link <?php if($p == 2){echo('active');} ?>" id="reported" href="./index.php?action=allComments&amp;p=2">Signalé</a>
  </li>

</ul>

<br>

		<?php
    	if(empty($posts)){
    		if($p == 0){
    			echo("<em> Il n'y a aucun nouveau comentaire </em>");    			
    		}elseif($p == 1){
    			echo("<em> Il n'y a aucun comentaire </em>");				
    		}else{
    			echo("<em> Il n'y a aucun comentaire signalé</em>");
    		}
    		
    	}else{
	        foreach ($posts as $post){
	        ?>
	        <a class="text-decoration" href="./index.php?action=post&amp;id=<?= $post->post_id ?>#<?= $post->id ?>">
				<div class="alert <?php
										if($p == 0){
							    			echo("alert-light");
							    		}elseif($p == 1){
											echo("alert-light");
							    		}else{
							    			echo("alert-danger");
							    		}
									?>">
					<h4 class="black"> <?= $post->author ?></h4>
					<em class="grey"> <?= $post->comment_date ?></em>
					<p class="dark-grey allCommentP"> <?= $post->comment ?></p>
								<form action="index.php?action=deleteComment&amp;id=<?= $post->id ?>&amp;p=<?= $p ?>" method="post">
									<button type="submit" class="btn-right-trash btn btn-danger" title="Supprimer ce message"><i class="fas fa-trash-alt"></i></button>
								</form>
		
				</div>
			</a>  

        <?php
        	}
        }
        ?>


	
</div>


<?php $content = ob_get_clean(); ?>
<?php require('view/template/template.php'); ?>
<?php
$_SESSION['newComments'] = 0;
?>