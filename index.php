<!DOCTYPE html>
<html>
<?php include('header.php'); ?>

<body>
    <?php if (!isset($_SESSION['user_id'])) { ?>
        <form id="login_form" action="" method="post" enctype="multipart/form-data">
            <div class="container login_page">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12">
                            <div class="row justify-content-md-center">
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6 ">
                                    <div class="form-group ">
                                        <p class="head-text"><b>LOGIN</b></p>
                                        <label for="lusername">User Name&nbsp;<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="lusername" id="lusername" placeholder="Enter Email ID" autocomplete="off">
                                        <label for="lpassword">Password&nbsp;<span class="text-danger">*</span></label>
                                        <input class="form-control" type="password" name="lpassword" id="lpassword" placeholder="Enter Password" autocomplete="off">
                                        <input type="submit" id="user_login" class="btn btn-outline-dark" value="Login">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <label for="register" class="reg">Not a Member? <label id="register">Register Here</label></label>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form id="register_form" action="" method="post" enctype="multipart/form-data">
            <div class="container register_page" style="display: none;">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12">
                            <div class="row justify-content-md-center">
                                <p class="head-text"><b>Register</b></p>
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6 ">
                                    <div class="form-group">
                                        <label for="name">Name&nbsp;<span class="text-danger">*</span></label>
                                        <input class="form-control mb-3" type="text" name="name" id="name" placeholder="Enter Name" autocomplete="off" required>

                                        <label for="password">Password&nbsp;<span class="text-danger">*</span></label>
                                        <input class="form-control mb-3" type="password" name="password" id="password" placeholder="Enter Password" required>

                                        <label for="mobile">Mobile&nbsp;<span class="text-danger">*</span></label>
                                        <input class="form-control mb-3" type="tel" name="mobile" id="mobile" placeholder="Enter Mobile" autocomplete="off" required>

                                        <label for="email">Email&nbsp;<span class="text-danger">*</span></label>
                                        <input class="form-control mb-3" type="email" name="email" id="email" placeholder="Enter Email" autocomplete="off" required>

                                        <label for="address">Address&nbsp;<span class="text-danger">*</span></label>
                                        <input class="form-control mb-3" name="address" id="address" placeholder="Enter Address" required></input>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6 ">
                                    <div class="form-group">

                                        <label for="gender">Gender&nbsp;<span class="text-danger">*</span></label>
                                        <select class="form-control mb-3" name="gender" id="gender" required>
                                            <option value="">Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>

                                        <label for="dob">Date of Birth&nbsp;<span class="text-danger">*</span></label>
                                        <input class="form-control mb-3" type="date" name="dob" id="dob" required>

                                        <label for="profile_picture">Profile Picture</label>
                                        <input class="form-control mb-3" type="file" name="profile_picture" id="profile_picture" accept="image/*">

                                        <label for="signature">Signature</label>
                                        <input class="form-control mb-3" type="file" name="signature" id="signature" accept="image/*">

                                        <input type="submit" id="user_register" class="btn btn-outline-dark" value="Register" style="margin-top: 23px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <label for="login">Already a Member? <label id="login">Login Here</label></label>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <link rel="stylesheet" href="src/css/index.css">

    <?php } else {
        include 'home.php';
    } ?>
</body>

<?php include('footer.php'); ?>

</html>