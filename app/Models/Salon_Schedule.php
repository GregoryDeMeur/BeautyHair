<?php
namespace App\Models;

class Salon_Schedule extends \CodeIgniter\Model
{

    protected $table = 'salons_schedule';
    protected $primaryKey = 'day,ID_salons';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['day','ID_salons','day_schedule_start','day_schedule_end'];

    public $day;
    public $ID_salons;
    public $day_schedule_start;
    public $day_schedule_end;


    public function insertScheduleByDefaultWhenSalonIsCreated($idSalon)
    {
      // Function qui ajoute automatiquement 7 rows au salon en question, modifiable par la suite

      
      $query = $this->db->query("INSERT INTO salons_schedule (day,ID_salons)
                                 VALUES ('Lundi','".$idSalon."'),
                                        ('Mardi','".$idSalon."'),
                                        ('Mercredi','".$idSalon."'),
                                        ('Jeudi','".$idSalon."'),
                                        ('Vendredi','".$idSalon."'),
                                        ('Samedi','".$idSalon."'),
                                        ('Dimanche','".$idSalon."')");
                                 
    }

    public function updateScheduleOfASpecifiedSalonBySendingIdSalonAndScheduleStartAndScheduleEnd($data)
    {
      
        // Chaque valeur postée par l'utilisateur doit être vérifiée pour savoir si il y a de l'information ou si elle est NULL
			  // Et ensuite, on update dans la base de données le tout
          $scheduleOuverture = $data["day_schedule_start"] ;
          if($data["day_schedule_start"] == ""){$scheduleOuverture = NULL;}
          $scheduleFermeture = $data["day_schedule_end"] ;
          if($data["day_schedule_end"] == ""){$sceduleFermeture = NULL;}

          // Maintenant il faut arranger la concaténation de la fonction en rapport avec les variables, la concaténation change si c'est NULL ou pas.
          // Si l'ouverture ou la fermeture est NULL, alors on va executer une requête SQL avec une concaténation appropriée pour bien faire en sorte que
          // la valeur NULL est prise dans la table et non pas la valeur 00:00:00
          if ($scheduleOuverture == NULL || $scheduleFermeture == NULL)
          {
              // Si l'un ou l'autre est NULL, ce n'est pas la peine d'encoder les valeurs.. Une ouverture doit obligatoirement avoir un temps de fermeture et vise-versa.
              // Donc si c'est NULL -> on attribue NULL à l'ouverture ET à la fermeture
              $query = $this->db->query("UPDATE salons_schedule
                                      SET day_schedule_start = NULL ,
                                          day_schedule_end = NULL 
                                      WHERE ID_salons = '" . $data['ID'] . "'
                                      AND day = '" . $data['day'] ."'");
          }
          else
          {
              // Si il y a une assignation aux valeurs, donc non NULL, on fait une requête SQL d'update standard.
              $query = $this->db->query("UPDATE salons_schedule
              SET day_schedule_start = '" . $scheduleOuverture . "',
                  day_schedule_end = '" . $scheduleFermeture . "'
              WHERE ID_salons = '" . $data['ID'] . "'
              AND day = '" . $data['day'] ."'");
          }
            
          
                                      
    }

    public function deleteAllScheduleOfASpecifiedSalonBySendingIdSalon($idSalon)
    {
      $this->db->query("DELETE FROM salons_schedule WHERE ID_salons =  '" .  $idSalon . "'");      
    }


    public function getScheduleOfASpecifiedSalonBySendingIdSalon($idSalon)
    {
      $query = $this->db->query("SELECT * FROM salons_schedule WHERE ID_salons = '" . $idSalon . "'");
      $row['schedule'] = $query->getResultArray();
      return $row['schedule'];
    }


    //////////////////////////////////////////////////////////////////////////////
    ////////// Recuperation des horaires de chaque jour de la semaine ////////////
    //////////////////////////////////////////////////////////////////////////////

    public function getMondayScheduleOfASpecifiedSalonBySendingIdSalon($idSalon)
    {
      // Récupération d'horaire le lundi du salon $idSalon
      $query = $this->db->query("SELECT * 
                                 FROM salons_schedule 
                                 WHERE day = 'Lundi'
                                 AND ID_salons = '" . $idSalon . "'");
      $row['schedule'] = $query->getResultArray();
      return $row['schedule'];
    }

    public function getTuesdayScheduleOfASpecifiedSalonBySendingIdSalon($idSalon)
    {
      // Récupération d'horaire le mardi du salon $idSalon
      $query = $this->db->query("SELECT * 
                                 FROM salons_schedule 
                                 WHERE day = 'Mardi'
                                 AND ID_salons = '" . $idSalon . "'");
      $row['schedule'] = $query->getResultArray();
      return $row['schedule'];
    }

    public function getWednesdayScheduleOfASpecifiedSalonBySendingIdSalon($idSalon)
    {
      // Récupération d'horaire le mercredi du salon $idSalon
      $query = $this->db->query("SELECT * 
                                 FROM salons_schedule 
                                 WHERE day = 'Mercredi'
                                 AND ID_salons = '" . $idSalon . "'");
      $row['schedule'] = $query->getResultArray();
      return $row['schedule'];
    }

    public function getThursdayScheduleOfASpecifiedSalonBySendingIdSalon($idSalon)
    {
      // Récupération d'horaire le jeudi du salon $idSalon
      $query = $this->db->query("SELECT * 
                                 FROM salons_schedule 
                                 WHERE day = 'Jeudi'
                                 AND ID_salons = '" . $idSalon . "'");
      $row['schedule'] = $query->getResultArray();
      return $row['schedule'];
    }

    public function getFridayScheduleOfASpecifiedSalonBySendingIdSalon($idSalon)
    {
      // Récupération d'horaire le vendredi du salon $idSalon
      $query = $this->db->query("SELECT * 
                                 FROM salons_schedule 
                                 WHERE day = 'Vendredi'
                                 AND ID_salons = '" . $idSalon . "'");
      $row['schedule'] = $query->getResultArray();
      return $row['schedule'];
    }

    public function getSaturdayScheduleOfASpecifiedSalonBySendingIdSalon($idSalon)
    {
      // Récupération d'horaire le samedi du salon $idSalon
      $query = $this->db->query("SELECT * 
                                 FROM salons_schedule 
                                 WHERE day = 'Samedi'
                                 AND ID_salons = '" . $idSalon . "'");
      $row['schedule'] = $query->getResultArray();
      return $row['schedule'];
    }

    public function getSundayScheduleOfASpecifiedSalonBySendingIdSalon($idSalon)
    {
      // Récupération d'horaire le dimanche du salon $idSalon
      $query = $this->db->query("SELECT * 
                                 FROM salons_schedule 
                                 WHERE day = 'Dimanche'
                                 AND ID_salons = '" . $idSalon . "'");
      $row['schedule'] = $query->getResultArray();
      return $row['schedule'];
    }


}