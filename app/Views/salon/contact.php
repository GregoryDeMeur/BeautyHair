<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Salon <?php echo $salon[0]['name'];?> - Contact</title>
</head>

<body>
  
  <!-- Importation website Header -->
  <?php echo $this->include('templates/salon/header.php');?>



  <!-- Acces/contact -->
  <div class="container">

  <div class="row mt-3 ">
  <div class="col text-center">
  <?php echo $salon[0]['google_map'];?>
 
  </div>
  <br />
  
  </div>
  <div class="row mt-3">
  <a class="mx-auto btn btn-info" href="mailto:<?php echo $salon[0]['email']?>?body=Entrez votre message ici">Nous contacter</a>
  </div>

  

  


 <!-- Importation salon Footer -->
 <?php echo $this->include('templates/salon/footer.php');?>
 

</body>
</html>