<?php if(isset($_SESSION['error_user_update'])){echo $_SESSION['error_user_update'];} ?>
<div class="col-md-6 offset-md-3">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit</h4>
            <form action="?controller=user&action=update&id=<?= $data['id'] ?>" method="post">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" value="<?= isset($data['name']) ? $data['name'] : '' ?>" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" value="<?= isset($data['email']) ? $data['email'] : '' ?>" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">Role</label>
                    <select class="form-control" name="role" >
                        <option value="">-----Choose role-----</option>
                        <option <?= (isset($data['role']) && $data['role'] == 'admin' ? 'selected' : '') ?> value="admin">Admin</option>
                        <option <?= (isset($data['role']) && $data['role'] == 'editor' ? 'selected' : '') ?> value="editor">Editor</option>
                        <option <?= (isset($data['role']) && $data['role'] == 'writer' ? 'selected' : '') ?> value="writer">Writer</option>
                        <option <?= (isset($data['role']) && $data['role'] == 'user' ? 'selected' : '') ?> value="user">User</option>
                    </select>
                </div>
                <input type="submit" name="update_user" class="btn float-right" value="Update">
            </form>
        </div>
    </div>
</div>
<?php if(isset($_SESSION['error_user_update'])){ unset($_SESSION['error_user_update']) ;} ?>