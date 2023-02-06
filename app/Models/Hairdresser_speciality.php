<?php
namespace App\Models;

class Hairdresser_speciality extends \CodeIgniter\Model
{

    protected $table = 'hairdresser_specialities';
    protected $primaryKey = 'ID_speciality,ID_hairdresser';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['ID_hairdresser','ID_speciality'];

    public $ID_hairdresser;
    public $ID_speciality;



        

        public function deleteHairdresserSpecialityFromTableHairdresser_SpecialitiesBySendingIdHairdresser($idHairdresser)
        {
          $this->db->query(" DELETE FROM hairdresser_specialities WHERE ID_hairdresser =  '" .  $idHairdresser . "'");                
        }

        

        public function deleteHairdresserSpecialityFromTableHairdresser_SpecialitiesBySendingIdSpeciality($idSpeciality)
        {
          $this->db->query(" DELETE FROM hairdresser_specialities WHERE ID_speciality =  '" .  $idSpeciality . "'"); 
        }
        
        public function assignSpecialityToHairdresser($data,$idHairdresser)
        {
          // Association de chaque spécialité à l'id du hairdresser selectionnée depuis le <select multiple>
          foreach ($data as $row)
          {
            $this->db->query("INSERT INTO hairdresser_specialities (ID_speciality,ID_hairdresser) VALUES ($row,$idHairdresser)");
          }
          
          
        }

        public function deleteSpecialityAssignedToHairdresser($data,$idHairdresser)
        {
          // Suppression de chaque spécialité selectionnée depuis le <select multiple>
          foreach ($data as $row)
          {
            $this->db->query("DELETE FROM hairdresser_specialities WHERE ID_hairdresser='".$idHairdresser. "' AND ID_speciality = '" . $row . "'");
          }
          
          
        }


        public function get_SpecialitiesName_Firstname_Lastname_IdHairdresser_IdSpeciality_OfAllHairdresserOfASpecifiedSalonBySendingIdSalon($idSalon)
        {
          // On va récupérer toutes les spécialités de chaque coiffeur en fournissant un Id de Salon
          // (Fonction qui va permettre de prendre un RDV)
          $query = $this->db->query("SELECT t1.firstname, t1.lastname, t3.ID_hairdresser, t3.ID_speciality, t6.speciality_name
                                     FROM Users t1
                                     JOIN Hairdressers T2
                                     ON t2.ID_user = t1.ID
                                     JOIN hairdresser_specialities t3
                                     ON t3.ID_hairdresser = t2.ID_user
                                     JOIN Hairdressers_salons t4
                                     ON t4.ID_hairdresser = t2.ID_user
                                     JOIN Salons t5
                                     ON t5.ID = t4.ID_Salons
                                     JOIN Specialities t6
                                     ON t6.ID = t3.ID_speciality
                                     WHERE t5.ID = '" . $idSalon . "'");
          $resultat["data"] = $query->getResult();
          return $resultat["data"];

        }

      
        public function getAllSpecialitiesNameOfASalonBySendingIdSalon($idSalon)
        {
          // On récupère ici toutes les spécialités disponibles du salon en question
         $query = $this->db->query("SELECT DISTINCT t1.ID_speciality,t2.speciality_name,t2.description,t2.price,t2.duration
          FROM hairdresser_specialities t1
          JOIN Specialities t2
          ON t1.ID_speciality = t2.ID
          JOIN Hairdressers t3
          ON t3.ID_user = t1.ID_hairdresser
          JOIN hairdressers_salons t4
          ON t4.ID_hairdresser = t3.ID_user
          WHERE T4.ID_Salons = '" . $idSalon . "'");
          $resultat["data"] = $query->getResult();
          return $resultat["data"];

        }

        public function getAllSpecialitiesNameOfAllHairdresserFromASalonBySendingIdSalon($idSalon)
        {
          // Fonction qui récupère toutes les spécialités de chaque coiffeur du salon
          $query = $this->db->query("SELECT t1.speciality_name, t4.firstname,t4.lastname,t4.ID
                                     FROM SPECIALITIES t1
                                     JOIN hairdresser_specialities T2
                                     ON t2.ID_speciality = T1.ID
                                     JOIN Hairdressers T3 
                                     ON t3.ID_user = t2.ID_hairdresser
                                     JOIN Users T4
                                     ON t4.ID = t3.ID_user
                                     JOIN hairdressers_salons t5
                                     ON T5.ID_hairdresser = t3.ID_user
                                     WHERE t5.id_salons = '" . $idSalon . "'");
          $resultat["data"] = $query->getResult();
          return $resultat["data"];
        }


}