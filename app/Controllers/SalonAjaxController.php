<?php namespace App\Controllers;
use App\Models;
session_start();
class SalonAjaxController extends BaseController
{
	public function ajaxDisplayHairdresserForSelectedSpeciality($idSpeciality,$idSalon)
	{
		// On va afficher les coiffeurs qui disposent de la spécialité choisie, et qui est disponible uniquement dans le salon $idSalon
		$hairdresser = new \App\Models\Hairdresser_Salon();
		$dataSalonActuel["hairdresserAvailable"] = $hairdresser->getAllLastnameFirstnameIdHairdresserIdSalonOfAssignedHairdresserToSalonBySendingIdSpecialityAndIdSalon($idSpeciality,$idSalon);

		return view('salon/ajax_appointment/ajax_pop_hairdresser_after_select_a_speciality',$dataSalonActuel);

	}

	public function ajaxDisplayFormDateAfterSelectingAHairdresser($idSalon)
	{
		// Affichage du formulaire de la date à choisir après avoir sélectionner un coiffeur du salon
		$data['idSalon'] = $idSalon ;
		return view('salon/ajax_appointment/ajax_pop_date_after_select_a_hairdresser',$data);

	}


	


	//--------------------------------------------------------------------
}
