function ajaxPopModalDeleteAssignHairdresserToSalon(idHairdresser, idSalon) {
  $.get(
    "/BeautyHair/AdminAjaxAssignHairdresserToSalonController/ajax_admin_assign_hairdresser_to_salon_delete/" +
      idHairdresser +
      "/" +
      idSalon,
    function(data) {
      $("#ajaxDeleteAssignHairdresserToSalonModal").html(data);
      $("#startModalDeleteAssignHairdresserToSalon").modal();
    }
  );
}
