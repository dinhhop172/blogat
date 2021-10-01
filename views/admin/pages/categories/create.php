<!-- Modal add-->
<div class="modal fade" id="adddm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Thêm danh muc</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="err_add_dm"></div>
            <form id="adddm-form" action="javascript:;" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="" required>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="adddm_sub">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>