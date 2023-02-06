<!-- Read User Modal -->


        

          <!-- Read User Confirmation -->
          <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-white" id="colorToChangeModal">
          <h5 class="modal-title">Vue sur l'utilisateur</h5>
          <button class="close" data-dismiss="modal">
            <span class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body">





        <div class="card">
            <h4 class="card-header text-center">Vue sur l'utilisateur "<?php echo $user[0]['firstname'];?>"</h4>
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
                          <?php foreach ($user as $row)
                          {
                            echo '<tr>';
                            echo '<td>'. $row['ID'] . '</td>';
                            echo '<td>'. $row['email'] . '</td>';
                            echo '<td>'. $row['lastname'] . '</td>';
                            echo '<td>'. $row['firstname'] . '</td>';
                            echo '<td>'. $row['address'] . '</td>';
                            echo '<td>'. $row['telephone'] . '</td>';
                            echo '</tr>';
                          }
                              
                          ?>
                        
                      </tbody>
                      </table>
                      </div>
                        
                      
                      <!-- Fin affichage liste des utilisateurs -->

                      
                      </div>
                      
                      
                      </div> 

                      <div class="modal-footer">
                      <div class="container">
                      
                      <div class="row justify-content-center"> 
                      <button class="btn text-white mt-2" data-dismiss="modal" id="colorToChangeModal">Retour</button>       
                      </div>
                      </div>
                      </div>
                      
         

</div>
</div>
</div>

        <!-------End Read User Modal----------->