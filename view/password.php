<?php $title = "Billet simple pour l'Alaska";
$bg="bg";
$classLog = "";
$classHome = "";
$classChapter = "";
$classComment = "";

ob_start(); ?>
<div class="caption">
	<div>
		<h2>Changer mon mot de passe</h2>
	</div>

	       <!--         alert          --> 
	    <?php require('view/template/alert.php'); ?>
	    <!--        ////////        -->

		<div class="row justify-content-md-center margin-0">
		    <div class="col-md-3">
		        <form class="form-group" action="index.php?action=sendPassword" method="post">
		        	<div class="form-group">
		                <label for="account"></label>
		                <input type="email" class="form-control center-text" id="email" name="email" placeholder="Email" required  value="<?php if(isset($email)){echo($email);}?>" /> 
		            </div>
		            <br>
		            <button type="submit" class="btn btn-primary">Envoyer</button>
		            
		        </form>

		    </div>
		</div>
</div>
<?php $content = ob_get_clean(); ?>


<?php require('view/template/template.php'); ?>
