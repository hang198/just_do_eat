<?php
session_start();
if ($_SESSION['position'] !== 'admin') {
    header("location: ../../index.php ");
}
?>
<div class="row col-10 ml-2 float-left text-light" style="background: rgb(0,0,0,0.5)">
    <table class="table table-striped text-light">
        <tr>
            <th class="mt-3">#</th>
            <th class="mt-3">Tên tài khoản</th>
            <th class="mt-3">Email</th>
            <th class="mt-3">Địa chỉ</th>
            <th class="mt-3">Số điện thoại</th>
            <th class="mt-3">Avatar</th>
            <th></th>
        </tr>
        <?php foreach ($users as $key => $user): ?>
            <tr>
                <td><?php echo ++$key; ?></td>
                <td><?php echo $user->getUsername(); ?></td>
                <td><?php echo $user->getEmail(); ?></td>
                <td><?php echo $user->getAddress(); ?></td>
                <td><?php echo $user->getPhone() ?></td>
                <td><img src="../../images/<?php echo $user->getAvatar() ?>" style="width: 50px; height: 50px;"></td>
                <td>
                    <a class="btn btn-danger text-light"
                       href="?page=deleteUser&user_id=<?php echo $user->getUserId(); ?>"
                       onclick="return confirm('bạn có chắc chắn muốn xóa user này ?')">
                        Delete
                    </a>
            </tr>
        <?php endforeach; ?>
    </table>
</div>