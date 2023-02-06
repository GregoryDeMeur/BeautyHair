<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class Authenticator 
{


    public function testPassword($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = '" .  $email . "'";
        $db = \Config\Database::connect();
        $query = $db->query($sql);
        
        $row = $query->getRow();
        $result = false;
        if (isset($row)){
            if (password_verify($password, $row->password)){
                $result = true;
            }
        }
        return $result;
    }


}
