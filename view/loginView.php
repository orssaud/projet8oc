<?php $title = "Billet simple pour l'Alaska"; 
 $classLog = "active"; 
 $classHome = "";
 $classChapter = ""; 
 $classComment = "";
 ?>


<?php ob_start(); ?>

<div class="row">
    <div class="col-lg-offset-4 col-lg-4">
        <form class="form-group" action="index.php?action=login" method="post">
            <div class="form-group">
                <label for="account">Account</label><br />
                <input type="text" class="form-control" id="account" name="account" placeholder="Account"/>
            </div>
            <div class="form-group">
                <label for="password">Password</label><br />
                <input type="password" class="form-control" id="password" name="password" placeholder="Password"/>
            </div>
            
            <button type="submit" class="btn btn-primary">Connection</button>
            
        </form>

    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/template/template.php'); ?>
