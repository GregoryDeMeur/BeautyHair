<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ajouter/supprimer des photos dans votre salon</title>

</head>

<body>
  <!--Include User NavBar -->
  <?php echo $this->include('templates/espace_hairdresser/hairdresser_header.php') ;?>

  <script>
// Requête AJAX qui permet d'ajouter une photo et réactualiser la page.
$("#uploadPhotoSalon").submit(function(e) {
  // alert('test ---> on est bien dans la fonction upload');
  e.preventDefault();
  var that = $(this);
  // On reprend l'action & method du formulaire en question
  url = that.attr('action');
  type = that.attr('method');
  // Assignation des spécialités sélectionnées par l'utilisateur dans une variable data
   var form = $('#uploadPhotoSalon')[0];
   var data = new FormData(form);
  
      $.ajax({
        url : url,
        type: type,
        data: data,
        enctype: 'multipart/form-data',
        processData: false,  
        contentType: false,
        cache: false,
        success: function(data){
          $("#listPhotosOfTheSalon").html(data);
        }
      });


});



function deletePhotoSalon(idPhoto)
{
 // alert('test idphoto = ' + idPhoto);

  $.ajax({
        url : "/BeautyHair/UploadPhotoSalonController/deletePhotoSalon/" + idPhoto,
        type: 'DELETE',
          
        success: function(data){
          $("#listPhotosOfTheSalon").html(data);
        }
      });

}




</script>

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
              <h4>Ajouter/Supprimer une photo dans votre salon</h4>
            </div>
            <div class="card-body">
              
            
           
                  <!-- Formulaire Delete Photo Salon -->
               <h1>Photo du salon <?php echo $salon[0]['name']?></h1>
               <div id="listPhotosOfTheSalon" class="table-responsive">
                      <table class="table thead-dark" style="border:1px solid black">
                      <thead style="border:1px solid black">
                        <tr>
                          <th style="border:1px solid black" class="text-center" scope="col">Photo</th> 
                          <th style="border:1px solid black" class="text-center" scope="col">Action</th>
                          
                        </tr>
                      </thead>
                      <tbody style="border:1px solid black;">
                          <?php
                          foreach ($photo as $row)
                          {
                                     
                             echo '<tr style="border:1px solid black">';
                             echo '<td class="align-middle text-center" style="border:1px solid black">'?><img id="<?php echo $row['ID']?>" src="<?php echo base_url() . $row['photo'];?>" width="200px" height="200px"/></td>
                             <?php echo '<td class="align-middle text-center" style="border:1px solid black"> '?>
                             <button onclick="deletePhotoSalon(<?php echo $row['ID']?>)" class="btn btn-danger"  id="deleteThisPhotoOfThisSalon<?php echo $row['ID']?>"><i class="fas fa-trash-alt fa-3x"></i></button>
                             
                             
                             <!-- Ici, lors d'un delete, on va envoyer le chemin d'accès à la photo en question -->
                             <!-- Vu qu'on envoie une URL, pour éviter tout conflit avec CodeIgniter et ses paramètres URI, on encode l'URL et on -->
                             <!-- la décode dans le controller lorsqu'on recevra le paramètre. -->
                             <!-- Pour bien faire, je dois delete tout ce form et ajouter un id dans l'img -->
                              
                            <?php
                            echo '</tr>';
                          }
                          ?>
                        </tbody>
                       </table>
                  </div>
                
                <!-- Fin formulaire Delete Photo Salon -->


                <!-- Formulaire Ajout Photo Salon -->
            <form method="POST" action="/BeautyHair/UploadPhotoSalonController/uploadPhotoSalon/<?php echo $_SESSION["salon"]["ID"]?>" enctype="multipart/form-data" id="uploadPhotoSalon">

                <input type="hidden" name="salonId" value="<?php echo $_SESSION["salon"]["ID"]?>">                
                <div class="form-group">
                <label for="photoSalon">Ajouter une photo</label>
                <input type="file" class="form-control-file" id="photoSalon" name="photoSalon">
                <button type="submit" class="btn text-white mr-3 btn-info">Ajouter la photo</button>
                </div>
            </form>
                <!-- Fin formulaire Ajout Photo Salon -->
                
            

            </div>
          </div>
        </div>
  
      </div>
    </div>


<br />
<br />



</body>

</html>