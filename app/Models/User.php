<?php
namespace App\Models;

class User extends \CodeIgniter\Model
{

    protected $table = 'users';
    protected $primaryKey = 'ID';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['ID','lastname', 'firstname', 'email', 'password','address','telephone','active','avatar'];

    public $ID;
    public $lastname;
    public $firstname;
    public $email;
    public $address;
    public $telephone;
    public $avatar;
    public $active; // attribut qui permet de ne pas supprimer la row dans la db mais de garder une trace

  
  
      public function insertUserIntoTableUsers($data)
      {
        $this->insert($data);
      }

      public function updateUser($data)
      {
        
        $this->db->query("UPDATE users 
                          SET email =  '" .  $data['email'] . "',
                              lastname = '" .  $data['lastname'] . "',
                              firstname = '" .  $data['firstname'] . "',
                              address = '" .  $data['address'] . "',
                              telephone = '" .  $data['telephone'] . "'
                              WHERE ID = '" .  $data['ID'] . "'");                                                        
      }
      

      public function hashUserPassword($passwordToHash)
      {
        return password_hash($passwordToHash, PASSWORD_BCRYPT); 
      }
  
      public function getUserId($email)
      {
        $query = $this->db->query("SELECT * FROM users WHERE email = '" .  $email . "'");
        $row["ID"] = $query->getRow(0,'\App\Models\User');
        return $row["ID"];
      }

      public function getUser($email, $password)
      {
        $authenticator = new Authenticator();
        if($authenticator->testPassword($_POST["email"], $_POST["password"])){
            $query = $this->db->query("SELECT * FROM users WHERE email = '" .  $email . "'");
            $row = $query->getRow(0,'\App\Models\User');
            return $row;
        }
        return null;
      }

      public function isUserActive($idUser)
      {
        // Fonction qui renvoie true si l'utilisateur est actif (1) et false si le compte est désactivé (0)
        $query = $this->db->query("SELECT active FROM users WHERE id = '" . $idUser . "'");
        $row = $query->getRow(0, '\App\Models\User');
        if($row->active == 1)
        {
          return true;
        }
        else
        {
          return false;
        }
      }

      public function checkIfEmailExistsInDatabaseBySendingEmail($email)
      {
        $query = $this->db->query("SELECT * FROM users WHERE email = '" . $email . "'");
        $row = $query->getRow(0, '\App\Models\User');
        if (empty($row))
        {
          // Pas de mail, on peut donc inscrire un utilisateur avec ce mail dans la base de données !
          return false;
        }
        else
        {
          // Il y a déjà un mail existant.. Inscription impossible avec celui-ci.
          return true;
        }
      }

      public function getAllUsers()
      {
        $query = $this->db->query("SELECT * FROM users ORDER BY email ASC");
        $data['user'] = $query->getResultArray();
        return $data['user'];
        
      }

      public function getUserBySendingId($id)
      {
        
        $query = $this->db->query("SELECT * FROM users WHERE ID = '" .  $id . "'");
        $row['user'] = $query->getResultArray();
        return $row['user'];
        
      }

      public function deleteUserFromTableUsers($id)
      {
          $this->db->query("DELETE FROM users WHERE ID =  '" .  $id . "'");             
      }

      public function getIdLastnameFirstnameOfSalonOwner($idSalon)
      {
          $query = $this->db->query("SELECT t1.ID,t1.lastname,t1.firstname
                                     FROM Users t1
                                     JOIN Hairdressers t2
                                     ON t1.ID = t2.ID_user
                                     JOIN Salons t3
                                     ON t2.ID_user = t3.ID_owner
                                     WHERE t3.ID= '" . $idSalon . "'");
                            
          $row = $query->getRow(0,'\App\Models\User');
          return $row;
      }

      public function getAllIdLastnameFirstnameHairdressers()
        {
             
            $query = $this->db->query("SELECT t1.ID,t1.firstname,t1.lastname
                                       FROM Users t1
                                       JOIN Hairdressers t2
                                       ON t2.ID_user = t1.ID");
            $resultat["hairdressers"] = $query->getResult();
            return $resultat["hairdressers"];
        }


      public function getFirstnameLastnameOfTheHairdresserBySendingId($idHairdresser)
      {
        $query = $this->db->query("SELECT t1.firstname,t1.lastname
                                   FROM Users t1
                                   JOIN Hairdressers t2
                                   ON t2.ID_user = t1.ID
                                   WHERE t2.ID_user = '" . $idHairdresser . "'");
        $row = $query->getRow(0, '\App\Models\User');
        return $row;
      }


      public function updateAvatarUser($data)
      {
        // Suppression de l'ancien avatar avant d'ajouter le nouveau.
        
        $pathOfTheAvatar = $this->db->query("SELECT avatar FROM users WHERE ID = '" . $data['ID'] . "'");
        $row['pathOfTheAvatar'] = $pathOfTheAvatar->getResultArray();

        // On check d'abord si l'avatar n'est pas celui par défaut avant de supprimer
        if($row["pathOfTheAvatar"][0]["avatar"] != "upload/membres/default_avatar.png")
        {
          // Si c'est une image qui a déjà été uploadée, alors on la retire
          unlink($_SERVER['DOCUMENT_ROOT']. '/BeautyHair/' . $row["pathOfTheAvatar"][0]["avatar"]);
        } // Sinon, on ne supprime pas l'image par défaut, on va juste la remplacer.
        
        // Insertion du nouvel avatar pour l'utilisateur, et assignation dans sa variable de session.
        $this->db->query("UPDATE users 
                          SET avatar =  '" .  $data['avatar'] . "'        
                          WHERE ID = '" .  $data['ID'] . "'");
        $_SESSION['user']->avatar = $data['avatar'];       
      }


      public function deleteAvatarUser($idUser)
      {
        // Cette fonction va faire la Suppression de l'avatar uploadé dans le dossier + suppression de la row dans la db.
      
      // Récupération du chemin du fichier
      $pathOfTheAvatar = $this->db->query("SELECT avatar FROM users WHERE ID = '" . $idUser . "'");
      $row['pathOfTheAvatar'] = $pathOfTheAvatar->getResultArray();
     
      // Pour supprimer la photo du fichier upload, il faut utiliser la function unlink() et attribuer le chemin absolu du fichier 
      // Et pour avoir le chemin jusqu'au htdocs on peut utiliser la variable $_SERVER['DOCUMENT_ROOT'], puis concaténer le reste
      // /!\ Cela devrait fonctionner pour n'importe quelle machine/server pour autant qu'on ne rename pas le dossier BeautyHair.
      
      // Tout d'abord, avant de supprimer l'avatar, il faut garantir que l'utilisateur ne veuille pas supprimer l'avatar par défaut
      if($row["pathOfTheAvatar"][0]["avatar"] != "upload/membres/default_avatar.png")
      {
        unlink($_SERVER['DOCUMENT_ROOT'] . '/BeautyHair/' . $row["pathOfTheAvatar"][0]["avatar"]);

        // Et finalement, Suppression avatar de l'utilisateur dans la db, et assignation de l'avatar par défaut dans sa variable de session.
          $defaultAvatar = "upload/membres/default_avatar.png";
          $this->db->query("UPDATE users
                            SET avatar = '" . $defaultAvatar . "'
                            WHERE ID = '" . $idUser . "'");
          $_SESSION['user']->avatar = $defaultAvatar; 
      }

                       
      }

      public function getAllAssignedHairdresserUserInformationsBySendingIdSalon($idSalon)
      {
        $query = $this->db->query("SELECT t1.ID,t1.lastname,t1.firstname,t1.email,t1.address,t1.telephone,t1.avatar FROM Users t1
                         JOIN Hairdressers t2
                         ON t2.ID_user=t1.ID
                         JOIN hairdressers_salons t3
                         ON t3.ID_hairdresser = t2.ID_user 
                         WHERE ID_Salons = '" . $idSalon. "'");
        $row['user'] = $query->getResultArray();
        return $row['user'];
      }


      public function enableOrDisableUser($user)
      {
        // Fonction qui active/désactive le compte d'un utilisateur
        $this->db->query("UPDATE users
                          SET active = '" . $user['active'] . "'
                          WHERE ID = '" . $user['ID'] . "'");

      }
      


}