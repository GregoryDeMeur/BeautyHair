<?php
namespace App\Models;

class User_Role extends \CodeIgniter\Model
{

    protected $table = 'users_roles';
    protected $primaryKey = 'ID';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['ID','ID_user', 'ID_role'];

    public $ID;
    public $ID_user;
    public $ID_role;


    public function getRoleUserBySendingIdUser($id)
    {
        $query = $this->db->query("SELECT * FROM users_roles WHERE ID_user = '" .  $id . "'");
        $resultat = $query->getRow(0,'\App\Models\User_Role');
        return $resultat;
    }

    public function updateRoleUser($data)
        {
            $this->db->query("UPDATE users_roles SET ID_role =  '" .  $data['ID_role'] . "'       
            WHERE ID_user = '". $data['ID_user'] ."'");   
    
            
        }

        public function deleteUserFromTableUsers_Roles($id)
        {
            $this->db->query("DELETE FROM users_roles WHERE ID_user =  '" .  $id . "'");             
        }





}