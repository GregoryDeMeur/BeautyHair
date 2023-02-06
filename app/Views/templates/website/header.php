<!-- Importation Bootstrap/jQuery/Fontawesome -->
<?php echo $this->include('importation/importation_BootstrapJQueryFontAwesome.php');?>

 <!--Include CSS website -->
 <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/website.css'); ?>">


 <div class="text-center  mb-5">
 
 <img src="<?php echo base_url()?>img/logo/BeautyHair.png" class="img-fluid mx-auto"  >


<!-- Header 1 NavBar Login -->
<div id="nav-menu1" class="mt-3">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="nav-menu1nav">
<a class="navbar-brand" href="/BeautyHair/Home/index">BeautyHair</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContentTwo" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContentTwo">
<ul class="navbar-nav mr-auto">

<li class="nav-item">
<a class="nav-link" href="/BeautyHair/Home/index">Accueil<span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
<a class="nav-link" href="/BeautyHair/Home/articles">News<span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
<a class="nav-link" href="/BeautyHair/Home/salons">Salons<span class="sr-only">(current)</span></a>
</li>

</ul>


    <?php
    if($_SESSION["loggedin"])
    {         
        // Message de bienvenue au user qui est connecté
        echo '<h6 class="modal-title text-white">' ?>Bienvenue  <?php echo $_SESSION["user"]->firstname  . ' </h6>';

        switch($_SESSION["userRole"])
    {
        case 1:
         echo '<a class="nav-link text-white" href="/BeautyHair/UserController/user/dashboard">
               <i class="fas fa-user mr-1"></i>
               Espace membre
               <span class="sr-only">(current)</span>
               </a>'; 
          break;                      
        
        case 2:
         echo '<a class="nav-link text-white" href="/BeautyHair/HairdresserController/hairdresser/dashboard">
               <i class="fas fa-user mr-1"></i>
               Espace coiffeur<span class="sr-only">(current)</span>
               </a>'; 
          break;
        
        case 3:
         echo '<h6  class="modal-title  ml-3 mr-2">
               <a class="nav-link text-white" href="/BeautyHair/AdminController/dashboard">
               <i class="fas fa-user mr-1"></i>
               Espace Admin<span class="sr-only">(current)</span>
               </a>
               </h6>';
          break;


    }
        echo '<h6 class="modal-title  ">
              <a  class="nav-link text-white" href="/BeautyHair/AuthentificationController/deconnexion">
              <i class="fas fa-user-times text-white mr-1"></i>
              
              Se déconnecter
              </a>
              </h6>' ;

    }
    else 
    {
     
     ?>       <h6 class="modal-title">
              <a class="nav-link text-white" data-toggle="modal" data-target="#inscriptionModal">           
              <i class="fas fa-user-plus mr-2"></i>
              
              Inscription    
              </a>
              </h6>

              <h6 class="modal-title text-white">
              <a class="nav-link text-white" href="/BeautyHair/Home/login">
              <i class="fas fa-user mr-2"></i>
              Se connecter
              </a> 
              </h6>
<?php }
    ?>

</div>
</div>
</nav>
<!-- End Header 1 NavBar Login -->







