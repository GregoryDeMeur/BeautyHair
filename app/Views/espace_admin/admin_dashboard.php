<!DOCTYPE html>
<html lang="fr">

	<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard Admin</title>
  <!--Include User NavBar -->
  <?php echo $this->include('templates/espace_admin/admin_header.php') ;?>
  <!--Include CSS de l'espace admin -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/espace_admin.css'); ?>">
  
        

  </head>

<body>





<!-- Side NavBarDashBoard -->

<?php echo $this->include('templates/espace_admin/admin_sidebar.php');?>

   <!-- MAIN -->
   <div class="col text-center mt-4">
        
        <h1>
            Dashboard Administration
            
        </h1>

        <div class="col-md-12">

<br />
<br />
<h4 class="text-center">
    <?php
     if($_SESSION["loggedin"])
     {
        echo 'Vous êtes connecté en tant que '. $_SESSION["user"]->firstname . ' ' . $_SESSION["user"]->lastname ;
        echo '<br />' ;
        echo 'Cliquez <a href="/BeautyHair/Authentification/deconnexion">ici</a> pour vous déconnecter' ;
      
     }
     else 
     {
         echo 'Vous n\'êtes pas connecté !';
         echo '<br />';
         echo 'Cliquez <a href="/BeautyHair_v2/Home/Connexion">ici</a> pour vous connecter.';
 
     }

    ?>

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
</body>
</html>