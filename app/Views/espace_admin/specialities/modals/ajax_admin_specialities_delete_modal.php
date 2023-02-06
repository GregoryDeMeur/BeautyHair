<!------- Delete Speciality Modal----------->
<div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-white" id="colorToChangeModal">
          <h5 class="modal-title">Suppression d'une spécialité</h5>
          <button class="close" data-dismiss="modal">
            <span class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body">




<div class="card">
            <h4 class="card-header">Suppression de la spécialité "<?php echo $specialityDataToDelete[0]['speciality_name'];?>"</h4>
            <div class="card-body">
                <h2>Renseignements</h2>


                            
                      <!-- Affichage du salon à delete  -->
                      <table class="table thead-dark">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Nom de la spécialité</th>
                          
                                                      
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach ($specialityDataToDelete as $row)
                          {
                            echo '<tr>';
                            echo '<td>'. $row['ID'] . '</td>';
                            echo '<td>'. $row['speciality_name'] . '</td>';            
                            echo '</tr>';
                          }
                              
                          ?>
                        
                      </tbody>
                      </table>

                      
                
                      
                  
                      <br />
                      <br />

            </div>
  
        </div>

        <div class="modal-footer">
                <div class="container">
                <div class="row justify-content-center">

                <a href="/BeautyHair/AdminSpecialityController/deleteSpeciality/<?php echo $specialityDataToDelete[0]['ID']?>">   
                <button class="btn btn-danger text-white mr-3">
                <i class="fas fa-user-slash mr-1"></i>
                Supprimer la spécialité
                </button>
                </a>
                <button id="colorToChangeModal" class="btn text-white ml-4" data-dismiss="modal">Retour à la liste des spécialités</button>
                </div>            
                      </div>
                      </div>
            