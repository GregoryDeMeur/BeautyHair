<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Rendez-vous du Salon <?php echo $salon[0]['name'];?></title>

  <!-- Include Ajax Salon Formulaire -->
  <script src="<?php echo base_url('js/salon_appointment_ajax.js'); ?>"></script>

  <!-- Include FullCalendar -->
<link href=<?php echo base_url('js/fullcalendar/core/main.css')?> rel='stylesheet' />
    <link href=<?php echo base_url('js/fullcalendar/daygrid/main.css')?> rel='stylesheet' />
    <link href=<?php echo base_url('js/fullcalendar/timegrid/main.css')?> rel='stylesheet' />
    <link href=<?php echo base_url('js/fullcalendar/list/main.css')?> rel='stylesheet' />


    <script src="<?php echo base_url('js/fullcalendar/core/main.js')?>"></script>
    <script src="<?php echo base_url('js/fullcalendar/interaction/main.js')?>"></script>
    <script src="<?php echo base_url('js/fullcalendar/daygrid/main.js')?>"></script>
    <script src="<?php echo base_url('js/fullcalendar/timegrid/main.js')?>"></script>
    <script src="<?php echo base_url('js/fullcalendar/list/main.js')?>"></script>


</head>

<body>
  
  <!-- Importation salon Header -->
  <?php echo $this->include('templates/salon/header.php');?>

<div class="container text-center">
  <div class="row mx-auto col-12 col-md-9 pull-md-3 bd-content">
  

  <!-- Afficher le calendrier des rendez-vous -->
  <h3 class="mx-auto mt-4">Calendrier des rendez-vous du salon <?php echo $salon[0]['name'];?> </h3>
  <div id="calendarScheduleSalon" class="col-12 mt-4">
            
  </div>


    <!-- Formulaire rendez-vous -->
    
    <form method="POST" action="/BeautyHair/SalonController/addAppointment" class="col-12 text-center my-4">
     <h1 class="my-3">Formulaire prise de rendez-vous</h1>
     <br />
     <input type="hidden" name="salonAppointment" value="<?php echo $salon[0]['ID']?>"> 
        <div class="form-group row">  
        <label for="appointmentHairdresser" class="col-2 col-form-label">Spécialité</label>
          <div class="col-10">
          <select onchange="displayHairdresserForSelectedSpeciality(this.value,<?php echo $salon[0]['ID']?>)" class="form-group custom-select mt-2" name="appointmentSpeciality" id="appointmentSpeciality" placeholder="Choisissez une spécialité">
                                  <option selected value="">Choisissez une spécialité</option>        
                  <?php foreach($specialityAvailable as $speciality)     
                          {  
                                  
                              ?> <option <?php echo 'value="' .  $speciality["ID"] .'"> ' . $speciality["speciality_name"]. '</option>';                    
                          }
                  ?>
          </select>
        </div>
        
</div>
      <!-- Dès que la spécialité est selectionnée, on affiche avec une procédure AJAX le choix du coiffeur -->
      <div class="form-group" id="appointmentHairdresserAjax">
      
      </div>   

      <div class="form-group text-center" id="appointmentDateAjax">

      </div>

    </form>

    <!-- Fin formulaire rendez-vous -->
  </div>
</div>

<!-- Confirmation success/error lors d'un ajout de rendez-vous -->
<div class="container">
<div class="row mx-auto col-12 col-md-9 pull-md-3 bd-content">
        
        <!-- Error -->
        <div class="col-12 ">
        <?php if (isset($_SESSION['errorLogAddAppointment'])): ?>  
          <div class="alert alert-danger mt-2 col-12 text-center" role="alert">
        <?php foreach($_SESSION["errorLogAddAppointment"] as $error): ?>
                  <p><?php echo $error ?></p>
        <?php endforeach; ?>
  
        <?php endif; unset($_SESSION['errorLogAddAppointment']);?>
        </div>

        <!-- Success -->
        <div class="col-12 ">
        <?php if (isset($_SESSION['successLogAddAppointment'])): ?>  
          <div class="alert alert-success mt-2 col-12 text-center" role="alert">
        <?php foreach($_SESSION["successLogAddAppointment"] as $success): ?>
                  <p><?php echo $success ?></p>
        <?php endforeach; ?>
  
        <?php endif; unset($_SESSION['successLogAddAppointment']);?>
        </div>   

</div>
</div>

 <!-- Fin Confirmation success/error lors d'un ajout de rendez-vous-->

 <!-- Importation salon Footer -->
 <?php echo $this->include('templates/salon/footer.php');?>


 <script>
 $(document).ready(function() {
  var calendarEl = document.getElementById("calendarScheduleSalon");

  var calendar = new FullCalendar.Calendar(calendarEl, {
    eventLimit: true,
    locale:'fr',
    plugins: ["dayGrid", "timeGrid", "list", "interaction"],
    header: {
      left: "prev,next today",
      center: "title",
      right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek"
    },
    events: [<?php
    $sep = "";
    foreach ($appointment as $key => $row)
    {
      echo $sep;
      echo "{title:'".$row['title']."',";
      echo "start:'".$row['appointment_start']."',";
      echo "end:'".$row['appointment_end']."'}"; 
      $sep = ",";
    }
  
    
    
    ?>
    ]
  });

  calendar.render();
});
</script>

</body>
</html>