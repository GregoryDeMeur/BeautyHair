function ajaxPopModalDeleteUser(idUser) {
  $.get(
    "/BeautyHair/AdminAjaxUserController/ajax_admin_user_delete/" + idUser,
    function(data) {
      $("#ajaxDeleteUserModal").html(data);
      $("#startModalDeleteUser").modal();
    }
  );
}

function ajaxPopModalModifyUser(idUser) {
  $.get(
    "/BeautyHair/AdminAjaxUserController/ajax_admin_user_modify/" + idUser,
    function(data) {
      $("#ajaxModifyUserModal").html(data);
      $("#startModalModifyUser").modal();
    }
  );
}

function ajaxPopModalReadUser(idUser) {
  $.get(
    "/BeautyHair/AdminAjaxUserController/ajax_admin_user_read/" + idUser,
    function(data) {
      $("#ajaxReadUserModal").html(data);
      $("#startModalReadUser").modal();
    }
  );
}

function ajaxPopModalDisableUser(idUser) {
  $.get(
    "/BeautyHair/AdminAjaxUserController/ajax_admin_user_disable/" + idUser,
    function(data) {
      $("#ajaxDisableUserModal").html(data);
      $("#startModalDisableUser").modal();
    }
  );
}
