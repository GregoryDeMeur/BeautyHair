<?php namespace App\Controllers;
use App\Models;
session_start();
class AdminUserController extends BaseController
{

            public function addUser()
            {
                // On va d'abord check les informations envoyées avant d'enregistrer dans la base de données.
                        
                if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
                {
                    // On check si l'email enregistré n'est pas déjà utilisé dans la base de données
                    $userTestEmail = new \App\Models\User();
                    if ($userTestEmail->checkIfEmailExistsInDatabaseBySendingEmail($_POST["emailUser"]))
                    {
                       // Oups.. L'email est déjà utilisé.. Retour sur la vue de la liste des utilisateurs avec un message d'erreur
                       $_SESSION['errorLogUser'] = array("Ce mail est déjà utilisé !") ;    
                       return redirect()->to(base_url('AdminController/admin_show_users'));   
                    }
                      // Check email 
                    if(empty($_POST['emailUser']))
                    { 
                        $_SESSION['errorLogUser'] = array("Le champ 'email' ne peut pas être vide.") ;   
                        return redirect()->to(base_url('AdminController/admin_show_users'));
                       
                    }
                    // Check password
                    if(empty($_POST['passwordUser']))
                    {
                        $_SESSION['errorLogUser'] = array("Le champ 'password' ne peut pas être vide.") ; 
                        return redirect()->to(base_url('AdminController/admin_show_users'));
                    }
                    
                    // Check si le password correspond au password de confirmation
                    if($_POST['passwordUser'] != $_POST['password_confirm'])
                    {
                        $_SESSION['errorLogUser'] = array("La confirmation du password ne correspond pas avec le password introduit, réessayer.") ; 
                        return redirect()->to(base_url('AdminController/admin_show_users'));
                    }
                    else 
                    {
                    // Si les informations entrées sont valides, on va les insérer dans la database.

                        // Création d'une instance role
                        $roleRepository = new \App\Models\Role();
                        $userRoleName = $_POST["roleUser"];
                        $role = $roleRepository->getRoleBySendingRoleName($userRoleName);

                        // Création du nouvel utilisateur.
                        $userToAddIntoDatabase = new \App\Models\User(); 

                        // Hashage mot de passe du nouvel utilisateur.                  
                        $userToAddIntoDatabaseWithPasswordHash = $userToAddIntoDatabase->hashUserPassword($_POST["passwordUser"]);    

                        // Assignation de l'utilisateur avec son mot de passe hashé.
                        $dataUserToAddIntoDatabase = array("email"=>$_POST["emailUser"],
                        "password"=>$userToAddIntoDatabaseWithPasswordHash,
                        "lastname"=>$_POST["lastnameUser"],
                        "firstname"=>$_POST["firstnameUser"],
                        "address"=>$_POST["addressUser"],
                        "telephone"=>$_POST["telephoneUser"]);

                        // Insertion du nouvel utilisateur avec son password hashé.         
                         $userToAddIntoDatabase->insertUserIntoTableUsers($dataUserToAddIntoDatabase);

                        // Et ensuite, on insère son rôle
                        // Récupération de l'id du nouvel utilisateur enregistré 
                        $userId = $userToAddIntoDatabase->getUserId($_POST["emailUser"]);
                   
                        // Assignation du rôle du nouvel utilisateur défini par l'administrateur.
                        $dataUserToAddRoleIntoDatabase = array("ID_user"=>$userId->ID,
                                                               "ID_role"=>$role->ID);
                        
                        // Insertion du rôle dans la database.
                        $roleRepository->insertRoleUser($dataUserToAddRoleIntoDatabase);

                    // Si le rôle = 2 (correspond au hairdresser), il faut également ajouter l'enregistrement dans la table "hairdresser".
                        // Création d'une instance hairdresser.
                        if ($_POST['roleUser'] == 'Hairdresser')
                        {
                            $hairdresser = new \App\Models\Hairdresser();
                            $hairdresserToAddIntoDatabase = array("ID_user"=>$userId->ID);
    
                            // Insertion du nouveau hairdresser dans la table hairdressers.
                            $hairdresser->insertHairdresserIntoTableHairdressers($hairdresserToAddIntoDatabase);
                        }
                        
                    
                        // Message de confirmation
                        $_SESSION['successLogUser'] = array('Le nouvel utilisateur '. $_POST["lastnameUser"] . ' ' . $_POST["firstnameUser"] . ' a bien été ajouté dans la base de données !');     
                        
                        return redirect()->to(base_url('AdminController/admin_show_users'));
                        
                        
                    }
                }

            }


