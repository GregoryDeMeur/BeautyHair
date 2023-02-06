<?php namespace App\Controllers;
use App\Models;
session_start();
class AdminSalonController extends BaseController
{

	public function deleteSalon($id)
	{

			// Fonction qui supprime le salon "$id"
			// Suppression des enregistrements de la table salon + ses photos + ses horaires + ses rendez-vous
			// + l'assignation des coiffeurs qui y travaillent dedans

			if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
			{
			
			// Suppression des photos dans la table salons_photos
			$salonPhoto = new \App\Models\Salon_Photo();								 
			$salonPhoto->deleteAllPhotosOfASalonIdFromTableSalonsPhotos($id);	

			// Suppression de l'horaire du salon en question
			$salonSchedule = new \App\Models\Salon_Schedule();
			$salonSchedule->deleteAllScheduleOfASpecifiedSalonBySendingIdSalon($id);

			// Suppression des rendez-vous du salon
			$salonAppointment = new \App\Models\Appointment();
			$salonAppointment->deleteAllAppointmentsOfASpecifiedSalonBySendingIdSalon($id);

			// Suppression de l'assignation de tout les coiffeurs du salon
			$salonHairdresser = new \App\Models\Hairdresser_Salon();
			$salonHairdresser->deleteAllAssignedHairdresserOfASpecifiedSalonBySendingIdSalon($id);

			// Suppression du salon $id dans la table Salon
			$salon = new \App\Models\Salon();					
			// Avant de le supprimer dans la table salon, on va garder en mémoire le nom du salon pour l'afficher dans la vue lors du success		 
			$dataSalon = $salon->getSalonBySendingId($id);
			$salon->deleteSalonFromTableSalons($id);
	
			// Dès que la suppression est faite, on réactualise la liste des salons
			// en excluant l'enregistrement qui vient d'être supprimé.
			$salonTwo = new \App\Models\Salon();
			$data['salon'] = $salonTwo->getAllSalons();

			// On attribue une variable de session pour faire "pop" un message de succès lors de la redirection
			$_SESSION['successLogSalon'] = array('Le salon "'. $dataSalon[0]["name"] . '" a bien été supprimé !');
			// Retour à la liste des salons
			return redirect()->to(base_url('AdminController/admin_show_salons'));	
			}      

	}


	public function addNewSalon()
	{
			if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
			{
				if(empty($_POST['salonName']))
				{
						// On attribue une variable de session pour faire "pop" un message d'erreur lors de la redirection
						$_SESSION['errorLogSalon'] = array('Le champ "Nom du salon" ne peut pas être vide'); 
						return redirect()->to(base_url('AdminController/admin_show_salons'));	
				}
			
		// [Création d'un nouveau salon dans la DB]

			// Création du salon + assignation des variables.
			$salon = new \App\Models\Salon();

			// Check si l'admin a bien assigné une valeur pour le propriétaire du salon
			if($_POST['salonOwner'] == '')
				{
					$_POST['salonOwner'] = NULL;
				}

			$salonToAddIntoDb = array("name"=>$_POST["salonName"],
																"address"=>$_POST["salonAddress"],
																"ID_owner"=>$_POST["salonOwner"],
																"google_map"=>$_POST["salonGoogleMap"],
																"telephone"=>$_POST["salonTelephone"],
																"email"=>$_POST["salonEmail"],
																"description"=>$_POST["salonDescription"]
															 ); 
			// Insertion du nouveau Salon dans la DB.
			$salon->insertSalonIntoTableSalons($salonToAddIntoDb);

			// On récupère l'ID du salon qui vient d'être créer, et on lui insert également 7 rows dans la table Schedule (lundi à dimanche) qui va permettre de modifier l'horaire du salon par après
			$lastRecorded['lastRecordedSalon'] = $salon->getTheLastRecordOfTableSalons();
			$salonSchedule = new \App\Models\Salon_Schedule();
		
			$salonSchedule->insertScheduleByDefaultWhenSalonIsCreated($lastRecorded['lastRecordedSalon'][0]['ID']);

			// Refresh de la table salon puis affichage de ceux-ci.
			$salon = new \App\Models\Salon();
			$data['salon'] = $salon->getAllSalons();

			// On attribue une variable de session pour faire "pop" un message de succès lors de la redirection
			$_SESSION['successLogSalon'] = array('Le salon "'.$lastRecorded["lastRecordedSalon"][0]["name"] . '" a bien été enregistré dans la base de données !');
			// Retour à la liste des salons 
			return redirect()->to(base_url('AdminController/admin_show_salons'));												 
			}            
	}


