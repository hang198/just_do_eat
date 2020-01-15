<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">

        <a class="navbar-brand" href="/just_do_eat">Just Do Eat</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <form class="form-inline">
            <input class="form-control mr-sm-2" placeholder="Search" name="keyword">
        </form>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="/just_do_eat" class="nav-link mt-2">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mt-2" href="#" id="dropdown04" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Categories</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="shop.html">Đồ ăn</a>
                        <a class="dropdown-item" href="wishlist.html">Đồ uống</a>
                    </div>
                </li>
                <li class="nav-item"><a href="about.html" class="nav-link mt-2">About</a></li>
                <li class="nav-item cta cta-colored"><a href="cart.html" class="nav-link mt-2"><span
                                class="icon-shopping_cart"></span>[0]</a></li>
                <?php if (!$_SESSION["admin"]) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"><img style="width:40px;height:40px"
                                                                           src="images/person_1.jpg"></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="shop.html">Trang cá nhân</a>
                            <a class="dropdown-item" href="wishlist.html">Đổi thông tin</a>
                            <a class="dropdown-item" href="product-single.html">Đổi mật khẩu</a>
                            <a class="dropdown-item" href="index.php">Thoát</a>
                        </div>
                    </li>
                <?php } else { ?>
                    <li class="nav-item"><a href="register.php" class="nav-link mt-2">Register</a></li>
                    <li class="nav-item"><a href="login.php" class="nav-link mt-2">Login</a></li>
                <?php } ?>
                <a href="index.php?page=add">Add</a>
            </ul>
        </div>
    </div>
</nav>
