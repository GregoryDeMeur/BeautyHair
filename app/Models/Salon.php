<?php
namespace App\Models;

class Salon extends \CodeIgniter\Model
{

    protected $table = 'salons';
    protected $primaryKey = 'ID';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['ID','name','address','ID_owner','google_map','telephone','email','description'];

    public $ID;
    public $name;
    public $address;
    public $ID_owner;
    public $google_map;
    public $telephone;
    public $email;
    public $description;


    public function insertSalonIntoTableSalons($data)
    {
      $this->insert($data);
    }


    public function getTheLastRecordOfTableSalons()
    {
      // Fonction qui récupère le dernier salon enregistré
      $query = $this->db->query("SELECT * FROM salons ORDER BY ID DESC LIMIT 1");
      $data['salon'] = $query->getResultArray();
      return $data['salon'];
    }


    public function getAllSalons()
    {
        $query = $this->db->query("SELECT * FROM salons ORDER BY name ASC");
        $data['salon'] = $query->getResultArray();
        return $data['salon'];
        
    }

    public function getSalonBySendingId($id)
    {
      $query = $this->db->query("SELECT * FROM salons WHERE ID = '" .  $id . "'");
      $row['salon'] = $query->getResultArray();
      return $row['salon'];
    }

 
    public function updateSalon($data)
    {
      $this->db->query("UPDATE salons 
                        SET name =  '" .  $data['name'] . "',
                            address = '" .  $data['address'] . "',
                            ID_owner = '" .  $data['ID_owner'] . "',
                            google_map = '" .  $data['google_map'] . "',
                            telephone = '" .  $data['telephone'] . "',
                            email = '" .  $data['email'] . "',
                            description = '" .  $data['description'] . "'
                            WHERE ID = '" .  $data['ID'] . "'");   
    }

    public function updateSalonWithoutIdOwner($data)
    {
      $this->db->query("UPDATE salons 
                        SET name =  '" .  $data['name'] . "',
                            address = '" .  $data['address'] . "',
                            ID_owner = NULL,
                            google_map = '" .  $data['google_map'] . "',
                            telephone = '" .  $data['telephone'] . "',
                            email = '" .  $data['email'] . "',
                            description = '" .  $data['description'] . "'
                            WHERE ID = '" .  $data['ID'] . "'");   
    }

    public function managerUpdateInformationsSalon($data)
    {
      // Function similaire aux 2 précédentes fonction d'update, mais celle-ci est destinée aux managers, qui ne changeront pas l'id_owner de la table salon
      $this->db->query("UPDATE salons 
                        SET name =  '" .  $data['name'] . "',
                            address = '" .  $data['address'] . "',
                            google_map = '" .  $data['google_map'] . "',
                            telephone = '" .  $data['telephone'] . "',
                            email = '" .  $data['email'] . "',
                            description = '" .  $data['description'] . "'
                            WHERE ID = '" .  $data['ID'] . "'");  
    }

    public function deleteSalonFromTableSalons($id)
      {
          $this->db->query("DELETE FROM salons WHERE ID =  '" .  $id . "'");             
      }


      public function deleteSalonOwnerIfExist($idHairdresser)
      {
        // Cette fonction va être appelée si un hairdresser est supprimé.
        // Elle va check si l'id de l'utilisateur, qui va être supprimée, est un gérant d'un des salons de BeautyHair
        // Si c'est le cas, alors on efface son id_owner de la table Salons
          $this->db->query("UPDATE salons
                            SET ID_owner = NULL
                            WHERE ID_owner = '" .  $idHairdresser . "'");
      }

}