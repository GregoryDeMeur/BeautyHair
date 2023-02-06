<!DOCTYPE html>
<html lang="fr">

	<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Voir les salons disponibles</title>
  <!--Include User NavBar -->
  <?php echo $this->include('templates/espace_admin/admin_header.php') ;?>
  
  <!--Include CSS de l'espace admin -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/espace_admin.css'); ?>">
  
  <!-- Include AJAX Modal scripts -->
  <script src="<?php echo base_url('js/admin_salon_ajax.js'); ?>"></script>       

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
            <h4 class="card-header text-center">Liste des salons disponibles</h4>
            <div class="card-body text-center">
                


                            
                      <!-- Affichage liste des utilisateurs -->
                      <div class="table-responsive">
                      <table class="table thead-dark text-center" id="salonTable">
                      <thead>
                        <tr>
                          <th scope="col">Nom du salon</th> 
                          <th scope="col">Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach($salon as $row){
                              echo '<tr>';
                              echo '<td>'. $row['name'] . '</td>';                       
                              echo '<td>'. '<button type="button" class="btn btn-primary" onclick="ajaxPopModalReadSalon('.$row['ID'].')"><i class="fas fa-eye"></i></button>

                                           <button type="button" class="btn btn-success" onclick="ajaxPopModalModifySalon('.$row['ID'].')"><i class="fas fa-edit"></i></button>

                                           <button type="button" class="btn btn-info" onclick="ajaxPopModalAddPhotoSalon('.$row['ID'].')"><i class="far fa-image"></i></button>

                                           <button type="button" class="btn btn-warning" onclick="ajaxPopModalAddScheduleSalon('.$row['ID'].')"><i class="far fa-clock"></i></button>

                                            <button onclick="ajaxPopModalDeleteSalon('.$row['ID'].')" type="button" class="btn btn-danger"  id="deleteSalon"><i class="fas fa-trash-alt"></i></button>'
                                  .'</td>'  ;
                              echo '</tr>';
                          }
                          ?>
                        
                      </tbody>
                      </table>
                      </div>


                      <p>
                      <button type="button" class="btn text-white" id="colorToChangeModal" data-toggle="modal" data-target="#startModalAddSalon">      
                      <i class="fas fa-plus"></i>
                      Ajouter un salon
                      </button>     
                      </p>
                      <!-- Fin affichage liste des salons -->
                      <br />
                      <br />

            </div>

        </div>


  <!-- Confirmation success/error lors d'une suppression/edition/ajout d'un salon -->
  <div class="row justify-content-center">
        
        <!-- Error -->
        <div class="col-12 ">
        <?php if (isset($_SESSION['errorLogSalon'])): ?>  
          <div class="alert alert-danger mt-2 col-12 text-center" role="alert">
        <?php foreach($_SESSION["errorLogSalon"] as $error): ?>
                  <p><?php echo $error ?></p>
        <?php endforeach; ?>
  
        <?php endif; unset($_SESSION['errorLogSalon']);?>
        </div>

        <!-- Success -->
        <div class="col-12 ">
        <?php if (isset($_SESSION['successLogSalon'])): ?>  
          <div class="alert alert-success mt-2 col-12 text-center" role="alert">
        <?php foreach($_SESSION["successLogSalon"] as $success): ?>
                  <p><?php echo $success ?></p>
        <?php endforeach; ?>
  
        <?php endif; unset($_SESSION['successLogSalon']);?>
        </div>   

    </div>

 <!-- Fin de Confirmation success/error lors d'une suppression/edition/ajout d'un salon -->



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

<!-- Salon Add Modal -->
<?php echo $this->include('espace_admin/salons/modals/ajax_admin_salons_add_modal.php');?>
<!-------End Salon Add Modal----------->


<!------------------------------------------------------------------------------------------------------------------>

<!-- Salon Delete Modal -->
<div class="modal fade" id="startModalDeleteSalon">      
          <!-- AJAX -->
          <div id="ajaxDeleteSalonModal">

          </div>
          <!-- AJAX -->                             
</div>
<!-------End Delete Salon Modal----------->



<!------------------------------------------------------------------------------------------------------------------>




<!-- Salon Modify Modal -->
<div class="modal fade" id="startModalModifySalon">      
          <!-- AJAX -->
          <div id="ajaxModifySalonModal">

          </div>
          <!-- AJAX -->                             
</div>
<!-------End Modify Salon Modal----------->



<!------------------------------------------------------------------------------------------------------------------>




<!-- Salon Read Modal -->
<div class="modal fade" id="startModalReadSalon">      
          <!-- AJAX -->
          <div id="ajaxReadSalonModal">

          </div>
          <!-- AJAX -->                             
</div>
<!-------End Read Salon Modal----------->



<!------------------------------------------------------------------------------------------------------------------>


<!-- Salon Read Modal -->
<div class="modal fade" id="startModalAddPhotoSalon">      
          <!-- AJAX -->
          <div id="ajaxAddPhotoSalonModal">

          </div>
          <!-- AJAX -->                             
</div>
<!-------End Read Salon Modal----------->



<!------------------------------------------------------------------------------------------------------------------>


<!------------------------------------------------------------------------------------------------------------------>


<!-- Salon Schedule Modal -->
<div class="modal fade" id="startModalAddScheduleSalon">      
          <!-- AJAX -->
          <div id="ajaxAddScheduleSalonModal">

          </div>
          <!-- AJAX -->                             
</div>
<!-------End Schedule Salon Modal----------->



<!------------------------------------------------------------------------------------------------------------------>




<script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

<script> 
  // Remplacement du champs "body" par CKeditor
  CKEDITOR.replace('salonDescription');

  
$("#salonTable").fancyTable({
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