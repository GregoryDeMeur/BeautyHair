<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Statistiques</title>

</head>

<body>
  <!--Include User NavBar -->
  <?php echo $this->include('templates/espace_user/user_header.php') ;?>

  <!-- ACTIONS -->
  <section id="actions" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <a href="/BeautyHair/UserController/user/dashboard" class="btn btn-light btn-block">
            <i class="fas fa-arrow-left mr-1"></i> Retour au dashboard
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- PROFILE -->
  <section id="profile">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header text-center">
              <h4>Vos statistiques</h4>
            </div>
            <div class="card-body text-center">
              <!-- Formulaire edit profile -->
              Vous êtes inscrit depuis le <?php echo $_SESSION['user']->register_date ?><br />
              Nombre total de rendez-vous :  <?php echo $appointmentCount[0]["COUNT(*)"] ?> <br />
              Salon favori : <?php echo $favouriteSalon[0]["name"] ?> avec un total de <?php echo $favouriteSalon[0]["COUNT(t2.ID_salon)"]?> rendez-vous ! <br />
              Nombre total argent dépensé : <?php echo $appointmentSumTotal[0]["SUM(price_paid)"] . " " ?> €<br />
              Heures totales passées dans les salons beautyhair : <?php echo $appointmentTotalHoursSpent[0]["SUM(t1.duration)/3600"] . ' ' ?> heures <br /> <br /> <br />
              
               

            </div>
          </div>
        </div>
  
      </div>
    </div>
  </section>


<!-- Include User Footer -->
<?php echo $this->include('templates/espace_user/user_footer_sticky_bottom.php') ;?>
  
</body>

</html>