<!-- Inscription Modal -->
<div class="modal fade" id="inscriptionModal">      
          
          <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-center">
        
          <h5 class="modal-title w-100">Inscription sur BeautyHair</h5>
          <button class="close" data-dismiss="modal">
            <span class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        
        <br />
        
            <!-- Form Inscription dans DB -->
            <form method="POST" action="/BeautyHair/RegisterController/register" class="formRegister" id="registerForm">
            
            <div class="col-12 text-center">

            
              <div class="form-group mb-3">
                <label for="email">Adresse e-mail</label>
                <input type="email" class="form-control text-center needs-validation" id="email" aria-describedby="emailHelp" placeholder="Entrez votre e-mail" name="email" required>
                <div class="invalid-feedback">
                Introduisez un email valide.
                </div>
              </div>
              

              <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control text-center passwords" id="password" placeholder="Entrez votre mot de passe" name="password" required >
                <div class="invalid-feedback" id="passwordInvalid">
                Introduisez un mot de passe.
                </div>
                <div class="valid-feedback" id="passwordValid">
                  Valide
                </div>
                
              </div>
                
              <div class="form-group mb-3">
                <label for="password_confirm">Confirmer le password</label>
                <input type="password" class="form-control text-center passwords" id="password_confirm" placeholder="Confirmer votre mot de passe" name="password_confirm"  required >
                <div class="invalid-feedback" id="passwordConfirmInvalid">
                Confirmer votre mot de passe
                </div>   
                <div class="valid-feedback" id="passwordConfirmValid">
                  Valide
                </div>
              </div>
              
              <div class="form-group mb-3">
                <label for="nom">Nom</label>
                <input type="text" class="form-control text-center" id="lastname" placeholder="Entrez votre nom" name="lastname" required>
                <div class="invalid-feedback">
                Introduisez votre nom.
                </div>
              </div>
              
              <div class="form-group mb-3">
                <label for="password">Prénom</label>
                <input type="text" class="form-control text-center" id="firstname" placeholder="Entrez votre prénom" name="firstname" required>
                <div class="invalid-feedback">
                Introduisez votre prénom.
                </div>
              </div>
                
              <div class="form-group mb-3">
                <label for="password">Adresse</label>
                <input type="text" class="form-control text-center" id="address" placeholder="Entrez votre adresse" name="address" required>
                <div class="invalid-feedback">
                Introduisez une adresse valide.
                </div>
              </div>
                
              <div class="form-group mb-3">
                <label for="password">Telephone</label>
                <input type="text" class="form-control text-center" id="telephone" placeholder="Entrez votre numéro de téléphone" 
                name="telephone" required>
                <div class="invalid-feedback">
                Introduisez un numéro de téléphone valide.
                </div>
              </div>
                

                
              

            <!-- Fin du formulaire inscription -->
       

                      <div class="modal-footer">
                      <div class="container">
                      <div class="row justify-content-center">
                      
                      
                      <button type="submit" class="btn btn-primary" id="submitBtn">S'inscrire</button>
            
                <button class="btn btn-danger text-white ml-4" data-dismiss="modal">Annuler</button>
                </div>
    </div>
                </form>    
                      </div>
                      </div>
                      </div>
                      </div></div>
                      </div>

       
        <!-- END INSCRIPTION MODAL -->





</div>


 
</div>


<script>
 $(document).ready(function() {
   // Désactivation du bouton submit tant que tout les champs ne sont pas remplis
   $("#submitBtn").attr("disabled", true);
  // Check si le mot de passe, et sa confirmation match ensemble
  $("#password, #password_confirm").on("keyup", function() {
    if (
      $("#password").val() != "" &&
      $("#password_confirm").val() != "" &&
      $("#password").val() == $("#password_confirm").val() 
    ) {
      //$("#submitBtn").attr("disabled", false);
      $("#passwordConfirmValid").show();
      $("#passwordConfirmInvalid").hide();
      $("#passwordInvalid").hide();
      $("#passwordConfirmValid").html("Les deux mots de passes entrés correspondent.").css("color", "green");
      $("#passwordValid").show();
      $(".passwords").removeClass("is-invalid");
    } else {
      $("#submitBtn").attr("disabled", true);
      $("#passwordConfirmValid").hide();
      $("#passwordValid").hide();
      $("#passwordInvalid").show().html("Le mot de passe et la vérification ne match pas !").css("color","red");
      $("#passwordConfirmInvalid").show();
      $("#passwordConfirmInvalid")
        .html("Le mot de passe et la vérification ne match pas !")
        .css("color", "red");
      $(".passwords").addClass("is-invalid");
    }
  });
  let registerForm = document.getElementById("registerForm");
  // Validate on submit:
  registerForm.addEventListener(
    "submit",
    function(event) {
      if (registerForm.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
      }
      registerForm.classList.add("was-validated");
    },
    false
  );
  // Validate on input:
  registerForm.querySelectorAll(".form-control").forEach(input => {
    input.addEventListener("input", () => {
      if (input.checkValidity()) {
        input.classList.remove("is-invalid");
        input.classList.add("is-valid");
      } else {
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
      }
      var is_valid =
        $(".form-control").length === $(".form-control.is-valid").length;
      $("#submitBtn").attr("disabled", !is_valid);
    });
  });
});

</script>