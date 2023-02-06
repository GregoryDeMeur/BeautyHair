<!-- Modify User Modal -->


        

          <!-- Modify User Confirmation -->
          <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-white" id="colorToChangeModal">
          <h5 class="modal-title">Modification de l'utilisateur</h5>
          <button class="close" data-dismiss="modal">
            <span class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body">





        <div class="card">
            <h4 class="card-header text-center">Modifier l'utilisateur </h4>
            <div class="card-body">
                <h3 class=mb-3>Utilisateur = "<?php echo $user[0]['firstname']?>"</h3>


                            
                     
                      <!-- Formulaire edit profile -->
              <form method="POST" action="/BeautyHair/AdminUserController/modifyUser">

                 <input type="hidden" name="userId" value="<?php echo $user[0]['ID']?>">
                 <input type="hidden" name="roleBeforeUpdate" value="<?php echo $roleUserActuel->role_name  ?>">

                 <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="emailUser" value="<?php echo $user[0]['email'] ?>">
                </div>                

                <div class="form-group">
                  <label for="name">Nom</label>
                  <input type="text" class="form-control" name="lastnameUser" value="<?php echo $user[0]['lastname']  ?>">
                </div>

                <div class="form-group">
                  <label for="prenom">Prénom</label>
                  <input type="text" class="form-control" name="firstnameUser" value="<?php echo $user[0]['firstname'] ?>">
                </div>
               
                <div class="form-group">
                  <label for="adresse">Adresse</label>
                  <input type="text" class="form-control" name="addressUser" value="<?php echo $user[0]['address'] ?>">
                </div>

                <div class="form-group">
                  <label for="telephone">Téléphone</label>
                  <input type="text" class="form-control" name="telephoneUser" value="<?php echo $user[0]['telephone'] ?>">
                </div>

                <!-- Dans ce select, on va s'assurer d'afficher par défaut le role que l'utilisateur a actuellement, tout en affichant les autres rôles 
                     disponibles -->
                     Role<span id="tinyFont" class="text-muted"> (actuellement, <?php echo $user[0]['firstname'] . ' est ' . $roleUserActuel->role_name . ')' ?></span>   
                <select class="form-group custom-select mt-2" name="roleUser" id="roleUser" placeholder="Role">
                
                <?php foreach($allRoles as $row)
                    {
                      // Condition pour afficher le rôle que l'utilisateur a ACTUELLEMENT
                      if ($row->role_name == $roleUserActuel->role_name)
                      {
                        echo '<option selected="'.$roleUserActuel->role_name . 'value="' .  $roleUserActuel->role_name.'"> ' . $roleUserActuel->role_name. '</option>';
                      }
                      else 
                      {
                        echo '<option value="' .  $row->role_name.'"> ' . $row->role_name. '</option>';
                      }
                      
                     
                    }
                ?>
                </select>

               
                 
                      <div class="modal-footer">
                      <div class="container">
                      <div class="row justify-content-center">
                      
                      
                <button type="submit" class="btn text-white mr-3" id="colorToChangeModal">Modifier l'utilisateur</button>
                <button class="btn btn-danger text-white ml-4" data-dismiss="modal">Annuler la modification</button>
                </div>
                </form>    
                      </div>
                      </div>

       
         

</div>
</div>
</div>

        <!-------End Modify User Modal----------->