<?php
include "cust.php";
//print_r($_POST);
if(isSet($_POST['addItemBtn']))
						{
							$name = $_POST['name'];	
							$quantity = 1;
							$price = $_POST['price'];
							$image = $_POST['image'];		
							$email = $_POST['email'];
							$con = mysqli_connect('localhost','G04_02','G04_02','biggalleyscafe');
						 if (mysqli_connect_errno())
							{
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
							exit;
							}
							$name = $_POST['name'];	
							$sql = 'select * from orderdetails where name  = "'.$name.'"';
							//echo $sql;	
							$qry = mysqli_query($con,$sql);
							if(mysqli_num_rows ($qry) > 100){
								//echo 'product already added';
							}
							else{
								$sql1 = "insert into orderdetails (name,image,quantity, price,email)
								values('$name','$image','$quantity','$price','$email')";
							
								$qry = mysqli_query($con,$sql1);
								//echo $sql1;	
								//echo 'product added to cart';
							}
							
							
						}
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>MENU</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="MENU.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.19.3, nicepage.com">
    
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    
    
    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "Site1",
		"logo": "images/Logo1.jpeg",
		"sameAs": []
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="MENU">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body u-xl-mode" data-lang="en"><header class="u-black u-clearfix u-header u-header" id="sec-202b"><div class="u-clearfix u-sheet u-sheet-1">
        <a href="https://nicepage.cloud" class="u-image u-logo u-image-1" data-image-width="389" data-image-height="497">
          <img src="images/Logo1.jpeg" class="u-logo-image u-logo-image-1">
        </a>
        <nav class="u-menu u-menu-one-level u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
            <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#" style="padding: 4px 2px; font-size: calc(1em + 8px);">
              <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
              <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</g></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><?php
			if($_GET['key']){
					$con = mysqli_connect('localhost','G04_02','G04_02','biggalleyscafe');	
					 if (mysqli_connect_errno())
						{
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
						exit;	
						}
						//echo "connected";
						
					$email = $_GET['key'];
					$query = mysqli_query($con,"SELECT * FROM customer WHERE email ='".$email."'");
					echo"<input type='hidden' name='email' value='$email'>";

			echo'<a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base u-text-white" style="padding: 10px 16px 10px 18px;" href="homepage.php?key='.$email.'" style="padding: 10px 16px 10px 18px;">HOME</a>';
			}
			?>
