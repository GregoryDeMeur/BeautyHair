<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Changer informations salon</title>

</head>

<body>
  <!--Include User NavBar -->
  <?php echo $this->include('templates/espace_hairdresser/hairdresser_header.php') ;?>

  <!-- ACTIONS -->
  <section id="actions" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <a href="/BeautyHair/HairdresserController/hairdresser/dashboard" class="btn btn-light btn-block">
            <i class="fas fa-arrow-left mr-1"></i> Retour au dashboard
          </a>
        </div>
    
      </div>
    </div>
  </section>

  <!-- PROFILE -->

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header text-center">
              <h4>Changer les informations du salon</h4>
            </div>
            <div class="card-body">
              
            
                      
            <!-- Formulaire édition du salon -->
            <form method="POST" action="/BeautyHair/ManagerController/modifyInformationsSalon" <?php //enctype="multipart/form-data" ?>>


                <div class="form-group">
                <label for="salonName">Nom du salon</label>
                <input type="text" class="form-control" id="salonName" placeholder="Nom du salon" name="salonName" value="<?php echo $salon[0]['name']  ?>">
                </div>

                <div class="form-group">
                <label for="salonAddress">Adresse du salon</label>
                <input type="text" class="form-control" id="salonAddress" placeholder="Adresse du salon" name="salonAddress" value="<?php echo $salon[0]['address']  ?>">
                </div>            

                
                <div class="form-group">
                <label for="salonTelephone">Téléphone du salon</label>
                <input type="text" class="form-control" id="salonTelephone" placeholder="Téléphone du salon" name="salonTelephone" value="<?php echo $salon[0]['telephone']  ?>">
                </div>

                <div class="form-group">
                <label for="salonEmail">Email du salon</label>
                <input type="text" class="form-control" id="salonEmail" placeholder="Email du salon" name="salonEmail" value="<?php echo $salon[0]['email']  ?>">
                </div>
              
                
 
              
                
                <div class="form-group">
                <label for="salonDescription">Description</label>
                <textarea name="salonDescription" class="form-control" id="salonDescriptionModify"><?php echo $salon[0]['description'];?></textarea>         
                </div>

                <div class="form-group">
                <label for="salonGoogleMap">Google map</label>
                <textarea class="form-control" id="salonGoogleMap" rows="5" name="salonGoogleMap"><?php echo $salon[0]['google_map'] ?></textarea>
                </div>


                
            
                
</div>

                <div class="card-footer">
                      <div class="container">
                      <div class="row justify-content-center">
                      
                      
                <button type="submit" class="btn text-white mr-3" style="background-color: #223b64;">Modifier les données du salon</button>
                </form>
                <a href="/BeautyHair/HairdresserController/hairdresser/dashboard">
                <button class="btn btn-danger text-white ml-4" data-dismiss="modal">Annuler la modification</button>
                </a>
                </div>
            
            <!-- Fin formulaire édition salon -->
                
                
            

            </div>
          </div>
        </div>
  
      </div>
    </div>


<br />
<br />

  
<script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

<script> 
  // Remplacement du champs "body" par CKeditor
  CKEDITOR.replace('salonDescriptionModify');
</script>

</body>

</html>