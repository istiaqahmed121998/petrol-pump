<!-- Modal -->
<div class="modal center-modal fade" id="modal-center" tabindex="-1">
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
                                <label>ID</label>
                                <input class="form-control" type="number" name="id" id="id" readonly>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Total Stock</label>

                                    <input class="form-control" type="number" name="edit_total_stock" id="edit_total_stock" placeholder="Total Stock" required="" data-validation-required-message="This field is required" min="0" aria-invalid="true">

                                    <label>Previous Stock</label>
                                    <input class="form-control" type="number" name="edit_prev_stock" id="edit_prev_stock" placeholder="Add Stock" required="" data-validation-required-message="This field is required" min="0" aria-invalid="true">



                                    <label>New Stock</label>
                                    <input class="form-control" type="number" name="edit_new_stock" id="edit_new_stock" placeholder="Add Stock" required="" data-validation-required-message="This field is required" min="0" aria-invalid="true">


                                    <!-- /.col-lg-6 -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">


                                    <label>Sell Quantity</label>
                                    <input class="form-control" type="number" name="edit_sell_quantity" id="edit_sell_quantity" placeholder="Sell Stock" required="" data-validation-required-message="This field is required" min="0" aria-invalid="true">



                                    <label>Selling Rate</label>
                                    <input class="form-control" type="number" name="edit_selling_rate" id="edit_selling_rate" placeholder="Selling Rate" required="" data-validation-required-message="This field is required" min="0" aria-invalid="true">


                                    <label>Buying Rate</label>
                                    <input class="form-control" type="number" name="edit_buying_rate" id="edit_buying_rate" placeholder="Buying Rate" required="" data-validation-required-message="This field is required" min="0" aria-invalid="true">


                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Manager</label>
                                    <select class="form-control select2" id="edit_manager" style="width: 100%;">
                                        <option value="">Select Manager</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="form-control" type="text" name="edit_phone" id="edit_phone" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Shift</label>
                                    <input class="form-control" type="text" name="edit_shift" id="edit_shift">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Earn</label>
                                <input class="form-control border-success" type="number" name="edit_earn" id="edit_earn" disabled>
                            </div>
                            <div class="col-md-6">
                                <label>Investment</label>
                                <input class="form-control border-danger" type="number" name="edit_investment" id="edit_investment" disabled>
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
<!-- /.modal -->
