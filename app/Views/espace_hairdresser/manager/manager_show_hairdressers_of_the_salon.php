<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Consulter coiffeur de votre salon</title>

  <!-- Include Ajax Modal user -->
  <script src="<?php echo base_url('js/manager_salon.js'); ?>"></script>

   


</head>

<body>
  <!--Include User NavBar -->
  <?php echo $this->include('templates/espace_hairdresser/hairdresser_header.php') ;?>

  <!-- Include sorting table scripts -->
  <script src="<?php echo base_url('js/fancyTable.js'); ?>"></script>  

  <!-- ACTIONS -->
  <section id="actions" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <a href="/BeautyHair/HairdresserController/hairdresser/dashboard" class="btn btn-light btn-block">
            <i class="fas fa-arrow-left mr-1"></i> Retour au dashboard
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- PROFILE -->

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header text-center">
              <h4>Liste de vos coiffeurs</h4>
            </div>
            <div class="card-body">
              
            
           
                <!-- Affichage liste des coiffeurs du salon -->
                <div class="table-responsive">
                      <table class="table thead-dark" id="hairdresserListTable">
                      <thead>
                        <tr>
                          <th scope="col">Nom</th> 
                          <th scope="col">Prénom</th> 
                          <th scope="col">Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach($hairdresser as $row){
                              echo '<tr>';
                              echo '<td>'. $row['lastname'] . '</td>';   
                              echo '<td>'. $row['firstname'] . '</td>';                       
                              echo '<td>'. ' <button onclick="ajaxPopModalDeleteAssignementHairdresserOfTheSalon('.$row["ID_hairdresser"].')" type="button" class="btn btn-danger"  id="deleteUser"><i class="fas fa-trash-alt"></i></button>'
                                  .'</td>'  ;
                              echo '</tr>';
                          }
                          ?>
                        
                      </tbody>
                      </table>
                      </div>
                
            

            </div>
          </div>
        </div>
  
      </div>
    </div>


<br />
<br />


<!-- Delete Hairdresser Modal -->
<div class="modal fade" id="startModalDeleteAssignementHairdresserOfTheSalon">      
          <!-- AJAX -->
          <div id="ajaxDeleteAssignementHairdresserOfTheSalonModal">

          </div>
          <!-- AJAX -->                             
</div>
<!-------End Read User Modal----------->



<script>
$("#hairdresserListTable").fancyTable({
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