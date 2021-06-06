<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.php">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">
						  <img src="../images/padma.png" width="50" height="60" alt="">
						  <h3><b>S.K</b> Filling Station</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li>
          <a href="index.php">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  
		
        <li class="treeview">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Transaction</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="per_day_fuel.php"><i class="ti-more"></i>Per Day Transaction</a></li>
            <li><a href="per_month_fuel.php"><i class="ti-more"></i>Per Month Transaction</a></li>
          </ul>
        </li> 
		  
        <li class="treeview">
          <a href="#">
            <i data-feather="mail"></i> <span>Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="manager.php"><i class="ti-more"></i>Manager</a></li>
            <li><a href="expense_info.php"><i class="ti-more"></i>Expense</a></li>
            <li><a href="capacity.php"><i class="ti-more"></i>Capacity</a></li>
          </ul>
        </li>
          <li class="treeview">
              <a href="#">
                  <i class="mdi mdi-bus"></i><span>Diesel</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="perday-sell-diesel.php"><i class="ti-more"></i>Per day Sell</a></li>
                  <li><a href="shiftdieselsell.php"><i class="ti-more"></i>Shift Sell</a></li>
              </ul>
          </li>
          <li class="treeview">
              <a href="#">
                  <i class="mdi mdi-car"></i><span>Octane</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="perday-sell-octane.php"><i class="ti-more"></i>Per day Sell</a></li>
                  <li><a href="shiftoctanesell.php"><i class="ti-more"></i>Shift Sell</a></li>
              </ul>
          </li>
          <li class="treeview">
              <a href="#">
                  <i class="mdi mdi-bike"></i> <span>Mobil</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="perday-sell-mobil.php"><i class="ti-more"></i>Per day Sell</a></li>
                  <li><a href="shiftmobilsell.php"><i class="ti-more"></i>Shift Sell</a></li>
              </ul>
          </li>

          <li>
          <a href="logout.php">
            <i data-feather="lock"></i>
			<span>Log Out</span>
          </a>
        </li> 
        
      </ul>
    </section>
  </aside>