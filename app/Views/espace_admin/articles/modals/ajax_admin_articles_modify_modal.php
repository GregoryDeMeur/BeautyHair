 <!-- MODIFY Article Modal -->
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-white" id="colorToChangeModal">
          <h5 class="modal-title">Modifier article</h5>
          <button class="close" data-dismiss="modal">
            <span class="text-white">&times;</span>
          </button>
        </div>



        <div class="modal-body">
          <form method="POST" action="/BeautyHair/AdminArticleController/modifyArticle">
            <input type="hidden" name="articleId" value="<?php echo $articleToModify[0]['ID']?>">
            <div class="form-group">
              <label for="title">Titre</label>
              <input type="text" class="form-control" name="articleTitle" value="<?php echo $articleToModify[0]['title'];?>">
            </div>
           
            
            <div class="form-group">
              <label for="body">Body</label>
              <textarea name="articleBody" class="form-control" id="articleBody"><?php echo $articleToModify[0]['body_content'];?></textarea>
            </div>




        <div class="modal-footer">
                      <div class="container">
                      <div class="row justify-content-center">
                      
                      
                <button type="submit" class="btn text-white mr-3" id="colorToChangeModal">Modifier l'article</button>
                <button class="btn btn-danger text-white ml-4" data-dismiss="modal">Annuler la modification</button>
                </div>
            </form>
            </div>
                      </div>


                      </div>
                      </div>
                      </div>
                      </div>


<script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

<script> 
  // Remplacement du champs "body" par CKeditor
  CKEDITOR.replace('articleBody');
</script>     