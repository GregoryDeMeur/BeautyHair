<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Salon <?php echo $salon[0]['name'];?> - Spécialités</title>
</head>

<body>
  
  <!-- Importation website Header -->
  <?php echo $this->include('templates/salon/header.php');?>

  <!-- Include sorting table scripts -->
  <script src="<?php echo base_url('js/fancyTable.js'); ?>"></script>    

<h1 class="text-center my-3 mt-5">Les prestations sur <?php echo $salon[0]['name'];?></h1>

  <!-- Carte de service -->
  
  <div class="container text-center">
  
  
  <!-- On va afficher chaque spécialité disponible du salon en question -->
  <!-- Affichage liste des utilisateurs -->
  <div class="table-responsive mb-5">
  <table class="table thead-dark" id="specialitiesTable">
  <thead>
    <tr>
      <th scope="col">Spécialité</th> 
      <th scope="col">Description</th>
      <th scope="col">Prix</th>
      <th scope="col">Temps</th>
      
    </tr>
  </thead>
  <tbody>
  <?php foreach($speciality as $row)
  {
    
        
           
           echo'<tr>';
           echo '<td> '. $row->speciality_name .' </td>';
           echo '<td>'.$row->description.'  </td>';
           echo '<td> '. $row->price . '€' . '</td>';
           echo '<td>'.$row->duration.'</td>';
           echo '</tr>';

                        
}
?>
</tbody>
</table>
</div>
    
  </div> <!-- End div container -->

 <!-- Importation salon Footer -->
 <?php echo $this->include('templates/salon/footer.php');?>
 
 <script>
$("#specialitiesTable").fancyTable({
sortColumn:0,// column number for initial sorting
sortOrder:'descending',// 'desc', 'descending', 'asc', 'ascending', -1 (descending) and 1 (ascending)
sortable:true,
pagination:true,// default: false
paginationClass:"btn btn-primary",
paginationClassActive:"active",
searchable:true,
globalSearch:true,
inputPlaceholder:"Rechercher...",
perPage: 5,
});
</script>

</body>
</html>