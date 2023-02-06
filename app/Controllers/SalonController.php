<?php namespace App\Controllers;
use App\Models;
session_start();
class SalonController extends BaseController
{
	public function index($idSalon)
	{

		// Avant de retourner la page du salon sélectionné, on va prendre toutes les infos de ce salon en question
		$salon = new \App\Models\Salon();
		$dataSalonActuel['salon'] = $salon->getSalonBySendingId($idSalon);
		
		// Chargement des photos du salon en question
		$salonPhoto = new \App\Models\Salon_Photo();
		$dataSalonActuel['photo'] = $salonPhoto->getAllPhotosOfTheSalonBySendingIdSalon($idSalon);

		return view('salon/index',$dataSalonActuel);

	}

	public function specialities($idSalon)
	{
		// Avant de retourner la page du salon sélectionné, on va prendre toutes les infos de ce salon en question
		$salon = new \App\Models\Salon();
		$dataSalonActuel['salon'] = $salon->getSalonBySendingId($idSalon);
		
		// Chargement des photos du salon en question
		$salonPhoto = new \App\Models\Salon_Photo();
		$dataSalonActuel['photo'] = $salonPhoto->getAllPhotosOfTheSalonBySendingIdSalon($idSalon);

		// Chargement de la liste des spécialités du salon en question
		$specialitiesSalon = new \App\Models\Hairdresser_Speciality();
		$dataSalonActuel['speciality'] = $specialitiesSalon->getAllSpecialitiesNameOfASalonBySendingIdSalon($idSalon);

		return view('salon/specialities',$dataSalonActuel);
	}

	public function contact($idSalon)
	{
		// Avant de retourner la page du salon sélectionné, on va prendre toutes les infos de ce salon en question
		$salon = new \App\Models\Salon();
		$dataSalonActuel['salon'] = $salon->getSalonBySendingId($idSalon);
		
		// Chargement des photos du salon en question
		$salonPhoto = new \App\Models\Salon_Photo();
		$dataSalonActuel['photo'] = $salonPhoto->getAllPhotosOfTheSalonBySendingIdSalon($idSalon);

		return view('salon/contact',$dataSalonActuel);
	}
	
	public function team($idSalon)
	{
		// Avant de retourner la page du salon sélectionné, on va prendre toutes les infos de ce salon en question
		$salon = new \App\Models\Salon();
		$dataSalonActuel['salon'] = $salon->getSalonBySendingId($idSalon);
		
		// Chargement des photos du salon en question
		$salonPhoto = new \App\Models\Salon_Photo();
		$dataSalonActuel['photo'] = $salonPhoto->getAllPhotosOfTheSalonBySendingIdSalon($idSalon);

		// Chargement du personnel du salon de coiffure
		$hairdresserSalon = new \App\Models\Hairdresser_Salon();
		$dataSalonActuel['hairdresser'] = $hairdresserSalon->getAllIdAssignedHairdresserOfASalonBySendingIdSalon($idSalon);

		// Chargement des données de tout les coiffeurs de la table user qui sont assignés au salon
		$user = new \App\Models\User();
		$dataSalonActuel['user'] = $user->getAllAssignedHairdresserUserInformationsBySendingIdSalon($idSalon);

		// Et pour chaque coiffeur, on va récupérer la liste de ses spécialités pour l'afficher dans la vue par la suite.
		$hairdresserSpeciality = new \App\Models\Hairdresser_Speciality();
		$dataSalonActuel['speciality'] = $hairdresserSpeciality->getAllSpecialitiesNameOfAllHairdresserFromASalonBySendingIdSalon($idSalon);

		return view('salon/team',$dataSalonActuel);
	}

	public function appointments($idSalon)
	{
		// Avant de retourner la page du salon sélectionné, on va prendre toutes les infos de ce salon en question
		$salon = new \App\Models\Salon();
		$dataSalonActuel['salon'] = $salon->getSalonBySendingId($idSalon);
		
		// Chargement des photos du salon en question (pour le carousel)
		$salonPhoto = new \App\Models\Salon_Photo();
		$dataSalonActuel['photo'] = $salonPhoto->getAllPhotosOfTheSalonBySendingIdSalon($idSalon);

		// Pour pouvoir prendre un rdv et encoder dans la base de données, il faudra également charger dans la vue : la liste de tout les coiffeurs   		// disponibles du salon et  la liste de chaque spécialité disponible pour chaque coiffeur 

		// Pour la liste des coiffeurs du salon :
		$salonHairdresser = new \App\Models\Hairdresser_Salon();
		$dataSalonActuel['hairdresser'] = $salonHairdresser->getAllLastnameFirstnameIdHairdresserIdSalonOfAssignedHairdresserToSalonBySendingIdSalon($idSalon);

		// Pour la liste des spécialités avec l'assignement de chaque coiffeur du salon :
		$specialityHairdresser = new \App\Models\Hairdresser_speciality();
		$dataSalonActuel['specialityHairdresser'] = $specialityHairdresser->get_SpecialitiesName_Firstname_Lastname_IdHairdresser_IdSpeciality_OfAllHairdresserOfASpecifiedSalonBySendingIdSalon($idSalon);

		// Pour la liste des spécialités sans doublon :
		$speciality = new \App\Models\Speciality();
		$dataSalonActuel['specialityAvailable'] = $speciality->getAllSpecialitiesAvailableForTheSpecifiedSalonBySendingIdSalon($idSalon);

		// On récupère tout les rendez-vous du salon pour les afficher dans le calendrier de réservation
		$appointment = new \App\Models\Appointment();
		$dataSalonActuel['appointment'] = $appointment->getAllAppointmentsOfASpecifiedSalonBySendingIdSalon($idSalon);

		

		return view('salon/appointments',$dataSalonActuel);
	}


