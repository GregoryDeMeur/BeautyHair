


                     <!-- <div id="listPhotosOfTheSalon" class="table-responsive"> -->
                      <table class="table thead-dark" style="border:1px solid black">
                      <thead style="border:1px solid black">
                        <tr>
                          <th style="border:1px solid black" class="text-center" scope="col">Photo</th> 
                          <th style="border:1px solid black" class="text-center" scope="col">Action</th>
                          
                        </tr>
                      </thead>
                      <tbody style="border:1px solid black;">
                          <?php
                          foreach ($photo as $row)
                          {
                                     
                             echo '<tr style="border:1px solid black">';
                             echo '<td class="align-middle text-center" style="border:1px solid black">'?><img src="<?php echo base_url() . $row['photo'];?>" width="200px" height="200px"/></td>
                             <?php echo '<td class="align-middle text-center" style="border:1px solid black"> '?>

                             <!-- Ici, lors d'un delete, on va envoyer le chemin d'accès à la photo en question -->
                             <!-- Vu qu'on envoie une URL, pour éviter tout conflit avec CodeIgniter et ses paramètres URI, on encode l'URL et on -->
                             <!-- la décode dans le controller lorsqu'on recevra le paramètre. -->
                             <form method="POST" action="/BeautyHair/UploadPhotoSalonController/deletePhotoSalon/<?php echo $row['ID_salon']. '/';?><?php echo str_replace('=', '-', str_replace('/', '_', base64_encode($row['photo'])));?>" id="deletePhotoSalon">
                             <button type="submit"  class="btn btn-danger"  id="deleteThisPhotoOfThisSalon"><i class="fas fa-trash-alt fa-3x"></i></button>
                             <input type="hidden" name="salonId" value="<?php echo $row['ID']?>">  
                             <input type="hidden" name="photoId" value="<?php echo $row['photo']?>">  
                             </form>
                             </td>
                             
                              
                            <?php
                            echo '</tr>';
                          }
                          ?>
                        </tbody>
                       </table>
                  <!-- </div> -->