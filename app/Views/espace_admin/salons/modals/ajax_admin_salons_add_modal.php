<!-- ADD Salon Modal -->
<div class="modal fade" id="startModalAddSalon">      
          
          <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-white" id="colorToChangeModal">
          <h5 class="modal-title">Ajouter un salon</h5>
          <button class="close" data-dismiss="modal">
            <span class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body">

<div class="card">
            <h4 class="card-header">Ajouter un salon</h4>
            <div class="card-body">
                <h2>Ajouter un salon</h2>


                <!-- Form Inscription d'un nouveau salon dans DB -->
            <form method="POST" action="/BeautyHair/AdminSalonController/addNewSalon" div class="col-sm-12">

                <div class="form-group">
                <label for="salonName">Nom du salon</label>
                <input type="text" class="form-control" id="salonName" placeholder="Nom du nouveau salon" name="salonName">
                </div>

                <div class="form-group">
                <label for="salonAddress">Adresse du salon</label>
                <input type="text" class="form-control" id="salonAddress" placeholder="Adresse du salon" name="salonAddress">
                </div>

                <div class="form-group">
                <label for="salonTelephone">Téléphone</label>
                <input type="text" class="form-control" id="salonTelephone" placeholder="Téléphone" name="salonTelephone">
                </div>

                <div class="form-group">
                <label for="salonEmail">Email de contact</label>
                <input type="text" class="form-control" id="salonEmail" placeholder="Email de contact" name="salonEmail">
                </div>

                <label for="salonOwner">Gérant du salon</label>
                <select class="form-group custom-select" name="salonOwner" id="salonOwner" placeholder="Gérant">
                
                <option selected="Pas de gérant" value="">Pas de gérant</option>
                <?php foreach($allHairdressers as $row)
                    {
                      // Condition pour afficher le gérant ACTUEL
                      if ($row->ID == $salonOwner->ID)
                      {
                        echo '<option selected="'.$salonOwner->ID. ' ' . $salonOwner->firstname . ' ' . $salonOwner->lastname . ' ' . ' value="'.$salonOwner->ID.'"> ' . $salonOwner->ID . ' ' . $salonOwner->firstname . ' ' . $salonOwner->lastname . ' ' . '</option>';
                      }
                      else 
                      {
                        echo '<option value="' .  $row->ID.'"> ' . $row->ID . ' ' . $row->firstname . ' ' . $row->lastname .    '</option>';
                      }
                      
                     
                    }
                ?>
                </select>

                <div class="form-group">
                <label for="salonDescription">Description</label>
                <input type="text" class="form-control" id="salonDescription" placeholder="Cette rubrique va être affichée en page d'accueil" name="salonDescription">
                </div>

                <div class="form-group">
                <label for="salonGoogleMap">Google map</label>
                <textarea name="salonGoogleMap" class="form-control" id="salonGoogleMap" placeholder="Rendez-vous sur google map, sélectionner votre adresse et copier le contenu html via le bouton partager -> Intégrer une carte"></textarea>
                </div>

                
                    
                <div class="modal-footer">
                      <div class="container">
                      <div class="row justify-content-center">
                            
                <button type="submit" class="btn text-white mr-3" id="colorToChangeModal">Ajouter ce nouveau salon</button>
                <button class="btn btn-danger text-white ml-4" data-dismiss="modal">Annuler</button>
                </div>
                      </div>
                      </div>
            </form>
                <!-- Fin du formulaire inscription -->
                </div>
                </div>

            </div>
        </div>
        </div>
        </div>


