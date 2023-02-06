<!-------Modify Speciality Modal----------->
<div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-white" id="colorToChangeModal">
          <h5 class="modal-title">Modifier une spécialité</h5>
          <button class="close" data-dismiss="modal">
            <span class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body">




        <div class="card">
            <h4 class="card-header">Modifier la spécialité</h4>
            <div class="card-body">
                <h2>Spécialité : "<?php echo $speciality[0]['speciality_name']?>"</h2>


                <!-- Formulaire éditer la spécialité -->
            <form method="POST" action="/BeautyHair/AdminSpecialityController/modifySpeciality" <?php //enctype="multipart/form-data" ?>>

                <input type="hidden" name="specialityId" value="<?php echo $speciality[0]['ID']?>">              

                <div class="form-group">
                <label for="specialityName">Nom de la spécialité</label>
                <input type="text" class="form-control" id="specialityName" placeholder="Nom de la spécialité" name="specialityName"  value="<?php echo $speciality[0]['speciality_name']  ?>">
                </div>

                <div class="form-group">
                <label for="specialityDescription">Description de la spécialité</label>
                <textarea class="form-control" id="specialityDescription" rows="4" name="specialityDescription"><?php echo $speciality[0]['description']?></textarea>
                </div>

                <div class="form-group">
                <label for="specialityPrice">Prix de la spécialité</label>
                <input type="number" class="form-control" id="specialityPrice" value="<?php echo $speciality[0]['price'] ?>" name="specialityPrice">
                </div>

                <div class="form-group">
                <label for="specialityDuration">Durée de la spécialité</label>
                <input type="time" class="form-control" id="specialityDuration" name="specialityDuration" value="<?php echo $speciality[0]['duration']?>">
                </div>
            
                
                <div class="modal-footer">
                      <div class="container">
                      <div class="row justify-content-center">
                      
                      
                <button type="submit" class="btn text-white mr-3" id="colorToChangeModal">Modifier la spécialité</button>
                <button class="btn btn-danger text-white ml-4" data-dismiss="modal">Annuler la modification</button>
                </div>
                </form>    
                      </div>
                      </div>
                <!-- Fin du formulaire d'édition spécialité -->





        