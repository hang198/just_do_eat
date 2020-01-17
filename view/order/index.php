<?php

session_start();

include_once "../../model/database/DBConnect.php";
include_once "../../model/Order/Order.php";
include_once "../../model/Order/OrderDB.php";
include_once "../../controller/OrderController.php";
// include_once "../../model/Product/Product.php";
// include_once "../../model/Product/ProductDB.php";
// include_once "../../controller/ProductController.php";
include_once "../../model/User/User.php";
include_once "../../model/User/UserDB.php";
include_once "../../controller/UserController.php";

// $productController = new ProductController();
// $userController = new UserController();
$orderController = new OrderController();
$page = isset($_GET['page']) ? $_GET['page'] : null;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hóa đơn số #62308</title>

    <link href="https://my.azdigi.com//templates/six/css/all.min.css" rel="stylesheet">
    <link href="https://my.azdigi.com//templates/six/css/invoice.css" rel="stylesheet">

</head>

<body>
    <?php
switch ($page){
      case "addCart":
            $orderController->addCart();
      break;
      case "bill":
            $orderController->bill();
      break;
    default:
        $orderController->index();
        break;
}
?>

</body>

</html>