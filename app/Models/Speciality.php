<?php
namespace App\Models;

class Speciality extends \CodeIgniter\Model
{

    protected $table = 'specialities';
    protected $primaryKey = 'ID';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['ID','speciality_name','description','price','duration'];

    public $ID;
    public $speciality_name;
    public $description;
    public $price;
    public $duration;


    public function insertSpecialityIntoTableSpecialities($data)
    {
      $this->insert($data);
    }


    public function getAllSpecialities()
    {
        $query = $this->db->query("SELECT * FROM specialities ORDER BY speciality_name ASC");
        $data['speciality'] = $query->getResultArray();
        return $data['speciality'];
        
    }

    public function getSpecialityBySendingId($id)
    {
      $query = $this->db->query("SELECT * FROM specialities WHERE ID = '" .  $id . "'");
      $row['speciality'] = $query->getResultArray();
      return $row['speciality'];
    }


    public function updateSpeciality($data)
    {
      $this->db->query("UPDATE specialities 
                        SET speciality_name =  '" .  $data['speciality_name'] . "',
                            description = '" .  $data['description'] . "',
                            price = '" .  $data['price'] . "',
                            duration = '" .  $data['duration'] . "'
                            WHERE ID = '" .  $data['ID'] . "'  ");     
    }


    public function deleteSpecialityFromTableSpecialities($id)
      {
          $this->db->query("DELETE FROM specialities WHERE ID =  '" .  $id . "'");             
      }

    
      public function getAllSpecialitiesOfTheHairdresserBySendingIdHairdresser($idHairdresser)
      {
      $query = $this->db->query("SELECT *
                        FROM Specialities t1
                        JOIN Hairdresser_specialities t2
                        ON t1.ID = t2.ID_speciality
                        WHERE t2.ID_hairdresser = '" .  $idHairdresser . "'");
                  $data['speciality'] = $query->getResultArray();
                  return $data['speciality']; 
      }  

      public function getAllSpecialitiesButSpecialitiesOfTheHairdresser($idHairdresser)
      {
        // Cette fonction va aller récupérer toutes les spécialités disponibles SAUF les spécialités dont le coiffeur (id) a déjà
        // Exemple : spécialité a - b - c - d ; le coiffeur possède la spécialité d,  alors on va afficher spécialité a - b - c.
        $query = $this->db->query("SELECT *
                                   FROM Specialities     
                                   WHERE ID NOT IN
                                   (SELECT ID
                                   FROM specialities t1
                                   JOIN Hairdresser_specialities t2
                                   ON t1.ID = t2.ID_speciality
                                   WHERE t2.ID_hairdresser = '" . $idHairdresser . "');
                                   ");
                                                    
        $data['remainingSpecialities'] = $query->getResultArray();
        return $data['remainingSpecialities'];
      }


      public function getAllSpecialitiesAvailableForTheSpecifiedSalonBySendingIdSalon($idSalon)
      {
         // Function qui récupère toutes les spécialités (distinctes) du salon $idSalon des coiffeurs
         // Exemple : Dans le salon Y il y a : Coiffeur "A" qui a spécialité A et B et un Coiffeur "B" qui a spécialité B, H et O
         // On va récupérer alors spécialité A, B, H et O
         $query = $this->db->query("SELECT DISTINCT t1.speciality_name,t1.ID
                                    FROM Specialities T1
                                    JOIN hairdresser_specialities t2
                                    ON t2.ID_speciality = t1.ID
                                    JOIN hairdressers t3
                                    ON t3.ID_user = t2.ID_hairdresser
                                    JOIN Hairdressers_Salons t4
                                    ON t4.ID_hairdresser = ID_user
                                    WHERE t4.ID_salons = '" . $idSalon . "'");
        $data['allSpecialitiesOfTheSalon'] = $query->getResultArray();
        return $data['allSpecialitiesOfTheSalon'];
      }


      public function getDurationAndPriceOfASpecifiedSpecialityBySendingIdSpeciality($idSpeciality)
      {
        $query = $this->db->query("SELECT duration,price
                                   FROM SPECIALITIES
                                   WHERE ID = '" . $idSpeciality . "'");
        $data['durationSpeciality'] = $query->getResultArray();
        return $data['durationSpeciality'];
      }


      public function getAppointmentEndBySendingAppointmentStartAndDurationOfTheSpeciality($appointmentStart,$durationSpeciality)
      {
        // Function qui va calculer la date de fin d'un rendez vous.
        // Exemple : j'ai rdv à 14h et la durée de ma spécialité est de 40 min => alors :
        // le start sera à 14h et automatiquement le end sera à 14h40
        $query = $this->db->query("SELECT ADDTIME('$appointmentStart','$durationSpeciality') AS appointmentEndDate");
        $data['appointmentEnd'] = $query->getResultArray();
        
        return $data['appointmentEnd'];
      }





}