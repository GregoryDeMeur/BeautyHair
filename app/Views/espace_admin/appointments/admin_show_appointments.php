<!DOCTYPE html>
<html lang="fr">

	<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Consultez les rendez-vous</title>
  <!--Include User NavBar -->
  <?php echo $this->include('templates/espace_admin/admin_header.php') ;?>
  
  <!--Include CSS de l'espace admin -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/espace_admin.css'); ?>">
  
  <!-- Include AJAX appointments scripts -->
  <script src="<?php echo base_url('js/admin_appointment_ajax.js'); ?>"></script>    

  <!-- Include FullCalendar -->
    <link href=<?php echo base_url('js/fullcalendar/core/main.css')?> rel='stylesheet' />
    <link href=<?php echo base_url('js/fullcalendar/daygrid/main.css')?> rel='stylesheet' />
    <link href=<?php echo base_url('js/fullcalendar/timegrid/main.css')?> rel='stylesheet' />
    <link href=<?php echo base_url('js/fullcalendar/list/main.css')?> rel='stylesheet' />


    <script src="<?php echo base_url('js/fullcalendar/core/main.js')?>"></script>
    <script src="<?php echo base_url('js/fullcalendar/interaction/main.js')?>"></script>
    <script src="<?php echo base_url('js/fullcalendar/daygrid/main.js')?>"></script>
    <script src="<?php echo base_url('js/fullcalendar/timegrid/main.js')?>"></script>
    <script src="<?php echo base_url('js/fullcalendar/list/main.js')?>"></script>
    
    

    
  </head>

<body>


<!-- Side NavBarDashBoard -->

<?php echo $this->include('templates/espace_admin/admin_sidebar.php');?>



   <!-- MAIN -->
   <div class="col mt-5 ">
        <div class="row justify-content-center">
        <div class="col-10 ">
        
      
        <div class="card">
            <h4 class="card-header">Liste des rendez-vous</h4>
            <div class="card-body">
               


                <!-- SELECT SALON -->

                <div class="form-group row">
                <label for="appointmentHairdresser" class="col-2 col-form-label">Choisissez un salon</label>
                <div class="col-10">
                      <select onchange="displayCalendarWhenChoosingASalon(this.value)" class="form-group custom-select mt-2" name="appointmentHairdresser" id="appointmentHairdresser" placeholder="Choisissez un salon">
                                                      <option selected value="">Choisissez un salon</option>        
                                    <?php foreach($salon as $rowSalon)     
                                            {  
                                                    
                                                echo '<option value="' .  $rowSalon["ID"] .'"> ' . $rowSalon["name"]. '</option>';                    
                                            }
                                    ?>
                      </select>
                </div>
                </div>

                <!-- END SELECT -->

                
                <!-- Pop Calendar dès qu'un salon est choisi -->                              
                <div id="calendarScheduleSalonAjax">

                </div>

                


                     
                    
                      <br />
                      <br />

            </div>

        </div>

     

    </div><!-- Main Col END -->


    
</div><!-- body-row END -->

 
</div><!-- container -->

</div> <!-- background -->
</h4>
<br />
<br />






 



         



<!-- Include Footer -->
<?php echo $this->include('templates/espace_admin/admin_footer.php') ;?>




                   

</div>

</body>
</html>