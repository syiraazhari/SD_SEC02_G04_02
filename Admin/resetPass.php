<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Forgot</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Forgot.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" "="" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" "="" defer=""></script>
    <meta name="generator" content="Nicepage 4.17.10, nicepage.com">
    
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "Site1"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Forgot">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body u-xl-mode" data-lang="en"><header class="u-clearfix u-grey-80 u-header u-header" id="sec-202b"><div class="u-align-left u-clearfix u-sheet u-sheet-1">
      </div></header>
    <section class="u-clearfix u-custom-color-10 u-section-1" id="sec-ae5d"></section>
    <section class="u-clearfix u-custom-color-10 u-section-2" id="sec-8353">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-align-center-md u-align-center-sm u-align-center-xs u-container-style u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-group u-shape-rectangle u-white u-group-1">
          <div class="u-container-layout u-container-layout-1"><span class="u-file-icon u-icon u-icon-1"><img src="images/1813870.png" alt=""></span>
            <h4 class="u-align-center-lg u-align-center-xl u-custom-font u-font-montserrat u-text u-text-1">Reset your password</h4>
            <div class="u-form u-form-1">
              <form action="processCust.php" method="POST" class="u-clearfix u-form-spacing-16 u-inner-form" source="custom" name="form" style="padding: 31px;">
                <div class="u-form-email u-form-group">
				<?php 
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
				  ?>		
                  <label for="email-cf71" class="u-label">New Password</label>
                  <input type="text" placeholder="Enter new password" id="email-cf71" name="password" class="u-border-1 u-border-grey-30 u-input u-radius-50 u-white" required="">
                </div>
                <div class="u-form-group u-form-name u-form-group-2">
                  <label for="name-4cba" class="u-label">Confirm Password</label>
                  <input type="text" placeholder="Confirm your password" id="name-4cba" name="confirmPassword" class="u-border-1 u-border-grey-30 u-input u-radius-50 u-white" required="">
                </div>
                <div class="u-align-left u-form-group u-form-submit">
                  <input type="submit" value="Reset Password" name="resetBtn"  class="u-border-none u-btn u-btn-submit u-radius-50 u-button-style u-grey-60 u-btn-1">
                </div>
                <div class="u-form-send-message u-form-send-success"> Thank you! Your message has been sent. </div>
                <div class="u-form-send-error u-form-send-message"> Unable to send your message. Please fix errors then try again. </div>
                <input type="hidden" value="" name="recaptchaResponse">
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    <footer class="u-align-center u-clearfix u-footer u-footer u-grey-80" id="sec-edf8"><div class="u-block-73da-29 u-clearfix u-sheet u-sheet-1"></div></footer>
    <section class="u-backlink u-clearfix u-grey-80">

    </section>
  
</body></html>