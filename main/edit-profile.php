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
								User Info
							</h4>
						</div>
						<div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="box box-widget widget-user">
                                        <!-- Add the bg color to the header using any of the bg-* classes -->
                                        <div class="widget-user-header bg-black" style="background: url('../images/avatar.jpg') center center;">
                                            <h3 class="widget-user-username" id="username"></h3>
                                            <h6 class="widget-user-desc">Admin</h6>
                                        </div>
                                        <div class="widget-user-image">
                                            <img class="rounded-circle" src="../images/user3-128x128.jpg" id="avatar" width="128px" height="128px" alt="User Avatar">
                                        </div>
                                        <div class="box-footer">
                                            <div class="row">
                                                <div class="box-body box-profile">

                                                    <div class="row"></div>
                                                    <div></div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div>
                                                                <p>Email :<span class="text-gray pl-10" id="emailtext"></span> </p>
                                                                <p>Phone :<span class="text-gray pl-10" id="phonetext"></span></p>
                                                                <p>Address :<span class="text-gray pl-10" id="addresstext"></span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="box p-15">
                                        <form class="form-horizontal form-element col-12">
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 control-label">Name</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="inputEmail" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 control-label">Address</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputAddress" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPhone" class="col-sm-2 control-label">Phone</label>

                                                <div class="col-sm-10">
                                                    <input type="tel" class="form-control" id="inputPhone" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputExperience" class="col-sm-2 control-label">Password</label>

                                                <div class="col-sm-10">
                                                    <input class="form-control" type="password" id="inputPassword" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="ml-auto col-sm-10">
                                                    <button type="submit" id="submit" class="btn btn-rounded btn-success">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
						</div>
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
<script src="js/edit-profile.js"></script>


</body>
</html>
