<?php namespace App\Controllers;
use App\Models;
session_start();
class ManagerController extends BaseController
{

	
	public function deleteAppointment($idAppointment)
	{
		if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 2) && ($_SESSION["salonOwner"]==1))
		{
				// Récupération du rendez-vous demandé
				$appointment = new \App\Models\Appointment();
				$data['appointment'] = $appointment->getASpecifiedAppointmentBySendingIdAppointment($idAppointment);

				// Suppression du rendez-vous
				$appointment->deleteSpecifiedAppointmentBySendingIdAppointment($idAppointment);

				return redirect()->to(base_url('HairdresserController/hairdresser/manager_consultation_all_appointments'));

		}
	}



	public function modifyInformationsSalon()
	{
		if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 2) && ($_SESSION["salonOwner"]==1))
			{
					 // Check si le nom du salon entré par l'admin n'est pas vide           
							if(empty($_POST['salonName']))
							{ 
									echo "Le champ 'Nom du salon' ne peut pas être vide";  
									return redirect()->to(base_url('AdminController/admin_show_salons'));	
								 
							}
						 

					// Si les informations entrées sont valides, on va les modifier dans la database.

									// Création d'une instance salon
									$salon = new \App\Models\Salon();

									// Assignation des valeurs postées dans une variable
									$dataSalonToModify = array("name"=>$_POST["salonName"],
																						 "address"=>$_POST["salonAddress"],
																						 "google_map"=>$_POST["salonGoogleMap"],
																						 "telephone"=>$_POST["salonTelephone"],
																						 "email"=>$_POST["salonEmail"],
																						 "description"=>$_POST["salonDescription"],
																						 "ID"=>$_SESSION["salon"]["ID"]);

									// Ensuite, on UPDATE ces valeurs dans la db.
									$salon->managerUpdateInformationsSalon($dataSalonToModify);

									
    							

									
									// Retour à la liste des salons
									echo 'Modification effectuée';
									return redirect()->to(base_url('HairdresserController/hairdresser/manager_change_informations_of_the_salon'));

			}
	}
	

	public function modifySalonSchedule()
	{

			// Modification de l'horaire du salon du gérant
			$salonSchedule = new \App\Models\Salon_Schedule();

			


			// Assignation des valeurs postées dans une variable
			$dataSalonMonday =   array("day_schedule_start"=>$_POST["scheduleOuvertureLundi"],
																 "day_schedule_end"=>$_POST["scheduleFermetureLundi"],	
																 "day"=>"Lundi",
																 "ID"=>$_SESSION["salon"]["ID"]);
			$dataSalonTuesday =  array("day_schedule_start"=>$_POST["scheduleOuvertureMardi"],
																 "day_schedule_end"=>$_POST["scheduleFermetureMardi"],	
																 "day"=>"Mardi",
																 "ID"=>$_SESSION["salon"]["ID"]);		
			$dataSalonWednesday = array("day_schedule_start"=>$_POST["scheduleOuvertureMercredi"],
																 "day_schedule_end"=>$_POST["scheduleFermetureMercredi"],	
																 "day"=>"Mercredi",
																 "ID"=>$_SESSION["salon"]["ID"]);
			$dataSalonThursday = array("day_schedule_start"=>$_POST["scheduleOuvertureJeudi"],
																 "day_schedule_end"=>$_POST["scheduleFermetureJeudi"],	
																 "day"=>"Jeudi",
																 "ID"=>$_SESSION["salon"]["ID"]);	
			$dataSalonFriday = array("day_schedule_start"=>$_POST["scheduleOuvertureVendredi"],
																 "day_schedule_end"=>$_POST["scheduleFermetureVendredi"],	
																 "day"=>"Vendredi",
																 "ID"=>$_SESSION["salon"]["ID"]);					
			$dataSalonSaturday = array("day_schedule_start"=>$_POST["scheduleOuvertureSamedi"],
																 "day_schedule_end"=>$_POST["scheduleFermetureSamedi"],	
																 "day"=>"Samedi",
																 "ID"=>$_SESSION["salon"]["ID"]);
			$dataSalonSunday = array("day_schedule_start"=>$_POST["scheduleOuvertureDimanche"],
																 "day_schedule_end"=>$_POST["scheduleFermetureDimanche"],	
																 "day"=>"Dimanche",
																 "ID"=>$_SESSION["salon"]["ID"]);	
																 
			// Update des nouveaux horaires


				$salonSchedule->updateScheduleOfASpecifiedSalonBySendingIdSalonAndScheduleStartAndScheduleEnd($dataSalonMonday);
				$salonSchedule->updateScheduleOfASpecifiedSalonBySendingIdSalonAndScheduleStartAndScheduleEnd($dataSalonTuesday);
				$salonSchedule->updateScheduleOfASpecifiedSalonBySendingIdSalonAndScheduleStartAndScheduleEnd($dataSalonWednesday);
				$salonSchedule->updateScheduleOfASpecifiedSalonBySendingIdSalonAndScheduleStartAndScheduleEnd($dataSalonThursday);
				$salonSchedule->updateScheduleOfASpecifiedSalonBySendingIdSalonAndScheduleStartAndScheduleEnd($dataSalonFriday);
				$salonSchedule->updateScheduleOfASpecifiedSalonBySendingIdSalonAndScheduleStartAndScheduleEnd($dataSalonSaturday);
				$salonSchedule->updateScheduleOfASpecifiedSalonBySendingIdSalonAndScheduleStartAndScheduleEnd($dataSalonSunday);		
				
				echo 'Modification effectuée';
				return redirect()->to(base_url('HairdresserController/hairdresser/manager_change_schedule_of_the_salon'));
	}
		

	public function deleteHairdresserAssignementToTheSalon($idHairdresser)
	{
			$hairdresser = new \App\Models\Hairdresser_Salon();
			$hairdresser->deleteAssignedHairdresserOfASalonFromTableHairdressers_SalonsBySendingIdHairdresserAndIdSalon($idHairdresser,$_SESSION["salon"]["ID"]);

			return redirect()->to(base_url('HairdresserController/hairdresser/manager_show_hairdressers_of_the_salon'));

	}


}