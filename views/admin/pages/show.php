<div class="m-5 p-5">
    <div class="w-100 text-center mb-2">
        <a href="#" class="btn btn-secondary" data-target="#addmm" data-toggle="modal">Thêm thành viên</a>
    </div>
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Created at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $item){ ?>
            <tr>
                <td><?= $item['name'] ?></td>
                <td><?= $item['email'] ?></td>
                <td><?= $item['role'] ?></td>
                <td><?= $item['created_at'] ?></td>
                <td>
                    <a href="?c=admin&a=edit&id=<?= $item['id'] ?>" class="btn text-info"><i class="fas fa-user-edit"></i></a>
                    <a onclick="return confirm('Chắc chắn muốn xóa?')" href="?c=admin&a=destroy&id=<?= $item['id'] ?>" class="btn text-warning"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Created-at</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>
</div>

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
