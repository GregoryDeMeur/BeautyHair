<?php namespace App\Controllers;
use App\Models;
session_start();
class UploadAvatarController extends BaseController
{

  public function uploadUserAvatar($idUser)
  {
    
        // On va créer un directory en fonction de l'ID et du prénom de l'user qui upload sa photo.
        // Donc premièrement, obtention de l'information du salon grâce à l'id envoyé en paramètre
        $user = new \App\Models\User();
        $userData['userInfo'] = $user->getUserBySendingId($idUser);

        // Ensuite, on assigne une Variable qui stock le path directory
        $target_dir = "upload/membres/" . $userData["userInfo"][0]["ID"] . '_' . $userData["userInfo"][0]["firstname"]  . "/avatar/";

        // Création du directory SI il n'est pas déjà créer
        if (is_dir($target_dir))
        {
        // Le répertoire a déjà été créer, donc il ne faut rien faire.
        } 
        else
        {
        // Vu qu'il n'est pas créer, on demande à php de le faire pour nous
            mkdir($target_dir,0777, true);
        }

        // Ajout generation random pour eviter le doublon de fichier
        $randomAlphaNumberGenerator = "";
        $randomGenerator = array_merge(range(0,9), range('a','z'));
        for ($i = 0; $i < 20; $i++)
        {
           $randomAlphaNumberGenerator .= $randomGenerator[array_rand($randomGenerator)];
        }

        // Nom du fichier en question 
        $fileName = $randomAlphaNumberGenerator . '_' . basename($_FILES["userAvatar"]["name"]);

        // Variable qui stock le path entier du fichier
        $target_file = $target_dir . $fileName;

        // Set upload par défaut à 1
        $uploadOk = 1;

        // On va assigner l'extension du fichier dans une variable, et on convertit tout en minuscule.
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));  

        // On check si l'upload est une image valide
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["userAvatar"]["tmp_name"]);
            if($check !== false) {
                echo "Le fichier est une image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "Le fichier n'est pas une image";
                $uploadOk = 0;
            }
        }

        // Check si le fichier uploadé existe déjà
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check la taille du fichier
        if ($_FILES["userAvatar"]["size"] > 5242880) {
            echo "La taille du fichier ne peut pas dépasser 5Mo.";
            $uploadOk = 0;
        }

        // Check l'extension du fichier
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Désolé, les fichiers acceptés sont uniquements de type JPG, JPEG, PNG & GIF !";
            $uploadOk = 0;
        }

        // Final check si on peut upload ou pas
        if ($uploadOk == 0) {
            // Erreur inconnue
            echo "Votre fichier n'a pas été uploadé sur le site :-(";
        // Si tout les checks ont été OK ; on upload son fichier sur le serveur
        } else {
            if (move_uploaded_file($_FILES["userAvatar"]["tmp_name"], $target_file)) 
               {
                echo "Le fichier ". basename( $_FILES["userAvatar"]["name"]). " a été uploadé sur le server.";

                // Maintenant que le fichier a été upload sur le server, il faut assigner ce fichier à l'utilisateur en question.
                $userTwo = new \App\Models\User();
                $userDataTwo = array("avatar"=>$target_file,
                                  "ID"=>$_SESSION['user']->ID);
                $userTwo->updateAvatarUser($userDataTwo);

                // Réactualisation / redirection
                switch($_SESSION["userRole"])
                    {
                        case "1": // Redirection user
                            return view('espace_user/user_edit_profile');
                        case "2": // Redirection hairdresser
                            return redirect()->to(base_url('HairdresserController/hairdresser/hairdresser_edit_profile'));  
                            break;

                        case "3": // Redirection admin
                            return redirect()->to(base_url('AdminController/admin_edit_profile'));  
                            // return redirect()->to(base_url('AdminController/admin_show_salons'));                      
                            break;
                    }


                } else {
                echo "Désolé, il y a eu une erreur lors de l'upload de votre fichier.";
            }
        }
    
            
    }    
  
              



  public function deleteUserAvatar($idUser)
    {
        // Function qui delete l'avatar du membre (et qui, automataiquement remplace l'image d'avatar de base par défaut)
        $user = new \App\Models\User();
        
        $user->deleteAvatarUser($idUser);

        // Check role de l'utilisateur pour pouvoir faire la redirection appropriée
        switch($_SESSION["userRole"])
                    {
                        case "1": // Redirection user
                            return redirect()->to(base_url('UserController/user/user_edit_profile'));   
                            break;

                        case "2": // Redirection hairdresser
                            return redirect()->to(base_url('HairdresserController/hairdresser/hairdresser_edit_profile'));    
                            break;

                        case "3": // Redirection admin
                            return redirect()->to(base_url('AdminController/admin_edit_profile'));                      
                            break;

                        

                    }

    }


}
