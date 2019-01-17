<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Billet simple pour l'Alaska" />
    <meta name="twitter:description" content="Un livre de Jean Forteroche" />
    <meta name="twitter:image" content="http://www.orssaud.ovh/projet8/public/images/montagne.jpg" />
    <meta name="twitter:url" content="http://www.orssaud.ovh/projet8" />
    <meta name="description" content="Les chapitres en ligne de Billet simple pour l'Alaska, Un livre de Jean Forteroche">
    <meta name="author" content="Jean Forteroche">
    <meta property="og:title" content="Billet simple pour l'Alaska" />
    <meta property="og:type" content="site web" />
    <meta property="og:url" content="http://www.orssaud.ovh/projet8" />
    <meta property="og:image" content="http://www.orssaud.ovh/projet8/public/images/montagne.jpg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">


    <title><?= $title ?></title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="./public/css/style.css" rel="stylesheet" type="text/css" />
    
    
    <link rel="shortcut icon" type="image/x-icon" href="./public/images/favicon.png">
  </head>
  
  <body>
    
    <!--    Nav menu    -->
    <?php require('nav.php'); ?>
    <!--    ////////    -->



    <div class="<?= $bg ?>"></div>


    
    <?= $content ?>
    
    <Button  id="goTop" class="btn btn-outline-secondary"><i class="fas fa-angle-up"></i></Button>
    <script type="text/javascript" src="./public/js/goTop.js"></script>
    <script type="text/javascript" src="./public/js/menu.js"></script>
    
    <footer>
      <p>Un livre de Jean Forteroche</p>
      <p>Technical contact : <a href="mailto:orssaudgeorges@gmail.com">
      orssaudgeorges@gmail.com</a></p>
    </footer>
  </body>
</html>