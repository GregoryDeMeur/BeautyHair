<!-- Affichage salon demandé  -->


<div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-white" id="colorToChangeModal">
          <h5 class="modal-title">Voir le salon</h5>
          <button class="close" data-dismiss="modal">
            <span class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body">


<div class="card">
            <h4 class="card-header">Vue sur le salon "<?php echo $salon[0]['name']?>"</h4>
            <div class="card-body">
                <h2>Renseignements</h2>
                  <br />
                  <h3>Nom du salon : <?php echo $salon[0]['name'];?></h3>
                  <h3>Gérant du salon : <?php echo $salon[0]['ID_owner'];?></h3>
                  <h3>Adresse du salon : <?php echo $salon[0]['address'];?></h3>
                  <br />
                  <h3>Vue sur google</h3>
                  <h3>------------------</h3>
                  <?php echo $salon[0]['google_map']?>

                            
                      
                  <div class="modal-footer mb-2">
                      <div class="container">
                      
                      <div class="row justify-content-center"> 
                      <button class="btn text-white mt-2" data-dismiss="modal" id="colorToChangeModal">Retour</button>       
                      </div>
                      </div>
                      </div>
  
  </div>   
  
  </div>


