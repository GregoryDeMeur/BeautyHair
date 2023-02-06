<?php namespace App\Controllers;
use App\Models;
session_start();
class AdminController extends BaseController
{
    
        
            public function dashboard()
            {
                if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
                {      
                    return view('espace_admin/admin_dashboard');
                }
                
            }


            public function admin_edit_profile()
            {
                if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
                {
                    return view('espace_admin/admin_edit_profile');
                }
            }

            public function admin_show_users()
            {
                if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
                {
                    // On va garder en mémoire la liste de tout les utilisateurs dans la base de données
                    // avant de charger la vue.

                    $user = new \App\Models\User();
                    $data['user'] = $user->getAllUsers();
                    $modele = new \App\Models\Role();
                    $data['roles'] = $modele->getAllRoles();

                    return view('espace_admin/users/admin_show_users',$data);
                }
                
            }

             
            public function admin_show_salons()
            {
                if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
                {
                    // On va garder en mémoire la liste de tout les salons dans la base de données
                    // avant de charger la vue.

                    $salon = new \App\Models\Salon();
                    $data['salon'] = $salon->getAllSalons();

                    // Récupération de tout les hairdressers pour les placer dans le form select
					// lors du choix de selection du gérant dans le modal "add new salon"
					$user = new \App\Models\User();
					$data['allHairdressers'] = $user->getAllIdLastnameFirstnameHairdressers();

                    return view('espace_admin/salons/admin_show_salons',$data);
                }
            }

             

            public function admin_show_specialities()
            {
                if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
                {
                    // On va garder en mémoire la liste de tout les salons dans la base de données
                    // avant de charger la vue.

                    $speciality = new \App\Models\Speciality();
                    $data['speciality'] = $speciality->getAllSpecialities();

                    return view('espace_admin/specialities/admin_show_specialities',$data);
                }
            }


           


            public function admin_show_assign_specialities()
            {
                if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
                {
                    // On va garder en mémoire la liste de tout les coiffeurs de la base de données
                    // avant de charger la vue.

                    $hairdresser = new \App\Models\User();
                    $data['hairdresser'] = $hairdresser->getAllIdLastnameFirstnameHairdressers();

                    return view('espace_admin/assign_specialities/admin_show_assign_specialities',$data);
                }
            }


            public function admin_show_assign_hairdresser_to_salon()
            {
                if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
                {
                    // On va garder en mémoire la liste de tout les coiffeurs de la base de données
                    // ET la liste de tout les salons disponibles avant de charger la vue.

                    $hairdresser = new \App\Models\User();
                    $data['hairdresser'] = $hairdresser->getAllIdLastnameFirstnameHairdressers();

                    $salon = new \App\Models\Salon();
                    $data['salon'] = $salon->getAllSalons();

                    // On va faire des requêtes SQL (jointures) sur certaines tables pour récupérer nom,prénom,ID hairdresser/salon
                    // Et pour pouvoir ensuite afficher tout ça dans un tableau
                    $hairdresserAssignedToSalon = new \App\Models\Hairdresser_Salon();
                    $data['hairdresserAssignedToSalon']= $hairdresserAssignedToSalon->getAllLastnameFirstnameIdHairdresserIdSalonOfAssignedHairdressersToSalons();

                    return view('espace_admin/assign_hairdresser_to_salon/admin_show_assign_hairdresser_to_salon',$data);
                }
            }


            public function admin_show_articles()
            {
                if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
                {
                    // On récupère tous les articles + les créateurs
                    $article = new \App\Models\Article();
                    $data['article'] = $article->getAllArticles();

                    return view('espace_admin/articles/admin_show_articles',$data);
                }
            }



            public function admin_edit_own_profile()
            {
                // Function qui permet d'éditer le profil de l'admin loggué.
                if(empty($_POST['emailUser']))
                    { 
                        // On attribue une variable de session pour faire "pop" un message d'erreur succès lors de la redirection
			        	$_SESSION['errorLogUser'] = array('Le champ "email" ne peut pas être vide'); 
                        return redirect()->to(base_url('AdminController/admin_edit_profile'));      
                    }
                else
                    {    

                        // Création du nouvel utilisateur.
                        $admin = new \App\Models\User(); 
                        
                        // Assignation de l'utilisateur 
                        $dataAdminToModify = array("email"=>$_POST["emailUser"],
                        "lastname"=>$_POST["lastnameUser"],
                        "firstname"=>$_POST["firstnameUser"],
                        "address"=>$_POST["addressUser"],
                        "telephone"=>$_POST["telephoneUser"],
                        "ID"=>$_POST["userId"]);

                        

                        // Update de l'utilisateur          
                        try{
                            $admin->updateUser($dataAdminToModify);
                        }
                        catch(\Exception $e)
                        {
                            // On attribue une variable de session pour faire "pop" un message d'erreur  lors de la redirection
                        $_SESSION['errorLogUser'] = array('Il y a une erreur lors de la modification de votre profil. Peut être serait-ce du au changement de mail que vous venez de faire et qui est déjà utilisé dans la base de données ?'); 
                        return redirect()->to(base_url('AdminController/admin_edit_profile'));
                        }
                        
                        // Si il n'y a pas d'exceptions, ça signifie que l'update a fonctionné dans la base de données
                        // Vu qu'il y a un changement sur sa propre session actuelle, il ne faut pas oublier de réassigner les bonnes valeurs
                        // dans la variable de session :
                        $_SESSION['user']->email = $_POST["emailUser"];
                        $_SESSION['user']->lastname = $_POST["lastnameUser"];
                        $_SESSION['user']->firstname = $_POST["firstnameUser"];
                        $_SESSION['user']->address = $_POST["addressUser"];
                        $_SESSION['user']->telephone = $_POST["telephoneUser"];
          
                        // On attribue une variable de session pour faire "pop" un message de succès lors de la redirection
			        	$_SESSION['successLogUser'] = array('Modification effectuée'); 
                        return redirect()->to(base_url('AdminController/admin_edit_profile'));

                    }

            
            }


            public function admin_show_appointments()
            {
                // Chargement de tout les rendez-vous puis accès à la vue
                $appointment = new \App\Models\Appointment();
                $dataAppointment['appointment'] = $appointment->getAllAppointments();

                // Chargement de tout les salons pour les afficher dans un <form select>
                $salon = new \App\Models\Salon();
                $dataAppointment['salon'] = $salon->getAllSalons();
                
                return view('espace_admin/appointments/admin_show_appointments',$dataAppointment);
            }
            
            public function admin_delete_appointments()
            {
                // Chargement de tout les rendez-vous et des noms des salons, puis accès à la vue
                $appointment = new \App\Models\Appointment();
                $dataAppointment['appointment'] = $appointment->getAllAppointmentsAndSalonsNames();

                

                return view('espace_admin/appointments/admin_delete_appointments',$dataAppointment);
            }


	//--------------------------------------------------------------------

}
