<!DOCTYPE html>
<html lang="fr">

	<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Liste des utilisateurs</title>
  <!--Include User NavBar -->
  <?php echo $this->include('templates/espace_admin/admin_header.php') ;?>
  
  <!--Include CSS de l'espace admin -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/espace_admin.css'); ?>">
  
  <!-- Include Ajax Modal user -->
  <script src="<?php echo base_url('js/admin_user_ajax.js'); ?>"></script>

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
        
        <div class="card text-center">
            <h4 class="card-header text-center">Liste des utilisateurs</h4>
            <div class="card-body">
                <h2>Liste des utilisateurs enregistrés sur BeautyHair</h2>


                            
                      <!-- Affichage liste des utilisateurs -->
                      <div class="table-responsive">
                      <table class="table thead-dark" id="userListTable">
                      <thead>
                        <tr>
                          <th scope="col">Email</th> 
                          <th scope="col">Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach($user as $row){
                              echo '<tr>';
                              if($row['active']==0)
                              {
                                  echo '<td><h4 style="color:red;">'.$row['email'].'</h4></td>';
                              }
                              else
                              {
                                  echo '<td><h4 style="color:green;">'.$row['email'].'</h4></td>';
                              }
                                                                                    
                              echo '<td>'. '<button type="button" class="btn btn-primary" onclick="ajaxPopModalReadUser('.$row['ID'].')"><i class="fas fa-eye"></i></button>

                                           <button type="button" class="btn btn-success" onclick="ajaxPopModalModifyUser('.$row['ID'].')"><i class="fas fa-user-edit"></i></button>
                                           
                                           <button type="button" class="btn btn-warning" onclick="ajaxPopModalDisableUser('.$row['ID'].')"><i class="fas fa-user-slash"></i></button>
                                           
                                            <button onclick="ajaxPopModalDeleteUser('.$row['ID'].')" type="button" class="btn btn-danger"  id="deleteUser"><i class="fas fa-trash-alt"></i></button>'
                                  .'</td>'  ;
                              echo '</tr>';
                          }
                          ?>
                        
                      </tbody>
                      </table>
                      </div>

                      <p>
                      <button type="button" class="btn text-white" id="colorToChangeModal" data-toggle="modal" data-target="#startModalAddUser">      
                      <i class="fas fa-user-plus"></i>
                      Ajouter un utilisateur
                      </button>     
                      </p>
                      <!-- Fin affichage liste des coiffeurs -->
                      <br />
                      <br />

            </div>

        </div>

        <!-- Confirmation success/error lors d'une suppression/edition/ajout d'un utilisateur -->
        <div class="row justify-content-center">
        
        <!-- Error -->
        <div class="col-12 ">
        <?php if (isset($_SESSION['errorLogUser'])): ?>  
          <div class="alert alert-danger mt-2 col-12 text-center" role="alert">
        <?php foreach($_SESSION["errorLogUser"] as $error): ?>
                  <p><?php echo $error ?></p>
        <?php endforeach; ?>
  
        <?php endif; unset($_SESSION['errorLogUser']);?>
        </div>

        <!-- Success -->
        <div class="col-12 ">
        <?php if (isset($_SESSION['successLogUser'])): ?>  
          <div class="alert alert-success mt-2 col-12 text-center" role="alert">
        <?php foreach($_SESSION["successLogUser"] as $success): ?>
                  <p><?php echo $success ?></p>
        <?php endforeach; ?>
  
        <?php endif; unset($_SESSION['successLogUser']);?>
        </div>   

    </div>

 <!-- Fin de Confirmation success/error lors d'une suppression/edition/ajout d'un utilisateur-->

     

     
    </div><!-- Main Col END -->


    
</div><!-- body-row END -->

 
</div><!-- container -->

</div> <!-- background -->
</h4>
<br />
<br />



<!-- Include User Footer -->
<?php echo $this->include('templates/espace_admin/admin_footer.php') ;?>


<!------------------------------------------------------------------------------------------------------------------>

<!-- User Add Modal -->
<?php echo $this->include('espace_admin/users/modals/ajax_admin_users_add_modal.php');?>
<!-------End User Add Modal----------->


<!------------------------------------------------------------------------------------------------------------------>

<!-- User Delete Modal -->
<div class="modal fade" id="startModalDeleteUser">      
          <!-- AJAX -->
          <div id="ajaxDeleteUserModal">

          </div>
          <!-- AJAX -->                             
</div>
<!-------End Delete User Modal----------->



<!------------------------------------------------------------------------------------------------------------------>




<!-- User Modify Modal -->
<div class="modal fade" id="startModalModifyUser">      
          <!-- AJAX -->
          <div id="ajaxModifyUserModal">

          </div>
          <!-- AJAX -->                             
</div>
<!-------End Modify User Modal----------->



<!------------------------------------------------------------------------------------------------------------------>




<!-- User Read Modal -->
<div class="modal fade" id="startModalDisableUser">      
          <!-- AJAX -->
          <div id="ajaxDisableUserModal">

          </div>
          <!-- AJAX -->                             
</div>
<!-------End Disable User Modal----------->



<!------------------------------------------------------------------------------------------------------------------>






<!-- User Read Modal -->
<div class="modal fade" id="startModalReadUser">      
          <!-- AJAX -->
          <div id="ajaxReadUserModal">

          </div>
          <!-- AJAX -->                             
</div>
<!-------End Read User Modal----------->



<!------------------------------------------------------------------------------------------------------------------>

<script>
$("#userListTable").fancyTable({
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