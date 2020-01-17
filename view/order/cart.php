<?php
    session_start();
?>

<div class="container-fluid invoice-container">
    <div class="row invoice-header">
        <div class="invoice-col">
            <h3>Hóa đơn số #<?php echo $product->getOrderId() ?></h3>
            <div class="alert alert-info">

                <p>Khi chuyển khoản, quý khách vui lòng ghi <strong><span
                                class="alert-warning">HD<?php echo $product->getOrderId() ?></span></strong>
                    vào nội dung thanh toán để hệ thống kích hoạt tự động ngay khi nhận thanh toán.</p>
            </div>

        </div>
        <div class="invoice-col text-center">

            <div class="invoice-status">
                <span class="unpaid">Chưa thanh toán</span>
            </div>

            <div class="payment-btn-container hidden-print" align="center">
                <p>1.Ngân hàng thương mại cổ phần Kỹ Thương Việt Nam(Techcombank)<br/>
                    Chủ TK: VŨ MINH CƯỜNG<br/>
                    Chi nhánh: Hà Nội<br/>
                    Số tài khoản: 19032810916011<br/>
                    <br/>
                    2. Ngân hàng thương mại cổ phần Việt Nam (Vietcombank)<br/>
                    Chủ TK: CÔNG TY CỔ PHẦN AZDIGI<br/>
                    Chi nhánh: Nam Sài Gòn<br/>
                    Số tài khoản: 0181 0022 24768 <br/>

            </div>

        </div>
    </div>

    <hr>


    <div class="row">
        <div class="invoice-col right">
            <strong>Nhà cung cấp dịch vụ</strong>
            <address class="small-text">
                Công ty CP VOZER<br/>
                Số 15 - lô TT04 - khu tập thể Mon City - Hàm Nghi - Mỹ Đình<br/>
                ĐT: (098666888 - Fax: (08) 113<br/>
            </address>
        </div>
        <div class="invoice-col">
            <strong>Thông tin khách hàng</strong>
            <br/>
            <address class="small-text">
                Name: <i><?php echo $user[0]->getUsername() ?></i><br/>
                Address: <i><?php echo $user[0]->getAddress() ?></i><br/>
                Phone: <i><?php echo $user[0]->getPhone() ?></i><br/>
            </address>
        </div>
    </div>
    <hr>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><strong>Invoice Items</strong></h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <td><strong>Mô tả chi tiết</strong></td>
                        <td class="text-center"><strong>Số lượng</strong></td>
                        <td class="text-center"><strong>Thành tiền</strong></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($arr as $product): ?>
<!--                    --><?php //var_dump($product); ?>
                        <tr>
                            <td><?php echo $product->getProductId() ?></td>
                            <td width="30%" class="total-row text-center"><?php echo $product->getOrderAmount(); ?></td>
                            <td width="20%"
                                class="text-center"><?php echo($product->getOrderAmount() * $product->getPrice()) ?> VND
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td class="total-row text-right"><strong>Tổng tiền thanh toán</strong></td>
                        <td class="total-row text-center"><?php echo $totalPrice ?> VND</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="pull-right btn-group btn-group-sm hidden-print">
        <a href="index.php?page=addCart" class="btn btn-default"><i class="fas fa-download"></i> Thanh toán</a>
    </div>
    <div class="row">
        <div class="invoice-col">
            <strong>Ngày tạo hóa đơn</strong><br>
            <span class="small-text">
                <?php echo $createDate ?><br><br>
            </span>
        </div>
    </div>

</div>

<p class="text-center hidden-print"><a href="/just_do_eat">&laquo; Quay lại trang chủ</a></p>