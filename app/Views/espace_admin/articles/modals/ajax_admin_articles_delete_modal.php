<!-- DELETE Article Modal -->

          
<div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-white" id="colorToChangeModal">
          <h5 class="modal-title">Supprimer un article</h5>
          <button class="close" data-dismiss="modal">
            <span class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body">


            <div class="card">
            <h4 class="card-header">Suppression de l'article "<?php echo $articleToDelete[0]['title'];?>"</h4>
            <div class="card-body">
                <h2>Renseignements</h2>


                            
                      <!-- Affichage de l'article à delete  -->
              
                      <?php echo 'ID : '. $articleToDelete[0]['ID'] . '<br />';
                            echo 'Titre : '. $articleToDelete[0]['title'] . '<br />';
                            echo 'Body : '. $articleToDelete[0]['body_content'] . '<br />';
                            echo 'Créé le : '. $articleToDelete[0]['time_created'] . '<br />';    
                            echo 'Créé par : '. $articleToDelete[0]['creator_firstname'] . '<br />';          
                            ; ?>
                          
                      
                      

                <div class="modal-footer">
                <div class="container">
                <div class="row justify-content-center">
                      
                <a href="/BeautyHair/AdminArticleController/deleteArticle/<?php echo $articleToDelete[0]['ID']?>">
                <button type="button" class="btn btn-danger">
                <i class="fas fa-trash-alt m-1"></i>
                Supprimer l'article
                </button>
                </a>    
                <button id="colorToChangeModal" class="btn text-white ml-4" data-dismiss="modal">Retour sans suppression</button>
                </div>
                   
            </div>
            </div>
                </div>
                </div>
                </div>


         
          
                     

                      