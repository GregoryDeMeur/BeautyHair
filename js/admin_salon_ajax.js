function ajaxPopModalDeleteSalon(idSalon) {
  $.get(
    "/BeautyHair/AdminAjaxSalonController/ajax_admin_salon_delete/" + idSalon,
    function(data) {
      $("#ajaxDeleteSalonModal").html(data);
      $("#startModalDeleteSalon").modal();
    }
  );
}

function ajaxPopModalModifySalon(idSalon) {
  $.get(
    "/BeautyHair/AdminAjaxSalonController/ajax_admin_salon_modify/" + idSalon,
    function(data) {
      $("#ajaxModifySalonModal").html(data);
      $("#startModalModifySalon").modal();
    }
  );
}

function ajaxPopModalReadSalon(idSalon) {
  $.get(
    "/BeautyHair/AdminAjaxSalonController/ajax_admin_salon_read/" + idSalon,
    function(data) {
      $("#ajaxReadSalonModal").html(data);
      $("#startModalReadSalon").modal();
    }
  );
}

function ajaxPopModalAddPhotoSalon(idSalon) {
  $.get(
    "/BeautyHair/AdminAjaxSalonController/ajax_admin_salon_add_photo/" +
      idSalon,
    function(data) {
      $("#ajaxAddPhotoSalonModal").html(data);
      $("#startModalAddPhotoSalon").modal();
    }
  );
}

function ajaxPopModalAddScheduleSalon(idSalon) {
  $.get(
    "/BeautyHair/AdminAjaxSalonController/ajax_admin_salon_add_schedule/" +
      idSalon,
    function(data) {
      $("#ajaxAddScheduleSalonModal").html(data);
      $("#startModalAddScheduleSalon").modal();
    }
  );
}
