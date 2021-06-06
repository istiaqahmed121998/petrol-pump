<!DOCTYPE html>
<html lang="en">
<?php include_once "head.php"?>
<body class="hold-transition theme-primary bg-gradient-primary">

<div class="container h-p100">
    <div class="row align-items-center justify-content-md-center h-p100">

        <div class="col-12">
            <div class="row justify-content-center no-gutters">
                <div class="col-lg-4 col-md-5 col-12">
                    <div class="content-top-agile p-10">
                        <h3 class="mb-0 text-white">OTP</h3>
                    </div>
                    <?php after_otp()?>
                    <div class="p-30 rounded30 box-shadowed b-2 b-dashed">
                        <form method="post">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <?php display_message();?>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-transparent text-white"><i class="ti-email"></i></span>
                                    </div>
                                    <input type="text" class="form-control pl-15 bg-transparent text-white plc-white" name="otp" placeholder="Your OTP">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-info btn-rounded margin-top-10">Submit</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Vendor JS -->
<script src="js/vendors.min.js"></script>
<script src="../assets/icons/feather-icons/feather.min.js"></script>

</body>
</html>
