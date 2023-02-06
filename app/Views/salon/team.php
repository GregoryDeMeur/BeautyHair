<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Salon <?php echo $salon[0]['name'];?> - Equipe</title>
</head>

<body>
  
  <!-- Importation salon Header -->
  <?php echo $this->include('templates/salon/header.php');?>

  <!-- L'équipe -->
  <div class="container text-center">
  <h1 class="mt-3 mb-4"> L'équipe </h1>
  <?php 
  // On va faire correspondre chaque hairdresser à son enregistrement de la table User, puis display ses informations
  foreach($hairdresser as $rowOne)
  {
    foreach($user as $rowTwo)
      {
        if ($rowOne['ID_hairdresser'] == $rowTwo['ID'])
           {
              ?>
           
           
    <div class="row mx-auto my-3">   

              <div class="card mx-auto">     
                <h4 class="card-header text-center"><?php echo $rowTwo['firstname'] . ' ' . $rowTwo['lastname'];?></h4>  
                 
            
                  <div class="card-body">
                  
                      
                        <img src="<?php echo base_url(). $rowTwo['avatar'] ?>" width="200px" height="200px" class="d-block img-fluid mb-3 mx-auto">
                      
                          <!-- Affichage de chaque spécialité du coiffeur en question -->
                          Spécialité(s): <br />
                          <?php foreach($speciality as $rowThree)
                            {
                                if($rowThree->ID == $rowTwo["ID"])
                                {
                                   echo '• ' . $rowThree->speciality_name . '<br />';
                                }
                                else
                                {

                                }
                            }?>
                          
                   

                  </div> <!-- Card Body -->  
                
              </div> <!-- Card -->
              
          
        </div> <!-- End div row -->
        
              
     <?php }
      }
  }?>
    
  </div> <!-- End div container -->


 <!-- Importation salon Footer -->
 <?php echo $this->include('templates/salon/footer.php');?>

</body>
</html>