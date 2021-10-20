<?= (isset($_SESSION['author']) ? $_SESSION['author'] : '') ?>
<!-- <h1>post day</h1> -->
<div class="m-auto p-5">
    <div class="w-100 text-center mb-2">
        <a href="#" class="btn btn-secondary" data-target="#addpost" data-toggle="modal">Thêm bài viết</a>
    </div>
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Category id</th>
                    <th>User id</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['posts'] as $item){ ?>
                    <tr>
                        <td><?= $item['cat_id'] ?></td>
                        <td><?= $item['user_id'] ?></td>
                        <td><?= $item['title'] ?></td>
                        <td><img src="/assets/uploads/<?= $item['img'] ?>" class="img_td" alt="<?= $item['slug'] ?>"></td>
                        <td><?= $item['slug'] ?></td>
                        <td><?= $item['status'] ?></td>
                        <td><?= $item['created_at'] ?></td>
                        <td>
                            <a href="?c=post&a=edit&id=<?= $item['id'] ?>" class="btn text-info"><i class="fas fa-user-edit"></i></a>
                            <a onclick="return confirm('Sẽ xóa các bài viết liên quan, Chắc chắn muốn xóa?')" href="?c=post&a=destroy&id=<?= $item['id'] ?>" class="btn text-warning"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Category id</th>
                    <th>User id</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<?php require_once "create.php"; ?>
<?php if(isset($_SESSION['author'])){ unset($_SESSION['author']); } ?>