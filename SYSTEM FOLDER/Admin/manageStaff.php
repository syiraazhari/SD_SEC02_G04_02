<?php

include 'components\connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:Login.php');
};

if(isset($_POST['addStaff'])){

   $name = $_POST['nsname'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['nsemail'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $password = sha1($_POST['nspassword']);
   $password = filter_var($password, FILTER_SANITIZE_STRING);
   $confirmPassword = sha1($_POST['confirmPassword']);
   $confirmPassword = filter_var($password, FILTER_SANITIZE_STRING);

   $job = $_POST['job'];
   $job = filter_var($job, FILTER_SANITIZE_STRING);
   $address = $_POST['address'];
   $address = filter_var($address, FILTER_SANITIZE_STRING);
   $phone = $_POST['phone'];
   $phone = filter_var($phone, FILTER_SANITIZE_STRING);


   $selectStaff = $conn->prepare("SELECT * FROM `staff` WHERE email = ?");
   $selectStaff->execute([$email]);

   if($selectStaff->rowCount() > 0){
      $message[] = 'product email already exists!';
   }else{
      
         $insert_product = $conn->prepare("INSERT INTO `staff`(name, email, password, confirmPassword, job,address,phone,image) VALUES(?,?,?,?,?,?,?,?)");
         $insert_product->execute([$name, $email, $password, $confirmPassword, $job, $address, $phone,'']);

         $message[] = 'new staff added!';
   }
}

if(isset($_GET['delete'])){
	
   $delete_id = $_GET['delete'];
   $deleteStaff = $conn->prepare("DELETE FROM `staff` WHERE id = ?");
   $deleteStaff->execute([$delete_id]);
   header('location:manageStaff.php');
   
}

if(isset($_POST['update'])){

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $name = $_POST['newName'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $password = sha1($_POST['password']);
   $password = filter_var($password, FILTER_SANITIZE_STRING);
  

   $updateStaff = $conn->prepare("UPDATE `staff` SET name = ?, email = ?, password = ? WHERE id = ?");
   $updateStaff->execute([$name, $email, $password, $pid ]);
	
   $message[] = 'staff updated!';

}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - manage customer</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" >
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" ></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" ></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" ></script>
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav  sidebar sidebar-dark accordion" style="background-color: #e2725b; color: #ffffff;" id="accordionSidebar">

            <!-- Sidebar - Brand -->

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="Dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class='sidebar-brand-text mx-3'>Big Galley's Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="Dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
				
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Management
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Customer</span>
                </a>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Customer Center:</h6>
                        <a class="collapse-item" href="orderdetails.php">Order Details</a>
                        <a class="collapse-item" href="manageCust.php">Manage Customer</a>
						<a class="collapse-item" href="review.php">Customer Review</a>
                    </div>
                </div>
            </li>
			
			<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Staff</span>
                </a>
                <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Staff Center:</h6>
                        <a class="collapse-item" href="manageStaff.php">Manage Staff</a>
                    </div>
                </div>
            </li>
			
			<!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiesTwo"
                    aria-expanded="true" aria-controls="collapseUtilitiesTwo">
                    <i class="fas fa-fw fa-"></i>	<!--incompleted-->
                    <span>Menu</span>
                </a>
                <div id="collapseUtilitiesTwo" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu Center:</h6>
                        <a class="collapse-item" href="menu.php">Manage Menu</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn" style="background-color: #e2725b; color: #ffffff;" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn" style="background-color: #e2725b; color: #ffffff;" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="changePassAdmin.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Change Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
				<section class="addStaff">
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Staff Administration</h1>
                    <p class="mb-4">Add, edit or  delete customer by clicking the right button.</p>

                    <!-- DataTales Example -->
					
                    <form action="" method="POST" enctype="multipart/form-data">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold " style=" color: #e2725b;" >Staff Details Table</h6>
							<button type="button" class="d-none d-sm-inline-block btn btn-sm shadow-sm" style="background-color: #e2725b; color: #ffffff;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus fa-sm text-white-50"></i>Add Staff</button>
								<!-- Modal -->
								<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Add Staff</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									  </div>
									  <div class="modal-body">
										<div class="mb-3">
										  <label for="name" class="form-label">Name</label>
										  <input type="text" class="form-control" id="menuName" name = "nsname" placeholder="Enter staff's name">
										</div>
										<div class="mb-3">
										  <label for="email" class="form-label">Email</label>
										  <input type="email" class="form-control" id="email" name = "nsemail" placeholder="Enter the email">
										</div>
										
										<div class="mb-3">
										  <label for="password" class="form-label">Password</label>
										  <input type="password" class="form-control" id="password" name = "nspassword" placeholder="Enter the password">
										</div>
										<input type="hidden" id="confirmPassword" name="confirmPassword" value="">
										<input type="hidden" id="job" name="job" value="">
										<input type="hidden" id="about" name="about" value="">
										<input type="hidden" id="address" name="address" value="">
										<input type="hidden" id="phone" name="phone" value="">
										
									  </div>
									  <div class="modal-footer">
										<button type="submit" name="addStaff"  class="btn" style="background-color: #e2725b; color: #ffffff;">Add</button>
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										
									  </div>
									</div>
								  </div>
								</div>
						</div>
                        <div class="card-body">
                            <div class="table-responsive">
							
							<table>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    
									<thead>
										<tr>
											<th>Staff Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
											<th>Password</th>
											<th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>                                 
									<tbody>
								
									<?php
									$showStaff = $conn->prepare("SELECT * FROM `staff`");
								    $showStaff->execute();
								    if($showStaff->rowCount() > 0){
									 while($fetchStaff = $showStaff->fetch(PDO::FETCH_ASSOC)){
									?>	 
										 
									 <tr>
									 <td><?= $fetchStaff['id'];?></td>
									 <td><?= $fetchStaff['name'];?></td>
									 <td><?= $fetchStaff['email'];?></td>
									 <td><?= $fetchStaff['password'];?></td>
									 
									<td style = "width:100px;">
									 <button type="button" name="update1" class="btn btn-danger btn-circle btn-sm"  data-bs-toggle="modal" data-bs-target="#staff<?= $fetchStaff['id']; ?>"><i class="fas fa-edit"></i></button>
									<?php
									  $update_id = $fetchStaff['id'];
									  $showProducts = $conn->prepare("SELECT * FROM `staff` WHERE id = ?");
									  $showProducts->execute([$update_id]);
									  if($showProducts->rowCount() > 0){
										 while($fetchStaff = $showProducts->fetch(PDO::FETCH_ASSOC)){  
								   ?>			
										<!-- Modal -->
										<form action="" method="POST" enctype="multipart/form-data">
										<div class="modal fade" id="staff<?= $fetchStaff['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true" >
																			
										 <div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel1">Edit staff</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
														  
												<div class="modal-body">
													<input type="hidden" name="pid" value="<?= $fetchStaff['id']; ?>">
		
													<div class="mb-3">
														<label for="name" class="form-label">Staff Name</label>
														<input type='text' name='newName' id='name' class='form-control' value="<?= $fetchStaff['name'];?>">
													</div>

													<div class="mb-3">
														<label for="name" class="form-label">Email</label>
														<input type='text' name='email' id='email' class='form-control' value="<?= $fetchStaff['email'];?>">
													</div>										
													
													<div class="mb-3">
														<label for="password" class="form-label">Password</label>
														<input type='password' name='password' id='password' class='form-control' value="<?= $fetchStaff['password'];?>">
													</div>
													
													
												</div>
														  
													<div class="modal-footer">
															<button type="submit" class="btn" name="update" style="background-color: #e2725b; color: #ffffff;">Update</button>
															<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div>
										</form>
								
										
									</td>
									 
									  <td style = "width:100px;">
										<a href="manageStaff.php?delete=<?= $fetchStaff['id']?>"  name="delete" class="delete-btn btn btn-primary btn-circle btn-sm" onclick="return confirm('delete this staff?');"><i class="fas fa-trash"></i></a>
									 </td>
									 
									<?php
											}
									  }
									echo' </tr>';

									}
							  }	
							  ?>
									
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
				</form>

                </div>
                <!-- /.container-fluid -->

            </div>
			</section>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Big Galley's Cafe 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn" style="background-color: #e2725b; color: #ffffff;" href="Login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>
</html>