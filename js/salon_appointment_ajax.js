function displayHairdresserForSelectedSpeciality(idSpeciality, idSalon) {
  $.get(
    "/BeautyHair/SalonAjaxController/ajaxDisplayHairdresserForSelectedSpeciality/" +
      idSpeciality +
      "/" +
      idSalon,
    function(data) {
      $("#appointmentHairdresserAjax").html(data);
    }
  );
}

function displayFormChoosingADate(idSalon) {
  $.get(
    "/BeautyHair/SalonAjaxController/ajaxDisplayFormDateAfterSelectingAHairdresser/" +
      idSalon,
    function(data) {
      $("#appointmentDateAjax").html(data);
    }
  );
}
