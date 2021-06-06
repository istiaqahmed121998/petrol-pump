<!DOCTYPE html>
<html lang="en">
<?php include_once "head.php"?>
<?php if(!logged_in()){
    redirect("login.php");
}?>
<body class="hold-transition light-skin sidebar-mini theme-primary fixed">

<div class="wrapper">

    <?php include "header.php"?>

    <!-- Left side column. contains the logo and sidebar -->
    <?php include_once "sidebar.php"?>
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header">
                                <h4 class="box-title align-items-start flex-column">
                                    Manager Info
                                </h4>

                            </div>
                            <div class="box-body">
                                <form id="data" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <h5>File Input Field <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="file" class="form-control" id="import_file" required=""> <div class="help-block"></div></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>IMPORT SQL File <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="submit" class="btn btn-success mb-5" name="backup_submit" id="backup_submit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
                        </div>
                    </div>
            </section>
        </div>
    </div>
    <?php include_once "footer.php"?>


    <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->


<!-- Vendor JS -->
<script src="js/vendors.min.js"></script>
<script src="../assets/icons/feather-icons/feather.min.js"></script>

<!-- Sunny Admin App -->
<script src="js/template.js"></script>
<script src="js/clock.js"></script>
<script src="js/backup.js"></script>


</body>
</html>