            public function modifyUser()
            {
                if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
                {

                
                // Check si les informations d'inscriptions entrées par l'user ne sont pas vides
                        // Check email
                    if(empty($_POST['emailUser']))
                    { 
                        // On attribue une variable de session pour faire "pop" un message de succès lors de la redirection
                        $_SESSION['errorLogUser'] = array('La modification de l\'utilisateur '. $_POST["lastnameUser"] . ' ' . $_POST["firstnameUser"] . ' n\'a pas pu être faite, le mail ne peut pas être vide  !');   
                        return redirect()->to(base_url('AdminController/admin_show_users'));
                       
                    }
                    else
                    {

                // Si les informations entrées sont valides, on va les modifier dans la database.

                        // Création d'une instance role
                        $roleRepository = new \App\Models\Role();
                        $userRoleName = $_POST["roleUser"];
                        $role = $roleRepository->getRoleBySendingRoleName($userRoleName);

                        // Création du nouvel utilisateur.
                        $userToModify = new \App\Models\User(); 
                        
                        // Assignation de l'utilisateur 
                        $dataUserToModify = array("email"=>$_POST["emailUser"],
                        "lastname"=>$_POST["lastnameUser"],
                        "firstname"=>$_POST["firstnameUser"],
                        "address"=>$_POST["addressUser"],
                        "telephone"=>$_POST["telephoneUser"],
                        "ID"=>$_POST["userId"]);

                        

                        // Update de l'utilisateur          
                         $userToModify->updateUser($dataUserToModify);

                        // Ensuite, on va update son role
                        // Assignation du rôle du nouvel utilisateur défini par l'administrateur.
                        $dataRoleUserToUpdateIntoDatabase = array("ID_user"=>$_POST["userId"],
                                                                  "ID_role"=>$role->ID);
                        
                        // Modification du rôle dans la database.
                        $userRoleRepository = new \App\Models\User_Role();
                        $userRoleRepository->updateRoleUser($dataRoleUserToUpdateIntoDatabase);


/////////////////////////  CONDITIONS UPDATE HAIRDRESSER  ///////////////////////////////////////////////////////////////////////////////////////////////////////////

                        // Si le rôle = 2 (correspond au hairdresser), il faut également ajouter l'enregistrement dans la table "hairdresser".

                        // Mais d'abord, il faut tester si le role avant update est hairdresser, pour éviter une insertion de doublon inutile.
                        // Si il est déjà hairdresser, il est alors DEJA inscrit dans la table hairdresser, donc pas besoin de modifier la row.
                        if ($_POST['roleBeforeUpdate'] == $_POST['roleUser'] && $_POST["roleUser"] == "Hairdresser")
                        {
                            // Message de confirmation
                            echo "Modification effectuée.";      
                            // On attribue une variable de session pour faire "pop" un message de succès lors de la redirection
                            $_SESSION['successLogUser'] = array('La modification de l\'utilisateur '. $_POST["lastnameUser"] . ' ' . $_POST["firstnameUser"] . ' a bien été effectuée !'); 
                            return redirect()->to(base_url('AdminController/admin_show_users'));
                        }

                        // Si il n'était pas hairdresser, et que l'admin change son role en hairdresser, il faut ajouter une row dans la table hairdresser
                        // pour cet enregistrement.
                        if ($_POST['roleBeforeUpdate'] != $_POST['roleUser'] && $_POST["roleUser"] == "Hairdresser")
                        {
                            $hairdresser = new \App\Models\Hairdresser();
                            $hairdresserToAddIntoDatabase = array("ID_user"=>$_POST["userId"]);
    
                            // Insertion du nouveau hairdresser dans la table hairdressers.
                            $hairdresser->insertHairdresserIntoTableHairdressers($hairdresserToAddIntoDatabase);

                            // Message de confirmation
                            echo "Modification effectuée.";      
                            // On attribue une variable de session pour faire "pop" un message de succès lors de la redirection
                            $_SESSION['successLogUser'] = array('La modification de l\'utilisateur '. $_POST["lastnameUser"] . ' ' . $_POST["firstnameUser"] . ' a bien été effectuée !'); 
                            return redirect()->to(base_url('AdminController/admin_show_users'));
                        }

                        // Il faut également prendre en compte qu'un hairdresser peut se faire changer son rôle par l'admin. Et, du coup, si il perd son rôle de hairdresser, il faut alors supprimer son enregistrement dans la table "hairdresser".               
                        if ($_POST['roleBeforeUpdate'] == "Hairdresser" && $_POST['roleUser'] != "Hairdresser")
                        {
                            $hairdresser = new \App\Models\Hairdresser();
                            
                            $hairdresser->deleteHairdresserFromTableHairdressers($_POST["userId"]);

                            // Message de confirmation
                            echo "Modification effectuée.";      
                            // On attribue une variable de session pour faire "pop" un message de succès lors de la redirection
                            $_SESSION['successLogUser'] = array('La modification de l\'utilisateur '. $_POST["lastnameUser"] . ' ' . $_POST["firstnameUser"] . ' a bien été effectuée !'); 
                        
                            return redirect()->to(base_url('AdminController/admin_show_users'));
                        }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        

                        // On attribue une variable de session pour faire "pop" un message de succès lors de la redirection
                        $_SESSION['successLogUser'] = array('La modification de l\'utilisateur '. $_POST["lastnameUser"] . ' ' . $_POST["firstnameUser"] . ' a bien été effectuée !'); 
                        
                        return redirect()->to(base_url('AdminController/admin_show_users'));

                        
                        
                        
                    }
                }

            }


