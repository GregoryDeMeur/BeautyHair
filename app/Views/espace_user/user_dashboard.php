<!DOCTYPE html>
<html lang="fr">

	<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard</title>
  </head>

<body>

  <!--Include User NavBar -->
  <?php echo $this->include('templates/espace_user/user_header.php') ;?>
  
  <!-- Boutons d'action -->
  <section id="actions" class="py-4 mb-4 bg-light ">

    <div class="container">
      <div class="row">

        <div class="col-md-3 ">
          <a href="/BeautyHair/UserController/user/user_edit_profile" class="btn btn-primary btn-block " >
          <i class="fas fa-user-cog mr-1"></i></i> Editer profil
          </a>     
        </div>    
 
        <div class="col-md-3">
          <a href="/BeautyHair/UserController/user/user_consultation_appointments" class="btn btn-warning btn-block ">
            <i class="far fa-calendar mr-1"></i> Consulter vos rendez-vous
          </a>         
        </div>

        <div class="col-md-3 ">
          <a href="/BeautyHair/UserController/user/user_statistiques" class="btn btn-success btn-block ">
          <i class="fas fa-calculator mr-1"></i> Statistiques
          </a>    
        </div>

        <div class="col-md-3 ">
          <a href="/BeautyHair/Home/index" class="btn btn-danger btn-block ">
          <i class="fas fa-sign-out-alt"></i> Retour sur le site BeautyHair
          </a>    
        </div>

      </div>
    </div>
   
  </section>



  <div class="mainField border text-center">

<br />
<br />
<h4>
    <?php
     if($_SESSION["loggedin"])
     {
        echo 'Vous êtes connecté en tant que '. $_SESSION["user"]->lastname . ' ' . $_SESSION["user"]->firstname ;
        echo '<br />' ;
    
     }
     else 
     {
         echo 'Vous n\'êtes pas connecté !';
         echo '<br />';
         echo 'Cliquez <a href="/BeautyHair_v2/Home/Connexion">ici</a> pour vous connecter.';
 

     }

    ?>
       
</h4>
<br />
<br />

    
    
</div>

<!-- Include User Footer -->
<?php echo $this->include('templates/espace_user/user_footer_sticky_bottom.php') ;?>
</body>
</html>