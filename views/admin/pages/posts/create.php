
<!-- Modal add-->
<div class="modal fade" id="addpost" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Thêm danh muc</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="err_add_post"></div>
            <form id="addpost-form" action="javascript:;" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Danh muc</label>
                        <select class="form-control" name="category_id" id="" required>
                            <option value="">-- Chọn danh mục --</option>
                            <?php if(isset($data['cates'])){ 
                                foreach($data['cates'] as $cate){    
                            ?>
                            <option value="<?= $cate['id'] ?>"><?= $cate['name'] ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="" required>
                    </div>

                    <div class="form-group">
                        <label>Nhập tags cho bài viết</label><br>
                        <select name="tags[]" style="width: 100%" class="form-control tags_select_choose" multiple="multiple">
                            <option value="">aksldjajskd</option>
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="">Image</label>
                      <input type="file" name="img" id="img" class="form-control mb-2" placeholder="" required>
                      <img src="" alt="" id="showImg" class="show_img">
                    </div>
                                    
                    <div class="form-group">
                      <label for="">Content</label>
                      <textarea class="form-control" name="content" required id="mytextarea" rows="3"></textarea>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="addpost_sub">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>