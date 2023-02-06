<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>News</title>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/website_sidebar.css'); ?>">

 
</head>

<body>
  
  <!-- Importation website Header -->
  <?php echo $this->include('templates/website/header.php');?>

  
 
 <div class="container-fluid mt-4">
 
  <div class="row my-3 mx-3">
  <div id="sidebar" class="col-lg-4 col-xl-4 col-md-4 col-xs-12 col-sm-12" >
  
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    
      
    <div class="row mt-3">
    <div class="card col-12 bg-dark text-white" style="border:1px solid black;">
    <div class="card-header col-12 text-center align-middle pb-3">
    <h2 class="mt-2">NEWS</h2>
    </div>
    </div>
    </div>
    <div class="mb-3">
    </div>
    
  <?php foreach($article as $row)
                {?>
                
                <a class="nav-link mx-2 my-1" style="border:1px solid black;"  id="<?php echo 'v-pills-'.$row['ID'] . '-tab' ;?>" data-toggle="pill" href="#v-pills-<?php echo 'article'.$row['ID'] ;?> " role="tab" aria-controls="v-pills<?php echo 'article'.$row['ID'] ;?>" aria-selected="false">> <?php echo $row['title']; ?></a>
                
          <?php }?>
          
    
  </div>
  </div>
  
  
  <div class="col-lg-8 col-xl-8 col-md-8 col-sm-12 col-xs-12">                
    <div class="tab-content" id="v-pills-tabContent">         
    <?php foreach($article as $row)
                {?>
                <div class="tab-pane fade mt-3 " id="v-pills-<?php echo 'article'.$row['ID'] ;?>" role="tabpanel" aria-labelledby="v-pills-<?php echo 'article'.$row['ID'] . '-tab';?>">
                <div class="col-lg-12 col-md-12 col-12 col-xs-12 col-sm-12  mb-4 pb-2 mx-auto text-center" id="article<?php echo $row['ID'] ; ?>">
              <div class="card  w-100 text-center" style="border:solid 1px black">
              <div class="card-header bg-dark  text-center text-white">
              <h2><?php echo $row['title']; ?></h2>
              </div>
              <div class="card-body bg-light  text-center">
              <?php echo $row['body_content']; ?>
              </div>

              <div class="card-footer text-center" style="border-top:solid 1px black">
              <?php echo 'Posté le ' . $row['time_created'] . ' par ' . $row['creator_firstname']; ?>
              
              </div>
              </div>
              </div>
                
                </div>
                
               
          <?php }?>        

          </div>

   </div>


</div>




                
             



  
<!-- Importation website Footer -->
<?php echo $this->include('templates/website/footer.php');?>
</body>

</html>