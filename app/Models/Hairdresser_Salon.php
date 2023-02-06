<?php
namespace App\Models;

class Hairdresser_Salon extends \CodeIgniter\Model
{

    protected $table = 'hairdressers_salons';
    protected $primaryKey = 'ID';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['ID_hairdresser','ID_salons'];

    public $ID_hairdresser;
    public $ID_salons;


    
        public function assignHairdresserToSalon($data)
        {
            $this->insert($data);
        }
      
        public function getAllLastnameFirstnameIdHairdresserIdSalonOfAssignedHairdressersToSalons()
        {
            // Jointure pour récupérer noms coiffeurs,prénoms coiffeurs, ID coiffeurs, ID salons et nom des salons (assignement haidresser -> salon)
            $query = $this->db->query("SELECT t1.ID_hairdresser, t1.ID_Salons, t3.firstname, t3.lastname, t4.name
                                       FROM hairdressers_salons t1
                                       JOIN Hairdressers t2
                                       ON t1.ID_hairdresser = t2.ID_user
                                       JOIN Users t3
                                       ON t2.ID_user = t3.ID
                                       JOIN Salons t4
                                       ON t4.ID = t1.ID_Salons;");
                                       
            $row['assignedHairdresserToSalon'] = $query->getResultArray();
            return $row['assignedHairdresserToSalon'];
        }


        public function getLastnameFirstnameIdHairdresserIdSalonOfAssignedHairdresserToSalonBySendingIdHairdresserAndIdSalon($idHairdresser,$idSalon)
        {
            // Jointure pour récupérer noms coiffeurs,prénoms coiffeurs, ID coiffeurs, ID salons et nom des salons (assignement haidresser -> salon)
            $query = $this->db->query("SELECT t1.ID_hairdresser, t1.ID_Salons, t3.firstname, t3.lastname, t4.name
                                       FROM hairdressers_salons t1
                                       JOIN Hairdressers t2
                                       ON t1.ID_hairdresser = t2.ID_user
                                       JOIN Users t3
                                       ON t2.ID_user = t3.ID
                                       JOIN Salons t4
                                       ON t4.ID = t1.ID_Salons
                                       WHERE ID_salons = '". $idSalon . "'
                                       AND ID_hairdresser = '" . $idHairdresser . "'");
                                       
            $row['assignedHairdresserToSalon'] = $query->getResultArray();
            return $row['assignedHairdresserToSalon'];
        }



        public function getAllLastnameFirstnameIdHairdresserIdSalonOfAssignedHairdresserToSalonBySendingIdSalon($idSalon)
        {
            // Jointure pour récupérer noms coiffeurs,prénoms coiffeurs, ID coiffeurs, ID salons et nom des salons (assignement haidresser -> salon)
            $query = $this->db->query("SELECT t1.ID_hairdresser, t1.ID_Salons, t3.firstname, t3.lastname, t4.name
                                       FROM hairdressers_salons t1
                                       JOIN Hairdressers t2
                                       ON t1.ID_hairdresser = t2.ID_user
                                       JOIN Users t3
                                       ON t2.ID_user = t3.ID
                                       JOIN Salons t4
                                       ON t4.ID = t1.ID_Salons
                                       WHERE ID_Salons = '" . $idSalon . "'");
                                       
            $row['assignedHairdresserToSalon'] = $query->getResultArray();
            return $row['assignedHairdresserToSalon'];
        }


        public function getAllLastnameFirstnameIdHairdresserIdSalonOfAssignedHairdresserToSalonBySendingIdSpecialityAndIdSalon($idSpeciality,$idSalon)
        {
            // Fonction qui va selectionner tout les coiffeurs d'un salon précis, disposant d'une spécialité précise, dont cette
            // spécialité aura été choisie par l'utilisateur
            $query = $this->db->query("SELECT t1.lastname, t1.firstname, t2.ID_user, t3.ID_speciality, t4.speciality_name
                                       FROM Users t1
                                       JOIN Hairdressers t2
                                       ON t1.ID = t2.ID_user
                                       JOIN hairdresser_specialities t3
                                       ON t3.ID_hairdresser = t2.ID_user
                                       JOIN Specialities t4
                                       ON t4.ID = t3.ID_speciality
                                       JOIN hairdressers_salons t5
                                       ON t5.ID_hairdresser = t2.ID_user 
                                       JOIN Salons t6
                                       ON t6.ID = t5.ID_salons
                                       WHERE t3.ID_speciality = '".$idSpeciality . "'
                                       AND t6.ID = '" . $idSalon . "'");
            $row['assignedHairdresserToSalon'] = $query->getResultArray();
            return $row['assignedHairdresserToSalon'];
        }



        public function getAllIdAssignedHairdresserOfASalonBySendingIdSalon($idSalon)
        {
            $query = $this->db->query("SELECT * FROM hairdressers_salons WHERE ID_salons = '" .  $idSalon . "'");
            $row['hairdresser'] = $query->getResultArray();
            return $row['hairdresser'];
        }


        public function deleteAssignedHairdresserOfASalonFromTableHairdressers_SalonsBySendingIdHairdresserAndIdSalon($idHairdresser,$idSalon)
        {
            $this->db->query("DELETE FROM hairdressers_salons WHERE ID_hairdresser =  '" .  $idHairdresser . "'
                                                                AND ID_salons = '" . $idSalon . "'");             
        }

        public function deleteAllAssignedHairdresserOfASpecifiedSalonBySendingIdSalon($idSalon)
        {
            $this->db->query("DELETE FROM hairdressers_salons WHERE ID_salons = '" . $idSalon . "'"); 
        }

        public function deleteAssignedHairdresserOfAllSalonsBySendingIdHairdresser($idHairdresser)
        {
            $this->db->query("DELETE FROM hairdressers_salons WHERE ID_hairdresser = '" . $idHairdresser . "'"); 
        }
        
        public function getAllAssignedHairdressersOfAllSalons()
        {
            // Récupération de tout les enregistrements de la table
            $query = $this->db->query("SELECT * FROM hairdressers_salons");
            $row['assignedHairdresserToSalon'] = $query->getResultArray();
            return $row['assignedHairdresserToSalon'];
        }

}