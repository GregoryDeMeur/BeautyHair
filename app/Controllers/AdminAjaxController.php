<?php namespace App\Controllers;
use App\Models;
session_start();
class AdminAjaxController extends BaseController
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
            return view('espace_admin/assign_specialities/admin_show_assign_specialities_2',$data);

            

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
            return view('espace_admin/assign_specialities/ajax_admin_show_assign_specialities_remaining',$data);
        }
            
    }
            




}