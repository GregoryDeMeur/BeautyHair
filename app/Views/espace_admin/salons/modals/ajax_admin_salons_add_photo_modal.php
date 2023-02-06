
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


<div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-white" id="colorToChangeModal">
          <h5 class="modal-title">Ajout/Suppression photos salon</h5>
          <button class="close" data-dismiss="modal">
            <span class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body">



            <div class="card">
            <h4 class="card-header text-center">Ajouter/Supprimer une photo du salon</h4>
            <div class="card-body">
                

  

                <!-- Formulaire Delete Photo Salon -->
               <h1 class="text-center">Photo(s) du salon <?php echo $salon[0]['name']?></h1>
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
            <form method="POST" action="/BeautyHair/UploadPhotoSalonController/uploadPhotoSalon/<?php echo $salon[0]['ID']?>" enctype="multipart/form-data" id="uploadPhotoSalon">

                <input type="hidden" name="salonId" value="<?php echo $salon[0]['ID']?>">                
                <div class="form-group">
                <label for="photoSalon">Ajouter une photo</label>
                <input type="file" class="form-control-file" id="photoSalon" name="photoSalon">
                <button type="submit" class="btn text-white mr-3" id="colorToChangeModal">Ajouter la photo</button>
                </div>
            </form>
                <!-- Fin formulaire Ajout Photo Salon -->
                


                <div class="modal-footer">
                      <div class="container">
                      <div class="row justify-content-center">
                      
                      
                
                <button class="btn text-white" data-dismiss="modal">Retour à la liste des salons</button>
                </div>
            
            </div>
                      </div>
                


                

            </div>
        </div>
        </div>
        </div>
        </div>
        



 


        