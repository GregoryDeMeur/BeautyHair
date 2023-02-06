<?php namespace App\Controllers;
use App\Models;
session_start();
class AdminAjaxAssignSpecialitiesController extends BaseController
{

            public function ajax_admin_display_specialities_with_hairdressers($idHairdresser)
            {
                if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
                {
                    // Requête AJAX
                    
                    // Premièrement, on va aller chercher toutes les spécialités du coiffeur en question
                    $specialitiesOfTheHairdresser = new \App\Models\Speciality();
                    $data['speciality_name'] = $specialitiesOfTheHairdresser->getAllSpecialitiesOfTheHairdresserBySendingIdHairdresser($idHairdresser);
                    
                    // Deuxièmement, on va chercher le firstname et le lastname du coiffeur, pour l'afficher en ajax sur la seconde vue.
                    $hairdresser = new \App\Models\User();
                    $data['hairdresser'] = $hairdresser->getFirstnameLastnameOfTheHairdresserBySendingId($idHairdresser);
                    // Récupération également de l'id du hairdresser, qui va permettre de faire la requête SQL sur un delete assign/spéciality.
                    $data['hairdresserId'][0] = $idHairdresser;
                    return view('espace_admin/assign_specialities/ajax_admin_show_assign_specialities_2',$data);

                    

                }
            }

            public function ajax_admin_display_remaining_specialities($idHairdresser)
            {
                if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
                {
                    // Troisièmement, on va chercher le restant des spécialités disponibles que le coiffeur ne possède pas
                    // Cela permettra à l'admin d'ajouter une spécialité à un coiffeur s'il le souhaite.
                    $remainingSpecialities = new \App\Models\Speciality();
                    $data['remainingSpecialities'] = $remainingSpecialities->getAllSpecialitiesButSpecialitiesOfTheHairdresser($idHairdresser);
                    $data['hairdresserId'][0] = $idHairdresser;
                    return view('espace_admin/assign_specialities/ajax_admin_show_assign_specialities_remaining',$data);
                }
                    
            }

            public function ajax_add_speciality_to_hairdresser()
            {
              if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
              {
                  
                  $specialityHairdresser = new \App\Models\Hairdresser_speciality();                
                  $specialityHairdresser->assignSpecialityToHairdresser($_POST['data'],$_POST['idHairdresser']);
                  // Une fois la requête SQL insert effectuée, on réactualise la page avec de l'AJAX
                  // Pour réactualiser, il faut reSELECT les données.
                  // Donc, on refait une requête SQL pour rafraichir le tout
                  $specialitiesOfTheHairdresser = new \App\Models\Speciality();
                  $data['speciality_name'] = $specialitiesOfTheHairdresser->getAllSpecialitiesOfTheHairdresserBySendingIdHairdresser($_POST['idHairdresser']);

                  $data['remainingSpecialities'] = $specialitiesOfTheHairdresser->getAllSpecialitiesButSpecialitiesOfTheHairdresser($_POST['idHairdresser']);

                  // On va réafficher la vue avec la notification de succès d'ajout de spécialité au coiffeur
                  $hairdresser = new \App\Models\User();
                  $data['hairdresser'] = $hairdresser->getFirstnameLastnameOfTheHairdresserBySendingId($_POST['idHairdresser']);
                  $_SESSION["successLogAssignSpecialityToHairdresser"] = array('La/Les spécialité(s) a/ont bien été ajoutée(s) au coiffeur ' . $data["hairdresser"]->firstname . ' ' . $data["hairdresser"]->lastname) ;
                  // On va garder en mémoire la liste de tout les coiffeurs de la base de données
                    // avant de charger la vue.

                    $hairdresser = new \App\Models\User();
                    $data['hairdresser'] = $hairdresser->getAllIdLastnameFirstnameHairdressers();

 
              }
            }


            public function ajax_delete_speciality_to_hairdresser()
            {
                if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
                {             
                  $specialityHairdresser = new \App\Models\Hairdresser_speciality();                
                  $specialityHairdresser->deleteSpecialityAssignedToHairdresser($_POST['data'],$_POST['idHairdresserToDeleteSpeciality']);
                  // Une fois la requête SQL delete effectuée, on réactualise la page avec de l'AJAX
                  // Pour réactualiser, il faut reSELECT les données sans celles qui viennent d'être effacées.
                  // Donc, on refait une requête SQL pour rafraichir le tout
                  $specialitiesOfTheHairdresser = new \App\Models\Speciality();
                  $data['speciality_name'] = $specialitiesOfTheHairdresser->getAllSpecialitiesOfTheHairdresserBySendingIdHairdresser($idHairdresser);
                  
                  // On charge le nom du coiffeur pour l'afficher dans un message alert ("success")
                  $hairdresser = new \App\Models\User();
                  $data['hairdresser'] = $hairdresser->getFirstnameLastnameOfTheHairdresserBySendingId($_POST['idHairdresserToDeleteSpeciality']);
                  $_SESSION["successLogAssignSpecialityToHairdresser"] = array('La/Les spécialité(s) a/ont bien été retirées du coiffeur ' . $data["hairdresser"]->firstname . ' ' . $data["hairdresser"]->lastname) ;
                //   return view('espace_admin/assign_specialities/ajax_admin_show_assign_specialities_after_delete_ajax',$data);
                }    
            }



      


}