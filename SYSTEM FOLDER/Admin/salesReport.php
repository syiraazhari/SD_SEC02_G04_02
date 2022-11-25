<?php
include 'components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:Login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />


		<!-- Favicon -->
		<link rel="icon" href="Picture3.gif" type="image/x-icon" />

		<!-- Invoice styling -->
		<style>
			body {
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				text-align: center;
				color: #777;
			}

			body h1 {
				font-weight: 300;
				margin-bottom: 0px;
				padding-bottom: 0px;
				color: #000;
			}

			body h3 {
				font-weight: 300;
				margin-top: 10px;
				margin-bottom: 20px;
				font-style: italic;
				color: #555;
			}

			body a {
				color: #06f;
			}

			.invoice-box {
				max-width: 650px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {				
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}
			button{
			background:#333;
			color:#fff;
			font-size: 20px;
			border-radius: 14px;
			margin-top:20px;
			padding: 1rem 3rem;
			cursor: pointer;
		}

		button:hover{
				background: #fff;
				color: #0d0d0d;
		}

		</style>
	</head>

	<body>
	
	<div ><a href="personalInfo.html" id="menu" class="fa-solid fa-angles-left"></a></div>
		<h1></h1>
		<h3></h3>
		<br /><br /><br />

		<div class="invoice-box">
			<table>
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="images/Picture3.gif" alt="Company logo" style="width: 80px; max-width: 80px" />
									<h4 style="margin-left:100px;margin-top:-65px;font-size:30px;">Big Galleys cafe</h4>
								</td>
							
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
								<h4 >Big Galleys cafe</h4>
									Universiti Tenologi Malaysia,<br />
									54000 Lumpur,<br />
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="details">
					
				</tr>
				<tr class="heading">
					<td style="width:100px;">ID</td>
					<td style="width:500px;">Item</td>
					<td style="width:90px;">Price</td>
					<td style="width: 100px;">Quantity</td>
				</tr>
<?php
                                    $grand_total = 0;
									  $select_orders = $conn->prepare("SELECT * FROM `cart_reports`");
									  $select_orders->execute();
									  if($select_orders->rowCount() > 0){
										 while($fetch_carts = $select_orders->fetch(PDO::FETCH_ASSOC)){
											
											$i = $fetch_carts['id'];
                                            $n = $fetch_carts['name'];
                                            $p = $fetch_carts['price'];
                                            $q = $fetch_carts['quantity'];
										 $t = $fetch_carts['total'];
									?>
				

				<tr class="item">
				<td><?= $i; ?></td>
					<td style="text-align: left;"><?= $n; ?></td>
					<td >RM<?= $p;?></td>
					<td><?= $q;?></td>
					<td></td>
				</tr>
				<tr class="total">
					<td></td>
						<?php
                               $seluruh[] = $fetch_carts['total'];

										}
								$semua = array_sum($seluruh);                                  


									   }

							  ?>
					<td>Total: RM<?= $semua;?></td>
				</tr>
			</table>
		</div>
		<button class ="print">Print CV</button>	
	<script>
		var btn = document.querySelector(".print");
		btn.onclick=() =>{
			window.print();
		}
	</script>
	</body>
</html>