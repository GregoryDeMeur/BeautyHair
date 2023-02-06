<?php namespace App\Controllers;
use App\Models;
session_start();
class AdminAjaxSpecialityController extends BaseController
{

	public function ajax_admin_speciality_read($id)
    {
				if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
				{          
					$speciality = new \App\Models\Speciality();
					$specialityData['speciality'] = $speciality->getSpecialityBySendingId($id);
					return view('espace_admin/specialities/modals/ajax_admin_specialities_read_modal',$specialityData);
				}
    }


	public function ajax_admin_speciality_modify($idSpeciality)
    {
        if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
        {
          // Cette fonction va récupérer tout les éléments nécessaires à l'affichage de la spécialité dans le formulaire
            // Recupération des informations de la spécialité en question
            $speciality = new \App\Models\Speciality();
            $specialityData['speciality'] = $speciality->getSpecialityBySendingId($idSpeciality);
                                   
            return view('espace_admin/specialities/modals/ajax_admin_specialities_modify_modal',$specialityData);
        }
    }
    


	public function ajax_admin_speciality_delete($idSpeciality)
	{
			if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
			{
					$speciality = new \App\Models\Speciality();
					$specialityData['specialityDataToDelete'] = $speciality->getSpecialityBySendingId($idSpeciality);
					return view('espace_admin/specialities/modals/ajax_admin_specialities_delete_modal',$specialityData);
			}
	}


}