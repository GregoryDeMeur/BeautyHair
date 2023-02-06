<!------- READ Speciality Modal----------->
<div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-white" id="colorToChangeModal">
          <h5 class="modal-title">Voir une spécialité</h5>
          <button class="close" data-dismiss="modal">
            <span class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body">

<!-- Affichage spécialité demandée  -->
            <div class="card">
            <h4 class="card-header">Vue sur la spécialité</h4>
            <div class="card-body">
                <h2>Renseignements</h2>
                  <br />
                  <h3>Nom de la spécialité : <?php echo $speciality[0]['speciality_name'];?></h3>
                  <h3>Description : <?php echo $speciality[0]['description'];?></h3>
                  <h3>Price : <?php echo $speciality[0]['price'];?></h3>
                  <h3>Duration <?php echo $speciality[0]['duration'];?></h3>
                  <br />
                  

                            
                      
                     


                      
                      
                      <br />
                      <br />

            </div>
  
        </div>
        
        <div class="modal-footer">
                      <div class="container">
                      
                      <div class="row justify-content-center"> 
                      <button class="btn text-white mt-2" data-dismiss="modal" id="colorToChangeModal">Retour</button>       
                      </div>
                      </div>
                      </div>