	public function addAppointment()
	{
		// Ajout d'un nouveau rendez-vous via le POST du formulaire RDV du salon
		$appointment = new \App\Models\Appointment();
		// On connait la date "start" du rendez-vous, on va calculer, en fonction du temps de la spécialité, la date de fin
		// Exemple : spécialité tondre cheveux prends 10 minutes, je prend RDV à 13h, automatiquement ma date de start sera assignée à 13h
		// et l'application calculera automatiquement le temps nécessaire pour assigner la bonne valeur à la date de fin (dans le cas de l'exemple, ça sera 13h10).
		
		// On va chercher le temps nécessaire et le prix à la prestation en question
		$speciality = new \App\Models\Speciality();
		$specialityArray = $speciality->getDurationAndPriceOfASpecifiedSpecialityBySendingIdSpeciality($_POST['appointmentSpeciality']);

		// Concaténation de la date et le time du début du RDV (+ rajout des secondes)
		$appointmentStart = $_POST["appointmentStartDate"] . ' ' . $_POST["appointmentStartTime"] . ':00';
		
		// Maintenant qu'on a le temps de la spécialité et la date de début pour le RDV, on va calculer la date de fin grâce à SQL
		$appointmentEnd = $speciality->getAppointmentEndBySendingAppointmentStartAndDurationOfTheSpeciality($appointmentStart,$specialityArray[0]["duration"]);

		// Donnons un titre au rendez-vous en concaténant quelques variables
			// On va récupérer le nom de la spécialité, le nom/prénom du client, et le nom/prénom du coiffeur
			// Puis, on va concaténer le tout dans une variable "title"
			$titleSpeciality = $speciality->getSpecialityBySendingId($_POST["appointmentSpeciality"]);
			$client = new \App\Models\User();
			$clientId = $_SESSION['user']->ID;
			$titleClient = $client->getUserBySendingId($clientId);
			
			$coiffeur = new \App\Models\User();
			$coiffeurId = $_POST["appointmentHairdresser"];
			$titleCoiffeur['coiffeur'] = $coiffeur->getFirstnameLastnameOfTheHairdresserBySendingId($coiffeurId);

			// On va récupérer le nom du salon, pour l'afficher dans le titre juste après.
			$salon = new \App\Models\Salon();
			$dataSalon["salon"] = $salon->getSalonBySendingId($_POST["salonAppointment"]);

			// Maintenant, on concatène le tout pour faire un beau titre de rendez-vous
			$titleAppointment = 'Salon '. $dataSalon["salon"][0]["name"] . ' : ' . 'Rendez-vous pour ' . $titleClient[0]["lastname"] . ' ' . $titleClient[0]["firstname"] . ' pour une spécialité ' . $titleSpeciality[0]["speciality_name"] . ' avec le coiffeur ' . $titleCoiffeur["coiffeur"]->lastname . ' ' . $titleCoiffeur["coiffeur"]->firstname ;

		// Assignation de toutes les variables du rendez-vous dans un array
		$dataAppointment = array("ID_user"=>$_SESSION["user"]->ID,
													   "ID_hairdresser"=>$_POST["appointmentHairdresser"],
												  	 "price_paid"=>$specialityArray[0]["price"],
													 	 "ID_speciality"=>$_POST["appointmentSpeciality"],
														 "ID_salon"=>$_POST["salonAppointment"],
														 "appointment_start"=>$appointmentStart,
														 "appointment_end"=>$appointmentEnd[0]["appointmentEndDate"],
														 "title"=>$titleAppointment);

		// Insertion de ces données dans la table appointment
		// On va faire un bloc try & catch, car il se peut que l'utilisateur veuille prendre un rendez-vous sans être connecté, ou qu'il ne renseigne pas de coiffeur pour son rendez-vous,.. 
		try{
			$appointment->insertAppointmentIntoTableAppointments($dataAppointment);
		   }
	catch(\Exception $e)
	{
			// On attribue une variable de session pour faire "pop" un message d'erreur  lors de la redirection
	$_SESSION['errorLogAddAppointment'] = array('Il y a une erreur lors de l\'ajout de votre rendez-vous, assurez-vous d\'être dans un premier temps bien connecté à l\'application, et également d\'avoir bien introduit chaque données dans les champs du formulaire à compléter.'); 
	return redirect()->to(base_url('SalonController/appointments/'.$_POST["salonAppointment"]));
	}
		

		// On retourne à la vue des rendez-vous du salon en question + message de succès
		$_SESSION['successLogAddAppointment'] = array('Votre rendez-vous a bien été enregistré ! Merci à vous, à bientôt dans le salon :-)');

		return redirect()->to(base_url('SalonController/appointments/'.$_POST["salonAppointment"]));
		



	}


	//--------------------------------------------------------------------
}
