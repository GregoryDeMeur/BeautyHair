<?php namespace App\Controllers;
use App\Models;
session_start();
class HairdresserController extends BaseController
{

 
    

            public function hairdresser($pageId)
            {
                // Si l'utilisateur est enregistré et qu'il a un role 2 (hairdresser), alors on va le rediriger à la page souhaitée
                if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 2))
                {
                    switch($pageId)
                    {
                        case "dashboard":
                            return view('espace_hairdresser/hairdresser_dashboard'); 
                            break;

                        case "hairdresser_edit_profile":
                            return view('espace_hairdresser/hairdresser_edit_profile');
                            break;

                        case "hairdresser_consultation_appointments":
                            // On récupère les rendez-vous du coiffeur (si jamais il a pris rendez-vous pour se faire couper les cheveux)
                            $appointments = new \App\Models\Appointment();
                            $dataHairdresserAppointments['appointment'] = $appointments->getAllAppointmentsOfASpecifiedUserBySendingUserId($_SESSION['user']->ID);

                            // On récupère également son planning de travail
                            $appointmentsHairdresser = new \App\Models\Appointment();
                            $dataHairdresserAppointments['hairdresserAppointments'] = $appointmentsHairdresser->getPlanningOfAHairdresserBySendingId_Hairdresser($_SESSION['user']->ID);

                            

                            // Enfin, on passe tout ça et on accède à la vue
                            return view('espace_hairdresser/hairdresser_consultation_appointments',$dataHairdresserAppointments);
                            break;
                            
                            

                        case "hairdresser_mailbox":
                            return view('espace_hairdresser/hairdresser_mailbox');
                            break;

                        case "hairdresser_statistiques":
                            // On va aller parcourir les statistiques de l'utilisateur puis l'envoyer dans la vue
                            
                            $appointment = new \App\Models\Appointment();
                            // Statistique "nombre de rendez-vous" du côté client -> coiffeur
                            $data['appointmentCount'] = $appointment->getNumberOfAppointmentBySendingIdUser($_SESSION["user"]->ID);
                            // Statistique "somme totale de l'argent dépensé par l'utilisateur"
                            $data['appointmentSumTotal'] = $appointment->getTotalSumOfAppointmentsFromAUserBySendingIdUser($_SESSION["user"]->ID);
                            // Statistique "heures totales qu'un utilisateur est resté dans les salons BeautyHair" du côté client -> coiffeur
                            $data['appointmentTotalHoursSpent'] = $appointment->getTotalHoursSpentInBeautyHairSalonsBySendingIdUser($_SESSION["user"]->ID);
                            // Statistique "salon favoris" qui va renvoyer le nom du salon dont le nombre de rendez-vous d'un utilisateur dans un salon est le plus élevé
                            // Exemple : j'ai 3 rendez-vous salon A et 1 rendez-vous salon B => La fonction va renvoyer A
                            $data['favouriteSalon'] = $appointment->getFavouriteSalonOfAUserBySendingIdUser($_SESSION["user"]->ID);

                            // Statistique "nombre de rendez-vous total" du côté coiffeur -> client
                            $appointmentHairdresser = new \App\Models\Appointment();
                            $data['appointmentHairdresserCount'] = $appointmentHairdresser->getPlanningOfAHairdresserBySendingId_HairdresserWithACounter($_SESSION["user"]->ID);

                            // Statistique "spécialité la plus utilisée par le coiffeur"
                            $data['mostUsedSpeciality']=$appointmentHairdresser->getTheMostSpecialityUsedFromAHairdresserBySendingIdHairdresser($_SESSION["user"]->ID);

                            // Statistique "argent total gagné par un coiffeur"
                            $data['appointmentPrestationHairdresserSumTotal']=$appointmentHairdresser->getTotalSumOfPrestationsOfAHairdresserBySendingIdHairdresser($_SESSION["user"]->ID);

                            // Statistique "nombre totales d'heures prestées dans les salons de BeautyHair"
                            $data['appointmentPrestationsTotalHoursSpent']= $appointmentHairdresser->getTotalHoursSpentOfPrestationsOfAHairdresserBySendingIdHairdresser($_SESSION["user"]->ID);
                            

                            return view('espace_hairdresser/hairdresser_statistiques',$data);
                            break;
                        
                            
                            case "manager_consultation_all_appointments": 
                             if($_SESSION["salonOwner"]==1)
                                {
                                    // On récupère tout les rendez-vous du salon
                                    $appointment = new \App\Models\Appointment();
                                    $dataSalonAppointments['appointment'] = $appointment->getAllAppointmentsOfASpecifiedSalonBySendingIdSalon($_SESSION["salon"]["ID"]);
                                    return view('espace_hairdresser/manager/manager_consultation_all_appointments',$dataSalonAppointments);
                                break;
                                }
                                else
                                {
                                    return view('espace_hairdresser/hairdresser_dashboard');
                                }

                            
                            case "manager_change_informations_of_the_salon": 
                             if($_SESSION["salonOwner"]==1)
                                {
                                    // On récupère la description du salon pour pouvoir la modifier ensuite dans la vue
                                    $salon = new \App\Models\Salon();
                                    $dataSalon['salon'] = $salon->getSalonBySendingId($_SESSION["salon"]["ID"]);
                                    return view('espace_hairdresser/manager/manager_change_informations_of_the_salon',$dataSalon);
                                break;
                                }
                                else
                                {
                                    return view('espace_hairdresser/hairdresser_dashboard');
                                }


                            case "manager_change_schedule_of_the_salon": 
                             if($_SESSION["salonOwner"]==1)
                                {
                                    // On va récupérer l'horaire du salon du gérant, création d'une instance horaire
                                    $salonSchedule = new \App\Models\Salon_Schedule();	   
                                     
                                    // Recupération de l'horaire du salon pour l'afficher dans la vue                                   
                                    $salonData['lundi']= $salonSchedule->getMondayScheduleOfASpecifiedSalonBySendingIdSalon($_SESSION["salon"]["ID"]);
                                    $salonData['mardi']= $salonSchedule->getTuesdayScheduleOfASpecifiedSalonBySendingIdSalon($_SESSION["salon"]["ID"]);
                                    $salonData['mercredi']= $salonSchedule->getWednesdayScheduleOfASpecifiedSalonBySendingIdSalon($_SESSION["salon"]["ID"]);
                                    $salonData['jeudi']= $salonSchedule->getThursdayScheduleOfASpecifiedSalonBySendingIdSalon($_SESSION["salon"]["ID"]);
                                    $salonData['vendredi']= $salonSchedule->getFridayScheduleOfASpecifiedSalonBySendingIdSalon($_SESSION["salon"]["ID"]);
                                    $salonData['samedi']= $salonSchedule->getSaturdayScheduleOfASpecifiedSalonBySendingIdSalon($_SESSION["salon"]["ID"]);
                                    $salonData['dimanche']= $salonSchedule->getSundayScheduleOfASpecifiedSalonBySendingIdSalon($_SESSION["salon"]["ID"]);

                                    return view('espace_hairdresser/manager/manager_change_schedule_of_the_salon',$salonData);
                                break;
                                }
                                else
                                {
                                    return view('espace_hairdresser/hairdresser_dashboard');
                                }



                            case "manager_change_photos_of_the_salon": 
                             if($_SESSION["salonOwner"]==1)
                                {
                                    //  Recupération des photos du salon puis affichage de la vue
                                    $photoSalon = new \App\Models\Salon_Photo();
                                    $salonData['photo'] = $photoSalon->getAllPhotosOfTheSalonBySendingIdSalon($_SESSION["salon"]["ID"]);

                                    
                                    return view('espace_hairdresser/manager/manager_change_photos_of_the_salon',$salonData);
                                break;
                                }
                                else
                                {
                                    return view('espace_hairdresser/hairdresser_dashboard');
                                }


                            case "manager_show_hairdressers_of_the_salon": 
                                if($_SESSION["salonOwner"]==1)
                                    {
                                        //  Recupération des coiffeurs du salon puis affichage de la vue
                                        $hairdresserSalon = new \App\Models\Hairdresser_Salon();
                                        $salonData['hairdresser'] = $hairdresserSalon->getAllLastnameFirstnameIdHairdresserIdSalonOfAssignedHairdresserToSalonBySendingIdSalon($_SESSION["salon"]["ID"]);                                
                                        
                                        return view('espace_hairdresser/manager/manager_show_hairdressers_of_the_salon',$salonData);
                                    break;
                                    }
                                    else
                                    {
                                        return view('espace_hairdresser/hairdresser_dashboard');
                                    }        


                                
                                

                        default : return view('espace_hairdresser/hairdresser_dashboard');
                    }
                }
                else
                {
                    // Coiffeur pas enregistré => redirect page d'accueil.
                    header("Location: ../Home/index"); 
                    exit();
                }
            }
            
   
            public function hairdresser_edit_own_profile()
            {
                if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 2))
                {
                
                // Création d'une instance user    
                $user = new \App\Models\User();
                $dataUser = $user->getUserBySendingId($_POST["userId"]);

                // Function qui permet d'éditer le profil du coiffeur loggué.
                if(empty($_POST['emailUser']))
                    { 
                        // Oups.. L'email est vide.. Retour sur la vue de la liste des utilisateurs avec un message d'erreur
                       $_SESSION['errorLogUser'] = array("Le champ 'email' ne peut pas être vide") ;          
                        return redirect()->to(base_url('HairdresserController/hairdresser/hairdresser_edit_profile'));      
                    }
                    // On check si l'email enregistré n'est pas déjà utilisé dans la base de données
                $doesUserEmailExistsAlready = $user->checkIfEmailExistsInDatabaseBySendingEmail($_POST["emailUser"]);
                if ($doesUserEmailExistsAlready && $dataUser[0]["email"] != $_POST["emailUser"] )
                {
                    // Oups.. L'email est déjà utilisé par un autre utilisateur.. Retour sur la vue de la liste des utilisateurs avec un message d'erreur
                    $_SESSION['errorLogUser'] = array("Ce mail est déjà utilisé !") ;    
                    return redirect()->to(base_url('HairdresserController/hairdresser/hairdresser_edit_profile'));  
                }

                else
                    {    

                        // Création du nouvel utilisateur.
                        $user = new \App\Models\User(); 
                        
                        // Assignation des données éditées du coiffeurs
                        $dataUserToModify = array("email"=>$_POST["emailUser"],
                        "lastname"=>$_POST["lastnameUser"],
                        "firstname"=>$_POST["firstnameUser"],
                        "address"=>$_POST["addressUser"],
                        "telephone"=>$_POST["telephoneUser"],
                        "ID"=>$_POST["userId"]);

                        // Vu qu'il y a un changement sur sa propre session actuelle, il faut pas oublier de réassigner les bonnes valeurs dans la variable de session                      
                        $_SESSION['user']->email = $_POST["emailUser"];
                        $_SESSION['user']->lastname = $_POST["lastnameUser"];
                        $_SESSION['user']->firstname = $_POST["firstnameUser"];
                        $_SESSION['user']->address = $_POST["addressUser"];
                        $_SESSION['user']->telephone = $_POST["telephoneUser"];

                        // Update de l'utilisateur          
                         $user->updateUser($dataUserToModify);

                        // Message de confirmation
                        $_SESSION['successLogUser'] = array("Modifications effectuées") ;     
                        
                        return redirect()->to(base_url('HairdresserController/hairdresser/hairdresser_edit_profile'));

                    }

                }
            
            }
        
	//--------------------------------------------------------------------

}
