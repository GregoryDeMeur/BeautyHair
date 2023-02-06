<!DOCTYPE html>
<html lang="fr">

	<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Voir les articles disponibles</title>
  <!--Include User NavBar -->
  <?php echo $this->include('templates/espace_admin/admin_header.php') ;?>
  
  <!--Include CSS de l'espace admin -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/espace_admin.css'); ?>">
  
  <!-- Include AJAX Modal scripts -->
  <script src="<?php echo base_url('js/admin_article_ajax.js'); ?>"></script>   

  <!-- Include sorting table scripts -->
  <script src="<?php echo base_url('js/fancyTable.js'); ?>"></script>    

  </head>

<body>





<!-- Side NavBarDashBoard -->

<?php echo $this->include('templates/espace_admin/admin_sidebar.php');?>

   <!-- MAIN -->
   <div class="col mt-5 ">
        <div class="row justify-content-center">
        <div class="col-10 ">
        
        
        
        
        <div class="card text-center">
            <h4 class="card-header">Liste des articles</h4>
            <div class="card-body">
                <h2>Liste des articles</h2>


                            
                      <!-- Affichage liste des utilisateurs -->
                      <div class="table-responsive">
                      <table class="table thead-secondary" id="articlesTable">
                      <thead>
                        <tr>
                          <th scope="col">Titre</th> 
                          <th scope="col">Créateur</th>
                          <th scope="col">Date de création</th>
                          <th scope="col">Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach($article as $row){
                              echo '<tr>';
                              echo '<td>'. $row['title'] . '</td>';   
                              echo '<td>'. $row['creator_firstname'] . '</td>';     
                              echo '<td>'. $row['time_created'] . '</td>';       
                              echo '<td>'. '<button type="button" class="btn btn-primary" onclick="ajaxPopModalReadArticle('.$row['ID'].')"><i class="fas fa-eye"></i></button>

                                            <button type="button" class="btn btn-success" onclick="ajaxPopModalModifyArticle('.$row['ID'].')"><i class="fas fa-edit"></i></button>

                                            <button onclick="ajaxPopModalDeleteArticle('.$row['ID'].')" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>'
                                  .'</td>'  ;
                              echo '</tr>';
                          }
                          ?>
                        
                      </tbody>
                      </table>
                      </div>

                       


                      <p>
                      
                      <button type="button" class="btn text-white" href="#" data-toggle="modal" data-target="#addArticle" id="colorToChangeModal">      
                      <i class="fas fa-plus mr-1"></i>
                      Ajouter un article
                      </button>     
                      </p>
                      <!-- Fin affichage liste des articles -->
                      <br />
                      <br />

            </div>

        </div>

        <!-- Confirmation success/error lors d'une suppression/ajout d'un article -->
<div class="row justify-content-center">
        
        <!-- Error -->
        <div class="col-12 ">
        <?php if (isset($_SESSION['errorLogArticle'])): ?>  
          <div class="alert alert-danger mt-2 col-12 text-center" role="alert">
        <?php foreach($_SESSION["errorLogArticle"] as $error): ?>
                  <p><?php echo $error ?></p>
        <?php endforeach; ?>
  
        <?php endif; unset($_SESSION['errorLogArticle']);?>
        </div>

        <!-- Success -->
        <div class="col-12 ">
        <?php if (isset($_SESSION['successLogArticle'])): ?>  
          <div class="alert alert-success mt-2 col-12 text-center" role="alert">
        <?php foreach($_SESSION["successLogArticle"] as $success): ?>
                  <p><?php echo $success ?></p>
        <?php endforeach; ?>
  
        <?php endif; unset($_SESSION['successLogArticle']);?>
        </div>   

    </div>

 <!-- Fin de Confirmation success/error lors d'une suppression/ajout d'une assignation-->

    </div><!-- Main Col END -->


    
</div><!-- body-row END -->

 
</div><!-- container -->

</div> <!-- background -->
</h4>
<br />
<br />






 



         



<!-- Include Footer -->
<?php echo $this->include('templates/espace_admin/admin_footer.php') ;?>

<!------------------------------------------------------------------------------------------------------------------>

<!-- Article Add Modal -->
<?php echo $this->include('espace_admin/articles/modals/ajax_admin_articles_add_modal.php');?>
<!-------End Salon Add Modal----------->


<!------------------------------------------------------------------------------------------------------------------>

<!-- Article Delete Modal -->
<div class="modal fade" id="startModalDeleteArticle">      
          <!-- AJAX -->
          <div id="ajaxDeleteArticleModal">

          </div>
          <!-- AJAX -->                             
</div>
<!-------End Delete Article Modal----------->



<!------------------------------------------------------------------------------------------------------------------>




<!-- Article Modify Modal -->
<div class="modal fade" id="startModalModifyArticle">      
          <!-- AJAX -->
          <div id="ajaxModifyArticleModal">

          </div>
          <!-- AJAX -->                             
</div>
<!-------End Modify Article Modal----------->



<!------------------------------------------------------------------------------------------------------------------>




<!-- Article Read Modal -->
<div class="modal fade" id="startModalReadArticle">      
          <!-- AJAX -->
          <div id="ajaxReadArticleModal">

          </div>
          <!-- AJAX -->                             
</div>
<!-------End Read Article Modal----------->



<!------------------------------------------------------------------------------------------------------------------>


<script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

<script> 
  // Remplacement du champs "body" par CKeditor
  CKEDITOR.replace('articleBody');


$("#articlesTable").fancyTable({
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

</div>

</body>
</html>