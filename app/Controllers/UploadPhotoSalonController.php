<?php namespace App\Controllers;
use App\Models;
session_start();
class UploadPhotoSalonController extends BaseController
{

  public function uploadPhotoSalon($idSalon)
  {
    
        

        // On va récupérer le nom du salon, puis ensuite créer automatiquement un directory avec le nom du salon en question
        // Puis, l'upload se fera dans ce directory.
        // Donc premièrement, obtention de l'information du salon grâce à l'id envoyé en paramètre
        $salon = new \App\Models\Salon();
        $salonData['salonInfo'] = $salon->getSalonBySendingId($idSalon);

        // Deuxièmement, on assigne une Variable qui stock le path directory
        $target_dir = "upload/salons/" . $salonData["salonInfo"][0]["name"]  . "/photos/";

        // Troisiemement, création du directory avec le nom du salon SI il n'est pas déjà créer
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
        $fileName = $randomAlphaNumberGenerator . '_' . basename($_FILES["photoSalon"]["name"]);

        // Variable qui stock le path entier du fichier
        $target_file = $target_dir . $fileName;

        // Set upload par défaut à 1
        $uploadOk = 1;

        // On va assigner l'extension du fichier dans une variable, et on convertit tout en minuscule.
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));  

        // On check si l'upload est une image valide
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["photoSalon"]["tmp_name"]);
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
        if ($_FILES["photoSalon"]["size"] > 5242880) {
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
            if (move_uploaded_file($_FILES["photoSalon"]["tmp_name"], $target_file)) {
                echo "Le fichier ". basename( $_FILES["photoSalon"]["name"]). " a été uploadé sur le server.";

                // Maintenant que le fichier a été upload sur le server, il faut assigner ce fichier au salon en question.
                $salonPhoto = new \App\Models\Salon_Photo();
                $salonPhotoData = array("photo"=>$target_file,
                                        "ID_salon"=>$idSalon);
                $salonPhoto->insertSalonPhoto($salonPhotoData);

                // Avant de réafficher la vue, on selectionne toutes les photos du salon
                $salonActuel['photo'] = $salonPhoto->getAllPhotosOfTheSalonBySendingIdSalon($idSalon);
                $salonActuel['ID'] = $idSalon;

                

                switch($_SESSION["userRole"])
                    {

                        case "2": // Redirection hairdresser
                            return redirect()->to(base_url('HairdresserController/hairdresser/manager_change_photos_of_the_salon'));
                            
                            //view('espace_hairdresser\manager\manager_change_photos_of_the_salon',$salonActuel);
                            break;

                        case "3": // Redirection admin
                            return view('espace_admin/salons/modals/ajax_refresh_photos_of_salon_id_after_add_or_delete_a_photo',$salonActuel);
                            // return redirect()->to(base_url('AdminController/admin_show_salons'));                      
                            break;

                        

                    }


            } else {
                echo "Désolé, il y a eu une erreur lors de l'upload de votre fichier.";
            }
        }
      
              
  }


  public function deletePhotoSalon($idPhoto)
    {
        // Function qui delete une photo dans la db mais également dans le dossier uploadé

        // echo $_SERVER['DOCUMENT_ROOT'];  Ceci permet de savoir quel est le chemin en local pour delete avec un unlink(); 

        
        $photoSalon = new \App\Models\Salon_Photo();
        
        // On récupère l'id du salon en question pour réactualiser la vue par après.
        $idSalonArray = $photoSalon->getSalonIdBySendingIdPhoto($idPhoto);
        $idSalon = $idSalonArray[0]["ID_salon"];

        // On delete la photo en question
        $photoSalon->deletePhotoSalonBySendingIdOfThePhoto($idPhoto);

        // Avant de réafficher la vue, on selectionne toutes les photos du salon
        $salonActuel['photo'] = $photoSalon->getAllPhotosOfTheSalonBySendingIdSalon($idSalon);
        $salonActuel['ID'] = $idSalon;

        // Réactualisation via AJAX
        switch($_SESSION["userRole"])
                    {
                       

                        case "2": // Redirection hairdresser
                            return view('espace_hairdresser/manager/ajax_refresh_photos_of_salon_id_after_add_or_delete_a_photo',$salonActuel);
                            break;

                            case "3": // Redirection admin
                                return view('espace_admin/salons/modals/ajax_refresh_photos_of_salon_id_after_add_or_delete_a_photo',$salonActuel);                      
                                break;

                        

                    }

    }


}
