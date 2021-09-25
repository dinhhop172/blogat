
<div class="col-md-6 offset-md-3 p-5" id="app_update">
  <?php if(isset($_SESSION['err_update_mm'] )){ ?>
  <div class='alert alert-warning alert-dismissible'>
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
    <strong class='text-center'><?= $_SESSION['err_update_mm']  ?></strong>
  </div>
  <?php } ?>
  <form action="?c=admin&a=update&id=<?= $data['id'] ?>" method="post">
      <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" value="<?= $data['name'] ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
      </div>
      <div class="form-group">
        <label for="">Email</label>
        <input type="text" name="email" value="<?= $data['email'] ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
      </div>
      <div class="form-group">
        <label for="">Password</label>
        <input type="text" name="password" value="" id="password" class="form-control" placeholder="" aria-describedby="helpId">
      </div>
      <div class="form-group">
        <label for="">Role</label>
        <select class="form-control" name="role" required>
          <option value="">--Chon role--</option>
          <option <?= (isset($data['role']) && $data['role'] == 'admin' ? 'selected' : '') ?> value="admin">Admin</option>
          <option <?= (isset($data['role']) && $data['role'] == 'editor' ? 'selected' : '') ?> value="editor">Editor</option>
          <option <?= (isset($data['role']) && $data['role'] == 'writer' ? 'selected' : '') ?> value="writer">Writer</option>
          <option <?= (isset($data['role']) && $data['role'] == 'user' ? 'selected' : '') ?> value="user">User</option>
        </select>
      </div>
      <div class="form-group">
        <input type="submit" name="update_mm" id="update_mm" class="form-control" placeholder="" aria-describedby="helpId">
      </div>
  </form>
</div>
<?php if(isset($_SESSION['err_update_mm'])){ unset($_SESSION['err_update_mm']) ;} ?>