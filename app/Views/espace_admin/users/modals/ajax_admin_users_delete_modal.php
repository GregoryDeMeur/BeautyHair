<!-- Delete User Modal -->


        

          <!-- Delete User Confirmation -->
          <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-white" id="colorToChangeModal">
          <h5 class="modal-title">Suppression de l'utilisateur</h5>
          <button class="close" data-dismiss="modal">
            <span class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body">


        
          <div class="card">
            <h4 class="card-header">Suppression de l'utilisateur "<?php echo $userToDelete[0]['firstname'];?>"</h4>
            <div class="card-body">
                <h2>Renseignements</h2>


                            
                      <!-- Affichage user  -->
                      <div class="table-responsive">
                      <table class="table thead-dark">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Email</th>
                          <th scope="col">Nom</th>
                          <th scope="col">Prenom</th>
                          <th scope="col">Adresse</th>
                          <th scope="col">Tel</th>                             
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                            echo '<tr>';
                            echo '<td>'. $userToDelete[0]['ID'] . '</td>';
                            echo '<td>'. $userToDelete[0]['email'] . '</td>';
                            echo '<td>'. $userToDelete[0]['lastname'] . '</td>';
                            echo '<td>'. $userToDelete[0]['firstname'] . '</td>';
                            echo '<td>'. $userToDelete[0]['address'] . '</td>';
                            echo '<td>'. $userToDelete[0]['telephone'] . '</td>';
                            echo '</tr>';
                          ?>
                        
                      </tbody>
                      </table>
                      </div>
                      
                      
                      
                      

          <!-- End Delete User Confirmation -->

                <div class="modal-footer">
                <div class="container">
                <div class="row justify-content-center">
                      
                <a href="/BeautyHair/AdminUserController/deleteUser/<?php echo $userToDelete[0]['ID']?>">      
                <button class="btn btn-danger text-white mr-3">
                <i class="fas fa-user-slash mr-1"></i>
                Supprimer l'utilisateur
                </button>
                </a>
                <button id="colorToChangeModal" class="btn text-white ml-4" data-dismiss="modal">Retour sans suppression</button>
                </div>
                </form>    
                      </div>
                      </div>

</div>
</div>
</div>

        <!-------End Delete User Modal----------->