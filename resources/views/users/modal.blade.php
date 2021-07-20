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
    <form action="#" method="post" id="formId" class="validate_form">
        @csrf
        <input name="_method" type="hidden" value="">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name (<span>*</span>):</strong>
                    <input class="form-control" type="text" value=""  name="name" id="name" required data-parsley-pattern="[a-zA-Z]+$" data-parsley-trigger="keyup">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email (<span>*</span>):</strong>
                    <input class="form-control" type="email" value=""  name="email" id="email" required data-parsley-type="email" data-parsley-trigger="keyup">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password (<span>*</span>):</strong> 
                    <input class="form-control" type="password" value=""  name="password" id="password" data-parsley-pattern="[a-zA-Z0-9]+$" data-parsley-trigger="keyup">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Confirm Password (<span>*</span>):</strong>
                    <input class="form-control" type="password" value=""  name="confirm_password" id="confirm_password" data-parsley-equalto="#password" data-parsley-trigger="keyup">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Roles (<span>*</span>):</strong>
                    <select multiple="multiple" class="form-control" name="roles[]" id="roles" required>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3 text-center">
              <button id="submit" type="submit" class="btn btn-primary">Add</button>
          </div>
    </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>





