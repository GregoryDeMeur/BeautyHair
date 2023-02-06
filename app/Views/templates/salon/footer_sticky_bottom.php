
    <!-- Header NavBar website -->
    <footer id="main-footer" class="text-center fixed-bottom  mt-5 ">
        <div class="container ">
        <div class="row mb-2 ">
        <div class="col text-center">

        <strong>
        <span class="mr-5">
        <i class="fas fa-phone"></i>
        <?php echo $salon[0]['telephone'];?>
        </span>

        <span class="mr-5">
        <i class="far fa-envelope"></i>
        <?php echo $salon[0]['email'];?>
        </span>

        <span class="mr-5">
        <i class="fas fa-map-marker-alt"></i>
        <?php echo $salon[0]['address'];?>
        </span>
        </strong>

        </div>
       
        </div>

          <div class="row mb-2" style="border-top:1px solid black;">
            <div class="col">
              <p> <br /> 
                <strong>
                  Copyright &copy;  <span id="year"></span> <?php echo $salon[0]['name'];?>
              </strong>
              </p>
            </div>
          </div>
        </div>
      </footer>

<script>
// Script JQuery permettant de récupérer l'année actuelle
$('#year').text(new Date().getFullYear());
</script> 