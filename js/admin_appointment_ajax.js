function displayCalendarWhenChoosingASalon(idSalon) {
  $.get(
    "/BeautyHair/AdminAjaxAppointmentController/ajax_admin_show_all_appointments_of_a_specified_salon_by_sending_idSalon/" +
      idSalon,
    function(data) {
      $("#calendarScheduleSalonAjax").html(data);
    }
  );
}

function ajaxPopModalDeleteAppointment($idAppointment) {
  $.get(
    "/BeautyHair/AdminAjaxAppointmentController/ajax_admin_delete_a_specified_appointment/" +
      $idAppointment,
    function(data) {
      $("#ajaxDeleteAppointmentModal").html(data);
      $("#startModalDeleteAppointment").modal();
    }
  );
}
