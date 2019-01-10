<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
        <link <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    </head>
        
    <body>

   	<div class="container">
   	<!-- 		Nav menu 		-->
      <?php require('template/nav.php'); ?>
    <!-- 		////////		-->
      <?= $content ?>
    </div>
        
    </body>
</html>