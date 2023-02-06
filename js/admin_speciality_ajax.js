function ajaxPopModalDeleteSpeciality(idSpeciality) {
  $.get(
    "/BeautyHair/AdminAjaxSpecialityController/ajax_admin_speciality_delete/" +
      idSpeciality,
    function(data) {
      $("#ajaxDeleteSpecialityModal").html(data);
      $("#startModalDeleteSpeciality").modal();
    }
  );
}

function ajaxPopModalModifySpeciality(idSpeciality) {
  $.get(
    "/BeautyHair/AdminAjaxSpecialityController/ajax_admin_speciality_modify/" +
      idSpeciality,
    function(data) {
      $("#ajaxModifySpecialityModal").html(data);
      $("#startModalModifySpeciality").modal();
    }
  );
}

function ajaxPopModalReadSpeciality(idSpeciality) {
  $.get(
    "/BeautyHair/AdminAjaxSpecialityController/ajax_admin_speciality_read/" +
      idSpeciality,
    function(data) {
      $("#ajaxReadSpecialityModal").html(data);
      $("#startModalReadSpeciality").modal();
    }
  );
}
