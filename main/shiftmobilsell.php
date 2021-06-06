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
                                <h4 class="box-title">Selling Mobil</h4>
                            </div>
                            <form method="post" id="sell_mobil">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label>Date</label>
                                                <input class="form-control" type="date" name="date" id="date" value="" required>


                                                <!-- /.col-lg-6 -->

                                                <label>Time</label>
                                                <input class="form-control" type="time" name="time" id="time" required>


                                                <label>Previous Stock</label>
                                                <input class="form-control" type="number" name="prev_stock" id="prev_stock" placeholder="Previous Stock" required="" data-validation-required-message="This field is required" min="0" aria-invalid="true">



                                                <label>New Stock</label>
                                                <input class="form-control" type="number" name="new_stock" id="new_stock" placeholder="New Stock" required="" data-validation-required-message="This field is required" min="0" aria-invalid="true">


                                                <!-- /.col-lg-6 -->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label>Total Stock</label>

                                                <input class="form-control" type="number" name="total_stock" id="total_stock" placeholder="Total Stock" required="" data-validation-required-message="This field is required" min="0" aria-invalid="true">



                                                <label>Sell Quantity</label>
                                                <input class="form-control" type="number" name="sell_quantity" id="sell_quantity" placeholder="Sell Stock" required="" data-validation-required-message="This field is required" min="0" aria-invalid="true">



                                                <label>Selling Rate</label>
                                                <input class="form-control" type="number" name="selling_rate" id="selling_rate" placeholder="Selling Rate" required="" data-validation-required-message="This field is required" min="0" aria-invalid="true">


                                                <label>Buying Rate</label>
                                                <input class="form-control" type="number" name="buying_rate" id="buying_rate" placeholder="Buying Rate" required="" data-validation-required-message="This field is required" min="0" aria-invalid="true">


                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Manager</label>
                                                <select class="form-control select2" id="manager" style="width: 100%;">
                                                    <option value="">Select Manager</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input class="form-control" type="text" name="phone" id="phone" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Shift</label>
                                                <input class="form-control" type="text" name="shift" id="shift" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Earn</label>
                                            <input class="form-control border-success" type="number" name="earn" id="earn" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Investment</label>
                                            <input class="form-control border-danger" type="number" name="investment" id="investment" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" id="submitsell" class="btn btn-rounded btn-success pull-right">Submit</button>
                                </div>
                            </form>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="sale" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>TIME</th>
                                            <th>Manager</th>
                                            <th>Shift</th>
                                            <th>Previous-Stock</th>
                                            <th>New-Stock</th>
                                            <th>Total-Stock</th>
                                            <th>Sell-Quantity</th>
                                            <th>Buying-Rate</th>
                                            <th>Investment</th>
                                            <th>Sell-Rate</th>
                                            <th>Earn</th>
                                            <th>Profit</th>
                                            <th class="text-center">Option</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th style="text-align:right">Total:</th>
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
<script src="js/shiftmobilsell.js"></script>

<script src="../assets/vendor_components/datatable/datatables.min.js"></script>
<script src="../assets/vendor_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.22/sorting/datetime-moment.js"></script>
<!-- Sunny Admin App -->
<script src="js/template.js"></script>
<script>

</script>


</body>
</html>
