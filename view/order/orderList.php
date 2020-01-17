<section>
    <div class="container">
        <div class="row">
            <table class="table table-striped text-light ">
                <tr>
                    <th>#</th>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Tên khách hàng</th>
                    <th>Trạng thái hàng</th>
                    <th>Ngày đặt hàng</th>
                    <th>Tổng tiền</th>
                    <th></th>
                </tr>
                <?php foreach ($orders as $key => $order) : ?>
                    <tr>
                        <td><?php echo ++$key ?></td>
                        <td><?php echo $order->getProduct() ?></td>
                        <td><?php echo $order->getQuantity() ?></td>
                        <td><?php echo $order->getCustomer() ?></td>
                        <td><?php echo $order->getStatus() ?></td>
                        <td><?php echo $order->getCreateDate() ?></td>
                        <td><?php echo $order->getTotalPrice() ?></td>
                        <td>
                            <a href="?page=deleteOrder&order_id=<?php echo $order->getOderId() ?>" class="btn btn-danger" onclick="return confirm('bạn có chắc chắn muốn xóa đơn hàng này?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
</section>