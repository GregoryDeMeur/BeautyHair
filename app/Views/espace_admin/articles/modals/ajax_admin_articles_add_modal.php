            <!-- ADD Article Modal -->
            <div class="modal fade" id="addArticle">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-white" id="colorToChangeModal">
          <h5 class="modal-title">Ajouter un article</h5>
          <button class="close" data-dismiss="modal">
            <span class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="/BeautyHair/AdminArticleController/addArticle">
            <div class="form-group">
              <label for="title">Titre</label>
              <input type="text" class="form-control" name="articleTitle">
            </div>
           
            
            <div class="form-group">
              <label for="body">Body</label>
              <textarea name="articleBody" class="form-control"></textarea>
            </div>

            <div class="modal-footer">
                      <div class="container">
                      <div class="row justify-content-center">
                            
                <button type="submit" class="btn text-white mr-3" id="colorToChangeModal">Poster cet article</button>
                </form>
                <button class="btn btn-danger text-white ml-4" data-dismiss="modal">Annuler</button>
                </div>
                      </div>
                      </div>
        
      </div>
    </div>
  </div>
  </div>

        <!-------End ADD Article Modal----------->