 
  <!-- FOOTER tout écran SAUF XS-->
  <br /> <br />  <br /> <br />  <br /> <br />
  <footer id="main-footer" class="bg-dark text-white p-3  d-none d-sm-block fixed-bottom">
    <div class="container">
    
        <p class="lead text-center">
            <strong>
            <br />
            <img src="<?php echo base_url()?>img/logo/BeautyHair_logo_only.png" width="70px" height="50px"/> &nbsp; &nbsp;  Copyright &copy;  <span id="year"></span>    BeautyHair - Gregory De Meur - Projet WEB &nbsp; &nbsp;  <img src="<?php echo base_url()?>img/logo/BeautyHair_logo_only_invert.png" width="70px" height="50px"/>
           </strong>
          </p>
        </div>
     
  </footer>

  <script>
    // Script JQuery permettant de récupérer l'année actuelle
    $('#year').text(new Date().getFullYear());
  </script>