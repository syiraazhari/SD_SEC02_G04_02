<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>success</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="changePassCust.css" media="screen">
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
    <meta property="og:title" content="success">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body u-xl-mode" data-lang="en"><header class="u-clearfix u-grey-70 u-header u-header" id="sec-202b"><div class="u-align-left u-clearfix u-sheet u-sheet-1"></div></header>
    <section class="u-clearfix u-custom-color-10 u-section-1" id="sec-ae5d"></section>
    <section class="u-clearfix u-custom-color-10 u-section-2" id="sec-8353">
      <div class="u-align-left u-clearfix u-sheet u-sheet-1">
        <div class="u-expanded-width u-tabs u-tabs-1">
          <ul class="u-tab-list u-unstyled" role="tablist">
            <li class="u-tab-item" role="presentation">
              <a class="active u-button-style u-tab-link" id="link-tab-9b05" href="#tab-9b05" role="tab" aria-controls="tab-9b05" aria-selected="true">HOME</a>
            </li>
            <li class="u-tab-item" role="presentation">
              <a class="u-button-style u-tab-link" id="link-tab-1d49" href="#tab-1d49" role="tab" aria-controls="tab-1d49" aria-selected="false">MENU</a>
            </li>
            <li class="u-hidden-xs u-tab-item u-tab-item-3" role="presentation">
              <a class="u-button-style u-tab-link" id="link-tab-be3b" href="#tab-be3b" role="tab" aria-controls="tab-be3b" aria-selected="false">CONTACT US</a>
            </li>
            <li class="u-tab-item u-tab-item-4" role="presentation">
              <a class="u-button-style u-tab-link" id="link-tab-ea09" href="#tab-ea09" role="tab" aria-controls="tab-ea09" aria-selected="false">ABOUT US</a>
            </li>
          </ul>
          <div class="u-tab-content">
            <div class="u-container-style u-tab-active u-tab-pane" id="tab-9b05" role="tabpanel" aria-labelledby="link-tab-9b05">
              <div class="u-container-layout u-container-layout-1"></div>
            </div>
            <div class="u-container-style u-tab-pane" id="tab-1d49" role="tabpanel" aria-labelledby="link-tab-1d49">
              <div class="u-container-layout u-container-layout-2"></div>
            </div>
            <div class="u-container-style u-tab-pane u-tab-pane-3" id="tab-be3b" role="tabpanel" aria-labelledby="link-tab-be3b">
              <div class="u-container-layout u-container-layout-3"></div>
            </div>
            <div class="u-container-style u-tab-pane u-tab-pane-4" id="tab-ea09" role="tabpanel" aria-labelledby="link-tab-ea09">
              <div class="u-container-layout u-container-layout-4"></div>
            </div>
          </div>
        </div>
        <div class="u-border-1 u-border-grey-15 u-container-style u-expanded-width-sm u-expanded-width-xs u-group u-shape-rectangle u-white u-group-1">
          <div class="u-container-layout u-container-layout-5">
            <div class="u-container-style u-expanded-width u-grey-5 u-group u-shape-rectangle u-group-2">
              <div class="u-container-layout u-container-layout-6">
                <p class="u-custom-font u-font-montserrat u-text u-text-default u-text-1">
                  <span style="font-size: 0.875rem;">CHANGE PASSWORD</span>
                </p>
              </div>
            </div>
            <div class="u-form u-form-1">
              <form action="processCust.php" method="POST" class="u-clearfix u-form-spacing-34 u-inner-form" source="email" name="form" style="padding: 50px;">
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
                <div class="u-form-group u-form-name">
                  <label for="name-26a4" class="u-label">Current Password</label>
                  <input type="text" placeholder="Enter current password" id="password" name="password" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-14 u-white" required="">
                </div>
                <div class="u-form-email u-form-group">
                  <label for="email-26a4" class="u-label">New Password</label>
                  <input type="text" placeholder="Enter new password" id="newPassword" name="newPassword" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-14 u-white" required="">
                </div>
                <div class="u-form-group u-form-name u-form-group-3">
                  <label for="name-7b4c" class="u-label">Confirm Password</label>
                  <input type="text" placeholder="Confirm your password" id="confirmPassword" name="confirmPassword" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-14 u-white" required="">
                </div>
                <div class="u-align-left u-form-group u-form-submit">
					<input type="submit" value="Reset Password" name="changePassBtn"  class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-custom-color-7 u-radius-9 u-btn-1">
                  <input type="submit" value="submit" class="u-form-control-hidden">
                </div>
                <div class="u-form-send-message u-form-send-success"> Thank you! Your message has been sent. </div>
                <div class="u-form-send-error u-form-send-message"> Unable to send your message. Please fix errors then try again. </div>
                <input type="hidden" value="" name="recaptchaResponse">
                <input type="hidden" name="formServices" value="7d48ca7ec6ce701fb44c3e8db8247a58">
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    <footer class="u-align-center u-clearfix u-footer u-footer u-grey-80" id="sec-edf8"><div class="u-block-73da-29 u-clearfix u-sheet u-sheet-1"></div></footer>
    <section class="u-backlink u-clearfix u-grey-80">
      <a class="u-link" href="https://nicepage.com/website-templates" target="_blank">
        <span>Website Templates</span>
      </a>
      <p class="u-text">
        <span>created with</span>
      </p>
      <a class="u-link" href="" target="_blank">
        <span>Website Builder Software</span>
      </a>. 
    </section>
  
</body></html>