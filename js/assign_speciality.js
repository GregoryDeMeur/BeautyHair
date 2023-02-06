function showListSpecialities(id) {
  alert("test numero = " + id);
  var selectedHairdresser = id;
  myAjax(id);

  function myAjax(idSelect) {
    $.get(
      "/BeautyHair/AdminController/admin_display_specialities_with_hairdressers" +
        idSelect,
      function(data) {
        $("hairdresserList").html(data);
      }
    );
  }
}
