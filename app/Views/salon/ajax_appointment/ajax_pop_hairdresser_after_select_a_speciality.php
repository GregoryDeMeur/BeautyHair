
<!-- Vue qui va être affichée après sélection d'une spécialité, à l'aide de AJAX -->

<div class="form-group row">
<label for="appointmentHairdresser" class="col-2 col-form-label">Choisissez un coiffeur</label>
<div class="col-10">
<select onchange="displayFormChoosingADate(<?php echo $salon[0]['ID']?>)" class="form-group custom-select mt-2" name="appointmentHairdresser" id="appointmentHairdresser" placeholder="Choisissez un coiffeur">
                               <option selected value="">Choisissez un coiffeur</option>        
              <?php foreach($hairdresserAvailable as $hairdresser)     
                      {  
                               
                          echo '<option value="' .  $hairdresser["ID_user"] .'"> ' . $hairdresser["firstname"]. ' ' . $hairdresser["lastname"] . '</option>';                    
                      }
              ?>
      </select>
</div>
</div>

      