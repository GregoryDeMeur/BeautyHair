<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Changer horaire de votre salon</title>

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
              <h4>Changer l'horaire de votre salon</h4>
            </div>
            <div class="card-body">
              
            
           
                  <!-- Form Horaire salon  -->
            <form method="POST" action="/BeautyHair/ManagerController/modifySalonSchedule">

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

   

</div>
        
    <div class="card-footer text-center">
         
                
     <button type="submit" class="btn btn-info text-white mr-3">Modifier les horaires de ce salon</button>

      


  
         
</form>
<a href="/BeautyHair/HairdresserController/hairdresser/dashboard">
      <button class="btn btn-danger text-white ml-4" data-dismiss="modal">Annuler les modifications et retour au dashboard</button>
      </a>
</div>
    <!-- Fin du formulaire inscription -->
                
            

            </div>
          </div>
        </div>
  
      </div>
    </div>


<br />
<br />



</body>

</html>