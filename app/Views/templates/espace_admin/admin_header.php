<!-- Importation Bootstrap/jQuery/Fontawesome -->
<?php echo $this->include('importation/importation_BootstrapJQueryFontAwesome.php');?>

<!-- Menu NAVBAR USER -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-0 ">
    <div class="container">
    <i class="fas fa-cut text-white mr-1"></i>
      <a href="/BeautyHair/Home/index" class="navbar-brand">Beauty Hair</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav">
          <li class="nav-item px-2">
            <a href="/BeautyHair/AdminController/dashboard" class="nav-link active">Dashboard</a>
          </li>
          <li class="nav-item px-2">
            <a href="/BeautyHair/Home/index" class="nav-link">Retour sur le site</a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown mr-3">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
              <i class="fas fa-user"></i> Bienvenue <?php echo $_SESSION["user"]->firstname ?>
            </a>
            <div class="dropdown-menu">
              <a href="/BeautyHair/AdminController/admin_edit_profile" class="dropdown-item" data-toggle="dropdown-item">
                <i class="fas fa-user-circle"></i> Profile 
            </a>
            <a href="#" class="dropdown-item" data-toggle="dropdown-item">
              <i class="fas fa-cog"></i> Options
            </a>
            </div>
          </li>
          <li>
          <li class="nav-item">
            <a href="/BeautyHair/AuthentificationController/Deconnexion" class="nav-link">
              <i class="fas fa-user-times"></i>  Se déconnecter
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header id="main-header" style="background-color:#132644;" class="py-2  text-white">
    <div class="container">
      <div class="row" >
        <div class="col-md-6">
          <h1>          
          <i class="fas fa-user mr-1"> </i>
            Espace administrateur
          </h1> 
        </div>
      </div>
    </div>
  </header>


  <!-- NavBar For Small/Medium Screens -->
<nav class="navbar navbar-expand-lg navbar-light bg-light d-lg-none d-xl-none d-md-none border-bottom mb-2">
  <a class="navbar-brand mx-auto col-12 text-center" href="#">Panneau d'administration</a>
  
  <button class="navbar-toggler mx-auto mb-3" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">


<!-- Separator with title -->
<div class="row justify-content-center">
      <div class="col-10 text-center">
      <li class=" mt-4 m-2   d-flex align-items-center menu-collapsed  border-bottom">
                <small class="mx-auto">Dashboard</small>
            </li>
            <!-- /END Separator -->
      </div>
      </div>

      <div class="row">

          <li class="col-6">
            <a href="/BeautyHair/AdminController/dashboard" class="list-group-item list-group-item-action flex-column align-items-start ">
                <div class="d-flex w-100 justify-content-center align-items-center">
                
                    <span> <i class="fas fa-tachometer-alt mr-3"></i> </span> 
                    <span class="menu-collapsed">Dashboard</span>

                </div>
            </a>
          </li>

          <li class="col-6">
            <a href="/BeautyHair/AdminController/admin_edit_profile" class="list-group-item list-group-item-action flex-column align-items-start ">
                <div class="d-flex w-100 justify-content-center align-items-center">
                
                    <span> <i class="fa fa-user fa-fw mr-3"></i> </span> 
                    <span class="menu-collapsed">Profile</span>

                </div>
            </a>
          </li>
      </div>
      

      <!-- Separator with title -->
      <div class="row justify-content-center">
      <div class="col-10 text-center">
      <li class=" mt-4 m-2   d-flex align-items-center menu-collapsed  border-bottom">
                <small class="mx-auto">Gestion</small>
            </li>
            <!-- /END Separator -->
      </div>
      </div>
      



      <div class="row">

          <li class="col-6">
            <a href="/BeautyHair/AdminController/admin_show_users" class="list-group-item list-group-item-action flex-column align-items-start ">
                <div class="d-flex w-100 justify-content-center align-items-center">
                
                    <span> <i class="fas fa-user mr-3"></i> </span> 
                    <span class="menu-collapsed">Utilisateurs</span>

                </div>
            </a>
          </li>

          <li class="col-6">
            <a href="/BeautyHair/AdminController/admin_show_salons" class="list-group-item list-group-item-action flex-column align-items-start ">
                <div class="d-flex w-100 justify-content-center align-items-center">
                
                    <span> <i class="fas fa-store-alt mr-3"></i> </span> 
                    <span class="menu-collapsed">Salons</span>

                </div>
            </a>
          </li>
          
      </div>



      <div class="row mt-2">

          <li class="col-6">
            <a href="/BeautyHair/AdminController/admin_show_specialities" class="list-group-item list-group-item-action flex-column align-items-start ">
                <div class="d-flex w-100 justify-content-center align-items-center">
                
                    <span> <i class="fas fa-graduation-cap mr-3"></i> </span> 
                    <span class="menu-collapsed">Spécialités</span>

                </div>
            </a>
          </li>

          <li class="col-6">
            <a href="/BeautyHair/AdminController/admin_show_appointments" class="list-group-item list-group-item-action flex-column align-items-start ">
                <div class="d-flex w-100 justify-content-center align-items-center">
                
                    <span> <i class="far fa-calendar-check mr-3"></i> </span> 
                    <span class="menu-collapsed">Rendez-vous</span>

                </div>
            </a>
          </li>
          
      </div>


      <div class="row mt-2">

          <li class="col-6">
            <a href="/BeautyHair/AdminController/admin_show_assign_specialities" class="list-group-item list-group-item-action flex-column align-items-start ">
                <div class="d-flex w-100 justify-content-center align-items-center">
                
                    <span> <i class="fas fa-graduation-cap mr-3"></i> </span> 
                    <span class="menu-collapsed">Assigner spécialité à un coiffeur</span>

                </div>
            </a>
          </li>
      
          <li class="col-6">
            <a href="/BeautyHair/AdminController/admin_show_assign_hairdresser_to_salon" class="list-group-item list-group-item-action flex-column align-items-start ">
                <div class="d-flex w-100 justify-content-center align-items-center">
                
                    <span> <i class="fas fa-graduation-cap mr-3"></i> </span> 
                    <span class="menu-collapsed">Assigner coiffeur à un salon</span>

                </div>
            </a>
          </li>
      
      </div>



      <div class="row mt-2 ">

          <li class="col-12 ">
            <a href="/BeautyHair/AdminController/admin_show_articles" class="list-group-item list-group-item-action flex-column align-items-start ">
                <div class="d-flex w-100 justify-content-center align-items-center ">
                
                  
                     <i class="fas fa-graduation-cap mr-3"></i> 
                    Articles
                  
                </div>
            </a>
          </li>
 
      </div>
          


    </ul>
   
  </div>
</nav>