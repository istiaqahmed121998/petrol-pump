<!DOCTYPE html>
<html lang="en">
<?php include_once "head.php"?>

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
                        <div class="box-header with-border">
                            <h4 class="box-title">Capacity of Fuel</h4>
                        </div>
                        <div class="box-body">
                            <form method="post">
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <h4><?php echo "Diesel"?></h4>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input type="number" maxlength="1" id="diesel_stock" name="diesel_stock" class="form-control" required="" data-validation-required-message="This field is required" aria-invalid="false"> <span class="input-group-addon">LTR</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <h4><?php echo "Octane"?></h4>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input type="number" maxlength="1" id="octane_stock" name="octane_stock" class="form-control" required="" data-validation-required-message="This field is required" aria-invalid="false"> <span class="input-group-addon">LTR</span></div>
                                        </div>
                                    </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <h4>Mobil</h4>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input type="number" maxlength="1" id="mobil_stock" name="mobil_stock" class="form-control" required="" data-validation-required-message="This field is required" aria-invalid="false"> <span class="input-group-addon">LTR</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                <button type="submit" id="stock_submit" class="btn btn-rounded btn-info pull-right">Submit</button>
                                </div>
                            </form>
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
	<script src="../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js"></script>
	<script src="../assets/vendor_components/apexcharts-bundle/irregular-data-series.js"></script>
	<script src="../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>

	<!-- Sunny Admin App -->
    <script src="js/clock.js"></script>
	<script src="js/template.js"></script>
	<script src="js/capacity.js"></script>

	
</body>
</html>
