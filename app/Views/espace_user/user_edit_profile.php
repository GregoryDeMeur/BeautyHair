<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Editer profile</title>
  <!--Include User NavBar -->
  <?php echo $this->include('templates/espace_user/user_header.php') ;?>
</head>

<body>
 

  <!-- ACTIONS -->
  <section id="actions" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <a href="/BeautyHair/UserController/user/dashboard" class="btn btn-light btn-block">
            <i class="fas fa-arrow-left mr-1"></i> Retour au dashboard
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- PROFILE -->

      

  <div class="mt-3 container">

   <!-- Confirmation success/error lors d'une édition de son profil -->
   <div class="row ">
        
        <!-- Error -->
        <div class="col-12 ">
        <?php if (isset($_SESSION['errorLogUser'])): ?>  
          <div class="alert alert-danger mt-2 col-12 text-center" role="alert">
        <?php foreach($_SESSION["errorLogUser"] as $error): ?>
                  <p><?php echo $error ?></p>
        <?php endforeach; ?>
  
        <?php endif; unset($_SESSION['errorLogUser']);?>
        </div>

        <!-- Success -->
        <div class="col-12 ">
        <?php if (isset($_SESSION['successLogUser'])): ?>  
          <div class="alert alert-success mt-2 col-12 text-center" role="alert">
        <?php foreach($_SESSION["successLogUser"] as $success): ?>
                  <p><?php echo $success ?></p>
        <?php endforeach; ?>
  
        <?php endif; unset($_SESSION['successLogUser']);?>
        </div>   

    </div>

 <!-- Fin de Confirmation success/error lors d'une suppression/edition/ajout d'un salon -->  

 
      <div class="row">
        <div class="col-md-9">
          <div class="card">
            <div class="card-header">
              <h4>Modifier vos informations de compte</h4>
            </div>
            <div class="card-body">
              <!-- Formulaire edit profile -->
              <form method="POST" action="/BeautyHair/UserController/user_edit_own_profile">

                <input type="hidden" name="userId" value="<?php echo $_SESSION["user"]->ID?>">


                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" value="<?php echo $_SESSION["user"]->email ?>" name="emailUser">
                </div>

                <div class="form-group">
                  <label for="name">Nom</label>
                  <input type="text" class="form-control" value="<?php echo $_SESSION["user"]->lastname ?>" name="lastnameUser">
                </div>

                <div class="form-group">
                  <label for="prenom">Prénom</label>
                  <input type="text" class="form-control" value="<?php echo $_SESSION["user"]->firstname ?>" name="firstnameUser">
                </div>                

                <div class="form-group">
                  <label for="adresse">Adresse</label>
                  <input type="text" class="form-control" value="<?php echo $_SESSION["user"]->address ?>" name="addressUser">
                </div>

                <div class="form-group">
                  <label for="tel">Téléphone</label>
                  <input type="text" class="form-control" value="<?php echo $_SESSION["user"]->telephone ?>" name="telephoneUser">
                </div>
              
                <div class="modal-footer">
                <div class="container">
                <div class="row justify-content-center">
                      
                      
                <button type="submit" class="btn btn-primary text-white mr-3 mt-3" >Modifier vos informations</button>
                </div>
                    
                </div>
                </div>
                </form>


            </div>
          </div>


                   
        </div>

       
 

        <div class="col-md-3">
          <!-- Avatar -->
          <!-- Affichage de l'avatar -->
          <img src="<?php echo base_url() . $_SESSION['user']->avatar ;?>"  class="d-block img-fluid mb-3">

          <!-- Changer avatar -->
          <form action="/BeautyHair/UploadAvatarController/uploadUserAvatar/<?php echo $_SESSION['user']->ID?>" method="POST" enctype="multipart/form-data">
          Changer d'avatar
          <input type="file" name="userAvatar" id="userAvatar" type="file">
          <button class="btn btn-primary btn-block" type="submit" name="fileToUpload" id="fileToUpload">Changer votre avatar</button>
          
          
          </form>

          <!-- Supprimer avatar -->
          <a href="/BeautyHair/UploadAvatarController/deleteUserAvatar/<?php echo $_SESSION['user']->ID;?>" class="btn btn-danger btn-block mt-1">            
          Supprimer votre avatar       
          </a>

 


</div>

  

</div>





</div>

</div>


<!-- Include User Footer -->
<?php echo $this->include('templates/espace_user/user_footer.php') ;?>


<!------------------------------------------------------------------------------------------------------------------>




<!-- User Desactive Modal -->
<div class="modal fade" id="userDesactiveModal">      
                        
          <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-white" id="colorToChangeModal">
          <h5 class="modal-title">Désactivation de votre compte</h5>
          <button class="close" data-dismiss="modal">
            <span class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body">

         
        
          <div class="card">
            <h4 class="card-header text-center">Désactivation de votre compte</h4>
            <div class="card-body">
               
                      
            <div class="text-center">
            <h3>Voulez-vous vraiment désactiver votre compte ?</h3>
          </div> 
                      
                     

          

                <div class="modal-footer">
                <div class="container">
                <div class="row justify-content-center">
                      
                <a href="/BeautyHair/UserController/user_desactivate_profile">      
                <button class="btn btn-danger text-white mr-3">
                <i class="fas fa-user-slash mr-1"></i>
                Désactiver votre compte
                </button>
                </a>
                <button  class="btn btn-primary ml-4" data-dismiss="modal">Retour sans désactivation</button>
                </div>
                </form>    
                      </div>
                      </div>

</div>
</div>
</div>

                      
</div>
</div>
</div>
</div>
<!-------End User Desactive Modal----------->



<!------------------------------------------------------------------------------------------------------------------>

</body>

</html>