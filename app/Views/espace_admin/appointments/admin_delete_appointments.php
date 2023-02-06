<!DOCTYPE html>
<html lang="fr">

	<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Supprimer un rendez-vous</title>
  <!--Include User NavBar -->
  <?php echo $this->include('templates/espace_admin/admin_header.php') ;?>
  
  <!--Include CSS de l'espace admin -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/espace_admin.css'); ?>">
  
      

  <!-- Include AJAX appointments scripts -->
  <script src="<?php echo base_url('js/admin_appointment_ajax.js');?>"></script>
    
  <!-- Include sorting table scripts -->
  <script src="<?php echo base_url('js/fancyTable.js'); ?>"></script>    
    

    
  </head>

<body>


<!-- Side NavBarDashBoard -->

<?php echo $this->include('templates/espace_admin/admin_sidebar.php');?>



   <!-- MAIN -->
   <div class="container">
   <div class="row-12">
   <div class="mt-4 mb-4 col">
        
      
        <div class="card">
            <h4 class="card-header">Liste des rendez-vous</h4>
            <div class="card-body">
               


                <!-- SELECT SALON -->

                <div class="table-responsive">
                    <table class="table thead-secondary mt-3" id="appointmentTable">
                      <thead class="">
                        <tr>
                          <th scope="col">Titre</th> 
                          <th scope="col">Nom du salon</th> 
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
                              echo '<td>'. $row['name'] . '</td>';
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

                <!-- END SELECT -->

                
                

              <!-- Pop Modal Delete Appointment -->                              



              
                    
                      <br />
                      <br />

            </div>

        </div>

     

    </div><!-- Main Col END -->


    
</div><!-- body-row END -->

 
</div><!-- container -->

</div> <!-- background -->




</h4>
<br />
<br />


<!-- Appointment Delete Modal -->
<div class="modal fade" id="startModalDeleteAppointment">      
          <!-- AJAX -->
          <div id="ajaxDeleteAppointmentModal">

          </div>
          <!-- AJAX -->                             
</div>
<!-------End Delete Appointment Modal----------->





         



<!-- Include Footer -->
<?php echo $this->include('templates/espace_admin/admin_footer.php') ;?>




                   

</div>


<script>
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