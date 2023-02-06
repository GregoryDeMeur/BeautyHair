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
  
  <!-- Include AJAX Assign speciality script -->
  <script src="<?php echo base_url('js/admin_assign_speciality.js'); ?>"></script>  

  </head>

<body>





<!-- Side NavBarDashBoard -->

<?php echo $this->include('templates/espace_admin/admin_sidebar.php');?>



   <!-- MAIN -->
   <div class="col mt-5 ">
        <div class="row justify-content-center">
        <div class="col-10 ">
        

                  <!-- Affichage des listes -->
                  <div class="container mt-3">
                  <div class="row ">

                      <div class="col-sm-12">               
                              <!-- Card List coiffeur -->
                              <div class="card">
                              <h4 class="card-header text-center">Assigner une spécialité à un coiffeur</h4>
                              <div class="card-body">

                              <!-- SELECT LISTE -->
                              <!-- Dans ce select, on va s'assurer d'afficher tous les coiffeurs disponibles -->
                              <label for="hairdresserList">Liste des coiffeurs</label>


                              <select class="form-group custom-select" onchange="displaySpecialitiesOfTheHairdresserForTheSpecifiedId(this.value)" name="hairdresserList" id="hairdresserList" placeholder="hairdresserList">
                              <?php echo '<option selected="NULL" value="Choisissez un coiffeur">-- Choisissez un coiffeur --</option>';  ?>                        
                              <?php foreach($hairdresser as $row)
                                  {
                                    echo '<option value="' . $row->ID.'"> '. $row->ID . ' ' . $row->firstname . ' ' . $row->lastname . ' </option>';

                                  }
                                                                   
                              ?>
                              </select>
                              <!------------------>
                             

                              <!-- Affichage des listes -->
                  <div class="container mt-3">
                  <div class="row ">

                      <div class="col-sm-6">               
                          
                              <!-- Liste spécialité coiffeur -->
                              <div id="showListSpecialitiesHairdresser" class="text-center">
                                    
                              </div>
                         
                    </div>
                    

                    <div class="col-sm-6">

                              <!-- SELECT LISTE -->
                              <div class="text-center" id="showListSpecialitiesRemaining"></div>
                          
                             </div>

                    </div>

                    <!-- Confirmation success/error lors d'une suppression/edition/ajout d'un utilisateur -->
                        <div class="row justify-content-center">
                        
                        

                        

                </div>      
                            
                </div>
                  
                </div>
                </div>           
                </div>   
                </div>              
                <!-- Success -->
                <div class="col-12 ">
                        <?php if (isset($_SESSION['successLogAssignSpecialityToHairdresser'])): ?>  
                          <div class="alert alert-success mt-2 col-12 text-center" role="alert">
                        <?php foreach($_SESSION["successLogAssignSpecialityToHairdresser"] as $success): ?>
                                  <p><?php echo $success ?></p>
                        <?php endforeach; ?>
                  
                        <?php endif; unset($_SESSION['successLogAssignSpecialityToHairdresser']);?>
                        </div>   

                        </div>

                    <!-- Fin de Confirmation success/error lors d'une suppression/edition/ajout d'un utilisateur-->      
                </div>
                </div>
                </div>
                
                  
                <!-- ------------------ -->

                    </div>
                  <!-- Fin bloc selecteur/recherche coiffeur -->
                            
                      
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



<!-- Include User Footer -->
<?php echo $this->include('templates/espace_admin/admin_footer.php') ;?>






</body>
</html>