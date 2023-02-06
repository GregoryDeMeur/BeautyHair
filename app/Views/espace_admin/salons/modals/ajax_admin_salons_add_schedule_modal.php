<!-- ADD Salon Modal -->
  
          
          <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-white" id="colorToChangeModal">
          <h5 class="modal-title">Modifier les horaires du salon <?php echo $salon[0]["name"]?></h5>
          <button class="close" data-dismiss="modal">
            <span class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body">

<div class="card">
            <h4 class="card-header text-center">Modifier les horaires du salon <?php echo $salon[0]["name"]?></h4>
            <div class="card-body">
                <h2 class="text-center">Modifier horaire</h2>
                <h4 class="mb-3 text-center">Pour les jours où le salon est fermé, laissez simplement les champs ouverture/fermeture vides du jour adéquat.</h3>


                <!-- Form Horaire salon  -->
            <form method="POST" action="/BeautyHair/AdminSalonController/modifySalonSchedule">

            <input type="hidden" value="<?php echo $idSalon ;?>" name="idSalon">

            <!-- Lundi -->
            <div class="form-group row">
            <label for="lundi" class="col-sm-2 col-form-label align-middle my-auto text-center "><br />Lundi</label>

              <div class="col-sm-5 text-center">
                Ouverture
                <input type="time" class="form-control text-center" id="scheduleOuvertureLundi" name="scheduleOuvertureLundi" placeholder="Horaire ouverture lundi" value="<?php echo $lundi[0]["day_schedule_start"]?>">
              </div>
              <div class="col-sm-5 text-center">
              Fermeture
                <input type="time" class="form-control text-center" id="scheduleFermetureLundi" name="scheduleFermetureLundi" placeholder="Horaire fermeture lundi" value="<?php echo $lundi[0]["day_schedule_end"]?>">
              </div>
            </div>

            <hr>

            <!-- Mardi -->
            <div class="form-group row">
            <label for="mardi" class="col-sm-2 col-form-label align-middle my-auto text-center "><br />Mardi</label>

              <div class="col-sm-5 text-center">
                Ouverture
                <input type="time" class="form-control text-center" id="scheduleOuvertureMardi" name="scheduleOuvertureMardi" placeholder="Horaire ouverture mardi" value="<?php echo $mardi[0]["day_schedule_start"]?>">
              </div>
              <div class="col-sm-5 text-center">
              Fermeture
                <input type="time" class="form-control text-center" id="scheduleFermetureMardi" name="scheduleFermetureMardi" placeholder="Horaire fermeture mardi" value="<?php echo $mardi[0]["day_schedule_end"]?>">
              </div>
            </div>
            
            <hr>

            <!-- Mercredi -->
            <div class="form-group row">
            <label for="mercredi" class="col-sm-2 col-form-label align-middle my-auto text-center "><br />Mercredi</label>

              <div class="col-sm-5 text-center">
                Ouverture
                <input type="time" class="form-control text-center" id="scheduleOuvertureMercredi" name="scheduleOuvertureMercredi" placeholder="Horaire ouverture mercredi" value="<?php echo $mercredi[0]["day_schedule_start"]?>">
              </div>
              <div class="col-sm-5 text-center">
              Fermeture
                <input type="time" class="form-control text-center" id="scheduleFermetureMercredi" name="scheduleFermetureMercredi" placeholder="Horaire fermeture mercredi" value="<?php echo $mercredi[0]["day_schedule_end"]?>">
              </div>
            </div>

            <hr>

            <!-- Jeudi -->
            <div class="form-group row">
            <label for="jeudi" class="col-sm-2 col-form-label align-middle my-auto text-center "><br />Jeudi</label>

              <div class="col-sm-5 text-center">
                Ouverture
                <input type="time" class="form-control text-center" id="scheduleOuvertureJeudi" name="scheduleOuvertureJeudi" placeholder="Horaire ouverture mercredi" value="<?php echo $jeudi[0]["day_schedule_start"]?>">
              </div>
              <div class="col-sm-5 text-center">
              Fermeture
                <input type="time" class="form-control text-center" id="scheduleFermetureJeudi" name="scheduleFermetureJeudi" placeholder="Horaire fermeture jeudi" value="<?php echo $jeudi[0]["day_schedule_end"]?>">
              </div>
            </div>

            <hr>

            <!-- Vendredi -->
            <div class="form-group row">
            <label for="vendredi" class="col-sm-2 col-form-label align-middle my-auto text-center "><br />Vendredi</label>

              <div class="col-sm-5 text-center">
                Ouverture
                <input type="time" class="form-control text-center" id="scheduleOuvertureVendredi" name="scheduleOuvertureVendredi" placeholder="Horaire ouverture vendredi" value="<?php echo $vendredi[0]["day_schedule_start"]?>">
              </div>
              <div class="col-sm-5 text-center">
              Fermeture
                <input type="time" class="form-control text-center" id="scheduleFermetureVendredi" name="scheduleFermetureVendredi" placeholder="Horaire fermeture vendredi" value="<?php echo $vendredi[0]["day_schedule_end"]?>">
              </div>
            </div>

            <hr>

            <!-- Samedi -->
            <div class="form-group row">
            <label for="samedi" class="col-sm-2 col-form-label align-middle my-auto text-center "><br />Samedi</label>

              <div class="col-sm-5 text-center">
                Ouverture
                <input type="time" class="form-control text-center" id="scheduleOuvertureSamedi" name="scheduleOuvertureSamedi" placeholder="Horaire ouverture samedi" value="<?php echo $samedi[0]["day_schedule_start"]?>">
              </div>
              <div class="col-sm-5 text-center">
              Fermeture
                <input type="time" class="form-control text-center" id="scheduleFermetureSamedi" name="scheduleFermetureSamedi" placeholder="Horaire fermeture samedi" value="<?php echo $samedi[0]["day_schedule_end"]?>">
              </div>
            </div>

            <hr>

            <!-- Dimanche -->
            <div class="form-group row">
            <label for="dimanche" class="col-sm-2 col-form-label align-middle my-auto text-center "><br />Dimanche</label>

              <div class="col-sm-5 text-center">
                Ouverture
                <input type="time" class="form-control text-center" id="scheduleOuvertureDimanche" name="scheduleOuvertureDimanche" placeholder="Horaire ouverture dimanche" value="<?php echo $dimanche[0]["day_schedule_start"]?>">
              </div>
              <div class="col-sm-5 text-center">
              Fermeture
                <input type="time" class="form-control text-center" id="scheduleFermetureDimanche" name="scheduleFermetureDimanche" placeholder="Horaire fermeture dimanche" value="<?php echo $dimanche[0]["day_schedule_end"]?>">
              </div>
            </div>

               

                
                    
                <div class="modal-footer">
                      <div class="container">
                      <div class="row justify-content-center">
                            
                <button type="submit" class="btn text-white mr-3" id="colorToChangeModal">Modifier les horaires de ce salon</button>
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
  


