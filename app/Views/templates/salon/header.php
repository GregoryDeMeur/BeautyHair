<!-- Importation Bootstrap/jQuery/Fontawesome -->
<?php echo $this->include('importation/importation_BootstrapJQueryFontAwesome.php');?>

 <!--Include CSS website -->
 <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/website.css'); ?>">

 <!--Include CSS salon -->
 <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/salon.css'); ?>">



<!-- Header 1 NavBar Login -->
<div id="nav-menu1" >

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="nav-menu1nav">
<a class="navbar-brand" href="/BeautyHair/Home/index">Retour sur BeautyHair</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContentTwo" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContentTwo">
<ul class="navbar-nav mr-auto">





</ul>


    <?php
    if($_SESSION["loggedin"])
    {         
        // Message de bienvenue au user qui est connecté
        echo '<h6 class="modal-title text-white">' ?>Bienvenue  <?php echo $_SESSION["user"]->firstname  . ' </h6>';

        switch($_SESSION["userRole"])
    {
        case 1:
         echo '<a class="nav-link text-white" href="/BeautyHair/UserController/user/dashboard">
               <i class="fas fa-user mr-1"></i>
               Espace membre
               <span class="sr-only">(current)</span>
               </a>'; 
          break;                      
        
        case 2:
         echo '<a class="nav-link text-white" href="/BeautyHair/HairdresserController/hairdresser/dashboard">
               <i class="fas fa-user mr-1"></i>
               Espace coiffeur<span class="sr-only">(current)</span>
               </a>'; 
          break;
        
        case 3:
         echo '<h6  class="modal-title  ml-3 mr-2">
               <a class="nav-link text-white" href="/BeautyHair/AdminController/dashboard">
               <i class="fas fa-user mr-1"></i>
               Espace Admin<span class="sr-only">(current)</span>
               </a>
               </h6>';
          break;


    }
        echo '<h6 class="modal-title  ">
              <a  class="nav-link text-white" href="/BeautyHair/AuthentificationController/deconnexion">
              <i class="fas fa-user-times text-white mr-1"></i>
              
              Se déconnecter
              </a>
              </h6>' ;

    }
    else 
    {
     
     ?>       <h6 class="modal-title">
              <a class="nav-link text-white" data-toggle="modal" data-target="#inscriptionModal">           
              <i class="fas fa-user-plus mr-2"></i>
              
              Inscription    
              </a>
              </h6>

              <h6 class="modal-title text-white">
              <a class="nav-link text-white" href="/BeautyHair/Home/login">
              <i class="fas fa-user mr-2"></i>
              Se connecter
              </a> 
              </h6>
<?php }
    ?>

</div>
</div>
</nav>
<!-- End Header 1 NavBar Login -->



<!-- Carousel -->

  <!-- Boucle qui va récupérer les photos et les petits indicateurs et les placer dans un carousel -->
    

  <div id="carouselSalon" class="carousel slide" data-ride="carousel">

  <ol class="carousel-indicators"> 
  <?php $i==0;?>
   <?php foreach($photo as $rowList)
   {
    if($i == 0)
    {?>
      <li data-target="#carouselSalon" data-slide-to="0" class="active bg-white"></li>
      <?php  $i++ ;
    } elseif($i>0)
    {?>
      <li data-target="#carouselSalon" data-slide-to="<?php echo $i?>" class="bg-white"></li>
      <?php $i++;?>
<?php }
   }?>
      
  </ol>

  <div class="carousel-inner">
    <?php $j==0;?>      
     <?php foreach($photo as $rowPhoto)
     {
        if($j == 0)
        {?>
          <div class="carousel-item active">
          <img class="d-block w-100" src="<?php echo base_url() .$rowPhoto["photo"] ;?>" >
          </div><?php $j++;
        }
        elseif($j>0)
        {?>
          <div class="carousel-item">
          <img class="d-block w-100" src="<?php echo base_url() .$rowPhoto["photo"] ;?>" >
          </div><?php  $j++;       
        }
     }
     ?>
    
    
  <a class="carousel-control-prev" href="#carouselSalon" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselSalon" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>


  <!-- Fin de boucle recupération photos -->

