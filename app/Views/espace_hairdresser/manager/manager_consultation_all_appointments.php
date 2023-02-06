<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Consulter les rendez-vous de votre salon</title>

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

    <!-- Include AJAX appointments scripts -->
    <script src="<?php echo base_url('js/manager_salon.js');?>"></script>
    
    

</head>

<body>
  <!--Include User NavBar -->
  <?php echo $this->include('templates/espace_hairdresser/hairdresser_header.php') ;?>

  <!-- Include sorting table scripts -->
  <script src="<?php echo base_url('js/fancyTable.js'); ?>"></script>  

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
        <div class="col-md-12 text-center">
          <div class="card">
            <div class="card-header">
              <h4>Consultation des rendez-vous de votre salon</h4>
            </div>
            <div class="card-body">
                      <div class="table-responsive">
                        <table class="table thead-secondary mt-3" id="appointmentTable">
                          <thead class="">
                            <tr>
                              <th scope="col">Titre</th>  
                              <th scope="col">Prix</th>
                              <th scope="col">Date de début</th> 
                              <th scope="col">Date de fin</th>   
                              <th scope="col">Action</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                              <?php foreach($appointment as $row){
                                  echo '<tr>';
                                  echo '<td>'. $row['title'] . '</td>';   
                                  echo '<td>'. $row['price_paid'] . '</td>';
                                  echo '<td>'. $row['appointment_start'] . '</td>';   
                                  echo '<td>'. $row['appointment_end']  . '</td>';
                                  echo '<td>'. '<button onclick="ajaxPopModalDeleteAppointment('.$row['ID'].')" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>'
                                      .'</td>'  ;
                                  echo '</tr>';
                              }
                              ?>
                            
                          </tbody>
                        </table>
                      </div>
                      <br />
                      <br />
              <div id="appointmentsSalon">
              </div>
              
            </div>
          </div>
        </div>
  
      </div>
    </div>
  </section>


<!-- Include User Footer -->
<?php echo $this->include('templates/espace_hairdresser/hairdresser_footer.php') ;?>
  






<!------------------------------------------------------------------------------------------------------------------>

<!-- Appointment Delete Modal -->
<div class="modal fade" id="startModalDeleteAppointment">      
          <!-- AJAX -->
          <div id="ajaxDeleteAppointmentModal">

          </div>
          <!-- AJAX -->                             
</div>
<!-------End appointment Article Modal----------->



<!------------------------------------------------------------------------------------------------------------------>

<script>
 $(document).ready(function() {
  var calendarEl = document.getElementById("appointmentsSalon");

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

$("#appointmentTable").fancyTable({
sortColumn:0,// column number for initial sorting
sortOrder:'descending',// 'desc', 'descending', 'asc', 'ascending', -1 (descending) and 1 (ascending)
sortable:true,
pagination:true,// default: false
paginationClass:"btn btn-primary",
paginationClassActive:"active",
searchable:true,
globalSearch:true,
inputPlaceholder:"Rechercher...",
perPage: 5,
});

</script>

</body>

</html>