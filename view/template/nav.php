<nav id="nav"class="navbar navbar-expand-sm bg-dark navbar-dark ">

    <a class="navbar-brand" href="./index.php">Billet simple pour l'Alaska</a>

  
    <ul class="navbar-nav  ml-auto">
      <li class="menu nav-item"> <a class="nav-link  <?= $classHome ?>" href="./index.php">Accueil</a> </li>
      
      <?php   if (isset($_SESSION['id']) && isset($_SESSION['account'])){ ?>
        <li class="menu nav-item"> <a class="nav-link <?= $classChapter ?>" href="./index.php?action=newChapter">Nouveau chapitre</a> </li>
        <li class="menu nav-item"> <a class="nav-link <?= $classComment ?>" href="./index.php?action=allComments">Commentaires  
        <?php 
          if($_SESSION['newComments'] > 0)
          {
        ?>
          <span class="badge badge-danger">
          
            <?= $_SESSION['newComments'] ?>
          
          </span>
        <?php
          }
        ?>
        </a> </li>
        <li class="menu nav-item"> <a class="nav-link <?= $classLog ?>" href="./index.php?action=disconect">Déconnection</a> </li>
      
      <?php }
      else{  ?>
        <li class="menu nav-item"> <a class="nav-link <?= $classLog ?>" href="./index.php?action=login">Connection</a> </li>
      
      <?php } ?>
      <li>
        <i id="menu" class="nav-item fas fa-bars"></i>
     
      </li>
      
    </ul>

</nav>

<!-- mobile -->
<div id="menu-content" >
  <nav id="nav"class="navbar  bg-dark navbar-dark ">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item"> <a class="nav-link  <?= $classHome ?>" href="./index.php">Accueil</a> </li>
      
      <?php   if (isset($_SESSION['id']) && isset($_SESSION['account'])){ ?>
        <li class="nav-item"> <a class="nav-link <?= $classChapter ?>" href="./index.php?action=newChapter">Nouveau chapitre</a> </li>
        <li class="nav-item"> <a class="nav-link <?= $classComment ?>" href="./index.php?action=allComments">Commentaires  
        <?php 
          if($_SESSION['newComments'] > 0)
          {
        ?>
          <span class="badge badge-danger">
          
            <?= $_SESSION['newComments'] ?>
          
          </span>
        <?php
          }
        ?>
        </a> </li>
        <li class="nav-item"> <a class="nav-link <?= $classLog ?>" href="./index.php?action=disconect">Déconnection</a> </li>
      
      <?php }
      else{  ?>
        <li class="nav-item"> <a class="nav-link <?= $classLog ?>" href="./index.php?action=login">Connection</a> </li>
      
      <?php } ?>
   
      
    </ul>
  </nav>
</div>
