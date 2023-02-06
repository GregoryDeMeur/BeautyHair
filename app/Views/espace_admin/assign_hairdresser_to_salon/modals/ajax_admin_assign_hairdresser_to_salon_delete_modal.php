<!-- DELETE Assignement Hairdresser To Salon Modal -->

          
<div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-white" id="colorToChangeModal">
          <h5 class="modal-title">Supprimer un assignement coiffeur - salon</h5>
          <button class="close" data-dismiss="modal">
            <span class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body">


            <div class="card">
            <h4 class="card-header">Suppression de l'assignement</h4>
            <div class="card-body">
                <h2>Renseignements</h2>


                            
                      <!-- Affichage de l'article à delete  -->
        
                          <div class="table-responsive">
                    <table class="table thead-secondary mt-3" id="assignHairdresserToSalonTable">
                      <thead class="">
                        <tr>
                          <th scope="col">ID coiffeur</th> 
                          <th scope="col">Prénom</th> 
                          <th scope="col">Nom</th>   
                          <th scope="col">Salon</th>
                          <th scope="col">ID Salon</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                     <?php echo '<tr>';
                              echo '<td>'.  $hairdresserSalon[0]['ID_hairdresser'] . '</td>';
                              echo '<td>'. $hairdresserSalon[0]['firstname'] . '</td>';   
                              echo '<td>'. $hairdresserSalon[0]['lastname'] . '</td>';   
                              echo '<td>'. $hairdresserSalon[0]['name']  . '</td>';
                              echo '<td>'. $hairdresserSalon[0]['ID_Salons'] .'</td>';
                            
                              echo '</tr>'; ?>
                          
                        
                      </tbody>
                      </table>
                      </div>
                      

                      

                <div class="modal-footer">
                <div class="container">
                <div class="row justify-content-center">
                      
                <a href="/BeautyHair/AdminAssignHairdresserToSalonController/deleteAssignedHairdresserToSalon/<?php echo $hairdresserSalon[0]['ID_hairdresser']?>/<?php echo $hairdresserSalon[0]['ID_Salons']?>">
                <button type="button" class="btn btn-danger">
                <i class="fas fa-trash-alt m-1"></i>
                Supprimer l'assignement
                </button>
                </a>    
                <button id="colorToChangeModal" class="btn text-white ml-4" data-dismiss="modal">Retour sans suppression</button>
                </div>
                   
            </div>
            </div>
                </div>
                </div>
                </div>


         
          
                     

                      