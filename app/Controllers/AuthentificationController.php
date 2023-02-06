<?php namespace App\Controllers;
use App\Models;
session_start();
class AuthentificationController extends BaseController
{

    public function login()
              {
                  // Check si email et mot de passe que l'utilisateur a envoyé est correct
                 
                  $userUtils = new \App\Models\User();
                  $user = $userUtils->getUser($_POST["email"], $_POST["password"]);

                  // Check le role de l'utilisateur
                  
                  $role = new \App\Models\User_Role();
                  $roleUser = $role->getRoleUserBySendingIdUser($user->ID);

                  // Premier test pour voir si le username match avec le password inséré.
                  $data["userFirstname"] = $user->firstname;
                  $data["userLastname"] = $user->lastname;
            
                  if (($data["userFirstname"]) == null || $data["userLastname"] == null)
                      {
                          $_SESSION['errorLogin'] = array("Login et/ou password incorrect.");
                          return view('website/login',$data);

                      }
                      {
                        // Si il y a un enregistrement dans la table user, on va check si le compte n'est pas désactivé
                        $data["userActive"] = $user->isUserActive($user->ID);
                      }

                      if($data["userActive"] == 0)
                      {
                        $_SESSION['errorLogin'] = array("Votre compte est désactivé");
                        return view('website/login',$data);
                      }
                      else
                      {
                        // Si email et password correspondent, on assigne le compte à des $_SESSION, et ensuite on check le role du user en question.
                          $_SESSION["loggedin"] = true;
                          $_SESSION["user"] = $user;
                          $_SESSION["userRole"] = $roleUser->ID_role;

                        // On check, avant de rediriger l'utilisateur, de voir si c'est un coiffeur ; si oui, check également si il est gérant d'un salon de BeautyHair
                          if ($_SESSION["userRole"] == 2) // Si il a le role 2 (coiffeur)
                          {
                              // On récupère toutes les données de la table salon
                              $salon = new \App\Models\Salon();
                              $data['salon'] = $salon->getAllSalons();
                              // On peut maintenant faire une comparaison avec la session ID de l'utilisateur, et l'ID_owner de la table salon
                              // Si il y a un match, alors on lui attribue le rôle de gérant. Sinon, coiffeur simple.
                              foreach ($data["salon"] as $row)
                                {
                                  if ($row["ID_owner"] == $_SESSION["user"]->ID)
                                    {
                                      $_SESSION["salonOwner"] = 1;
                                      $_SESSION["salon"] = $row;

                                      break;
                                    }
                                  else
                                    {
                                      $_SESSION["salonOwner"] = 0 ;
                                    }
                                }

                          }

                          switch($_SESSION["userRole"])
                          {
                              case 1:
                                return view('espace_user/user_dashboard'); 
                                break;                      
                              
                              case 2:
                                return view('espace_hairdresser/hairdresser_dashboard'); 
                                break;
                              
                              case 3:
                                return view('espace_admin/admin_dashboard'); 
                                break;


                          }
                        
                           
                      }
              }

    public function deconnexion()
    {
      unset(
        $_SESSION["loggedin"],
        $_SESSION["user"],
        $_SESSION["userRole"],
        $_SESSION["salonOwner"],
           );

      session_unset();
      session_destroy();
      header("Location: ../Home/index");
      exit();
    }


	//--------------------------------------------------------------------

}