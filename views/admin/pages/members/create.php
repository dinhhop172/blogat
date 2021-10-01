<!-- Modal add-->
<div class="modal fade" id="addmm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Thêm thành viên</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="err_add_mm"></div>
        <form id="addtv-form" action="javascript:;" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="" required>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" minlength="5" placeholder="" required>
                </div>
                <div class="form-group">
                    <label for="">Role</label>
                    <select class="form-control" name="role" required>
                    <option value="">--Chon role--</option>
                    <option value="admin">Admin</option>
                    <option value="editor">Editor</option>
                    <option value="writer">Writer</option>
                    <option value="user">User</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="addtv">Save changes</button>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>