<!DOCTYPE html>
<html lang="en">
<?php include_once "head.php"?>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">

<?php include "header.php"?>
    <?php if(logged_in()){

    ?>
  
  <!-- Left side column. contains the logo and sidebar -->
<?php include_once "sidebar.php"?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xl-2 col-6">
					<div class="box overflow-hidden pull-up hov-rs">
						<div class="box-body text-center">							
							<div class="icon bg-primary-light rounded w-60 h-60 mx-auto">
								<i class="text-primary mr-0 font-size-24 mdi mdi-bus"></i>
							</div>
							<div>
								<p class="text-mute mt-20 mb-0 font-size-16">Yesterday Diesel Sell</p>
								<h3 class="text-dark mb-0 font-weight-500" id="yes_diesel_sell"></h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-2 col-6">
					<div class="box overflow-hidden pull-up hov-rs">
						<div class="box-body text-center">							
							<div class="icon bg-warning-light rounded w-60 h-60 mx-auto">
								<i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
							</div>
							<div>
								<p class="text-mute mt-20 mb-0 font-size-16">Yesterday Octane Sell</p>
								<h3 class="text-dark mb-0 font-weight-500" id="yes_octane_sell"></h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-2 col-6">
					<div class="box overflow-hidden pull-up hov-rs">
						<div class="box-body text-center">							
							<div class="icon bg-info-light rounded w-60 h-60 mx-auto">
								<i class="text-info mr-0 font-size-24 mdi mdi-motorbike"></i>
							</div>
							<div>
								<p class="text-mute mt-20 mb-0 font-size-16">Yesterday Mobil Sell</p>
								<h3 class="text-dark mb-0 font-weight-500" id="yes_mobil_sell"></h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-2 col-6">
					<div class="box overflow-hidden pull-up hov-rs">
						<div class="box-body text-center">							
							<div class="icon bg-primary-light rounded w-60 h-60 mx-auto">
								<i class="text-primary mr-0 font-size-24 mdi mdi-bus"></i>
							</div>
							<div>
								<p class="text-mute mt-20 mb-0 font-size-16">Today Diesel Stock</p>
								<h3 class="text-dark mb-0 font-weight-500" id="today_diesel_sell"></h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-2 col-6">
					<div class="box overflow-hidden pull-up hov-rs">
						<div class="box-body text-center">							
							<div class="icon bg-warning-light rounded w-60 h-60 mx-auto">
								<i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
							</div>
							<div>
								<p class="text-mute mt-20 mb-0 font-size-16">Today Octane Stock</p>
								<h3 class="text-dark mb-0 font-weight-500" id="today_octane_sell"></h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-2 col-6">
					<div class="box overflow-hidden pull-up hov-rs">
						<div class="box-body text-center">							
							<div class="icon bg-info-light rounded w-60 h-60 mx-auto">
								<i class="text-info mr-0 font-size-24 mdi mdi-motorbike"></i>
							</div>
							<div>
								<p class="text-mute mt-20 mb-0 font-size-16">Today Mobil Stock</p>
								<h3 class="text-dark mb-0 font-weight-500" id="today_mobil_sell"></h3>
							</div>
						</div>
					</div>
				</div
                <div class="col-xxxl-12 col-xl-12 col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Fuel Monthly Graph</h4>
                        </div>
                        <div class="box-body">
                            <div id="recent_trend"></div>
                        </div>
                    </div>
                </div>

			</div>
		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->
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
	<script src="js/clock.js"></script>

	<!-- Sunny Admin App -->
	<script src="js/template.js"></script>
<script src="js/index.js"></script>
<?php
}
else{
    redirect("login.php");
}
?>

	
</body>
</html>
