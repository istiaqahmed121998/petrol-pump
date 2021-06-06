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
                                <h4 class="box-title">Expense</h4>
                            </div>
                            <form method="post" id="expense_info">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label>Date</label>
                                                <input class="form-control" type="date" name="date" id="date" value="" required>


                                                <!-- /.col-lg-6 -->

                                                <label>Time</label>
                                                <input class="form-control" type="time" name="time" id="time" required>


                                                <!-- /.col-lg-6 -->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Reason</label>
                                                <textarea rows="3" cols="5" class="form-control" id="reasons" placeholder="Reasons"></textarea>
                                                <label>Expense Amount</label>
                                                <input class="form-control" type="number" name="amount" id="amount" placeholder="Amount" required="" data-validation-required-message="This field is required" min="0" aria-invalid="true">


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" id="submit_reason" class="btn btn-rounded btn-success pull-right">Submit</button>
                                </div>
                            </form>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="expense" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>TIME</th>
                                            <th>Reason</th>
                                            <th>Amount</th>
                                            <th class="text-center">Option</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th style="text-align:right">Total:</th>
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
    <div class="modal center-modal fade" id="modal-center-edit" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="row">
                                <input class="form-control" type="number" name="edit_id" id="edit_id" readonly>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label>Reason</label>
                                        <textarea rows="3" cols="5" class="form-control" id="reasons_edit" placeholder="Reasons"></textarea>

                                        <!-- /.col-lg-6 -->



                                        <!-- /.col-lg-6 -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Amount</label>
                                        <input class="form-control" type="number" name="amount" id="amount_edit" placeholder="Amount" required="" data-validation-required-message="This field is required" min="0" aria-invalid="true">


                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer modal-footer-uniform">
                        <button type="button" class="btn btn-rounded btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="edit_sell" class="btn btn-rounded btn-primary float-right" data-dismiss="modal">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal center-modal fade" id="modal-center-delete" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h5 class="modal-title">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Do yo want to delete this data??</h4>
                </div>
                <form>
                    <div class="modal-footer modal-footer-uniform">
                        <button type="button" class="btn btn-rounded btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-rounded btn-primary float-right delete_data_ok" data-dismiss="modal">Delete</button>
                    </div>
                </form>
            </div>
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
<script src="../assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js"></script>
<script src="../assets/vendor_components/select2/dist/js/select2.full.js"></script>
<script src="../assets/vendor_components/moment/min/moment.min.js"></script>
<script src="../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="js/clock.js"></script>

<script src="../assets/vendor_components/datatable/datatables.min.js"></script>
<script src="../assets/vendor_components/select2/dist/js/select2.full.js"></script>
<script src="../assets/vendor_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.22/sorting/datetime-moment.js"></script>
<!-- Sunny Admin App -->
<script src="js/template.js"></script>
<script src="js/expense.js"></script>

</body>
</html>
