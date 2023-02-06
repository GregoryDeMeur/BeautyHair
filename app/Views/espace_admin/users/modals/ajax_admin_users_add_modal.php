<!-- ADD User Modal -->
<div class="modal fade" id="startModalAddUser">      
          
          <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-white" id="colorToChangeModal">
          <h5 class="modal-title">Ajouter utilisateur</h5>
          <button class="close" data-dismiss="modal">
            <span class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        

          <!-- Form Inscription dans DB -->
          <form method="POST" action="/BeautyHair/AdminUserController/addUser" div class="col-sm-12" id="formAddUser">

<div class="form-group">
<label for="email">Adresse e-mail</label>
<input type="email" class="form-control" id="emailUser" aria-describedby="emailUser" placeholder="Insérez l'email" name="emailUser">
</div>

<div class="form-group">
<label for="passwordUser">Password</label>
<input type="password" class="form-control" id="passwordUser" placeholder="Insérez le password" name="passwordUser">
</div>

<div class="form-group">
<label for="password_confirm">Confirmer le password</label>
<input type="password" class="form-control" id="password_confirm" placeholder="Confirmer le password" name="password_confirm">
</div>

<div class="form-group">
<label for="lastnameUser">Nom</label>
<input type="text" class="form-control" id="lastnameUser" placeholder="Insérez le nom" name="lastnameUser">
</div>

<div class="form-group">
<label for="firstnameUser">Prénom</label>
<input type="text" class="form-control" id="firstnameUser" placeholder="Insérez le prénom" name="firstnameUser">
</div>

<div class="form-group">
<label for="addressUser">Adresse</label>
<input type="text" class="form-control" id="addressUser" placeholder="Insérez l'adresse" name="addressUser">
</div>

<div class="form-group">
<label for="telephoneUser">Téléphone</label>
<input type="text" class="form-control" id="telephoneUser" placeholder="N° de téléphone" name="telephoneUser">
</div>


Role de l'utilisateur
<!-- Grâce au parametre envoyé via le AdminController, on est en mesure de récupérer chaque rôle disponible dans la database-->


<select class="form-group custom-select" name="roleUser" id="roleUser" placeholder="Role">

<?php foreach($roles as $row)
    {
      echo '<option value="' .  $row->role_name.'"> ' . $row->role_name . '</option>';
    }
?>
</select>


<br />


                      <div class="modal-footer">
                      <div class="container">
                      <div class="row justify-content-center">
                      
                      
                <button type="submit" class="btn text-white mr-3" id="colorToChangeModal">Enregistrer un nouvel utilisateur dans la base de donnée</button>
                <button class="btn btn-danger text-white ml-4" data-dismiss="modal">Annuler</button>
                </div>
                </form>    
                      </div>
                      </div>



                
        <!-- Fin du formulaire inscription -->

        



        </div>
</div>
</div>
                                  
</div>


       

        <!-------End ADD User Modal----------->






