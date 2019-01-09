<?php $title = "Billet simple pour l'Alaska";
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
    <a class="nav-link active" id="new" href="#">New</a>
  </li>
  <li class="nav-item">
    <a class="nav-link"  id="all" href="#">All</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="reported" href="#">Reported</a>
  </li>

</ul>

<br>
	<div id="newComments">
        <?php
    	if(empty($newComments)){
    		echo("<em> Il n'y a aucun nouveau comentaire </em>");
    	}else{
	        foreach ($newComments as $newComment){
	        ?>

				<div class="alert alert-primary">
					<h4> <?= $newComment->author ?></h4>
					<em> <?= $newComment->comment_date ?></em>
					<p> <?= $newComment->comment ?></p>
													<form action="index.php?action=deleteComment&amp;id=<?= $newComment->id ?>" method="post">
									<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
								</form>
		
				</div>
			  

        <?php
        	}
        }
        ?>
	</div>
	<div id="allComments">
	   <?php
    	if(empty($allComments)){
    		echo("<em> Il n'y a aucun comentaire </em>");
    	}else{
	        foreach ($allComments as $allComment){
	        ?>

				<div class="alert alert-primary">
					<h4> <?= $allComment->author ?></h4>
					<em> <?= $allComment->comment_date ?></em>
					<p> <?= $allComment->comment ?></p>
						
								<form action="index.php?action=deleteComment&amp;id=<?= $allComment->id ?>" method="post">
									<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
								</form>
		
				</div>
			  

        <?php
        	}
        }
        ?>
	</div>
	<div id="reportedComments">
		<?php
    	if(empty($reportedComments)){
    		echo("<em> Il n'y a aucun comentaire signalé</em>");
    	}else{
	        foreach ($reportedComments as $reportedComment){
	        ?>

				<div class="alert alert-danger">
					<h4> <?= $reportedComment->author ?></h4>
					<em> <?= $reportedComment->comment_date ?></em>
					<p> <?= $reportedComment->comment ?></p>
													<form action="index.php?action=deleteComment&amp;id=<?= $reportedComment->id ?>" method="post">
									<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
								</form>
		
				</div>
			  

        <?php
        	}
        }
        ?>
	</div>

	
</div>



<script type="text/javascript" src="./public/js/comments.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require('view/template/template.php'); ?>
<?php
$_SESSION['newComments'] = 0;
?>