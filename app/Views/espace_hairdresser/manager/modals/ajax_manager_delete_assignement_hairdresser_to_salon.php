<!-- Delete Assignement Hairdresser To Salon -->


        

          <!-- Delete Assignement Confirmation -->
          <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-white" id="colorToChangeModal">
          <h5 class="modal-title">Suppression d'un coiffeur de votre salon</h5>
          <button class="close" data-dismiss="modal">
            <span class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body">


        
          <div class="card">
            <h4 class="card-header">Suppression du coiffeur "<?php echo $hairdresser[0]['firstname'] . ' ' . $hairdresser[0]['lastname'];?>" de votre salon</h4>
            <div class="card-body">
                <h2>Renseignements</h2>


                            
                      <!-- Affichage user  -->
                      <div class="table-responsive">
                      <table class="table thead-dark">
                      <thead>
                        <tr>
                          <th scope="col">Nom</th>
                          <th scope="col">Prenom</th>
                            
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                            echo '<tr>';
                            echo '<td>'. $hairdresser[0]['firstname'] . '</td>';
                            echo '<td>'. $hairdresser[0]['lastname'] . '</td>';
                            echo '</tr>';
                          ?>
                        
                      </tbody>
                      </table>
                      </div>
                      
                      
                      
                      

          <!-- End Delete User Confirmation -->

                <div class="modal-footer">
                <div class="container">
                <div class="row justify-content-center">
                      
                <a href="/BeautyHair/ManagerController/deleteHairdresserAssignementToTheSalon/<?php echo $hairdresser[0]['ID']?>">      
                <button class="btn btn-danger text-white mr-3">
                <i class="fas fa-user-slash mr-1"></i>
                Supprimer l'utilisateur
                </button>
                </a>
                <button  class="btn text-white ml-4 btn-info" data-dismiss="modal">Retour sans suppression</button>
                </div>
                </form>    
                      </div>
                      </div>

</div>
</div>
</div>

