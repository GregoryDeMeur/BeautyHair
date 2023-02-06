<!DOCTYPE html>
<html lang="fr">

	<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Editer profile</title>
  <!--Include User NavBar -->
  <?php echo $this->include('templates/espace_admin/admin_header.php') ;?>
  <!--Include CSS de l'espace admin -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/espace_admin.css'); ?>">
  
  
        

  </head>

<body>





<!-- Side NavBarDashBoard -->

<?php echo $this->include('templates/espace_admin/admin_sidebar.php');?>

   <!-- MAIN -->
   <div class="col mt-5 ">
        <div class="row justify-content-center">
        <div class="col-10 ">
            
                
               <!-- PROFILE -->

    <div class="mt-3 container">
      <div class="row">
        <div class="col-md-9">
          <div class="card">
            <div class="card-header">
              <h4>Modifier vos informations de compte</h4>
            </div>
            <div class="card-body">
              <!-- Formulaire edit profile -->
              <form method="POST" action="/BeautyHair/AdminController/admin_edit_own_profile">

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
                      
                      
                <button type="submit" class="btn text-white mr-3 mt-3" id="colorToChangeModal">Modifier vos informations</button>
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

       <!-- Confirmation success/error lors d'une suppression/edition/ajout d'un utilisateur -->
       <div class="row">
        
        <!-- Error -->
        <div class="col-9 ">
        <?php if (isset($_SESSION['errorLogUser'])): ?>  
          <div class="alert alert-danger mt-2 col-12 text-center" role="alert">
        <?php foreach($_SESSION["errorLogUser"] as $error): ?>
                  <p><?php echo $error ?></p>
        <?php endforeach; ?>
  
        <?php endif; unset($_SESSION['errorLogUser']);?>
        </div>

        <!-- Success -->
        <div class="col-9 ">
        <?php if (isset($_SESSION['successLogUser'])): ?>  
          <div class="alert alert-success mt-2 col-12 text-center" role="alert">
        <?php foreach($_SESSION["successLogUser"] as $success): ?>
                  <p><?php echo $success ?></p>
        <?php endforeach; ?>
  
        <?php endif; unset($_SESSION['successLogUser']);?>
        </div>   

    </div>

 <!-- Fin de Confirmation success/error lors d'une suppression/edition/ajout d'un utilisateur-->
    </div>
 



       

    </div><!-- Main Col END -->
    
</div><!-- body-row END -->
 
</div><!-- container -->
<!-- -->
       
</h4>
<br />
<br />


<!-- Include User Footer -->
<?php echo $this->include('templates/espace_admin/admin_footer.php') ;?>
</div>
</body>
</html>