<!-- End carousel -->










<!-- Header 2 NavBar Navigation Website -->
<div id="nav-menu2">  <!--class="sticky-top" -->

<nav class="navbar navbar-expand-lg navbar-light bg-light border p-4  text-white ">

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse " id="navbarSupportedContent">

<ul class="navbar-nav mr-auto mx-auto">

<li>
<a class="navbar-brand" href="/BeautyHair_v2/Home/index">Salon <?php echo $salon[0]['name'];?></a>
</li>

<li class="nav-item mx-3">
<a class="nav-link " href="/BeautyHair/SalonController/index/<?php echo $salon[0]['ID']?>">Accueil<span class="sr-only">(current)</span></a>
</li>
<li class="nav-item mx-3">
<a class="nav-link" href="/BeautyHair/SalonController/specialities/<?php echo $salon[0]['ID']?>">Carte des services<span class="sr-only">(current)</span></a>
</li>
<li class="nav-item mx-3">
<a class="nav-link" href="/BeautyHair/SalonController/contact/<?php echo $salon[0]['ID']?>">Accès/Contact<span class="sr-only">(current)</span></a>
</li>
<li class="nav-item mx-3">
<a class="nav-link" href="/BeautyHair/SalonController/team/<?php echo $salon[0]['ID']?>">Equipe<span class="sr-only">(current)</span></a>
</li>
<li class="nav-item mx-3">
<a class="nav-link" href="/BeautyHair/SalonController/appointments/<?php echo $salon[0]['ID']?>">Prendre rendez-vous<span class="sr-only">(current)</span></a>
</li>

</ul>





</nav>
</div>


<!-- Inscription Modal -->
<div class="modal fade" id="inscriptionModal">      
          
          <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-center">
        
          <h5 class="modal-title w-100">Inscription sur BeautyHair</h5>
          <button class="close" data-dismiss="modal">
            <span class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        
        <br />
        
            <!-- Form Inscription dans DB -->
            <form method="POST" action="/BeautyHair/RegisterController/register" div class="col-sm-12" class="needs-validation" novalidate="">

              <div class="form-group ">
                <label for="email">Adresse e-mail</label>
                <input type="email" class="form-control is-invalid" id="email" aria-describedby="emailHelp" placeholder="Entrez votre e-mail" name="email" required>
                <div class="invalid-feedback">Insérez un email valide</div>
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
              </div>
                
              <div class="form-group">
                <label for="password_confirm">Confirmer le password</label>
                <input type="password" class="form-control" id="password_confirm" placeholder="Confirmer le password" name="password_confirm">
              </div>
              
              <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="lastname" placeholder="Nom" name="lastname">
              </div>
              
              <div class="form-group">
                <label for="password">Prénom</label>
                <input type="text" class="form-control" id="firstname" placeholder="Prénom" name="firstname">
              </div>
                
              <div class="form-group">
                <label for="password">Adresse</label>
                <input type="text" class="form-control" id="address" placeholder="Adresse" name="address">
              </div>
                
              <div class="form-group">
                <label for="password">Telephone</label>
                <input type="text" class="form-control" id="telephone" placeholder="N° de téléphone" name="telephone">
              </div>
                

                
              

            <!-- Fin du formulaire inscription -->
       

                      <div class="modal-footer">
                      <div class="container">
                      <div class="row justify-content-center">
                      
                      
                      <button type="submit" class="btn btn-primary">S'inscrire</button>
            
                <button class="btn btn-danger text-white ml-4" data-dismiss="modal">Annuler</button>
                </div>
                </form>    
                      </div>
                      </div>
                      </div>
                      </div></div>
                      </div>

       
        <!-- END INSCRIPTION MODAL -->





</div>