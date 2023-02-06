<!DOCTYPE html>
<html lang="fr">

	<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Assigner une spécialité à un coiffeur</title>
  <!--Include User NavBar -->
  <?php echo $this->include('templates/espace_admin/admin_header.php') ;?>
  
  <!--Include CSS de l'espace admin -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/espace_admin.css'); ?>">
  
  <!-- Include sorting table scripts -->
  <script src="<?php echo base_url('js/fancyTable.js'); ?>"></script>       

  <!-- Include Modal ajax js -->
  <script src="<?php echo base_url('js/admin_assign_hairdresser_to_salon_ajax.js'); ?>"></script> 

  </head>

<body>





<!-- Side NavBarDashBoard -->

<?php echo $this->include('templates/espace_admin/admin_sidebar.php');?>



   <!-- MAIN -->
   <div class="col mt-5 ">
        <div class="row justify-content-center">
        <div class="col-10 ">
        
        
        
        
        <div class="card">
            <h4 class="card-header text-center">Assigner un coiffeur à un salon</h4>
            <div class="card-body">
                  
                  


                  <!-- Affichage des listes -->
                  <div class="container mt-3">
                  <div class="row ">

                      <div class="col-sm-12">               
                              
                            <form method="POST" action="/BeautyHair/AdminAssignHairdresserToSalonController/assignHairdresserToSalon" div class="col-sm-12 text-center">
                              <!-- SELECT LISTE Coiffeurs -->
                              <!-- Dans ce select, on va s'assurer d'afficher tous les coiffeurs disponibles -->
                              <label for="hairdresserList">Choisissez un coiffeur</label>


                              <select class="form-group custom-select" name="hairdresserList" id="hairdresserList" placeholder="hairdresserList">
                              <?php echo '<option selected="NULL" value="Choisissez un coiffeur">-- Choisissez un coiffeur --</option>';  ?>                        
                              <?php foreach($hairdresser as $row)
                                  {
                                    echo '<option value="' . $row->ID.'"> '. $row->ID . ' ' . $row->firstname . ' ' . $row->lastname . ' </option>';

                                  }
                                                                   
                              ?>
                              </select>
                              <!------------------>
                             
                             <!-- SELECT LISTE Salons -->
                              <label for="salonList">Choisissez un salon</label>


                              <select class="form-group custom-select" name="salonList" id="salonList" placeholder="salonList">
                              <?php echo '<option selected="NULL" value="Choisissez un salon">-- Choisissez un salon --</option>';  ?>                        
                              <?php foreach($salon as $rowSalon)
                                  {
                                    echo '<option value="' . $rowSalon['ID'].'"> '. $rowSalon['ID'] . ' ' . $rowSalon['name'] . ' ' . '</option>';

                                  }
                                                                  
                              ?>
                              </select>
                                  <div class="row justify-content-center">
                                  <button type="submit" class="btn text-white mr-3" id="colorToChangeModal">Valider l'assignation</button>       
                                  </div>
                          </form>   
                    </div>
                    <br />
                    <br />
                        <div class="row w-100">
                            <div class="col text-center">
                            <h2 class=" mt-4">Liste des assignements</h2>
                            </div>
                        </div>
                    <div class="table-responsive">
                    <table class="table thead-secondary mt-3 text-center" id="assignHairdresserToSalonTable">
                      <thead class="">
                        <tr>
                          <th scope="col">Prénom</th> 
                          <th scope="col">Nom</th> 
                          <th scope="col">Salon</th>   
                          <th scope="col">Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach($hairdresserAssignedToSalon as $dataRow){
                              echo '<tr>';
                              echo '<td>'. $dataRow['firstname'] . '</td>';   
                              echo '<td>'. $dataRow['lastname'] . '</td>';   
                              echo '<td>'. $dataRow['name']  . '</td>';
                              echo '<td>'. '<button onclick="ajaxPopModalDeleteAssignHairdresserToSalon('.$dataRow['ID_hairdresser'].',' . $dataRow['ID_Salons'].')" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>'
                                  .'</td>'  ;
                              echo '</tr>';
                          }
                          ?>
                        
                      </tbody>
                      </table>
                      </div>

 
                      

<script>
$("#assignHairdresserToSalonTable").fancyTable({
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



                <!-- ------------------ -->

                    
                            
                      
                      <br />
                      <br />

            </div>

        </div>

      



    </div><!-- Main Col END -->


    
</div><!-- body-row END -->

 <!-- Confirmation success/error lors d'une suppression/ajout d'une assignation -->
<div class="row justify-content-center">
        
        <!-- Error -->
        <div class="col-12 ">
        <?php if (isset($_SESSION['errorLogAssignement'])): ?>  
          <div class="alert alert-danger mt-2 col-12 text-center" role="alert">
        <?php foreach($_SESSION["errorLogAssignement"] as $error): ?>
                  <p><?php echo $error ?></p>
        <?php endforeach; ?>
  
        <?php endif; unset($_SESSION['errorLogAssignement']);?>
        </div>

        <!-- Success -->
        <div class="col-12 ">
        <?php if (isset($_SESSION['successLogAssignement'])): ?>  
          <div class="alert alert-success mt-2 col-12 text-center" role="alert">
        <?php foreach($_SESSION["successLogAssignement"] as $success): ?>
                  <p><?php echo $success ?></p>
        <?php endforeach; ?>
  
        <?php endif; unset($_SESSION['successLogAssignement']);?>
        </div>   

    </div>

 <!-- Fin de Confirmation success/error lors d'une suppression/ajout d'une assignation-->

</div><!-- container -->



</div> <!-- background -->







</h4>
<br />



<!-- Include User Footer -->
<?php echo $this->include('templates/espace_admin/admin_footer.php') ;?>


<br />
                      

<!------------------------------------------------------------------------------------------------------------------>

<!-- Article Delete Modal -->
<div class="modal fade" id="startModalDeleteAssignHairdresserToSalon">      
          <!-- AJAX -->
          <div id="ajaxDeleteAssignHairdresserToSalonModal">

          </div>
          <!-- AJAX -->                             
</div>
<!-------End Delete Article Modal----------->



<!------------------------------------------------------------------------------------------------------------------>


</body>
</html>