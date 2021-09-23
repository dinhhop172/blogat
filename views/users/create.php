<h2>Them</h2>
<?php if(isset($_SESSION['error_user_create'])){echo $_SESSION['error_user_create'];} ?>
<div class="col-md-6 offset-md-3">
    <form action="?c=user&a=store" method="POST">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="text" name="password" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="">Role</label>
            <select class="form-control" name="role" id="">
                <option value="">-----Choose role-----</option>
                <option value="admin">Admin</option>
                <option value="editor">Editor</option>
                <option value="writer">Writer</option>
                <option value="user">User</option>
            </select>
        </div>
        <input type="submit" name="user_add" class="btn btn-primary" value="Add">
    </form>
</div>
<?php if(isset($_SESSION['error_user_create'])){ unset($_SESSION['error_user_create']) ;} ?>