<!-- DELETE Salon Modal -->

          
<div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-white" id="colorToChangeModal">
          <h5 class="modal-title">Supprimer salon <?php echo $salonDataToDelete[0]['name']; ?></h5>
          <button class="close" data-dismiss="modal">
            <span class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body">


            <div class="card">
            <h4 class="card-header">Suppression du salon "<?php echo $salonDataToDelete[0]['name'];?>"</h4>
            <div class="card-body">
                <h2>Renseignements</h2>


                            
                      <!-- Affichage du salon à delete  -->
                      <div class="table-responsive">
                      <table class="table thead-dark">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Nom</th>
                          <th scope="col">Adresse</th>
                          <th scope="col">Gérant</th>
                                                      
                        </tr>
                      </thead>
                      <tbody>
                      
                      <?php echo '<tr>';
                            echo '<td>'. $salonDataToDelete[0]['ID'] . '</td>';
                            echo '<td>'. $salonDataToDelete[0]['name'] . '</td>';
                            echo '<td>'. $salonDataToDelete[0]['address'] . '</td>';
                            echo '<td>'. $salonDataToDelete[0]['ID_owner'] . '</td>';             
                            echo '</tr>'; ?>
                          
                        
                      </tbody>
                      </table>
                      </div>
                      

                <div class="modal-footer">
                <div class="container">
                <div class="row justify-content-center">
                      
                <a href="/BeautyHair/AdminSalonController/deleteSalon/<?php echo $salonDataToDelete[0]['ID']?>">
                <button type="button" class="btn btn-danger">
                <i class="fas fa-trash-alt m-1"></i>
                Supprimer le salon
                </button>
                </a>    
                <button id="colorToChangeModal" class="btn text-white ml-4" data-dismiss="modal">Retour sans suppression</button>
                </div>
                   
            </div>
            </div>
                </div>
                </div>
                </div>


         
          
                     

                      