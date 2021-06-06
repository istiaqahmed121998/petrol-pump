<!DOCTYPE html>
<html lang="en">
<?php include_once "head.php"?>
<body class="hold-transition theme-primary bg-gradient-primary">
<?php if(logged_in()){
    redirect("index.php");
}
?>
<div class="container h-p100">
    <div class="row align-items-center justify-content-md-center h-p100">

        <div class="col-12">
            <div class="row justify-content-center no-gutters">
                <div class="col-lg-4 col-md-5 col-12">
                    <div class="content-top-agile p-10">
                        <?php user_login();?>
                        <?php display_message();?>
                        <h2 class="text-white">Get started with Us</h2>
                        <p class="text-white-50">Sign in to start your session</p>
                    </div>
                    <div class="p-30 rounded30 box-shadowed b-2 b-dashed">
                        <form method="post" role="form">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-transparent text-white"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control pl-15 bg-transparent text-white plc-white" name="email" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text  bg-transparent text-white"><i class="ti-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control pl-15 bg-transparent text-white plc-white" name="password" placeholder="Password" required>
                                    <input type="hidden" id="token" name="token">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="checkbox text-white">
                                        <input type="checkbox" id="basic_checkbox_1" name="remember">
                                        <label for="basic_checkbox_1">Remember Me</label>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-6">
                                    <div class="fog-pwd text-right">
                                        <a href="javascript:void(0)" class="text-white hover-info"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-info btn-rounded mt-10">SIGN IN</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>



                        <div class="text-center">
                            <p class="mt-15 mb-0 text-white">Don't have an account? <a href="auth_register.html" class="text-info ml-5">Sign Up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Vendor JS -->
<script src="js/vendors.min.js"></script>
<script src="../assets/icons/feather-icons/feather.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js?render=6Lfn-skUAAAAAEyISWny2a-rmM7sm25z4nP-ZTP2"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('6Lfn-skUAAAAAEyISWny2a-rmM7sm25z4nP-ZTP2', {action: 'login'}).then(function(token) {
            //console.log(token);
            document.getElementById("token").value = token;
        });
    });
</script>
</body>
</html>
