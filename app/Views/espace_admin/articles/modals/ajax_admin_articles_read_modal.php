<!-- Affichage Article demandé  -->


<div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-white" id="colorToChangeModal">
          <h5 class="modal-title">Vue sur l'article</h5>
          <button class="close" data-dismiss="modal">
            <span class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body">


<div class="card">
            <h4 class="card-header">Vue sur l'article "<?php echo $articleToRead[0]['title']; ?>"</h4>
            <div class="card-body">
                <h2>Renseignements</h2>
                  <br />
                  <h3>Titre : <?php echo $articleToRead[0]['title'];?></h3>
                  <h3>Message : <?php echo $articleToRead[0]['body_content'];?></h3>
                  <h3>Date de création : <?php echo $articleToRead[0]['time_created'];?></h3>
                  <h3>Créateur : <?php echo $articleToRead[0]['creator_firstname'];?></h3>
              

                            
                      
                  <div class="modal-footer">
                      <div class="container">
                      
                      <div class="row justify-content-center"> 
                      <button class="btn text-white mt-2" data-dismiss="modal" id="colorToChangeModal">Retour</button>       
                      </div>
                      </div>
                      </div>
  
  </div>   
  
  </div>


