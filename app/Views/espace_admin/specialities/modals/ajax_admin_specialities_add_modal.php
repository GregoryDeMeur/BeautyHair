<!-- ADD Speciality Modal -->
<div class="modal fade" id="startModalAddSpeciality">      
          
          <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-white" id="colorToChangeModal">
          <h5 class="modal-title">Ajouter une spécialité</h5>
          <button class="close" data-dismiss="modal">
            <span class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        

          

        <div class="card">
            <h4 class="card-header">Ajouter une spécialité</h4>
            <div class="card-body">
                <h2>Formulaire</h2>


                <!-- Form Inscription d'une nouvelle spécialité dans DB -->
            <form method="POST" action="/BeautyHair/AdminSpecialityController/addNewSpeciality" div class="col-sm-122 mt-2">

                <div class="form-group">
                <label for="specialityName">Nom de la spécialité</label>
                <input type="text" class="form-control" id="specialityName" placeholder="Nom de la spécialité" name="specialityName">
                </div>

                <div class="form-group">
                <label for="specialityDescription">Description</label>
                <input type="text" class="form-control" id="specialityDescription" placeholder="Description de la spécialité" name="specialityDescription">
                </div>

                <div class="form-group">
                <label for="specialityPrice">Prix</label>
                <input type="text" class="form-control" id="specialityPrice" placeholder="Prix de la prestation" name="specialityPrice">
                </div>

                <div class="form-group">
                <label for="specialityDuration">Durée</label>
                <input type="time" class="form-control" id="specialityDuration" placeholder="Temps de la prestation" name="specialityDuration">
                </div>
            



                      <div class="modal-footer">
                      <div class="container">
                      <div class="row justify-content-center">
                      
                      
                <button type="submit" class="btn text-white mr-3" id="colorToChangeModal">Enregistrer la spécialité</button>
                <button class="btn btn-danger text-white ml-4" data-dismiss="modal">Annuler</button>
                </div>
                </form>    
                      </div>
                      </div>



                
        <!-- Fin du formulaire  -->

        



        </div>
</div>
</div>
                                  
</div>
</div>
</div>
       

        <!-------End ADD Speciality Modal----------->






