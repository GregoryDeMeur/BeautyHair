 
  <!-- FOOTER tout écran-->
  <footer id="main-footer" class="bg-dark text-white  fixed-bottom  mt-5">
    <div class="container">
    
        <p class="lead text-center h6">
            <strong>
            <br />
            <img src="<?php echo base_url()?>img/logo/BeautyHair_logo_only.png" width="60px" height="40px"/> &nbsp; &nbsp;  Copyright &copy;  <span id="year"></span>    BeautyHair - Gregory De Meur - Projet WEB &nbsp; &nbsp;  <img src="<?php echo base_url()?>img/logo/BeautyHair_logo_only_invert.png" width="60px" height="40px"/>
           </strong>
          </p>
        </div>
     
  </footer>

  <script>
    // Script JQuery permettant de récupérer l'année actuelle
    $('#year').text(new Date().getFullYear());
  </script>