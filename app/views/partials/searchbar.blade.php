    <nav class="navbar search-area animated flipInX" role="navigation">
      <div class="container">
        <form>
          <div class="form-group">
            <div class="row" style="padding-top:43px;">
              <div class="col-md-offset-2 col-xs-4 col-sm-5 col-md-3">
                <select class="form-control university">
                  <option value="tum-universiteler">Tüm Üniversiteler</option>
                  <option value="erciyes">Erciyes Üniversitesi</option>
                  <option value="meliksah">Melikşah Üniversitesi</option>
                  <option value="abdullah-gul">Abdullah Gül Üniversitesi</option>
                </select>
              </div>
              <div class="col-xs-4 col-sm-5 col-md-3">
                <div class="input-group">
                  <input type="text" class="form-control university" placeholder="Not Ara...">
                  <span class="input-group-btn">
                    <button class="btn btn-default university" type="button">
                    <span class="glyphicon glyphicon-search"></span></button>
                  </span>
                </div><!-- /input-group -->
              </div> <!-- end col-xs-5 -->
              <div class="col-xs-4 col-sm-2">
                <a href="{{URL::route('posts.create')}}" style="width:100%" class="btn btn-default">Not Ekle</a>
              </div>
              <div class="cols-md-offset-2"></div>
            </div> <!-- end row -->                
          </div> <!-- end form-group -->
        </form>
      </div><!-- /.container -->
    </nav>