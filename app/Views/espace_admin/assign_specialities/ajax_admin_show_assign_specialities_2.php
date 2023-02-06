<!-- Page générée avec AJAX -->
<script>
// Ce script permet d'enregistrer ce que l'utilisateur a supprimé comme spécialité via le formulaire
// Cependant, on va le faire en AJAX, il faut donc bloquer le form d'envoi, envoyer la variable au controller,
// puis, faire la requête SQL nécessaire, et réafficher correctement la vue via AJAX.
$("#formDeleteSpeciality").submit(function(e) {
  e.preventDefault();
  var that = $(this);
  // On reprend l'action & method du formulaire en question
  url = that.attr('action');
  type = that.attr('method');
  // Assignation des spécialités sélectionnées par l'utilisateur dans une variable data
   var data = $('#multipleSpecialityToDelete').val();
   idHairdresserToDeleteSpeciality = $('#hairdresserIdForDelete').val();
  


      $.ajax({
        url : url,
        type: type,
        data: {data:data,
              idHairdresserToDeleteSpeciality},
        success: function(data){
          location.reload();       
        }
      });


});
</script>



<h4 class=" text-center">Nom du coiffeur</h4>
<div class="form-group">
<label for="showListSpecialitiesHairdresserAjax">Spécialité du coiffeur <?php echo ' ' . $hairdresser->firstname . ' ' . $hairdresser->lastname . ' ' ?></label>
<form method="post" action="/BeautyHair/AdminAjaxAssignSpecialitiesController/ajax_delete_speciality_to_hairdresser" id="formDeleteSpeciality">
<input id="hairdresserIdForDelete" name="hairdresserIdForDelete" type="hidden" value="<?php echo $hairdresserId[0]?>">
<select multiple="multipleSpecialityToDelete" class="form-control" id="multipleSpecialityToDelete" name="multipleSpecialityToDelete">
<?php
foreach ($speciality_name as $row)
{
  ?>    
      
      <option value="<?php echo $row['ID']?>" id="<?php echo $row['ID']?>"> <?php echo $row['speciality_name'] ?></option>
  <?php
}
?>
</select>
<button type="submit" class="btn btn-danger">Retirer une spécialité</button>
</form>

<br />




