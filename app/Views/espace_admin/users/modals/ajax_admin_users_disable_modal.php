<!-- Disable User Modal -->


        

          <!-- Disable User Confirmation -->
          <div class="modal-dialog modal-lg ">
      <div class="modal-content">
        <div class="modal-header text-white " id="colorToChangeModal">
          <h5 class="modal-title ">Activer/Désactiver un utilisateur</h5>
          <button class="close" data-dismiss="modal">
            <span class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body">


        
          <div class="card text-center">
            <h4 class="card-header">Activation/Désactivation de l'utilisateur "<?php echo $userToDisable[0]['firstname'];?>"</h4>
            <div class="card-body">
                <h2>Renseignements</h2>


                            
                      <!-- Affichage user  -->
                      <div class="table-responsive">
                      <table class="table thead-dark text-center">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Email</th>
                          <th scope="col">Nom</th>
                          <th scope="col">Prenom</th>
                          <th scope="col">Adresse</th>
                          <th scope="col">Tel</th>   
                          <th scope="col">Active</th>                          
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                            echo '<tr>';
                            echo '<td>'. $userToDisable[0]['ID'] . '</td>';
                            echo '<td>'. $userToDisable[0]['email'] . '</td>';
                            echo '<td>'. $userToDisable[0]['lastname'] . '</td>';
                            echo '<td>'. $userToDisable[0]['firstname'] . '</td>';
                            echo '<td>'. $userToDisable[0]['address'] . '</td>';
                            echo '<td>'. $userToDisable[0]['telephone'] . '</td>';?>
                            
                      <?php echo '<td> <select id="selectActive" name="userActive" form="userActiveForm"> '?>
                                         <?php if($userToDisable[0]['active'] == 0)
                                         {?>
                                          <option value="0" selected>0</option>
                                          <option value="1">1</option><?php
                                         }
                                         else
                                         {?>
                                          <option value="0">0</option>
                                          <option value="1" selected>1</option><?php
                                         }
                                        ?> </select> </td> </tr>
                      
                      
                        
                      </tbody>
                      </table>
                      </div>
                      
                      
                      
                      

          <!-- End Disable User Confirmation -->

                <div class="modal-footer">
                <div class="container">
                <div class="row justify-content-center">
                      <h5> Si un compte utilisateur est en active 1, il est considéré comme actif. <br />
                           Si un compte utilisateur est en active 0, il est considéré comme inactif. <br />
                           Si il est inactif, le compte est désactivé et il ne pourra plus avoir accès à l'application. <br />
                           Cette action est réversible. </h5>
                <form action="/BeautyHair/AdminUserController/disableUser/<?php echo $userToDisable[0]['ID']?>" METHOD="POST" id="userActiveForm">
                <button type="submit" class="btn text-white mr-3" id="colorToChangeModal">
                
                Valider la modification
                </button>
                </form> 
                <button  class="btn text-white ml-4 btn-danger" data-dismiss="modal">Retour et annuler les changements</button>
                </div>
                   
                      </div>
                      </div>

</div>
</div>
</div>

        <!-------End Disable User Modal----------->