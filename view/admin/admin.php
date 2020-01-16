<?php

include_once "../../controller/ProductController.php";
include_once "../../controller/AdminController.php";
include_once "../../controller/UserController.php";
include_once "../../model/Order/Order.php";
include_once "../../model/Order/OrderDB.php";
include_once "../../model/Customer/Customer.php";
include_once "../../model/Customer/CustomerDB.php";
include_once "../../model/Category/Category.php";
include_once "../../model/Category/CategoryDB.php";
include_once "../../model/User/User.php";
include_once "../../model/User/UserDB.php";
include_once "../../model/Product/Product.php";
include_once "../../model/Product/ProductDB.php";
include_once "../../model/database/DBConnect.php";

$adminController = new AdminController();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body style="background: url('../../images/bg_4.jpg') ">
<?php include_once "navbar.php" ?>
<div class="container mt-4">
    <?php
    include_once "left_menu.php";
    $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : null;
    switch ($page) {

        // product
        case 'deleteProduct':
            $adminController->deleteProduct();
            break;
        case 'addProduct':
            $adminController->addProduct();
            break;
        case 'editProduct':
            $adminController->editProduct();
            break;

        //category
        case 'categoryList':
            $adminController->getListCategory();
            break;
        case 'addCategory':
            $adminController->addCategory();
            break;
        case 'deleteCategory':
            $adminController->deleteCategory();
            break;
        case 'editCategory':
            $adminController->editCategory();
            break;
        default:
            $adminController->getListProduct();
            break;
    }
    ?>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>