<?php namespace App\Controllers;
use App\Models;
session_start();
class AdminAjaxSalonController extends BaseController
{


    public function ajax_admin_salon_delete($idSalon)
			{
				if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
				{
					$salon = new \App\Models\Salon();
					$salonData['salonDataToDelete'] = $salon->getSalonBySendingId($idSalon);
					return view('espace_admin/salons/modals/ajax_admin_salons_delete_modal',$salonData);     
				}             
			}
    

    public function ajax_admin_salon_read($id)
			{
					if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
					{          
						$salon = new \App\Models\Salon();
						$salonData['salon'] = $salon->getSalonBySendingId($id);
						return view('espace_admin/salons/modals/ajax_admin_salons_read_modal',$salonData);
					}
			}
    

    public function ajax_admin_salon_modify($idSalon)
		{
			if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
			{
			// Cette fonction va récupérer tout les éléments nécessaires à l'affichage du salon dans le formulaire
					// Recupération des informations du salon en question
					$salon = new \App\Models\Salon();
					$salonData['salon'] = $salon->getSalonBySendingId($idSalon);
					
					// Récupération de tout les hairdressers pour les placer dans le form select
					// lors du choix de selection du gérant
					$user = new \App\Models\User();
					$salonData['allHairdressers'] = $user->getAllIdLastnameFirstnameHairdressers();

					// Récupération du gérant actuel (pour pouvoir inscrire son rôle actuel dans le choix lors de l'update)
					$salonData['salonOwner'] = $user->getIdLastnameFirstnameOfSalonOwner($idSalon);

					
					
					return view('espace_admin/salons/modals/ajax_admin_salons_modify_modal',$salonData);
			}
			
		}

		public function ajax_admin_salon_add_photo($idSalon)
		{
				if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
				{
				// Cette fonction va récupérer tout les éléments nécessaires à l'affichage des photos du salon en question.		
						
						//  Recupération des infos du salon (nom)
						$salon = new \App\Models\Salon();
						$salonData['salon'] = $salon->getSalonBySendingId($idSalon);

						//  Recupération des photos du salon
						$photoSalon = new \App\Models\Salon_Photo();
						$salonData['photo'] = $photoSalon->getAllPhotosOfTheSalonBySendingIdSalon($idSalon);

						
						
						return view('espace_admin/salons/modals/ajax_admin_salons_add_photo_modal',$salonData);
				}
			
		}

		public function ajax_admin_salon_add_schedule($idSalon)
		{
			if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
			{
				// Recupération de l'horaire du salon $idSalon
				$salonSchedule = new \App\Models\Salon_Schedule();	
				
				// Recupération du nom du salon grâce à l'ID (pour l'afficher dans la vue)
				$salon = new \App\Models\Salon();
				$salonData['salon'] = $salon->getSalonBySendingId($idSalon);

				$salonData['idSalon'] = $idSalon;
				
				$salonData['lundi']= $salonSchedule->getMondayScheduleOfASpecifiedSalonBySendingIdSalon($idSalon);
				$salonData['mardi']= $salonSchedule->getTuesdayScheduleOfASpecifiedSalonBySendingIdSalon($idSalon);
				$salonData['mercredi']= $salonSchedule->getWednesdayScheduleOfASpecifiedSalonBySendingIdSalon($idSalon);
				$salonData['jeudi']= $salonSchedule->getThursdayScheduleOfASpecifiedSalonBySendingIdSalon($idSalon);
				$salonData['vendredi']= $salonSchedule->getFridayScheduleOfASpecifiedSalonBySendingIdSalon($idSalon);
				$salonData['samedi']= $salonSchedule->getSaturdayScheduleOfASpecifiedSalonBySendingIdSalon($idSalon);
				$salonData['dimanche']= $salonSchedule->getSundayScheduleOfASpecifiedSalonBySendingIdSalon($idSalon);

				// Tout les horaires ont été récupérés, ils seront affiché dans le formulaire via la vue
				return view('espace_admin/salons/modals/ajax_admin_salons_add_schedule_modal',$salonData);
			}

		}



}