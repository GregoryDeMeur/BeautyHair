<?php namespace App\Controllers;
use App\Models;
session_start();
class ManagerAjaxController extends BaseController
{

	
	public function ajax_manager_delete_a_specified_appointment_of_his_salon($idAppointment)
	{
		if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 2) && ($_SESSION["salonOwner"]==1))
		{
				// Récupération du rendez-vous demandé
				$appointment = new \App\Models\Appointment();
				$data['appointment'] = $appointment->getASpecifiedAppointmentBySendingIdAppointment($idAppointment);

				return view('espace_hairdresser/manager/modals/ajax_manager_appointment_delete_modal',$data);
		}
	}
	


	public function ajax_manager_delete_assignement_hairdresser_of_a_salon($idHairdresser)
	{
		if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 2) && ($_SESSION["salonOwner"]==1))
		{
				// Affichage du coiffeur $idHairdresser dans un modal (dans l'objectif de le supprimer)
				$hairdresser = new \App\Models\User();
				$dataHairdresser['hairdresser']=$hairdresser->getUserBySendingId($idHairdresser);

				return view('espace_hairdresser/manager/modals/ajax_manager_delete_assignement_hairdresser_to_salon',$dataHairdresser);

		}	
	}

}