<div class="container-fluid">
    <div class="d-flex justify-content-center h-100 mt-1 login">
        <div class="card col-6">

            <div class="card-header">
                <h3>&nbsp;&nbsp;&nbsp;&nbsp;Thông tin đối tượng</h3>
                <div class="d-flex justify-content-end social_icon">
                    <span><a href="/just_do_eat/"><i class="fa fa-home"></i></a></span>
                </div>
            </div>

            <div class="card-body">
            <div class="row">

                <div class="col-4">
                    <div class="form-group ml-3 text-center">
                        <div class="input-group-prepend">
                            <img src="../../images/<?php echo $userById->getAvatar() ?>" style="width:700px;height:200px" class="card-img-top"
                                alt="<?php echo $userById->getUsername() ?>">
                        </div>
                        <div class="p-3 mb-2 bg-dark text-white"><?php echo $userById->getPosition() ?></div>
                    </div>
                    </div><div class="col-8">
                    <div class="input-group form-group ml-3 float-left">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-user icon"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="<?php echo $userById->getUsername() ?>" disabled>

                    </div>

                    <div class="input-group form-group ml-3 float-left">
                        <div class="input-group-prepend">
                            <span class="input-group-text ">
                                <i class="fas fa-envelope icon"></i>
                            </span>
                        </div>
                        <input class="form-control" placeholder="<?php echo $userById->getEmail() ?>" disabled>
                    </div>

                    <div class="input-group form-group ml-3 float-left">
                        <div class="input-group-prepend">
                            <span class="input-group-text ">
                                <i class="fas fa-home icon"></i>
                            </span>
                        </div>
                        <input class="form-control" placeholder="<?php echo $userById->getAddress() ?>" disabled>
                    </div>

                    <div class="input-group form-group ml-3 float-left">
                        <div class="input-group-prepend">
                            <span class="input-group-text ">
                                <i class="fas fa-phone icon"></i>
                            </span>
                        </div>
                        <input class="form-control" placeholder="<?php echo $userById->getPhone() ?>" disabled>
                    </div>
                    </div>
                    </div>
            </div>

        </div>
    </div>
</div>