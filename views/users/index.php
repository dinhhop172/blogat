<h1>Lists users</h1>
<a href="?c=user&a=create">Them</a>
<table class="table table-dark">
    <theader>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </theader>
    <tbody>
    <?php foreach($data as $value){ ?>
        <tr>
            <td><?= $value['id'] ?></td>
            <td><?= $value['name'] ?></td>
            <td><?= $value['email'] ?></td>
            <td><?= $value['role'] ?></td>
            <td>
                <a  href="?c=user&a=edit&id=<?= $value['id'] ?>">Edit</a> | 
                <a onclick="return confirm('Chắc chắn muốn xóa?')" href="?c=user&a=destroy&id=<?= $value['id'] ?>">Delete</a>
            </td>
        </tr>
            <?php } ?>
    </tbody>
</table>


