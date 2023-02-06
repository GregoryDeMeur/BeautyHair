<!-- Page générée avec AJAX -->
<script>
// Ce script permet d'enregistrer ce que l'utilisateur a ajouté comme spécialité via le formulaire
// Cependant, on va le faire en AJAX, il faut donc bloquer le form d'envoi, envoyer la variable au controller,
// puis, faire la requête SQL nécessaire, et réafficher correctement la vue via AJAX.
$("#formAddSpeciality").submit(function(e) {
  e.preventDefault();
  var that = $(this);
  // On reprend l'action & method du formulaire en question
  url = that.attr('action');
  type = that.attr('method');
  // Assignation des spécialités sélectionnées par l'utilisateur dans une variable data
   var data = $('#multipleSpecialityToAdd').val();
   idHairdresser = $('#hairdresserId').val();
  
      $.ajax({
        url : url,
        type: type,
        data: {data:data,
              idHairdresser},
        success: function(data){
          location.reload();
        }
      });


});
</script>

<!-- <div class="form-group">
<label for="showListSpecialitiesRemainingAjax">Spécialité disponibles à attribuer au coiffeur</label> -->

<!-- <form method="post" action="/BeautyHair/AdminAjaxAssignSpecialitiesController/ajax_add_speciality_to_hairdresser" id="formAddSpeciality"> -->
<h4 class=" text-center">Liste des spécialités disponibles</h4>
<form method="post" action="/BeautyHair/AdminAjaxAssignSpecialitiesController/ajax_add_speciality_to_hairdresser" id="formAddSpeciality">
<label for="showListSpecialitiesHairdresserAjax">Liste des spécialités disponibles </label>
<input id="hairdresserId" name="hairdresserId" type="hidden" value="<?php echo $hairdresserId[0]?>">
<select multiple="multipleSpecialityToAdd" class="form-control" id="multipleSpecialityToAdd" name="multipleSpecialityToAdd">
<?php
foreach ($remainingSpecialities as $row)
{
  ?>         
      <option name="specialityId" value="<?php echo $row['ID']?>" id="<?php echo $row['ID']?>"> <?php echo $row['speciality_name'] ?></option>   
  <?php
}
?>

</select>
<button  type="submit" class="btn btn-success my-2">Ajouter une spécialité</button>
</form>
<!-- </div> -->
<br />

