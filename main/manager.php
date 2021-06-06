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
                            <button type="button" class="btn btn-circle btn-success btn-xs mb-5" data-toggle="modal" data-target="#modal-center">
                                <i class="mdi mdi-account-multiple-plus"></i>
                            </button>
						</div>
						<div class="box-body">
							<div class="table-responsive">

								<table class="table no-border">
									<thead>
										<tr class="text-uppercase bg-lightest">
											<th style="min-width: 100px"><span class="text-dark">Photo</span></th>
											<th style="min-width: 100px"><span class="text-dark">Name</span></th>
											<th style="min-width: 100px"><span class="text-dark">SHIFT</span></th>
											<th style="min-width: 150px"><span class="text-dark">Mobile Number</span></th>
											<th style="min-width: 130px"><span class="text-dark">status</span></th>
											<th style="min-width: 120px"></th>
										</tr>
									</thead>
									<tbody>
                                    <?php
                                    $sql= "SELECT * FROM managerinfo";
                                    $result= query($sql);
                                    if(row_count($result)>=1){
                                        while($row = fetch_array($result)){
                                            echo
                                                '<tr>										
											<td>
												<div class="d-flex align-items-center">
													'.$row['manager_id'].'
												</div>
											</td>
											<td>
												<span class="text-mute font-weight-500 d-block font-size-16">
												'.$row['manager_name'].'
												</span>
											</td>
											<td>
												<span class="text-mute font-weight-500 d-block font-size-16">
													'.$row['shift'].'
												</span>
											</td>
											<td>
												<span class="text-mute font-weight-500 d-block font-size-16">
													'.$row['phone_number'].'
												</span>

											</td>
											<td>
												<span class="badge badge-primary-light badge-lg">Approved</span>
											</td>
											<td class="text-center">
												<button type="button" class="btn btn-rounded btn-info management-id" data-id="'.$row['manager_id'].'" data-toggle="modal" data-target="#modal-center-edit-profile">EDIT</button>
											</td>
										</tr>';
                                        }

                                    }
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>   
        </section>
    </div>
</div>
    <div class="modal center-modal fade" id="modal-center-edit-profile" tabindex="-1">
        <div class="modal-dialog">
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
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label for="inputID" class="col-sm-2 control-label">ID</label>

                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="manager_id" placeholder="" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label for="inputName" class="col-sm-2 control-label">Name</label>

                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="editName" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label for="inputPhone" class="col-sm-2 control-label">Phone</label>

                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="editPhone" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label for="inputShift" class="col-sm-2 control-label">Shift</label>

                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="editShift" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer modal-footer-uniform">
                        <button type="button" class="btn btn-rounded btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="edit_manager" class="btn btn-rounded btn-primary float-right" data-dismiss="modal">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal center-modal fade" id="modal-center" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Add Manager</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                <label>Name</label>
                                <input class="form-control" type="text" name="name" id="name_add">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Shift</label>
                                    <input class="form-control" type="text" name="shift" id="shift_add">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Mobile</label>
                                    <input class="form-control" type="text" name="mobile" id="phone_add">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer modal-footer-uniform">
                        <button type="button" class="btn btn-rounded btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="add_manager" class="btn btn-rounded btn-primary float-right" data-dismiss="modal">Save changes</button>
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
	
	<!-- Sunny Admin App -->
	<script src="js/template.js"></script>
    <script src="js/clock.js"></script>
<script src="js/edit-manager.js"></script>
	
	
</body>
</html>
