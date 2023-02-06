<?php
namespace App\Models;

class Appointment extends \CodeIgniter\Model
{

    protected $table = 'Appointments';
    protected $primaryKey = 'ID';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['ID','ID_user','ID_hairdresser','price_paid','ID_speciality','ID_salon','appointment_start','appointment_end','title'];

    public $ID;
    public $ID_user;
    public $ID_hairdresser;
    public $price_paid;
    public $ID_speciality;
    public $ID_salon;
    public $appointment_start;
    public $appointment_end;
    public $title;

    public function insertAppointmentIntoTableAppointments($data)
      {
        $this->insert($data);
      }
    
    public function getAllAppointments()
      {
        $query = $this->db->query("SELECT * FROM Appointments");
        $row['appointment'] = $query->getResultArray();
        return $row['appointment'];
      }
    
    public function getAllAppointmentsAndSalonsNames()
    {
      $query = $this->db->query("SELECT t1.ID,t1.price_paid,t1.appointment_start,t1.appointment_end,t1.title,
                                t2.name
                                FROM Appointments T1
                                JOIN Salons T2
                                ON t2.ID = t1.ID_salon");                        
      $row['appointment'] = $query->getResultArray();
      return $row['appointment'];
    }
    
    public function getAllAppointmentsOfASpecifiedSalonBySendingIdSalon($idSalon)
    {
        $query = $this->db->query("SELECT * FROM Appointments WHERE ID_salon = '" . $idSalon ."'");
        $row['appointment'] = $query->getResultArray();
        return $row['appointment'];
    }

    public function getASpecifiedAppointmentBySendingIdAppointment($idAppointment)
    {
        $query = $this->db->query("SELECT t1.ID,t1.price_paid,t1.appointment_start,t1.appointment_end,t1.title,
                                   t2.name
                                   FROM Appointments T1
                                   JOIN Salons T2
                                   ON t2.ID = t1.ID_salon
                                   WHERE t1.ID = '" . $idAppointment  ."'");

        $row['appointment'] = $query->getResultArray();
        return $row['appointment'];
    }


    
    public function deleteSpecifiedAppointmentBySendingIdAppointment($idAppointment)
    {
      // Fonction qui supprime un rendez-vous dont l'id est $idAppointment
      $this->db->query("DELETE FROM appointments WHERE ID =  '" .  $idAppointment . "'");  
    }


    public function deleteAllAppointmentsOfASpecifiedSalonBySendingIdSalon($idSalon)
    {
      // Fonction qui supprime TOUT les rendez-vous d'un salon, dont celui-ci est $idSalon
      $this->db->query("DELETE FROM appointments WHERE ID_salon =  '" .  $idSalon . "'");  
    }
        
    public function deleteAllAppointmentsOfASpecifiedUserBySendingIdUser($idUser)
    {
      // Fonction qui supprime TOUT les rendez-vous d'un salon, dont celui-ci est $idSalon
      $this->db->query("DELETE FROM appointments WHERE ID_user =  '" .  $idUser . "'");  
    }
    public function deleteAllAppointmentsOfASpecifiedHairdresserBySendingIdHairdresser($idHairdresser)
    {
      // Fonction qui supprime TOUT les rendez-vous d'un salon, dont celui-ci est $idSalon
      $this->db->query("DELETE FROM appointments WHERE ID_hairdresser =  '" .  $idHairdresser . "'");  
    }
    
    public function getAllAppointmentsOfASpecifiedUserBySendingUserId($idUser)
    {
        $query = $this->db->query("SELECT * FROM Appointments WHERE ID_user = '" . $idUser ."'");
        $row['appointment'] = $query->getResultArray();
        return $row['appointment'];
    }


    public function getPlanningOfAHairdresserBySendingId_Hairdresser($idHairdresser)
    {
      $query = $this->db->query("SELECT * FROM Appointments WHERE ID_hairdresser = '" . $idHairdresser . "'");
      $row['appointmentHairdresser'] = $query->getResultArray();
      return $row['appointmentHairdresser'];
    }

    public function getPlanningOfAHairdresserBySendingId_HairdresserWithACounter($idHairdresser)
    {
      $query = $this->db->query("SELECT COUNT(*) FROM Appointments WHERE ID_hairdresser = '" . $idHairdresser . "'");
      $row['appointmentHairdresser'] = $query->getResultArray();
      return $row['appointmentHairdresser'];
    }
      
    
    public function deleteAllAppointmentsOfASpecifiedSpecialityBySendingIdSpeciality($idSpeciality)
    {
      // Fonction qui supprime TOUT les rendez-vous de la table, dont la specialité est $idSpeciality
      $this->db->query("DELETE FROM appointments WHERE ID_speciality =  '" .  $idSpeciality . "'");  
    }

    public function getNumberOfAppointmentBySendingIdUser($idUser)
    {
      // Function qui récupère le nombre de rendez-vous d'un utilisateur (pour l'afficher dans les statistiques du profil)
      $query = $this->db->query("SELECT COUNT(*) FROM APPOINTMENTS WHERE ID_user = '" . $idUser . "'");
      $row['appointmentCount'] = $query->getResultArray();
      return $row['appointmentCount'];
    }

    public function getTotalSumOfAppointmentsFromAUserBySendingIdUser($idUser)
    {
      // Function qui va calculer la somme totale de l'argent dépensé par un utilisateur pour tous ses rendez-vous
      $query = $this->db->query("SELECT SUM(price_paid) FROM Appointments WHERE ID_user = '" . $idUser . "'");
      $row['appointmentSumTotal'] = $query->getResultArray();
      return $row['appointmentSumTotal'];
    }
    

    public function getTotalSumOfPrestationsOfAHairdresserBySendingIdHairdresser($idHairdresser)
    {
      // Function qui va calculer la somme totale de l'argent gagné par un coiffeur
      $query = $this->db->query("SELECT SUM(price_paid) FROM Appointments WHERE ID_hairdresser = '" . $idHairdresser . "'");
      $row['appointmentPrestationHairdresserSumTotal'] = $query->getResultArray();
      return $row['appointmentPrestationHairdresserSumTotal'];
    }

    public function getTotalHoursSpentInBeautyHairSalonsBySendingIdUser($idUser)
    {
      // Function qui va calculer le nombre d'heures totales passées dans les salons BeautyHair pour un utilisateur dont l'id est $idUser 
      $query = $this->db->query("SELECT SUM(t1.duration)/3600
                                 FROM Specialities T1
                                 JOIN APPOINTMENTS T2
                                 ON T1.ID = T2.ID_speciality
                                 WHERE ID_user = '" . $idUser . "'");
      $row['appointmentTotalHoursSpent'] = $query->getResultArray();
      return $row['appointmentTotalHoursSpent'];
    }

    public function getTotalHoursSpentOfPrestationsOfAHairdresserBySendingIdHairdresser($idHairdresser)
    {
      // Function qui va calculer le nombre d'heures totales passées dans les salons BeautyHair pour tout les rendez-vous d'un coiffeur 
      $query = $this->db->query("SELECT SUM(t1.duration)/3600
                                 FROM Specialities T1
                                 JOIN APPOINTMENTS T2
                                 ON T1.ID = T2.ID_speciality
                                 WHERE ID_hairdresser = '" . $idHairdresser . "'");
      $row['appointmentPrestationsTotalHoursSpent'] = $query->getResultArray();
      return $row['appointmentPrestationsTotalHoursSpent'];
    }

    public function getFavouriteSalonOfAUserBySendingIdUser($idUser)
    {
      // Function qui va aller compter le nombre total de rendez-vous pour un utilisateur, et pour celui où il y a le + de COUNT d'enregistrements dans un salon, va aller renvoyer le nom du salon en question en tant que "salon favori" en index 0.
      $query = $this->db->query("SELECT t1.name,COUNT(t2.ID_salon)
                                 FROM SALONS t1
                                 JOIN appointments t2
                                 ON t2.ID_salon = t1.ID
                                 WHERE T2.ID_user = '". $idUser . "' 
                                 GROUP BY ID_salon
                                 ORDER BY COUNT(t2.ID_salon) DESC");
      $row["favouriteSalon"] = $query->getResultArray();
       return $row["favouriteSalon"];
    }

    public function getTheMostSpecialityUsedFromAHairdresserBySendingIdHairdresser($idHairdresser)
    {
      // Function qui va aller chercher la spécialité la plus utilisée par un coiffeur, pour l'afficher par la suite dans la vue de la page statistique
      $query = $this->db->query("SELECT t1.speciality_name, COUNT(t1.speciality_name) as speCount
                                 FROM Specialities t1
                                 JOIN Appointments t2
                                 ON t2.ID_speciality = t1.ID
                                 WHERE t2.ID_hairdresser = '" . $idHairdresser . "'
                                 GROUP BY t1.speciality_name
                                 ORDER BY speCount DESC");
      $row["mostUsedSpeciality"] = $query->getResultArray();
      return $row["mostUsedSpeciality"];
     
    }




}