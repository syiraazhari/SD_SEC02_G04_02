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
  <body class="u-body u-xl-mode" data-lang="en"><header class="u-clearfix u-grey-80 u-header u-header" id="sec-202b"><div class="u-align-left u-clearfix u-sheet u-sheet-1"><span class="u-file-icon u-icon u-text-white u-icon-1"><img src="images/1077114-41ae8903.png" alt=""></span>
      </div></header>
    <section class="u-clearfix u-custom-color-10 u-section-1" id="sec-ae5d"></section>
    <section class="u-clearfix u-custom-color-10 u-section-2" id="sec-8353">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-container-style u-expanded-width-xs u-group u-shape-rectangle u-white u-group-1">
          <div class="u-container-layout u-container-layout-1"><span class="u-file-icon u-icon u-text-palette-2-base u-icon-1"><img src="images/6939131-d7c1a53f.png" alt=""></span>
            <h4 class="u-align-center u-custom-font u-font-montserrat u-text u-text-1">Forgot Password</h4>
            <p class="u-align-center u-large-text u-text u-text-variant u-text-2"> Enter your email and we'll send you a link to reset your password</p>
            <div class="u-form u-form-1">
              <form action="Send_Link.php" method="POST"  style="padding: 31px;">
                <div class="u-form-email u-form-group">
                  <label for="email-cf71" class="u-label">Email</label>
                  <input type="email" placeholder="Enter a valid email address" id="email" name="email" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
				  <?php 
				  if (isset($_POST['email'])){
					  echo"<input type='hidden' name='emailSend' value='$email'>";
				}
					
				   
				  ?>
                </div>
				
                <div class="u-align-left u-form-group u-form-submit">
                  <input type="submit" value="submit" name="submit"  class="u-border-none u-btn u-btn-submit u-button-style u-grey-60 u-btn-1">
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