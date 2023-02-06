<?php namespace App\Controllers;
use App\Models;
session_start();
class AdminAjaxAssignHairdresserToSalonController extends BaseController
{

	public function ajax_admin_assign_hairdresser_to_salon_delete($idHairdresser,$idSalon)
	{
			if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
			{
					
					// Chargement du modal avec les infos que l'on veut supprimer.
					$hairdresserSalon = new \App\Models\Hairdresser_Salon();
					$data['hairdresserSalon'] = $hairdresserSalon->getLastnameFirstnameIdHairdresserIdSalonOfAssignedHairdresserToSalonBySendingIdHairdresserAndIdSalon($idHairdresser,$idSalon);


					return view('espace_admin/assign_hairdresser_to_salon/modals/ajax_admin_assign_hairdresser_to_salon_delete_modal',$data);
			}
	}




}