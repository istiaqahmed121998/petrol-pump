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
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="sell_month" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th colspan="4" style="text-align:center">Diesel</th>
                                            <th colspan="4" style="text-align:center">Octane</th>
                                            <th colspan="4" style="text-align:center">Mobil</th>
                                            <th colspan="5" style="text-align:center">Calculation</th>
                                        </tr>
                                        <tr>
                                            <th>Month</th>
                                            <th>Diesel-Sell-Quantity</th>
                                            <th>Diesel-Invest</th>
                                            <th>Diesel-Earn</th>
                                            <th>Diesel-Profit</th>
                                            <th>Octane-Sell-Quantity</th>
                                            <th>Octane-Invest</th>
                                            <th>Octane-Earn</th>
                                            <th>Octane-Profit</th>
                                            <th>Mobil-Sell-Quantity</th>
                                            <th>Mobil-Invest</th>
                                            <th>Mobil-Earn</th>
                                            <th>Mobil-Profit</th>
                                            <th>Fuel-Invest</th>
                                            <th>Fuel-Earn</th>
                                            <th>Fuel-Profit</th>
                                            <th>Expense</th>
                                            <th>Total-Profit</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th style="text-align:right">Total:</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <!--                                            <th></th>-->
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php include_once "footer.php"?>
    <?php include_once 'edit_modal.php'?>


    <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->


<!-- Vendor JS -->
<script src="js/vendors.min.js"></script>
<script src="../assets/icons/feather-icons/feather.min.js"></script>
<script src="../assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js"></script>
<script src="../assets/vendor_components/select2/dist/js/select2.full.js"></script>
<script src="../assets/vendor_components/moment/min/moment.min.js"></script>
<script src="../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="js/clock.js"></script>

<script src="../assets/vendor_components/datatable/datatables.min.js"></script>
<script src="../assets/vendor_components/select2/dist/js/select2.full.js"></script>
<script src="../assets/vendor_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
<!-- Sunny Admin App -->
<script src="js/template.js"></script>
<script src="js/per_mon_fuel.js"></script>


</body>
</html>
