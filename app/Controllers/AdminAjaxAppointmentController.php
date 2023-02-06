<?php namespace App\Controllers;
use App\Models;
session_start();
class AdminAjaxAppointmentController extends BaseController
{

	public function ajax_admin_show_all_appointments_of_a_specified_salon_by_sending_idSalon($idSalon)
	{
			if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
			{
					// Récupération de tout les rendez-vous du salon demandé
					$appointment = new \App\Models\Appointment();
					$data['appointment'] = $appointment->getAllAppointmentsOfASpecifiedSalonBySendingIdSalon($idSalon);

					// Récupération de l'id du salon avant d'envoyer la vue
					$data['salonId'] = $idSalon;

					return view('espace_admin/appointments/admin_show_appointments_ajax_after_selecting_a_salon',$data);
			}
	}

	public function ajax_admin_delete_a_specified_appointment($idAppointment)
	{
		if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
		{
				// Récupération du rendez-vous demandé
				$appointment = new \App\Models\Appointment();
				$data['appointment'] = $appointment->getASpecifiedAppointmentBySendingIdAppointment($idAppointment);

				return view('espace_admin/appointments/modals/ajax_admin_appointment_delete_modal',$data);
		}
	}
	


}