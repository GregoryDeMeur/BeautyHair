<!-- Modifier salon modal -->

<div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-white" id="colorToChangeModal">
          <h5 class="modal-title">Modification du salon</h5>
          <button class="close" data-dismiss="modal">
            <span class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body">



            <div class="card">
            <h4 class="card-header text-center">Modifier les informations du salon</h4>
            <div class="card-body">
                <h2 class="text-center">Salon : <?php echo $salon[0]['name']?></h2>


                <!-- Formulaire édition du salon -->
            <form method="POST" action="/BeautyHair/AdminSalonController/modifySalon" <?php //enctype="multipart/form-data" ?>>

                <input type="hidden" name="salonId" value="<?php echo $salon[0]['ID']?>">
                

                <div class="form-group">
                <label for="salonName">Nom du salon</label>
                <input type="text" class="form-control" id="salonName" placeholder="Nom du salon" name="salonName" value="<?php echo $salon[0]['name']  ?>">
                </div>

                <div class="form-group">
                <label for="salonAddress">Adresse du salon</label>
                <input type="text" class="form-control" id="salonAddress" placeholder="Adresse du salon" name="salonAddress" value="<?php echo $salon[0]['address']  ?>">
                </div>

                <!-- Dans ce select, on va s'assurer d'afficher par défaut le gérant actuel, tout en affichant les autres coiffeurs disponibles -->
                <label for="salonOwner">Gérant du salon <span id="tinyFont" class="text-muted">
                <?php if($salonOwner != NULL)
                {
                  echo '(gérant actuel : ' . $salonOwner->ID . ' ' . $salonOwner->firstname . ' ' . $salonOwner->lastname . ')';
                }
                else
                {
                  echo '(Pas encore de gérant associé à ce salon actuellement !)';
                }  ?></span></label>
                <select class="form-group custom-select" name="salonOwner" id="salonOwner" placeholder="Gérant">
                <?php
                if ($row->ID_owner == NULL)
                      {
                        echo '<option selected="" value="">Pas de gérant</option>';
                      }?>
                
                <?php foreach($allHairdressers as $row)
                    {
                      // Condition pour afficher le gérant ACTUEL
                      
                      if ($row->ID == $salonOwner->ID)
                      {
                        echo '<option selected="'.$salonOwner->ID. ' ' . $salonOwner->firstname . ' ' . $salonOwner->lastname . ' ' . ' value="'.$salonOwner->ID.'"> ' . $salonOwner->ID . ' ' . $salonOwner->firstname . ' ' . $salonOwner->lastname . ' ' . '</option>';
                      }
                     
                      if ($row->ID != $salonOwner->ID)
                      {
                        echo '<option value="' .  $row->ID.'"> ' . $row->ID . ' ' . $row->firstname . ' ' . $row->lastname .    '</option>';
                      }
                      
                     
                    }
                ?>
                </select>

                
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


                
            
                


                <div class="modal-footer">
                      <div class="container">
                      <div class="row justify-content-center">
                      
                      
                <button type="submit" class="btn text-white mr-3" id="colorToChangeModal">Modifier le salon</button>
                <button class="btn btn-danger text-white ml-4" data-dismiss="modal">Annuler la modification</button>
                </div>
            </form>
            </div>
                      </div>
                


                

            </div>
        </div>

        
<script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

<script> 
  // Remplacement du champs "body" par CKeditor
  CKEDITOR.replace('salonDescriptionModify');
</script>
