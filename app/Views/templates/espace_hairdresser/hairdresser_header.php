<!-- Importation Bootstrap/jQuery/Fontawesome -->
<?php echo $this->include('importation/importation_BootstrapJQueryFontAwesome.php');?>

<!-- Menu NAVBAR USER -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0 ">
    <div class="container">
    <i class="fas fa-cut text-white mr-1"></i>
      <a href="/BeautyHair/Home/index" class="navbar-brand">Beauty Hair</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav">
          <li class="nav-item px-2">
            <a href="/BeautyHair/HairdresserController/hairdresser/dashboard" class="nav-link active">Dashboard</a>
          </li>
          <li class="nav-item px-2">
            <a href="/BeautyHair/Home/index" class="nav-link">Retour sur le site</a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown mr-3">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
              <i class="fas fa-user"></i> Bienvenue <?php echo $_SESSION["user"]->firstname  ?>
            </a>
            <div class="dropdown-menu">
              <a href="/BeautyHair/HairdresserController/hairdresser/hairdresser_edit_profile" class="dropdown-item" data-toggle="dropdown-item">
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
  <header id="main-header" class="py-2 bg-info text-white">
    <div class="container">
      <div class="row" >
        <div class="col-md-6">
          <h1>          
          <i class="fas fa-user mr-1"> </i>
            Espace coiffeur 
            <?php if ($_SESSION["salonOwner"] == 1)
            {
              echo ' manager';
            }
            else
            {

            }?>
          </h1> 
        </div>
      </div>
    </div>
  </header>