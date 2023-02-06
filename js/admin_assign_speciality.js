function displaySpecialitiesOfTheHairdresserForTheSpecifiedId(id) {
  $.get(
    "/BeautyHair/AdminAjaxAssignSpecialitiesController/ajax_admin_display_specialities_with_hairdressers/" +
      id,
    function(data) {
      $("#showListSpecialitiesHairdresser").html(data);
      displayRemainingSpecialities(id);
    }
  );
}

function displayRemainingSpecialities(id) {
  $.get(
    "/BeautyHair/AdminAjaxAssignSpecialitiesController/ajax_admin_display_remaining_specialities/" +
      id,
    function(data) {
      $("#showListSpecialitiesRemaining").html(data);
    }
  );
}