</li>
<li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base u-text-white" style="padding: 10px 16px 10px 18px;">MENU</a></li>
<li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base u-text-white" style="padding: 10px 16px 10px 18px;">ABOUT US</a></li>
<li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base u-text-white" style="padding: 10px 14px 10px 18px;">CONTACT US</a>
</li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
				<li class="u-nav-item"><?php
			if($_GET['key']){
					$con = mysqli_connect('localhost','G04_02','G04_02','biggalleyscafe');	
					 if (mysqli_connect_errno())
						{
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
						exit;	
						}
						//echo "connected";
						
					$email = $_GET['key'];
					$query = mysqli_query($con,"SELECT * FROM customer WHERE email ='".$email."'");
					echo"<input type='hidden' name='email' value='$email'>";

			echo'<a class="u-button-style u-nav-link" href="homepage.php?key='.$email.'" style="padding: 10px 16px 10px 18px;">MENU</a>';
			}
			?>
			</li>
				
				<li class="u-nav-item"><a class="u-button-style u-nav-link">MENU</a></li>
				<li class="u-nav-item"><a class="u-button-style u-nav-link">ABOUT US</a></li>
				<li class="u-nav-item"><a class="u-button-style u-nav-link">CONTACT US</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
		<?php
		$con = mysqli_connect('localhost','G04_02','G04_02','biggalleyscafe');
						 if (mysqli_connect_errno())
							{
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
							exit;
							}
							//$name = $_POST['name'];	
							$sql = 'select * from orderdetails where email ="'.$email.'" ';
							//echo $sql;	
							$qry = mysqli_query($con,$sql);
							$row_count = mysqli_num_rows($qry);
		
		echo'<span class="u-file-icon u-icon u-text-white u-icon-1" data-href="https://nicepage.com/c/testimonials-html-templates" data-target="_blank"><img src="images/456283-318fef4e.png" alt=""></span>';
		
		echo'<a href="cart.php?key='.$email.'" ><img class="u-file-icon u-icon u-text-white u-icon-2" src="images/2832495-de7b058f.png" alt=""><span class="u-file-icon u-icon u-text-white u-icon-1">'.$row_count.'</span></a>';
		?>
      </div></header>
    <section class="u-clearfix u-custom-color-7 u-section-1" id="sec-84cc">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <p class="u-align-center u-custom-font u-font-raleway u-text u-text-1">MENU</p>
        <div class="u-border-3 u-border-white u-line u-line-horizontal u-opacity u-opacity-25 u-line-1"></div>
      </div>
    </section>
    <section class="u-clearfix u-custom-color-7 u-section-2" id="sec-8353">
	<?php 
	$spaghetti = displaySpaghetti();
	
      echo' <div class="u-align-left u-clearfix u-sheet u-sheet-1">';
       echo' <h4 class="u-custom-font u-font-montserrat u-text u-text-1">Spaghetti</h4>';
        echo'<div class="u-expanded-width-lg u-expanded-width-md u-expanded-width-xs u-layout-horizontal u-list u-list-1">';
		
        echo'  <div class="u-repeater u-repeater-1">';
		$count=1;
		while($row = mysqli_fetch_assoc($spaghetti))
		{ 
	
		$name = $row['name'];
		$price = $row['price'];
		$image = $row['image'];
        echo'    <div class="u-container-style u-list-item u-radius-20 u-repeater-item u-shape-round u-white u-list-item-1">';
             echo' <div class="u-container-layout u-similar-container u-valign-bottom-xl u-container-layout-1">';
			 
			  echo'<form action="" method="POST">';
              echo'  <img class="u-expanded-width-xl u-image u-image-round u-radius-20 u-image-1" alt="" data-image-width="1581" data-image-height="2048" src="images/'.$row['image'].'">';
                echo'<h4 class="u-align-center u-text u-text-grey-50 u-text-2">'.$row['name'].'</h4>';
                echo'<h5 class="u-align-center u-text u-text-grey-50 u-text-3">'.$row['price'].'<br></h5>';
				echo"<input type='hidden' name='name' value='$name'>";
				echo"<input type='hidden' name='price' value='$price'>";
				echo"<input type='hidden' name='image' value='$image'>";
				if($_GET['key']){
					$con = mysqli_connect('localhost','G04_02','G04_02','biggalleyscafe');	
					 if (mysqli_connect_errno())
						{
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
						exit;	
						}
						//echo "connected";
						
					$email = $_GET['key'];
					$query = mysqli_query($con,"SELECT * FROM customer WHERE email ='".$email."'");
					echo"<input type='hidden' name='email' value='$email'>";
				}
                //echo'<input type="hidden" name="price" value='.$row['price'].'>';
                echo'<input type="submit" name="addItemBtn" class="u-border-none u-btn u-btn-round u-button-style u-grey-50 u-hover-grey-15 u-radius-50 u-btn-1" value="ADD TO CART">';
			echo'</form>';
						
				
              echo'</div>';
            echo'</div>';
			 
	  $count++;
       } 
            
         echo' </div>';
		
		  ?>
		  
          <a class="u-gallery-nav u-gallery-nav-prev u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-gallery-nav-1" href="#" role="button">
            <span aria-hidden="true">
              <svg viewBox="0 0 451.847 451.847"><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path></svg>
            </span>
            <span class="sr-only">
              <svg viewBox="0 0 451.847 451.847"><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path></svg>
            </span>
          </a>
          <a class="u-gallery-nav u-gallery-nav-next u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-gallery-nav-2" href="#" role="button">
            <span aria-hidden="true">
              <svg viewBox="0 0 451.846 451.847"><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path></svg>
            </span>
            <span class="sr-only">
              <svg viewBox="0 0 451.846 451.847"><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path></svg>
            </span>
          </a>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-custom-color-7 u-section-3" id="sec-24ed">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h4 class="u-custom-font u-font-montserrat u-text u-text-1">Desserts</h4>
        <div class="u-expanded-width-lg u-expanded-width-md u-expanded-width-xs u-layout-horizontal u-list u-list-1">
          <div class="u-repeater u-repeater-1">
            <?php
		  $Desserts = displayDesserts();
	
			$count=1;
			
			while($row = mysqli_fetch_assoc($Desserts))
			{ 
		$name = $row['name'];
		$price = $row['price'];
		$image = $row['image'];
		
            echo' <div class="u-align-center-xl u-container-style u-list-item u-radius-20 u-repeater-item u-shape-round u-white u-list-item-1">';
              echo' <div class="u-container-layout u-similar-container u-valign-bottom-xl u-valign-top-xs u-container-layout-1">';
                echo'<form action="" method="POST">';
              echo'  <img class="u-expanded-width-xl u-image u-image-round u-radius-20 u-image-1" alt="" data-image-width="1581" data-image-height="2048" src="images/'.$row['image'].'">';
                echo'<h4 class="u-align-center u-text u-text-grey-50 u-text-2">'.$row['name'].'</h4>';
                echo'<h5 class="u-align-center u-text u-text-grey-50 u-text-3">'.$row['price'].'<br></h5>';
				echo"<input type='hidden' name='name' value='$name'>";
				echo"<input type='hidden' name='price' value='$price'>";
				echo"<input type='hidden' name='image' value='$image'>";
				if($_GET['key']){
					$con = mysqli_connect('localhost','G04_02','G04_02','biggalleyscafe');	
					 if (mysqli_connect_errno())
						{
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
						exit;	
						}
						//echo "connected";
						
					$email = $_GET['key'];
					$query = mysqli_query($con,"SELECT * FROM customer WHERE email ='".$email."'");
					echo"<input type='hidden' name='email' value='$email'>";
				}
                echo'<input type="submit" name="addItemBtn" class="u-border-none u-btn u-btn-round u-button-style u-grey-50 u-hover-grey-15 u-radius-50 u-btn-1" value="ADD TO CART">';
			echo'</form>';
						
				
              echo'</div>';
            echo'</div>';
			 
	  $count++;
			}
            ?>
           
          </div>
          <a class="u-gallery-nav u-gallery-nav-prev u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-gallery-nav-1" href="#" role="button">
            <span aria-hidden="true">
              <svg viewBox="0 0 451.847 451.847"><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path></svg>
            </span>
            <span class="sr-only">
              <svg viewBox="0 0 451.847 451.847"><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path></svg>
            </span>
          </a>
          <a class="u-gallery-nav u-gallery-nav-next u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-gallery-nav-2" href="#" role="button">
            <span aria-hidden="true">
              <svg viewBox="0 0 451.846 451.847"><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path></svg>
            </span>
            <span class="sr-only">
              <svg viewBox="0 0 451.846 451.847"><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path></svg>
            </span>
          </a>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-custom-color-7 u-section-4" id="sec-d95c">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h4 class="u-custom-font u-font-montserrat u-text u-text-default u-text-1">Drinks</h4>
        <div class="u-expanded-width-lg u-expanded-width-md u-expanded-width-xs u-layout-horizontal u-list u-list-1">
          <div class="u-repeater u-repeater-1">
            <?php
		  $Drinks = displayDrinks();
	
			$count=1;
			while($row = mysqli_fetch_assoc($Drinks))
			{ 
            echo' <div class="u-align-center-xl u-container-style u-list-item u-radius-20 u-repeater-item u-shape-round u-white u-list-item-1">';
              echo' <div class="u-container-layout u-similar-container u-valign-bottom-xl u-valign-top-xs u-container-layout-1">';
                echo' <img class="u-expanded-width-xl u-image u-image-round u-radius-20 u-image-1" alt="" data-image-width="277" data-image-height="237" src="images/'.$row['image'].'">';
                echo' <h4 class="u-align-center u-text u-text-grey-50 u-text-2">'.$row['name'].'</h4>';
                echo' <h5 class="u-align-center u-text u-text-grey-50 u-text-3">'.$row['price'].'</h5>';
               echo'  <a href="https://nicepage.com/c/table-website-templates" class="u-border-none u-btn u-btn-round u-button-style u-grey-50 u-hover-grey-15 u-radius-50 u-btn-1">ADD TO CART</a>';
              echo' </div>';
            echo' </div>';
			$count++;
			}
            ?>
            
          </div>
          <a class="u-gallery-nav u-gallery-nav-prev u-icon-circle u-opacity u-opacity-70 u-palette-1-base u-spacing-10 u-text-white u-gallery-nav-1" href="#" role="button">
            <span aria-hidden="true">
              <svg viewBox="0 0 451.847 451.847"><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path></svg>
            </span>
            <span class="sr-only">
              <svg viewBox="0 0 451.847 451.847"><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path></svg>
            </span>
          </a>
          <a class="u-gallery-nav u-gallery-nav-next u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-gallery-nav-2" href="#" role="button">
            <span aria-hidden="true">
              <svg viewBox="0 0 451.846 451.847"><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path></svg>
            </span>
            <span class="sr-only">
              <svg viewBox="0 0 451.846 451.847"><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path></svg>
            </span>
          </a>
        </div>
      </div>
    </section>
    
    
    <footer class="u-clearfix u-footer u-grey-80" id="sec-b603"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-align-left u-hidden-xs u-social-icons u-spacing-10 u-social-icons-1">
          <a class="u-social-url" title="facebook" target="_blank" href=""><span class="u-icon u-social-facebook u-social-icon u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-a1c8"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-a1c8"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M73.5,31.6h-9.1c-1.4,0-3.6,0.8-3.6,3.9v8.5h12.6L72,58.3H60.8v40.8H43.9V58.3h-8V43.9h8v-9.2
            c0-6.7,3.1-17,17-17h12.5v13.9H73.5z"></path></svg></span>
          </a>
          <a class="u-social-url" title="twitter" target="_blank" href=""><span class="u-icon u-social-icon u-social-twitter u-icon-2"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-7941"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-7941"><circle fill="currentColor" class="st0" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M83.8,47.3c0,0.6,0,1.2,0,1.7c0,17.7-13.5,38.2-38.2,38.2C38,87.2,31,85,25,81.2c1,0.1,2.1,0.2,3.2,0.2
            c6.3,0,12.1-2.1,16.7-5.7c-5.9-0.1-10.8-4-12.5-9.3c0.8,0.2,1.7,0.2,2.5,0.2c1.2,0,2.4-0.2,3.5-0.5c-6.1-1.2-10.8-6.7-10.8-13.1
            c0-0.1,0-0.1,0-0.2c1.8,1,3.9,1.6,6.1,1.7c-3.6-2.4-6-6.5-6-11.2c0-2.5,0.7-4.8,1.8-6.7c6.6,8.1,16.5,13.5,27.6,14
            c-0.2-1-0.3-2-0.3-3.1c0-7.4,6-13.4,13.4-13.4c3.9,0,7.3,1.6,9.8,4.2c3.1-0.6,5.9-1.7,8.5-3.3c-1,3.1-3.1,5.8-5.9,7.4
            c2.7-0.3,5.3-1,7.7-2.1C88.7,43,86.4,45.4,83.8,47.3z"></path></svg></span>
          </a>
          <a class="u-social-url" title="instagram" target="_blank" href=""><span class="u-icon u-social-icon u-social-instagram u-icon-3"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-3277"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-3277"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M55.9,38.2c-9.9,0-17.9,8-17.9,17.9C38,66,46,74,55.9,74c9.9,0,17.9-8,17.9-17.9C73.8,46.2,65.8,38.2,55.9,38.2
            z M55.9,66.4c-5.7,0-10.3-4.6-10.3-10.3c-0.1-5.7,4.6-10.3,10.3-10.3c5.7,0,10.3,4.6,10.3,10.3C66.2,61.8,61.6,66.4,55.9,66.4z"></path><path fill="#FFFFFF" d="M74.3,33.5c-2.3,0-4.2,1.9-4.2,4.2s1.9,4.2,4.2,4.2s4.2-1.9,4.2-4.2S76.6,33.5,74.3,33.5z"></path><path fill="#FFFFFF" d="M73.1,21.3H38.6c-9.7,0-17.5,7.9-17.5,17.5v34.5c0,9.7,7.9,17.6,17.5,17.6h34.5c9.7,0,17.5-7.9,17.5-17.5V38.8
            C90.6,29.1,82.7,21.3,73.1,21.3z M83,73.3c0,5.5-4.5,9.9-9.9,9.9H38.6c-5.5,0-9.9-4.5-9.9-9.9V38.8c0-5.5,4.5-9.9,9.9-9.9h34.5
            c5.5,0,9.9,4.5,9.9,9.9V73.3z"></path></svg></span>
          </a>
          <a class="u-social-url" title="linkedin" target="_blank" href=""><span class="u-icon u-social-icon u-social-linkedin u-icon-4"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-f09f"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-f09f"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M41.3,83.7H27.9V43.4h13.4V83.7z M34.6,37.9L34.6,37.9c-4.6,0-7.5-3.1-7.5-7c0-4,3-7,7.6-7s7.4,3,7.5,7
            C42.2,34.8,39.2,37.9,34.6,37.9z M89.6,83.7H76.2V62.2c0-5.4-1.9-9.1-6.8-9.1c-3.7,0-5.9,2.5-6.9,4.9c-0.4,0.9-0.4,2.1-0.4,3.3v22.5
            H48.7c0,0,0.2-36.5,0-40.3h13.4v5.7c1.8-2.7,5-6.7,12.1-6.7c8.8,0,15.4,5.8,15.4,18.1V83.7z"></path></svg></span>
          </a>
        </div>
      </div></footer>
    <section class="u-backlink u-clearfix u-grey-80">

    </section>
  
</body></html>