<?php
	$name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $total_price = $_POST['total_price'];
   
   $rmx100=($total_price*100);
   $some_data = array(
    'userSecretKey'=>'8zrgujiw-lx1n-4gjn-vt1i-oxx1xf813kb7',
    'categoryCode'=>'m431cpmh',
    'billName'=>'Big Galleys Cafe',
    'billDescription'=>'Car Rental WXX123 On Sunday',
    'billPriceSetting'=>0,
    'billPayorInfo'=>1,
    'billAmount'=>$rmx100,
    'billReturnUrl'=>'',
    'billCallbackUrl'=>'http://bizapp.my/paystatus',
    'billExternalReferenceNo' => '',
    'billTo'=>$name,
    'billEmail'=>$email,
    'billPhone'=>$number,
    'billSplitPayment'=>0,
    'billSplitPaymentArgs'=>'',
    'billPaymentChannel'=>'0',
    
  );  

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_URL, 'https://toyyibpay.com/index.php/api/createBill');  
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);
  $result = curl_exec($curl);
  $info = curl_getinfo($curl);  
  curl_close($curl);
  $obj = json_decode($result,true);
  $billcode=$obj[0]['BillCode'];
?>
<!--SEND USER TO TOYYIBPAY PAYMENT-->
<script type="text/javascript">
    //redirect to payment gateway
	<?php
   echo 'window.location.href="https://toyyibpay.com/'.$billcode.'"'; 
   ?>
</script>

