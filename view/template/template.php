<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
       

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

         <link href="./public/css/style.css" rel="stylesheet" type="text/css" /> 

            <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="./public/images/favicon.png">

    </head>
        
    <body>

   	<div class="container">
   	<!-- 		Nav menu 		-->
      <?php require('nav.php'); ?>
    <!-- 		////////		-->
      <?= $content ?>
    </div>
       <Button  id="goTop" class="btn btn-outline-secondary"><i class="fas fa-angle-up"></i></Button>
        <script type="text/javascript" src="./public/js/goTop.js"></script>
        
    </body>
</html>