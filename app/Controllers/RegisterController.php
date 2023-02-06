<?php namespace App\Controllers;
use App\Models;
session_start();
class RegisterController extends BaseController
{

    public function register()
    {
              
      // Check si les informations d'inscriptions entrées par l'user ne sont pas vides
        // Check email
          if(empty($_POST['email']))
            { 
                echo "Le champ 'email' ne peut pas être vide";   
                return view('website/register');
            }
        // Check password
          if(empty($_POST['password']))
            {
                echo "Le champ 'password' ne peut pas être vide";
                return view('website/register');
            }
          
        // Check si le password correspond au password de confirmation
          if($_POST['password'] != $_POST['password_confirm'])
            {
                echo "La confirmation du password ne correspond pas avec le password introduit";
                return view('website/register');
            }
          
          else 
            {
            // [Création du nouvel utilisateur]

                // Création de son role (simple utilisateur)
                  $roleRepository = new \App\Models\Role();
                  $role = $roleRepository->getRoleBySendingRoleName("User");
            
                // Création du nouvel utilisateur.
                  $userToAddIntoDatabase = new \App\Models\User();

                // Hashage mot de passe du nouvel utilisateur.                  
                  $userToAddIntoDatabaseWithPasswordHash = $userToAddIntoDatabase->hashUserPassword($_POST["password"]);  

                // Assignation de l'utilisateur avec son mot de passe hashé.
                  $dataUserToAddIntoDatabase = array("email"=>$_POST["email"],
                                                     "password"=>$userToAddIntoDatabaseWithPasswordHash,
                                                     "lastname"=>$_POST["lastname"],
                                                     "firstname"=>$_POST["firstname"],
                                                     "address"=>$_POST["address"],
                                                     "telephone"=>$_POST["telephone"]);                      
                
                // Insertion du nouvel utilisateur avec son password hashé.         
                  $userToAddIntoDatabase->insertUserIntoTableUsers($dataUserToAddIntoDatabase);       
                  

            // Ensuite, insertion de son rôle de niveau 1 (utilisateur) dans la table users_roles.
                          
                 // Récupération de l'id du nouvel utilisateur enregistré 
                   $userId = $userToAddIntoDatabase->getUserId($_POST["email"]);
                   
                 // Assignation du rôle 1 (simple user) au nouvel utilisateur.
                   $dataUserToAddRoleIntoDatabase = array("ID_user"=>$userId->ID,
                                                          "ID_role"=>$role->ID);

                                      
                 // Insertion du rôle dans la database.
                   $roleRepository->insertRoleUser($dataUserToAddRoleIntoDatabase);


                // Message de confirmation
                echo "Inscription bien enregistrée. Bienvenue !";       
                return view('website/afterRegistration');
            }
          
      }




      //--------------------------------------------------------------------

}

    
