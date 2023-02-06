<?php
namespace App\Models;

class Role extends \CodeIgniter\Model
{

    protected $table = 'roles';
    protected $primaryKey = 'ID';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['ID','role_name','role_description'];

    public $ID;
    public $role_name;
    public $role_description;


        public function getRoleBySendingRoleName($role)
        {
            $query = $this->db->query("SELECT * FROM roles WHERE role_name = '" .  $role . "'");
            $resultat = $query->getRow(0,'\App\Models\Role');
            return $resultat;
        }


        public function insertRoleUser($data)
        {
            $builder = $this->db->table('users_roles');
            $builder->insert($data);
        }       

        
        public function getAllRoles()
        {
            // getResult permet de retourner toutes les lignes demandées via la query. 
            $query = $this->db->query("SELECT * FROM roles");
            $resultat["roles"] = $query->getResult();
            return $resultat["roles"];
        }

        public function getRoleNameBySendingIdUser($id)
        {
            $query = $this->db->query("SELECT role_name FROM roles t1 JOIN users_roles t2 ON t1.ID = t2.ID_role WHERE t2.ID_user = '" .  $id . "'");
            $resultat = $query->getRow(0,'\App\Models\Role');
            return $resultat;
        }
      



}