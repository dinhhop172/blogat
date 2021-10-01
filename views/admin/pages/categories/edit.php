
<div class="col-md-6 offset-md-3 p-5" id="app_update">
  <?php if(isset($_SESSION['err_update_cate'] )){ ?>
  <div class='alert alert-warning alert-dismissible'>
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
    <strong class='text-center'><?= $_SESSION['err_update_cate']  ?></strong>
  </div>
  <?php } ?>
  <form action="?c=category&a=update&id=<?= $data['id'] ?>" method="post">
      <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" value="<?= $data['name'] ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
      </div>
      
      <div class="form-group">
        <input type="submit" name="updatecate" class="form-control" placeholder="" aria-describedby="helpId">
      </div>
  </form>
</div>
<?php if(isset($_SESSION['err_update_cate'])){ unset($_SESSION['err_update_cate']) ;} ?>