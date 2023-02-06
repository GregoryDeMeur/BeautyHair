<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Consultation des rendez-vous</title>


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

   <!--Include Hairdresser NavBar -->
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
  <section id="profile">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Consultation de vos rendez-vous</h4>
            </div>
            <div class="card-body">
              <!-- Formulaire edit profile -->
            <div id="calendarScheduleHairdresser">
            
            </div>

            </div>
          </div>
        </div>
  
      </div>
    </div>
  </section>

 <!-- Include Hairdresser Footer -->
 <?php echo $this->include('templates/espace_hairdresser/hairdresser_footer.php') ;?>


<script>
 $(document).ready(function() {
  var calendarEl = document.getElementById("calendarScheduleHairdresser");

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

    // Si jamais le coiffeur a des rendez-vous qu'il prend pour lui (ex: il va couper SES cheveux + shampoing), on va renseigner ces rendez-vous dans une autre couleur, pour éviter de mélanger travail/utilisateur du service.
    foreach ($hairdresserAppointments as $keyTwo => $rowTwo)
    {
      echo $sep;
      echo "{title:'".$rowTwo['title']."',";
      echo "start:'".$rowTwo['appointment_start']."',";
      echo "end:'".$rowTwo['appointment_end']."',"; 
      echo "color: '".'#f4320f' ."'}";
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