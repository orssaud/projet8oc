<?php $title = "Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>


<form action="index.php?action=login" method="post">
    <div>
        <label for="account">account</label><br />
        <input type="text" id="account" name="account" />
    </div>
    <div>
        <label for="password">password</label><br />
        <input type="password" id="password" name="password" />
    </div>
    <div>
        <input type="submit" />
    </div>
</form>
<!--
<form action="login_POST.php" method="post">
 <p>Votre nom : <input type="text" name="nom" /></p>
 <p>Votre âge : <input type="text" name="age" /></p>
 <p><input type="submit" value="OK"></p>
</form>-->
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
