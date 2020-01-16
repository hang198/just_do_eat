<div class="container-fluid">
    <div class="d-flex justify-content-center h-100 mt-1 login">
        <div class="card col-5">
            <div class="card-header">
                <h3>&nbsp;&nbsp;&nbsp;&nbsp;Đổi thông tin</h3>
                <div class="d-flex justify-content-end social_icon">
                    <span><a href="/just_do_eat/"><i class="fa fa-home"></i></a></span>
                    <span><a href="https://facebook.com"><i class="fab fa-facebook-square"></i></a></span>
                    <span><a href="https://google.com"><i class="fab fa-google-plus-square"></i></a></span>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group ml-3 text-center">
                            <div class="input-group-prepend">
                                <img src="../../images/<?php echo $userById->getAvatar() ?>" onClick="triggerClick()" id="Display"
                                style="width:700px;height:200px" class="card-img-top"
                                    alt="<?php echo $userById->getUsername() ?>">
                            </div>
                            <input type="submit" value="Cập nhật" class="btn bg-warning mt-3 bg">
                        </div>
                    </div>
                    <div class="col-8">

                        <div class="input-group form-group ml-3 float-left">
                            <div class="input-group-prepend">
                                <span class="input-group-text ">
                                    <i class="fas fa-envelope icon"></i>
                                </span>
                            </div>
                            <input type="email" class="form-control" name="email"
                                value="<?php echo $userById->getEmail() ?>">
                        </div>
                        <div class="input-group form-group ml-3 float-left">
                            <div class="input-group-prepend">
                                <span class="input-group-text ">
                                    <i class="fas fa-home icon"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" name="address"
                                value="<?php echo $userById->getAddress() ?>">
                        </div>
                        <div class="input-group form-group ml-3 float-left">
                            <div class="input-group-prepend">
                                <span class="input-group-text ">
                                    <i class="fa fa-cloud-upload icon"></i>
                                </span>
                            </div>
                            <input type="file" class="form-control" onChange="displayImage(this)" id="idImage"
                                name="avatar">
                        </div>
                        <div class="input-group form-group ml-3 float-left">
                            <div class="input-group-prepend">
                                <span class="input-group-text ">
                                    <i class="fas fa-phone icon"></i>
                                </span>
                            </div>
                            <input type="number" class="form-control" name="phone"
                                value="<?php echo $userById->getPhone() ?>">
                        </div>

                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function triggerClick(e) {
    document.querySelector('#idImage').click();
}

function displayImage(e) {
    if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.querySelector('#Display').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}
</script>