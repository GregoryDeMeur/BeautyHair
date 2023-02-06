function ajaxPopModalDeleteArticle(idArticle) {
  $.get(
    "/BeautyHair/AdminAjaxArticleController/ajax_admin_article_delete/" +
      idArticle,
    function(data) {
      $("#ajaxDeleteArticleModal").html(data);
      $("#startModalDeleteArticle").modal();
    }
  );
}

function ajaxPopModalModifyArticle(idArticle) {
  $.get(
    "/BeautyHair/AdminAjaxArticleController/ajax_admin_article_modify/" +
      idArticle,
    function(data) {
      $("#ajaxModifyArticleModal").html(data);
      $("#startModalModifyArticle").modal();
    }
  );
}

function ajaxPopModalReadArticle(idArticle) {
  $.get(
    "/BeautyHair/AdminAjaxArticleController/ajax_admin_article_read/" +
      idArticle,
    function(data) {
      $("#ajaxReadArticleModal").html(data);
      $("#startModalReadArticle").modal();
    }
  );
}
