<?php
  include 'Includes/_dbconnect.php';
  if(isset($_GET['recId'])){
	  $id = $_GET['recId'];
  }
  $sql = "SELECT * FROM `transactions` WHERE sno=$id";
  $result = mysqli_query($conn,$sql);
  while($row=mysqli_fetch_assoc($result)){
	  // getting sender's data
	  $from_id = $row['sender'];
	  $sqlFrom = "SELECT * FROM `users` WHERE transaction_id=$from_id";
      $resultFrom = mysqli_query($conn,$sqlFrom);
      while($rowFrom = mysqli_fetch_assoc($resultFrom)){
		  $from_name = $rowFrom['name'];
      }

	  // getting receiver's data
	  $to_id = $row['receiver'];
	  $sqlTo = "SELECT * FROM `users` WHERE transaction_id=$to_id";
      $resultTo = mysqli_query($conn,$sqlTo);
      while($rowTo = mysqli_fetch_assoc($resultTo)){
		  $to_name = $rowTo['name'];
      }
	  
	  // getting other data
	  $amount = $row['amount'];
	  $init = $row['initial_balance'];
	  $date = $row['datetime'];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BS | Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="Css/receipt.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" />
</head>
<body <?php 
   if(isset($_GET['alert']) && $_GET['alert']=="true"){
	   echo 'onload="myFun()"';
   }
?>>
    <a href="index.php"><img src="Images/left-arrow.png" class="back" data-toggle="tooltip" data-placement="right" title="Go Back!"></a>
<h1 class="page-title">Transaction Details</h1>

<article class="receipt">
    <?php
		echo '<section class="receipt__half upper">
		<p>Amount Transferred</p>
		<h1>'.$amount.'</h1>
		<p>Date Time of Transaction</p>
		<h3>'.$date.'</h3>
		
		<div class="receipt__content">
			<table>
				<tbody>
					<tr>
						<td>Transaction ID</td>
						<td>'.$from_id.'</td>
					</tr>
					<tr>
						<td>Account Holder</td>
						<td>'.$from_name.'</td>
					</tr>
					<tr>
						<td>Initial Balance</td>
						<td>'.$init.'</td>
					</tr>
					<tr>
						<td>Transferred to</td>
						<td>'.$to_name.'</td>
					</tr>
				</tbody>
			</table>
		</div>
	</section>';
	?>
	<section class="receipt__half lower">
		<button>More info</button>
	</section>
</article>
<script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();   
    });
</script>
<script>
  function myFun(){
	swal({
		title: "Transaction Successfull!",
		text: "Amount have been transferred successfully !",
		icon: "success",
		button: "Ok",
	});
  }
</script>
<script src="Js/receipt.js"></script>
</body>
</html>