<?php
namespace App\Models;

class Hairdresser extends \CodeIgniter\Model
{

    protected $table = 'hairdressers';
    protected $primaryKey = 'ID';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['ID','ID_user'];

    public $ID;
    public $ID_user;



        public function insertHairdresserIntoTableHairdressers($data)
        {
          $this->insert($data);
        }

        public function deleteHairdresserFromTableHairdressers($id)
        {
          $this->db->query(" DELETE FROM hairdressers WHERE ID_user =  '" .  $id . "'");       
           
        }

        public function getHairdresserBySendingIdUser($id)
        {
        $query = $this->db->query("SELECT * FROM hairdressers WHERE ID_user = '" .  $id . "'");
        $resultat = $query->getRow(0,'\App\Models\Hairdresser');
        return $resultat;
        }

        
        

      



}