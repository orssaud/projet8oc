<?php $title = "Billet simple pour l'Alaska";
$bg="bg";
$classLog = "";
$classHome = "";
$classChapter = "";
$classComment = "";
ob_start(); ?>
<div class="caption" id="recovery">
<h2>Entrez votre nouveau mot de passe</h2>

     <!--         alert          --> 
	    <?php require('view/template/alert.php'); ?>
	    <!--        ////////        -->

		<div class="row justify-content-md-center margin-0">
		    <div class="col-md-3">
		        <form class="form-group" action="index.php?action=newPassword" method="post">
		        	<div class="form-group">
		                <label for="account"></label>
		                <input type="email" class="form-control center-text" id="email" name="email" placeholder="Email" required  value="<?php if(isset($email)){echo($email);}?>"  /> 
		            </div>
		           <div class="form-group">
		                <label for="account"></label>
		                <input type="text" class="form-control center-text" id="key" name="key" placeholder="Clé de sécurité" required  value="<?php if(isset($key)){echo($key);}?>"  /> 
		            </div>
		           
		            <div class="form-group">
		                <label for="account"></label>
		                <input type="Password" class="form-control center-text" id="password" name="password" placeholder="Mot de passe" required  value="<?php if(isset($password)){echo($password);}?>"  /> 
		            </div>
		            
		            <div class="form-group">
		                <label for="account"></label>
		                <input type="Password" class="form-control center-text" id="confirmPassword" name="confirmPassword" placeholder="Confirmer le mot de passe" required value="<?php if(isset($confirmPassword)){echo($confirmPassword);}?>"   /> 
		            </div>
		            <br>
		            <button type="submit" class="btn btn-primary">Valider</button>
		            
		        </form>

		    </div>
		</div>
</div>
<?php $content = ob_get_clean(); ?>


<?php require('view/template/template.php'); ?>
