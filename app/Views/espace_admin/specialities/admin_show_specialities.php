<!DOCTYPE html>
<html lang="fr">

	<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Voir les spécialités disponibles</title>
  <!--Include User NavBar -->
  <?php echo $this->include('templates/espace_admin/admin_header.php') ;?>
  
  <!--Include CSS de l'espace admin -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/espace_admin.css'); ?>">

  <script src="<?php echo base_url('js/admin_speciality_ajax.js'); ?>"></script>      

   <!-- Include sorting table scripts -->
   <script src="<?php echo base_url('js/fancyTable.js'); ?>"></script>  

  </head>

<body>





<!-- Side NavBarDashBoard -->

<?php echo $this->include('templates/espace_admin/admin_sidebar.php');?>

   <!-- MAIN -->
   <div class="col mt-5 ">
        <div class="row justify-content-center">
        <div class="col-10 ">
        
        
        
        
        <div class="card">
            <h4 class="card-header text-center">Liste des spécialités</h4>
            <div class="card-body text-center">
                <h2>Liste des spécialités disponibles</h2>


                            
                      <!-- Affichage liste des spécialités -->
                      <div class="table-responsive">
                      <table class="table thead-dark" id="specialitiesTable">
                      <thead>
                        <tr>
                          <th scope="col">Nom de la spécialité</th>                    
                          <th scope="col">Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach($speciality as $row){
                              echo '<tr>';
                              echo '<td>'. $row['speciality_name'] . '</td>';                         
                              echo '<td>'. '<button type="button" class="btn btn-primary" onclick="ajaxPopModalReadSpeciality('.$row['ID'].')"><i class="fas fa-eye"></i></button>

                                            <button type="button" class="btn btn-success" onclick="ajaxPopModalModifySpeciality('.$row['ID'].')"><i class="fas fa-edit"></i></button>

                                            <button onclick="ajaxPopModalDeleteSpeciality('.$row['ID'].')" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>'
                                  .'</td>'  ;
                              echo '</tr>';
                          }
                          ?>
                        
                      </tbody>
                      </table>
                      </div>
                      <button type="button" class="btn text-white" id="colorToChangeModal" data-toggle="modal" data-target="#startModalAddSpeciality">      
                      <i class="fas fa-plus mr-1"></i>
                      Ajouter une spécialité
                      </button>     
                      </p>
                      <!-- Fin affichage liste des spécialités -->
                      <br />
                      <br />

            </div>

        </div>

        <!-- Confirmation success/error lors d'une suppression/edition/ajout d'une spécialité -->
          <div class="row justify-content-center">
        
              <!-- Error -->
              <div class="col-12 ">
              <?php if (isset($_SESSION['errorLogSpeciality'])): ?>  
                <div class="alert alert-danger mt-2 col-12 text-center" role="alert">
              <?php foreach($_SESSION["errorLogSpeciality"] as $error): ?>
                        <p><?php echo $error ?></p>
              <?php endforeach; ?>
        
              <?php endif; unset($_SESSION['errorLogSpeciality']);?>
              </div>

              <!-- Success -->
              <div class="col-12 ">
              <?php if (isset($_SESSION['successLogSpeciality'])): ?>  
                <div class="alert alert-success mt-2 col-12 text-center" role="alert">
              <?php foreach($_SESSION["successLogSpeciality"] as $success): ?>
                        <p><?php echo $success ?></p>
              <?php endforeach; ?>
        
              <?php endif; unset($_SESSION['successLogSpeciality']);?>
              </div>   

          </div>
  
       <!-- Fin de Confirmation success/error lors d'une suppression/edition/ajout d'une spécialité-->

    </div><!-- Main Col END -->


    
</div><!-- body-row END -->

 
</div><!-- container -->

</div> <!-- background -->
</h4>
<br />
<br />



<!-- Include Footer -->
<?php echo $this->include('templates/espace_admin/admin_footer.php') ;?>


<!------------------------------------------------------------------------------------------------------------------>

<!-- Speciality Add Modal -->
<?php echo $this->include('espace_admin/specialities/modals/ajax_admin_specialities_add_modal.php');?>
<!-------End Speciality Add Modal----------->


<!------------------------------------------------------------------------------------------------------------------>

<!-- Speciality Delete Modal -->
<div class="modal fade" id="startModalDeleteSpeciality">      
          <!-- AJAX -->
          <div id="ajaxDeleteSpecialityModal">

          </div>
          <!-- AJAX -->                             
</div>
<!-------End Delete Speciality Modal----------->



<!------------------------------------------------------------------------------------------------------------------>




<!-- Speciality Modify Modal -->
<div class="modal fade" id="startModalModifySpeciality">      
          <!-- AJAX -->
          <div id="ajaxModifySpecialityModal">

          </div>
          <!-- AJAX -->                             
</div>
<!-------End Modify Speciality Modal----------->



<!------------------------------------------------------------------------------------------------------------------>




<!-- Speciality Read Modal -->
<div class="modal fade" id="startModalReadSpeciality">      
          <!-- AJAX -->
          <div id="ajaxReadSpecialityModal">

          </div>
          <!-- AJAX -->                             
</div>
<!-------End Read Speciality Modal----------->



<!------------------------------------------------------------------------------------------------------------------>

<script>
$("#specialitiesTable").fancyTable({
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

</div>
</body>
</html>