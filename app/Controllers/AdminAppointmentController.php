<?php namespace App\Controllers;
use App\Models;
session_start();
class AdminAppointmentController extends BaseController
{

	public function deleteAppointment($idAppointment)
	{
			if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
			{
					// Récupération du rendez-vous demandé
					$appointment = new \App\Models\Appointment();
					$data['appointment'] = $appointment->getASpecifiedAppointmentBySendingIdAppointment($idAppointment);

					// Suppression du rendez-vous
					$appointment->deleteSpecifiedAppointmentBySendingIdAppointment($idAppointment);

					return redirect()->to(base_url('AdminController/admin_delete_appointments'));
			}
	}

	
	


}