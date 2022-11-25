<?php

include 'components/connect.php';

session_start();

$staff_id = $_SESSION['staff_id'];

if(!isset($staff_id)){
   header('location:StaffLogin.php');
}

if(isset($_POST['add_product'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);
   $category = $_POST['category'];
   $category = filter_var($category, FILTER_SANITIZE_STRING);
   $quantity = $_POST['quantity'];
   $quantity = filter_var($quantity, FILTER_SANITIZE_STRING);
   $availability = $_POST['availability'];
   $availability = filter_var($availability, FILTER_SANITIZE_STRING);
   
   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img'.$image;

   $select_products = $conn->prepare("SELECT * FROM `products` WHERE name = ?");
   $select_products->execute([$name]);

   if($select_products->rowCount() > 0){
      $message[] = 'product name already exists!';
   }else{
      if($image_size > 2000000){
         $message[] = 'image size is too large';
      }else{
         move_uploaded_file($image_tmp_name, $image_folder);

         $insert_product = $conn->prepare("INSERT INTO `products`(name, category,quantity,availability, price, image) 
		 VALUES(?,?,?,?,?,?)");
         $insert_product->execute([$name, $category,$quantity, $availability,$price, $image]);

         $message[] = 'new product added!';
      }
   }
}

if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   $delete_product_image = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
   $delete_product_image->execute([$delete_id]);
   $fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
   unlink('uploaded_img/'.$fetch_delete_image['image']);
   $delete_product = $conn->prepare("DELETE FROM `products` WHERE id = ?");
   $delete_product->execute([$delete_id]);
   $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE pid = ?");
   $delete_cart->execute([$delete_id]);
   header('location:menuStaff.php');

}

if(isset($_POST['update'])){

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $name = $_POST['newName'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);
   $category = $_POST['category'];
   $category = filter_var($category, FILTER_SANITIZE_STRING);
   $quantity = $_POST['quantity'];
   $quantity = filter_var($quantity, FILTER_SANITIZE_STRING);
   $availability = $_POST['availability'];
   $availability = filter_var($availability, FILTER_SANITIZE_STRING);

   $update_product = $conn->prepare("UPDATE `products` SET name = ?, category = ?, price = ?, quantity = ?, availability = ? WHERE id = ?");
   $update_product->execute([$name, $category, $price, $quantity, $availability, $pid ]);
	
   $message[] = 'product updated!';

   $old_image = $_POST['old_image'];
   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   if(!empty($image)){
      if($image_size > 2000000){
         $message[] = 'images size is too large!';
      }else{
         $update_image = $conn->prepare("UPDATE `products` SET image = ? WHERE id = ?");
         $update_image->execute([$image, $pid]);
         move_uploaded_file($image_tmp_name, $image_folder);
         unlink('uploaded_img/'.$old_image);
         $message[] = 'image updated!';
      }
   }

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

    <title>Staff - manage menu</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
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
        <ul class="navbar-nav  sidebar sidebar-dark accordion" style="background-color: #96b9d0; color: #ffffff;" id="accordionSidebar">

            <!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="staffDashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
               <div class='sidebar-brand-text mx-3'>Big Galley's Staff</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="staffDashboard.php">
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
						<a class="collapse-item" href="review.php">Customer Review</a>
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
                        <a class="collapse-item" href="menuStaff.php">Manage Menu</a>
                    </div>
                </div>
            </li>
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
                                <button class="btn" style="background-color: #96b9d0; color: #ffffff;" type="button">
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
                                            <button class="btn " style="background-color: #96b9d0; color: #ffffff; type="button">
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Staff</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
							
									<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
										aria-labelledby="userDropdown">
										<a class="dropdown-item" href="editprofile.php">
											<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
											Profile
										</a>
									
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="staffLogin.php" data-toggle="modal" data-target="#logoutModal">
											<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
											Logout
										</a>
									</div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Menu Managemenet</h1>
                    <p class="mb-4">Add, edit or delete menu by clicking the right button.</p>

                    <!-- DataTales Example -->
					<form action="" method="POST" enctype="multipart/form-data">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold " style=" color: #96b9d0;" >Menu Details Table</h6>
							<button type="button" class="d-none d-sm-inline-block btn btn-sm shadow-sm" style="background-color: #96b9d0; color: #ffffff;" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Menu</button>
								<!-- Modal -->
								<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Add Menu</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									  </div>
									  <div class="modal-body">
										<div class="mb-3">
										<input type="hidden" name="size" value="10000000">
										  <label for="image" class="form-label">Picture</label>
										  <input type="file" class="form-control" id="image" name="image" placeholder="Upload image">
										</div>
										<div class="mb-3">
										  <label for="menuName" class="form-label">Menu Name</label>
										  <input type="text" class="form-control" id="name" name="name" placeholder="Enter menu's name">
										</div>
										<div class="mb-3">
										  <label for="menuName" class="form-label">Price</label>
										  <input type="text" class="form-control" id="price" name = "price" placeholder="Enter price">
										</div>
										<div class="mb-3">
										  <label for="menuName" class="form-label">Type</label>
										  <select class="form-select form-control " aria-label="Default select example" name="category" 
										  id="category">
												<option value="" disabled selected>select category</option>
												<option value="Spaghetti">Spaghetti</option>
												<option value="Desserts">Desserts</option>
												<option value="Drinks">Drinks</option>
											</select>	
										</div>
										
										<div class="mb-3">
										  <label for="quantity" class="form-label">Quantity</label>
										  <input type="Number" class="form-control" id="quantity" name = "quantity" placeholder="Enter the quantity">
										</div>
										
										<div class="mb-3">
										<label for="availability" class="form-label"  >Availability</label>
										  <select class="form-select form-control " aria-label="Default select example" name="availability">
											  <option selected>Open this select menu</option>
											  <option value="Yes">Yes</option>
											  <option value="No">No</option>
											</select>
										</div>
										
									  </div>
									  <div class="modal-footer">
										<button type="submit" name="add_product" class="btn" style="background-color: #96b9d0; color: #ffffff;">Add</button>
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
									
									  </div>
									</div>
								  </div>
								</div>
							</form>
						</div>
                        <div class="card-body">
                            <div class="table-responsive">
							
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
                                        <tr>
											<th>Menu Id</th>
											<th>Image</th>
                                            <th>Menus Name</th>
											<th>Price</th>
											<th>Type</th>
                                            <th>Quantity</th>
                                            <th>Availability</th>
											<th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
								<tbody>
							<?php
							
							$count=1;
							
							 $show_products = $conn->prepare("SELECT * FROM `products`");
							  $show_products->execute();
							  if($show_products->rowCount() > 0){
								 while($fetch_products = $show_products->fetch(PDO::FETCH_ASSOC)){
									 									 
							?>
									 <tr>
									 <td ><?= $fetch_products['id']; ?></td>
									 <td ><img src ="uploaded_img/<?= $fetch_products['image']; ?>" style = "width:200px"></td>
									 <td><?= $fetch_products['name'];?></td>
									 <td>RM <?= $fetch_products['price'];?></td>
									 <td><?= $fetch_products['category'];?></td>
									 <td><?= $fetch_products['quantity'];?></td>
									 <td><?= $fetch_products['availability'];?></td>
								
									 <td style = "width:100px;">
									 <button type="button" name="update1" class="btn btn-danger btn-circle btn-sm"  data-bs-toggle="modal" data-bs-target="#exampleModal1<?= $fetch_products['id'];?>"><i class="fas fa-edit"></i></button>
									<?php
									  $update_id = $fetch_products['id'];
									  $showProducts = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
									  $showProducts->execute([$update_id]);
									  if($showProducts->rowCount() > 0){
										 while($fetch_products = $showProducts->fetch(PDO::FETCH_ASSOC)){  
								   ?>			
										<!-- Modal -->
										<form action="" method="POST" enctype="multipart/form-data">
										<div class="modal fade" id="exampleModal1<?= $fetch_products['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true" >
																			
									 <div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel1">Edit Menu</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
													  
											<div class="modal-body">
												<input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
												<div class="mb-3">
													<label for="image" class="form-label">Image</label>
													<input type="hidden" name="old_image" value="<?= $fetch_products['image']; ?>">
													<input type='file' name='image' id='image' class='form-control' > 
												</div>
	
												<div class="mb-3">
													<label for="menuName" class="form-label">Menu Name</label>
													<input type='text' name='newName' id='name' class='form-control' 
													value="<?= $fetch_products['name'];?>">
												</div>

												<div class="mb-3">
													<label for="menuName" class="form-label">Price</label>
													<input type='text' name='price' id='price' class='form-control' 
													value="<?= $fetch_products['price'];?>">
												</div>										<div class="mb-3">
													<label for="type" class="form-label">Type</label>
													<select class="form-select form-control " aria-label="Default select example"
													name="category" id="category">
														<option selected value="<?= $fetch_products['category']; ?>"><?= $fetch_products['category']; ?></option>
														<option value="Spaghetti">Spaghetti</option>
														<option value="Desserts">Desserts</option>
														<option value="Drinks">Drinks</option>
													</select>
												</div>
												<div class="mb-3">
													<label for="quantity" class="form-label">Quantity</label>
													<input type='Number' class='form-control' id='quantity' name='quantity' 
													value="<?= $fetch_products['quantity']; ?>" >
												</div>
												<div class="mb-3">
													<label for="availability" class="form-label"  >Availability</label>
													<select class='form-select form-control' aria-label='Default select example'
													name='availability' 
														  id='availability'>		
													<option selected value="<?= $fetch_products['availability']; ?>"><?= $fetch_products['availability']; ?></option>	  
													<option value="Yes">Yes</option>
													<option value="No">No</option>
													</select>
												</div>
											</div>
													  
												<div class="modal-footer">
														<button type="submit" class="btn" name="update" style="background-color: #96b9d0; color: #ffffff;">Update</button>
														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
										</div>
										</form>
									 </td>
									 <td style = "width:100px;">
										<a href="menuStaff.php?delete=<?= $fetch_products['id']?>" class="delete-btn btn btn-primary btn-circle btn-sm" onclick="return confirm('delete this product?');"><i class="fas fa-trash"></i></a>
									 </td>
									 <?php
										}
									  }
									echo' </tr>';
									
									 $count++;
									
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
                    <a class="btn" style="background-color: #96b9d0; color: #ffffff;" href="staffLogin.php">Logout</a>
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

