<!DOCTYPE html>
<html lang="fr">

	<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard</title>
  </head>

<body>

  <!--Include Hairdresser NavBar -->
  <?php echo $this->include('templates/espace_hairdresser/hairdresser_header.php') ;?>
  
  

    <!-- Boutons d'action si  coiffeur = GERANT -->
    <?php if ($_SESSION["salonOwner"] == 1) 
  {?>
  
    

   
     

      <nav class="navbar navbar-expand-lg navbar-dark bg-secondary p-4  text-white border">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">

          <ul class="navbar-nav mr-auto mx-auto">

          <li>
          <a class="navbar-brand" ><?php echo $_SESSION["salon"]["name"];?></a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Gestion Salon
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

              <a class="dropdown-item" href="/BeautyHair/HairdresserController/hairdresser/manager_consultation_all_appointments"> <i class="far fa-calendar-alt mr-2"></i>Consulter/Supprimer rendez-vous
              </a>

              <a class="dropdown-item" href="/BeautyHair/HairdresserController/hairdresser/manager_change_informations_of_the_salon"><i class="far fa-file-alt mr-2"></i>Changer informations du salon
              </a>

              <a class="dropdown-item" href="/BeautyHair/HairdresserController/hairdresser/manager_change_photos_of_the_salon"><i class="far fa-image mr-2"></i>Ajouter/Supprimer photos du salon
              </a>

              <a class="dropdown-item" href="/BeautyHair/HairdresserController/hairdresser/manager_change_schedule_of_the_salon"><i class="far fa-clock mr-2"></i>Modifier horaires du salon
              </a>

          </li>
          

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Gestion Personnel
            </a>
            
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/BeautyHair/HairdresserController/hairdresser/manager_show_hairdressers_of_the_salon"><i class="fas fa-user mr-2"></i>Consulter/Supprimer coiffeurs
              </a>
                 
          </li>

          </ul>

        </div>
      </nav>

<div class="container">

           <div class="row my-3">

           <div class="col-md-3 ">
          <a href="/BeautyHair/HairdresserController/hairdresser/hairdresser_edit_profile" class="btn btn-primary btn-block " >
          <i class="fas fa-user-cog mr-1"></i></i> Editer profil
          </a>     
        </div>    
 
        <div class="col-md-3">
          <a href="/BeautyHair/HairdresserController/hairdresser/hairdresser_consultation_appointments" class="btn btn-warning btn-block ">
            <i class="far fa-calendar mr-1"></i> Consulter vos rendez-vous
          </a>         
        </div>

        <div class="col-md-3 ">
          <a href="/BeautyHair/HairdresserController/hairdresser/hairdresser_statistiques" class="btn btn-success btn-block ">
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

</div>  
  

<?php } 

else 
{?>
  <!-- Boutons d'action -->
  <section id="actions" class="py-4  bg-light ">

    <div class="container">
      <div class="row">

        <div class="col-md-3 ">
          <a href="/BeautyHair/HairdresserController/hairdresser/hairdresser_edit_profile" class="btn btn-primary btn-block " >
          <i class="fas fa-user-cog mr-1"></i></i> Editer profil
          </a>     
        </div>    
 
        <div class="col-md-3">
          <a href="/BeautyHair/HairdresserController/hairdresser/hairdresser_consultation_appointments" class="btn btn-warning btn-block ">
            <i class="far fa-calendar mr-1"></i> Consulter vos rendez-vous
          </a>         
        </div>

        <div class="col-md-3 ">
          <a href="/BeautyHair/HairdresserController/hairdresser/hairdresser_statistiques" class="btn btn-success btn-block ">
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
<?php }?>


  <div class="container mt-5">
  <div class="row justify-text-center">
  <div class="col">

<br />
<br />
<h4 class="text-center">
    <?php
     if($_SESSION["loggedin"])
     {
        echo 'Bienvenue sur votre espace coiffeur, '. $_SESSION["user"]->lastname . ' ' . $_SESSION["user"]->firstname ;
        echo '<br />';
        if ($_SESSION["salonOwner"] == 1) { echo "Vous êtes gérant du salon \"". $_SESSION["salon"]["name"] ."\"";} else {echo "vous n'êtes pas gérant";}
     }
     else 
     {
         echo 'Vous n\'êtes pas connecté !';
         echo '<br />';
         echo 'Cliquez <a href="/BeautyHair/Home/Connexion">ici</a> pour vous connecter.';
 

     }

    ?>
       
</h4>

<br />
<br />
<br />  
    
</div>
</div>
</div>


  

<!-- Include User Footer -->
<?php echo $this->include('templates/espace_hairdresser/hairdresser_footer_sticky_bottom.php') ;?>
</body>
</html>