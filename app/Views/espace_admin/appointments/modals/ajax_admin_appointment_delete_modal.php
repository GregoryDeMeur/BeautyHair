<!-- DELETE Appointment Modal -->

          
<div class="modal-dialog modal-lg" id="deleteAppointmentModal">
      <div class="modal-content">
        <div class="modal-header text-white" id="colorToChangeModal">
          <h5 class="modal-title">Supprimer un rendez-vous</h5>
          <button class="close" data-dismiss="modal">
            <span class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body">


            <div class="card">
            <h4 class="card-header">Confirmation de la suppression du rendez-vous</h4>
            <div class="card-body">
                <h2>Renseignements</h2>


                            
                      <!-- Affichage du rdv à delete  -->
        
                          <div class="table-responsive">
                    <table class="table thead-secondary mt-3" id="assignHairdresserToSalonTable">
                      <thead class="">
                        <tr>
                          <th scope="col">ID Rendez-vous</th> 
                          <th scope="col">Nom du salon</th> 
                          <th scope="col">Prix</th>
                          <th scope="col">Date de début</th> 
                          <th scope="col">Date de fin</th>   
                          <th scope="col">Titre</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                     <?php echo '<tr>';
                              echo '<td>'. $appointment[0]['ID'] . '</td>';
                              echo '<td>'. $appointment[0]['name'] . '</td>';
                              echo '<td>'. $appointment[0]['price_paid'] . '</td>';
                              echo '<td>'. $appointment[0]['appointment_start'] . '</td>';   
                              echo '<td>'. $appointment[0]['appointment_end'] . '</td>';   
                              echo '<td>'. $appointment[0]['title']  . '</td>';
                            
                              echo '</tr>'; ?>
                          
                        
                      </tbody>
                      </table>
                      </div>
                      

                      

                <div class="modal-footer">
                <div class="container">
                <div class="row justify-content-center">
                      
                <a href="/BeautyHair/AdminAppointmentController/deleteAppointment/<?php echo $appointment[0]['ID']?>">
                <button type="button" class="btn btn-danger">
                <i class="fas fa-trash-alt m-1"></i>
                Supprimer le rendez-vous
                </button>
                </a>    
                <button id="colorToChangeModal" class="btn text-white ml-4" data-dismiss="modal">Retour sans suppression</button>
                </div>
                   
            </div>
            </div>
                </div>
                </div>
                </div>


         
          
                     

                      