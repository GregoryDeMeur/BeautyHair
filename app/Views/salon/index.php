<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Salon <?php echo $salon[0]['name'];?></title>
</head>

<body>
  
  <!-- Importation salon Header -->
  <?php echo $this->include('templates/salon/header.php');?>

  <!-- Description du salon / Accueil -->
  <div class="container text-center my-5">
    
    <?php echo $salon[0]['description'];?>

  </div>

 <!-- Importation salon Footer -->
 <?php echo $this->include('templates/salon/footer.php');?>

</body>
</html>