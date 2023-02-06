<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>


</head>

<body>
  
  <!-- Importation Bootstrap/jQuery/Fontawesome -->
  <?php echo $this->include('importation/importation_BootstrapJQueryFontAwesome.php');?>

  <!-- Menu NAVBAR USER Connexion -->
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0 ">
      <div class="container">
      <i class="fas fa-cut text-white mr-1"></i>
        <a href="" class="navbar-brand">Beauty Hair</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav">
          <li class="nav-item px-2">
            <a href="/BeautyHair/Home/index" class="nav-link">Retour sur le site</a>
          </li>
          </ul>     
        </div>
      </div>
    </nav>

  <!-- Header -->
  <header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
      <div class="row" >
        <div class="col-md-6">
          <h1>          
          <i class="fas fa-user mr-1"> </i>
            Connexion
          </h1> 
        </div>
      </div>
    </div>
  </header>

  <!-- ACTIONS -->
  <section id="actions" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row">

      </div>
    </div>
  </section>

  <!-- LOGIN -->
  <section id="login">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-header">
              <h4>Connexion à votre compte</h4>
            </div>
            <div class="card-body">
              <form method="POST" action="/BeautyHair/AuthentificationController/login">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" name="email">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password">
                </div>
                <input type="submit" value="Se connecter" class="btn btn-primary btn-block">
              </form>
            </div>
            
          </div>
          <!-- Erreur de connexion -->
          <div class="row">
  <?php if (isset($_SESSION['errorLogin'])): ?>  
    <div class="alert alert-danger mt-2 col-12 text-center" role="alert">
    <?php foreach($_SESSION['errorLogin'] as $error): ?>
            <p><?php echo $error ?></p>
        <?php endforeach; ?>
    
<?php endif; unset($_SESSION['errorLogin']);?>
    </div>

    </div>
     <!-- Fin erreur -->
        </div>
        
      </div>

       

    </div>
  </section>

 
        



  <!-- Include User Footer -->
<?php echo $this->include('templates/website/footer.php') ;?>


</body>

</html>