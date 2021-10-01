
<?= (isset($_SESSION['author']) ? $_SESSION['author'] : '') ?>
<div class="m-5 p-5">
    <div class="w-100 text-center mb-2">
        <a href="#" class="btn btn-secondary" data-target="#adddm" data-toggle="modal">Thêm danh muc</a>
    </div>
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>User id</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $item){ ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['user_id'] ?></td>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['slug'] ?></td>
                        <td><?= $item['created_at'] ?></td>
                        <td>
                            <a href="?c=category&a=edit&id=<?= $item['id'] ?>" class="btn text-info"><i class="fas fa-user-edit"></i></a>
                            <a onclick="return confirm('Chắc chắn muốn xóa?')" href="?c=category&a=destroy&id=<?= $item['id'] ?>" class="btn text-warning"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Userid</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<?php require_once "create.php"; ?>
<?php if(isset($_SESSION['author'])){ unset($_SESSION['author']); } ?>