	public function modifySalon()
	{
			if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
			{
					 // Check si le nom du salon entré par l'admin n'est pas vide           
							if(empty($_POST['salonName']))
							{ 
								// On attribue une variable de session pour faire "pop" un message d'erreur lors de la redirection
								$_SESSION['errorLogSalon'] = array('Le champ "Nom du salon" ne peut pas être vide'); 
									return redirect()->to(base_url('AdminController/admin_show_salons'));	
								 
							}
						 

					// Si les informations entrées sont valides, on va les modifier dans la database.

									// Création d'une instance salon
									$salon = new \App\Models\Salon();

									// Check si l'admin a bien assigné une valeur pour le propriétaire du salon
									if($_POST['salonOwner'] == '')
										{
											$_POST['salonOwner'] = null;
										}

									// Assignation des valeurs postées dans une variable
									$dataSalonToModify = array("name"=>$_POST["salonName"],
																						 "address"=>$_POST["salonAddress"],
																						 "ID_owner"=>$_POST["salonOwner"],
																						 "google_map"=>$_POST["salonGoogleMap"],
																						 "telephone"=>$_POST["salonTelephone"],
																						 "email"=>$_POST["salonEmail"],
																						 "description"=>$_POST["salonDescription"],
																						 "ID"=>$_POST["salonId"]);
									// Ensuite, on UPDATE ces valeurs dans la db.
									if($_POST['salonOwner'] == null)
									{
										$salon->updateSalonWithoutIdOwner($dataSalonToModify);
									}
									else
									{
										$salon->updateSalon($dataSalonToModify);
									}
									
    							

									
									
									// On attribue une variable de session pour faire "pop" un message de succès lors de la redirection
									$_SESSION['successLogSalon'] = array('La modification du salon "'. $_POST["salonName"] . '" a bien été effectuée !');
									// Retour à la liste des salons
									return redirect()->to(base_url('AdminController/admin_show_salons'));

			}
	}


	public function modifySalonSchedule()
	{
		if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
		{
			// Modification de l'horaire d'un salon
			$salonSchedule = new \App\Models\Salon_Schedule();

			


			// Assignation des valeurs postées dans une variable
			$dataSalonMonday =   array("day_schedule_start"=>$_POST["scheduleOuvertureLundi"],
																 "day_schedule_end"=>$_POST["scheduleFermetureLundi"],	
																 "day"=>"Lundi",
																 "ID"=>$_POST["idSalon"]);
			$dataSalonTuesday =  array("day_schedule_start"=>$_POST["scheduleOuvertureMardi"],
																 "day_schedule_end"=>$_POST["scheduleFermetureMardi"],	
																 "day"=>"Mardi",
																 "ID"=>$_POST["idSalon"]);		
			$dataSalonWednesday = array("day_schedule_start"=>$_POST["scheduleOuvertureMercredi"],
																 "day_schedule_end"=>$_POST["scheduleFermetureMercredi"],	
																 "day"=>"Mercredi",
																 "ID"=>$_POST["idSalon"]);
			$dataSalonThursday = array("day_schedule_start"=>$_POST["scheduleOuvertureJeudi"],
																 "day_schedule_end"=>$_POST["scheduleFermetureJeudi"],	
																 "day"=>"Jeudi",
																 "ID"=>$_POST["idSalon"]);	
			$dataSalonFriday = array("day_schedule_start"=>$_POST["scheduleOuvertureVendredi"],
																 "day_schedule_end"=>$_POST["scheduleFermetureVendredi"],	
																 "day"=>"Vendredi",
																 "ID"=>$_POST["idSalon"]);					
			$dataSalonSaturday = array("day_schedule_start"=>$_POST["scheduleOuvertureSamedi"],
																 "day_schedule_end"=>$_POST["scheduleFermetureSamedi"],	
																 "day"=>"Samedi",
																 "ID"=>$_POST["idSalon"]);
			$dataSalonSunday = array("day_schedule_start"=>$_POST["scheduleOuvertureDimanche"],
																 "day_schedule_end"=>$_POST["scheduleFermetureDimanche"],	
																 "day"=>"Dimanche",
																 "ID"=>$_POST["idSalon"]);	
																 
			// Update des nouveaux horaires
				$salonSchedule->updateScheduleOfASpecifiedSalonBySendingIdSalonAndScheduleStartAndScheduleEnd($dataSalonMonday);
				$salonSchedule->updateScheduleOfASpecifiedSalonBySendingIdSalonAndScheduleStartAndScheduleEnd($dataSalonTuesday);
				$salonSchedule->updateScheduleOfASpecifiedSalonBySendingIdSalonAndScheduleStartAndScheduleEnd($dataSalonWednesday);
				$salonSchedule->updateScheduleOfASpecifiedSalonBySendingIdSalonAndScheduleStartAndScheduleEnd($dataSalonThursday);
				$salonSchedule->updateScheduleOfASpecifiedSalonBySendingIdSalonAndScheduleStartAndScheduleEnd($dataSalonFriday);
				$salonSchedule->updateScheduleOfASpecifiedSalonBySendingIdSalonAndScheduleStartAndScheduleEnd($dataSalonSaturday);
				$salonSchedule->updateScheduleOfASpecifiedSalonBySendingIdSalonAndScheduleStartAndScheduleEnd($dataSalonSunday);		
				
				// Récupération du nom du salon pour l'afficher dans le message de succès
				$salon = new \App\Models\Salon();
				$dataSalon = $salon->getSalonBySendingId($_POST["idSalon"]);
				
				// On attribue une variable de session pour faire "pop" un message de succès lors de la redirection
				$_SESSION['successLogSalon'] = array('La modification des horaires du salon "'. $dataSalon[0]["name"] . '" a bien été effectuée !');
				// Retour à la liste des salons
				return redirect()->to(base_url('AdminController/admin_show_salons'));
																 
		}
	}
        
	//--------------------------------------------------------------------

}
