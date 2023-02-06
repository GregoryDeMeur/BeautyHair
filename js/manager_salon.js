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
    "/BeautyHair/ManagerAjaxController/ajax_manager_delete_a_specified_appointment_of_his_salon/" +
      $idAppointment,
    function(data) {
      $("#ajaxDeleteAppointmentModal").html(data);
      $("#startModalDeleteAppointment").modal();
    }
  );
}

function ajaxPopModalDeleteAssignementHairdresserOfTheSalon($idHairdresser) {
  $.get(
    "/BeautyHair/ManagerAjaxController/ajax_manager_delete_assignement_hairdresser_of_a_salon/" +
      $idHairdresser,
    function(data) {
      $("#ajaxDeleteAssignementHairdresserOfTheSalonModal").html(data);
      $("#startModalDeleteAssignementHairdresserOfTheSalon").modal();
    }
  );
}
