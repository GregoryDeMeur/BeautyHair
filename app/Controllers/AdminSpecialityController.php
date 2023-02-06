<?php namespace App\Controllers;
use App\Models;
session_start();
class AdminSpecialityController extends BaseController
{

    public function addNewSpeciality()
    {
        if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
        {

                        // Check si le nom de la spécialité entrée par l'admin n'est pas vide
                        // Check email
                        if(empty($_POST['specialityName']))
                        { 
                            // On attribue une variable de session pour faire "pop" un message d'erreur lors de la redirection
                            $_SESSION['errorLogSpeciality'] = array('Le champ "Nom de la spécialité" ne peut pas être vide');    
                            return redirect()->to(base_url('AdminController/admin_show_specialities'));
                           
                        }
                        else
                        {
                            // [Création d'une nouvelle spécialité dans la DB]

                            // Création de la spécialité + assignation dans la variable.
                            $speciality = new \App\Models\Speciality();
                            $specialityToAddIntoDb = array("speciality_name"=>$_POST["specialityName"],
                                                            "description"=>$_POST["specialityDescription"],
                                                            "price"=>$_POST["specialityPrice"],
                                                            "duration"=>$_POST["specialityDuration"]); 
                                                            
                            // Insertion de la nouvelle spécialité dans la DB.
                            $speciality->insertSpecialityIntoTableSpecialities($specialityToAddIntoDb);
                            
                            // Message de confirmation
                            echo "Nouvelle spécialité enregistrée dans la base de données !";      
                            
                            // Refresh de la table salon puis affichage de celles-ci.
                            $specialityTwo = new \App\Models\Speciality();
                            $data['speciality'] = $specialityTwo->getAllSpecialities();

                            $_SESSION['successLogSpeciality'] = array('La spécialité "' .$_POST["specialityName"] . '" a été ajoutée dans la base de données !');
                            return redirect()->to(base_url('AdminController/admin_show_specialities'));
                        }
        }  
    }

    
    public function modifySpeciality()
    {
        if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
        {
                // Check si le nom du salon entré par l'admin n'est pas vide           
                if(empty($_POST['specialityName']))
                { 
                     // On attribue une variable de session pour faire "pop" un message d'erreur lors de la redirection
                     $_SESSION['errorLogSpeciality'] = array('Le champ "Nom de la spécialité" ne peut pas être vide');    
                     return redirect()->to(base_url('AdminController/admin_show_specialities'));
                    
                }
                

            // Si les informations entrées sont valides, on va les modifier dans la database.

                    // Création d'une instance salon
                    $speciality = new \App\Models\Speciality();
                    // Assignation des valeurs postées dans une variable
                    $dataSpecialityToModify = array("speciality_name"=>$_POST["specialityName"],
                                                    "description"=>$_POST["specialityDescription"],
                                                    "price"=>$_POST["specialityPrice"],
                                                    "duration"=>$_POST["specialityDuration"],
                                                    "ID"=>$_POST["specialityId"]);
                    // Ensuite, on UPDATE ces valeurs dans la db.
                    $speciality->updateSpeciality($dataSpecialityToModify);
                    
                    // On attribue une variable de session pour faire "pop" un message de succès lors de la redirection
                    $_SESSION['successLogSpeciality'] = array('La spécialité "' . $_POST["specialityName"]. '" a été modifiée dans la base de données ! ');   
                    return redirect()->to(base_url('AdminController/admin_show_specialities'));

        }
    }
           

    public function deleteSpeciality($idSpeciality)
    {
        // Fonction qui supprime la spécialité "$idSpeciality"
        if(($_SESSION["loggedin"] == true) && ($_SESSION["userRole"] == 3))
        {

        // On supprime la spécialité en question, mais on s'assure que, avant qu'elle soit supprimée,
        // les assignements de cette spécialité aux coiffeurs qui ont cette spécialité soit supprimés avant. 
        $hairdresser_specialities = new \App\Models\Hairdresser_speciality();
        $speciality = new \App\Models\Speciality();

        // Récupération du nom de la spécialité pour afficher son nom dans la vue lors du succès du delete
        $specialityData = $speciality->getSpecialityBySendingId($idSpeciality);
        
        
        $hairdresser_specialities->deleteHairdresserSpecialityFromTableHairdresser_SpecialitiesBySendingIdSpeciality($idSpeciality);

        // On supprime TOUT les rendez-vous dont l'id de la spécialité = $idSpeciality
        $appointment = new \App\Models\Appointment();
        $appointment->deleteAllAppointmentsOfASpecifiedSpecialityBySendingIdSpeciality($idSpeciality);

        $speciality->deleteSpecialityFromTableSpecialities($idSpeciality);

    
        // Dès que la suppression est faite, on réactualise la liste des spécialités
        // en excluant l'enregistrement qui vient d'être supprimé.
        $specialityTwo = new \App\Models\Speciality();
        $data['speciality'] = $specialityTwo->getAllSpecialities();

        // On attribue une variable de session pour faire "pop" un message de succès lors de la redirection
        $_SESSION['successLogSpeciality'] = array('La spécialité "' . $specialityData[0]["speciality_name"]. '" a été supprimée de la base de données ! '); 
        return redirect()->to(base_url('AdminController/admin_show_specialities'));
        }
    }



}