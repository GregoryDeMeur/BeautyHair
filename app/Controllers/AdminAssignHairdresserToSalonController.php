<?php namespace App\Controllers;
use App\Models;
session_start();
class AdminAssignHairdresserToSalonController extends BaseController
{
    
        
            public function assignHairdresserToSalon()
            {
                // Si un utilisateur envoie le formulaire avec rien dedans, ou que un coiffeur est DEJA assigné à un salon, il y aura une exception vu qu'on ne peut pas permettre de doublon dans la base de données
                $hairdresserSalon = new \App\Models\Hairdresser_Salon();
               $dataHairdresserToAssignIntoTheSpecifiedSalon = array("ID_hairdresser"=>$_POST['hairdresserList'],
                                                                     "ID_salons"=>$_POST['salonList']);
                try {
                    // Insertion du coiffeur dans le salon demandé
               

               $hairdresserSalon->assignHairdresserToSalon($dataHairdresserToAssignIntoTheSpecifiedSalon); 
                } 
                catch (\Exception $e) 
                {
                    $_SESSION['errorLogAssignement'] = array('Il y a une erreur ! Vérifier que vous avez bien sélectionner un coiffeur et un salon. Vérifier également que le coiffeur ne soit pas déjà assigné dans celui-ci !');
                    return redirect()->to(base_url('AdminController/admin_show_assign_hairdresser_to_salon'));
                } 
                

               // Récupération du nom du coiffeur pour l'afficher dans le message d'alert de succès
               $hairdresser = new \App\Models\User();
               $dataHairdresser['hairdresser'] = $hairdresser->getUserBySendingId($_POST['hairdresserList']);
               // Récupération du nom du salon pour l'afficher dans le message d'alert de succès
               $salon = new \App\Models\Salon();
               $dataSalon['salon'] = $salon->getSalonBySendingId($_POST['salonList']);

               // On attribue une variable de session pour faire "pop" un message de succès lors de la redirection
               $_SESSION['successLogAssignement'] = array('Le coiffeur '. $dataHairdresser["hairdresser"][0]["lastname"] . ' ' . $dataHairdresser["hairdresser"][0]["firstname"]. ' a bien été assigné au salon ' . $dataSalon['salon'][0]['name']);
                return redirect()->to(base_url('AdminController/admin_show_assign_hairdresser_to_salon'));
                                                                     
           

               // Refresh de la table d'assignement coiffeur/salon sur la page actuel, puis return la vue.
                $hairdresser = new \App\Models\User();
                $data['hairdresser'] = $_POST['hairdresserList'];

                $salon = new \App\Models\Salon();
                $data['salon'] = $_POST['salonList'];

                return redirect()->to(base_url('AdminController/admin_show_assign_hairdresser_to_salon'));
                
            }


            public function deleteAssignedHairdresserToSalon($idHairdresser,$idSalon)
            {
                // Suppresion de l'assignation du coiffeur - salon demandé
                $hairdresserSalon = new \App\Models\Hairdresser_Salon();
                $hairdresserSalon->deleteAssignedHairdresserOfASalonFromTableHairdressers_SalonsBySendingIdHairdresserAndIdSalon($idHairdresser,$idSalon);

                // Réactualisation
                $hairdresserSalonTwo = new \App\Models\Hairdresser_Salon();
                $data['hairdresserSalon'] = $hairdresserSalonTwo->getAllAssignedHairdressersOfAllSalons();

                // Récupération du nom du coiffeur pour l'afficher dans le message d'alert de succès
                $hairdresser = new \App\Models\User();
                $dataHairdresser['hairdresser'] = $hairdresser->getUserBySendingId($idHairdresser);
                // Récupération du nom du salon pour l'afficher dans le message d'alert de succès
                $salon = new \App\Models\Salon();
                $dataSalon['salon'] = $salon->getSalonBySendingId($idSalon);

                // On attribue une variable de session pour faire "pop" un message de succès lors de la redirection
               $_SESSION['successLogAssignement'] = array('Le coiffeur '. $dataHairdresser["hairdresser"][0]["lastname"] . ' ' . $dataHairdresser["hairdresser"][0]["firstname"]. ' a bien été supprimé du salon ' . $dataSalon['salon'][0]['name']);
                return redirect()->to(base_url('AdminController/admin_show_assign_hairdresser_to_salon'));


            }


            


	//--------------------------------------------------------------------

}
