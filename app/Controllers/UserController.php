<?php namespace App\Controllers;
use App\Models;
session_start();
class UserController extends BaseController
{

 
    
 

            public function user($pageId)
            {
                // Si l'utilisateur est enregistré et qu'il a un role 1 (user), alors on va le rediriger à la page souhaitée
                if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 1))
                {
                   
                    switch($pageId)
                    {
                        case "dashboard":
                            return view('espace_user/user_dashboard'); 
                            break;

                        case "user_edit_profile":
                            return view('espace_user/user_edit_profile');
                            break;

                        case "user_consultation_appointments":
                            $appointments = new \App\Models\Appointment();
                            $dataUserAppointments['appointment'] = $appointments->getAllAppointmentsOfASpecifiedUserBySendingUserId($_SESSION['user']->ID);
                            return view('espace_user/user_consultation_appointments',$dataUserAppointments);
                            break;

                        case "user_mailbox":
                            return view('espace_user/user_mailbox');
                            break;

                        case "user_statistiques":
                            // On va aller parcourir les statistiques de l'utilisateur puis l'envoyer dans la vue
                            
                            $appointment = new \App\Models\Appointment();
                            // Statistique "nombre de rendez-vous"
                            $data['appointmentCount'] = $appointment->getNumberOfAppointmentBySendingIdUser($_SESSION["user"]->ID);
                            // Statistique "somme totale de l'argent dépensé par l'utilisateur"
                            $data['appointmentSumTotal'] = $appointment->getTotalSumOfAppointmentsFromAUserBySendingIdUser($_SESSION["user"]->ID);
                            // Statistique "heures totales qu'un utilisateur est resté dans les salons BeautyHair"
                            $data['appointmentTotalHoursSpent'] = $appointment->getTotalHoursSpentInBeautyHairSalonsBySendingIdUser($_SESSION["user"]->ID);
                            // Statistique "salon favoris" qui va renvoyer le nom du salon dont le nombre de rendez-vous d'un utilisateur dans un salon est le plus élevé
                            // Exemple : j'ai 3 rendez-vous salon A et 1 rendez-vous salon B => La fonction va renvoyer A dans l'index à l'indice 0, et on va afficher cet index dans la vue.
                            $data['favouriteSalon'] = $appointment->getFavouriteSalonOfAUserBySendingIdUser($_SESSION["user"]->ID);

                            return view('espace_user/user_statistiques',$data);
                            break;

                        default : return view('espace_user/user_dashboard');
                    }
                }
                else
                {
                    // Utilisateur pas enregistré => redirect page d'accueil.
                    header("Location: ../Home/index"); 
                    exit();
                }
            }

           

            public function user_edit_own_profile()
            {
                if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 1))
                {

                $user = new \App\Models\User();
                $dataUser = $user->getUserBySendingId($_POST["userId"]);

                // Function qui permet d'éditer le profil de l'utilisateur loggué.
                if(empty($_POST['emailUser']))
                    { 
                        // Oups.. L'email est vide.. Retour sur la vue de la liste des utilisateurs avec un message d'erreur
                       $_SESSION['errorLogUser'] = array("Le champ 'email' ne peut pas être vide") ;          
                        return redirect()->to(base_url('UserController/user/user_edit_profile'));      
                    }
                // On check si l'email enregistré n'est pas déjà utilisé dans la base de données
                $doesUserEmailExistsAlready = $user->checkIfEmailExistsInDatabaseBySendingEmail($_POST["emailUser"]);
                if ($doesUserEmailExistsAlready && $dataUser[0]["email"] != $_POST["emailUser"] )
                {
                    // Oups.. L'email est déjà utilisé par un autre utilisateur.. Retour sur la vue de la liste des utilisateurs avec un message d'erreur
                    $_SESSION['errorLogUser'] = array("Ce mail est déjà utilisé !") ;    
                    return redirect()->to(base_url('UserController/user/user_edit_profile'));  
                }
                else
                    {    

                        // Création du nouvel utilisateur.
                        $user = new \App\Models\User(); 
                        
                        // Assignation de l'utilisateur 
                        $dataUserToModify = array("email"=>$_POST["emailUser"],
                        "lastname"=>$_POST["lastnameUser"],
                        "firstname"=>$_POST["firstnameUser"],
                        "address"=>$_POST["addressUser"],
                        "telephone"=>$_POST["telephoneUser"],
                        "ID"=>$_POST["userId"]);

                        // Vu qu'il y a un changement sur sa propre session actuelle, il faut pas oublier de réassigner les bonnes valeurs
                        // dans la variable de session :
                        $_SESSION['user']->email = $_POST["emailUser"];
                        $_SESSION['user']->lastname = $_POST["lastnameUser"];
                        $_SESSION['user']->firstname = $_POST["firstnameUser"];
                        $_SESSION['user']->address = $_POST["addressUser"];
                        $_SESSION['user']->telephone = $_POST["telephoneUser"];

                        // Update de l'utilisateur          
                         $user->updateUser($dataUserToModify);

                        // Message de confirmation
                        $_SESSION['successLogUser'] = array("Modifications effectuées") ;          
                        return redirect()->to(base_url('UserController/user/user_edit_profile'));  

                    }
                }
                    
            }


            public function user_desactivate_profile()
            {
                // Désactivation du compte de l'utilisateur
                $user = new \App\Models\User();
                $dataActiveUser = array("active"=>0,
                                        "ID"=>$_SESSION['user']->ID);
                $data['user'] = $user->enableOrDisableUser($dataActiveUser);
                // On redirige l'utilisateur vers la page d'accueil
                unset(
                    $_SESSION["loggedin"],
                    $_SESSION["user"],
                    $_SESSION["userRole"],
                    $_SESSION["salonOwner"],
                       );
            
                  session_unset();
                  session_destroy();
                  
                return redirect()->to(base_url('Home/index'));
            }
            
   
        
	//--------------------------------------------------------------------

}
