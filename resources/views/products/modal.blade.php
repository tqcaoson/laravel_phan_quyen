<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog container modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form action="#" method="post" id="formId">
        @csrf
        <input name="_method" type="hidden" value="">
        <div class="row">
            <div class="col-xs-6 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name (<span>*</span>):</strong>
                    <input class="form-control" type="text" value=""  name="name" id="name">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail (<span>*</span>):</strong>
                    <textarea class="form-control" type="text" value=""  name="detail" id="detail"></textarea>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-12 col-md-12 mt-3 text-center">
              <button id="submit" type="submit" class="btn btn-primary">Add</button>
          </div>
    </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>





