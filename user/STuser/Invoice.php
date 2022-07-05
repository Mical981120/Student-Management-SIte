<?php 
      include 'settings.php';
      include 'function.php';
      include_once("config.php");
      
      $id = $_GET['id'];
	  
	  //selecting data associated with this particular id
	  $result = mysqli_query($mysqli, "SELECT * FROM paymentrecords WHERE id=$id");
	  
	  while($res = mysqli_fetch_array($result))
	  {
	  $login = $res['login'];
	  $MID = $res['MID'];
	  $Amount = $res['Amount'];
	  $Pmethod = $res['Pmethod'];
	  $PaymentDate = $res['PaymentDate'];
	  $Month = $res['Month'];
      $Status = $res['Status'];
      
      
	  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Invoice Template Design</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>

<div class="wrapper">
	<div class="invoice_wrapper">
		<div class="header">
			<div class="logo_invoice_wrap">
				<div class="logo_sec">
					<img src="codingboss.png" alt="code logo">
					<div class="title_wrap">
						<p class="title bold">ABC Institute</p>
						<p class="sub_title">Privite Limited</p>
					</div>
				</div>
				<div class="invoice_sec">
                <a class='deletebtn' href="STpaymentrecords.php">Close</a>
					<p class="invoice bold">INVOICE</p>
					<p class="invoice_no">
						<span class="bold">Invoice</span>
						<span><?php echo $MID;?></span>
					</p>
					<p class="date">
						<span class="bold">Date</span>
						<span><?php echo $PaymentDate;?></span>
					</p>
				</div>
			</div>
			<div class="bill_total_wrap">
				<div class="bill_sec">
					<p>Bill To</p> 
	          		<p class="bold name"><?php $ufunc->UserName(); //Show name who is in session user?></p>
			        <span>
                    <?php $ufunc->UserAddress(); //Show name who is in session user?><br/>
                    <?php $ufunc->UserMobile(); //Show name who is in session user?><br/>
                    <?php $ufunc->UserEmail(); //Show name who is in session user?>
                    <input type="hidden" name="id" value=<?php echo $_GET['id'];?>><br>
			        </span>
				</div>
				<div class="total_wrap">
					<p>Total Due</p>
	          		<p class="bold price">Rs: <?php echo $Amount;?></p>
				</div>
			</div>
		</div>
		<div class="body">
			<div class="main_table">
				<div class="table_header">
					<div class="row">
						<div class="col col_no">NO.</div>
						<div class="col col_des">DESCRIPTION</div>
						<div class="col col_price">PRICE</div>
						<div class="col col_qty">STATUS</div>
						<div class="col col_total">TOTAL</div>
					</div>
				</div>
				<div class="table_body">
					<div class="row">
						<div class="col col_no">
							<p><?php echo $id;?></p>
						</div>
						<div class="col col_des">
							<p class="bold"><?php echo $Month;?></p>
							<p><?php echo $login;?></p>
						</div>
						<div class="col col_price">
							<p><?php echo $Amount;?></p>
						</div>
						<div class="col col_qty">
							<p><?php echo $Status;?></p>
						</div>
						<div class="col col_total">
							<p><?php echo $Amount;?></p>
						</div>
					</div>
					
					
					
					
				</div>
			</div>
			<div class="paymethod_grandtotal_wrap">
				<div class="paymethod_sec">
					<p class="bold">Payment Method</p>
					<p><?php echo $Pmethod;?></p>
				</div>
				<div class="grandtotal_sec">
			        <p class="bold">
			            <span>SUB TOTAL</span>
			            <span><?php echo $Amount;?></span>
			        </p>
			        <p>
			            <span></span>
			            <span></span>
			        </p>
			        <p>
			            <span></span>
			            <span></span>
			        </p>
			       	<p class="bold">
			            <span>Grand Total</span>
			            <span><?php echo $Amount;?></span>
			        </p>
				</div>
			</div>
		</div>
		<div class="footer">
			<p>Thank you and Best Wishes</p>
			<div class="terms">
		        <p class="tc bold">Terms & Coditions</p>
		        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit non praesentium doloribus. Quaerat vero iure itaque odio numquam, debitis illo quasi consequuntur velit, explicabo esse nesciunt error aliquid quis eius!</p>
		    </div>
		</div>
	</div>
</div>


</body>
</html>