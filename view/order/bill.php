<div class="container-fluid invoice-container">

    <div class="row invoice-header">
        <div class="invoice-col">

            <h3>Hóa đơn số #<?php echo $cart->getOrderId() ?></h3>

        </div>
        <div class="invoice-col text-center">

            <div class="invoice-status">
                <span class="unpaid">Đã thanh toán</span>
            </div>

        </div>
    </div>

    <hr>


    <div class="row">
        <div class="invoice-col right">
            <strong>Nhà cung cấp dịch vụ</strong>
            <address class="small-text">
                Công ty CP VOZER<br />
                Số 15 - lô TT04 - khu tập thể Mon City - Hàm Nghi - Mỹ Đình<br />
                ĐT: (098666888 - Fax: (08) 113<br />
                Hotline: 098666888<br />
                Email: number_one@gmail.comm<br />
                <br />
                Đường dây nóng khiếu nại dịch vụ: 0969 666 999
            </address>
        </div>
        <div class="invoice-col">
            <strong>Thông tin khách hàng</strong>
            <<br/>
            <address class="small-text">
                Name: <i><?php echo $user[0]->getUsername() ?></i><br />
                Address: <i><?php echo $user[0]->getAddress() ?></i><br />
                Phone: <i><?php echo $user[0]->getPhone() ?></i><br />
            </address>
        </div>
    </div>

    <div class="row">
        <div class="invoice-col">
            <strong>Ngày tạo hóa đơn</strong><br>
            <span class="small-text">
                <?php echo $cart->getCreateDate() ?><br><br>
            </span>
        </div>
    </div>

    <br />



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
                        <tr>
                            <td><?php echo $cart->getProductId() ?></td>
                            <td width="30%" class="text-center"><?php echo $cart->getOrderAmount() ?></td>
                            <td width="20%" class="text-center"><?php echo $cart->getPrice() ?> VND</td>
                        </tr>
                        <tr>
                            <td class="total-row text-right"><strong>Tổng tiền thanh toán</strong></td>
                            <td class="total-row text-center"><?php echo $cart->getTotalPrice() ?> VND</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<p class="text-center hidden-print"><a href="/just_do_eat">&laquo; Quay lại trang chủ</a></p>