<!DOCTYPE html>
<html lang="en">
<?php include_once "head.php"?>
<?php if(!logged_in()){redirect('login.php');} ?>


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
                                <h4 class="box-title">Diesel Per Day Sales Report</h4>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Date range:</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="reservation">
                                        <button id="date_submit" type="button" class="btn btn-circle btn-primary btn-sm mb-5" onchange="getInputValue()"><i class="mdi mdi-check"></i></button>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <div class="table-responsive">
                                    <table id="dieselTable" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Sell-Quantity</th>
                                            <th>Buying-Rate</th>
                                            <th>Investment</th>
                                            <th>Sell-Rate</th>
                                            <th>Earn</th>
                                            <th>Profit</th>
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


    <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->


<!-- Vendor JS -->
<script src="js/vendors.min.js"></script>
<script src="../assets/icons/feather-icons/feather.min.js"></script>
<script src="../assets/vendor_components/select2/dist/js/select2.full.js"></script>
<script src="../assets/vendor_components/moment/min/moment.min.js"></script>
<script src="../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="js/clock.js"></script>
<script src="js/perdayselldiesel.js"></script>
<script src="../assets/vendor_components/datatable/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.22/sorting/datetime-moment.js"></script>
<!-- Sunny Admin App -->
<script src="js/template.js"></script>
<script>

</script>


</body>
</html>