            public function deleteUser($id)
            {

                // Fonction qui supprime l'utilisateur en question.
                // Suppression des enregistrements de l'$id sur les tables users_roles, hairdressers(si l'utilisateur a pour role hairdresser), users.
                if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
                {

                
                $user = new \App\Models\User();
                $user_role = new \App\Models\User_Role();
                $hairdresser = new \App\Models\Hairdresser();
                $hairdresser_specialities = new \App\Models\Hairdresser_speciality();
                $salon = new \App\Models\Salon();
                $appointment = new \App\Models\Appointment();
                $appointmentHairdresser = new \App\Models\Appointment();
                $hairdresser_salon = new \App\Models\Hairdresser_Salon();
                
                // Récupération du nom et prénom de l'utilisateur pour l'afficher dans le message de confirmation de suppression dans la vue par la suite
                $userFirstnameAndLastNameToDelete = $user->getUserBySendingId($id);
                // On s'assure de supprimer tout les enregistrements (FK) si c'est un hairdresser
                // On check si c'est un salon owner, et si oui, on remplace le champ de l'ID Owner par NULL
                $salon->deleteSalonOwnerIfExist($id);
                // Suppression de ses spécialités
                $hairdresser_specialities->deleteHairdresserSpecialityFromTableHairdresser_SpecialitiesBySendingIdHairdresser($id);  
                // Suppression des assignations du coiffeur aux salons
                $hairdresser_salon->deleteAssignedHairdresserOfAllSalonsBySendingIdHairdresser($id)  ;
                // Suppression de son rôle
                $user_role->deleteUserFromTableUsers_Roles($id);
                // Suppression de ses rendez-vous (on s'assure que si c'est un coiffeur, on supprime tout les rdv de l'idHairdresser aussi)
                // Car il n'a pas lieu de garder des rendez-vous de client dont un coiffeur a été supprimé de la db.
                $appointment->deleteAllAppointmentsOfASpecifiedUserBySendingIdUser($id);
                $appointmentHairdresser->deleteAllAppointmentsOfASpecifiedHairdresserBySendingIdHairdresser($id);
                // Suppression du hairdresser
                $hairdresser->deleteHairdresserFromTableHairdressers($id);
                // Et enfin, suppression de l'user
                $user->deleteUserFromTableUsers($id);

            
                // Dès que la suppression est faite, on réactualise l'affiche de la liste des utilisateurs
                // en excluant l'enregistrement qui vient d'être supprimé.
                $userTwo = new \App\Models\User();
                $data['user'] = $userTwo->getAllUsers();

                echo 'L\'utilisateur ' . $id . ' a été supprimé de la base de données ! ' ;
                // On attribue une variable de session pour faire "pop" un message de succès lors de la redirection
                $_SESSION['successLogUser'] = array('La suppression de l\'utilisateur '. $userFirstnameAndLastNameToDelete[0]["lastname"] . ' ' . $userFirstnameAndLastNameToDelete[0]["firstname"] . ' a bien été effectuée !');
                return redirect()->to(base_url('AdminController/admin_show_users'));
               
                }      

            }


            public function disableUser($idUser)
            {
                // Modification de la désactivation/réactivation de compte
                $user = new \App\Models\User();
                $dataActiveUser = array("active"=>$_POST["userActive"],
                                        "ID"=>$idUser);
                $data['user'] = $user->enableOrDisableUser($dataActiveUser);
                // On attribue une variable de session pour faire "pop" un message de succès lors de la redirection
                $_SESSION['successLogUser'] = array('L\'activation/désactivation du compte '. $userFirstnameAndLastNameToDelete[0]["lastname"] . ' ' . $userFirstnameAndLastNameToDelete[0]["firstname"] . ' a bien été effectuée !');
                return redirect()->to(base_url('AdminController/admin_show_users'));
            }



}