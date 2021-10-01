<div class="col-md-10 offset-md-1 p-5" id="app_update">
  <?php if(isset($_SESSION['err_update_post'] )){ ?>
  <?= $_SESSION['err_update_post']  ?>
  <?php } ?>
  <div class="card text-white bg-secondary">
    <div class="card-body">
      <div class="err_update_post"></div>
        <form action="?c=post&a=update&id=<?= $data['post']['id'] ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">Categories</label>
              <select class="form-control" name="cat_id" id="" required>
                <option value="">-- Chọn danh mục --</option>
                <?php if(isset($data['cate'])){ 
                  foreach($data['cate'] as $cate){    
                ?>
                <option <?= ($cate['id']  == $data['post']['cat_id']) ? 'selected' : '' ?> value="<?= $cate['id'] ?>"><?= $cate['name'] ?></option>
                <?php } } ?>
              </select>
            </div>

            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" value="<?= $data['post']['title'] ?>" required class="form-control" placeholder="" aria-describedby="helpId">
            </div>

            <div class="form-group">
                <label for="">Slug</label>
                <input type="text" name="slug" value="<?= $data['post']['slug'] ?>" required class="form-control" placeholder="" aria-describedby="helpId">
              </div>
            
            <div class="form-group">
              <label for="">Status</label>
              <select class="form-control" name="status" id="" required>
                <option value="">-- Chọn trang thai --</option>
                <option <?= $data['post']['status'] == 'active' ? 'selected' : '' ?> value="active">Active</option>
                <option <?= $data['post']['status'] == 'inactive' ? 'selected' : '' ?> value="inactive">Inactive</option>
              </select>
            </div>

            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="img" id="update_post_img" value="<?= $data['post']['img'] ?>" class="form-control mb-2" placeholder="" aria-describedby="helpId">
                <img id="img_post_update" src="assets/uploads/<?= $data['post']['img'] ?>" alt="" width="400px" class="show_img">
            </div>

            <div class="form-group">
              <label for="">Content</label>
              <textarea class="form-control" name="content" id="mytextarea" required rows="3"><?= $data['post']['content'] ?></textarea>
            </div>


            <div class="form-group">
                <input type="submit" name="updatepost" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
        </form>
    </div>
  </div>
</div>
<?php if(isset($_SESSION['err_update_post'])){ unset($_SESSION['err_update_post']) ;} ?>