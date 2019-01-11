<?php $title = "Billet simple pour l'Alaska";
$bg="bg";
$classLog = "active";
$classHome = "";
$classChapter = "";
$classComment = "";
?>
<?php ob_start(); ?>
<div class="caption">
    <div class="row justify-content-md-center margin-0">
        <div class="col-md-3">
            <form class="form-group" action="index.php?action=login" method="post">
                <div class="form-group">
                    <label for="account"></label>
                    <input type="text" class="form-control center-text" id="account" name="account" placeholder="Account" required autocomplete="off"/>
                </div>
                <div class="form-group">
                    <label for="password"></label>
                    <input type="password" class="form-control center-text" id="password" name="password" placeholder="Password" required autocomplete="off"/>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Connection</button>
                
            </form>
        </div>
    </div></div>
    <?php $content = ob_get_clean(); ?>
    <?php require('view/template/template.php'); ?>