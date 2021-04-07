<?php 
  include 'Includes/_dbconnect.php';
  $showAlert=false;
  $trans_id = $_GET['id'];
  $sql = "SELECT * FROM `users` WHERE transaction_id=$trans_id";
  $result = mysqli_query($conn,$sql); 

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $trans_to = $_POST['trans_to'];
      $amount = $_POST['amount'];
      if($amount>0){
          $sqlFrom = "SELECT * FROM `users` WHERE transaction_id=$trans_id";
          $resultFrom = mysqli_query($conn,$sqlFrom);
          while($rowFrom = mysqli_fetch_assoc($resultFrom)){
              $new_balance_from = $rowFrom['balance'] - $amount;
              $init = $rowFrom['balance'];
          }
          $sqlTo = "SELECT * FROM `users` WHERE transaction_id=$trans_to";
          $resultTo = mysqli_query($conn,$sqlTo);
          while($rowTo = mysqli_fetch_assoc($resultTo)){
              $new_balance_to = $rowTo['balance'] + $amount;
          }
          $update_to = "UPDATE `users` SET `balance` = '$new_balance_to' WHERE `users`.`transaction_id` = $trans_to";
          $updateToQuery  = mysqli_query($conn,$update_to);
          $update_from = "UPDATE `users` SET `balance` = '$new_balance_from' WHERE `users`.`transaction_id` = $trans_id";
          $updateFromQuery = mysqli_query($conn,$update_from);

          $trans_data = "INSERT INTO `transactions` (`sender`, `receiver`, `datetime`, `amount`, `initial_balance`) VALUES ('$trans_id', '$trans_to', current_timestamp(), '$amount', '$init')";
          $transQuery = mysqli_query($conn,$trans_data);
          if($transQuery){
            $last_id = $conn->insert_id;
            header("Location: receipt.php?recId=$last_id&alert=true");
          }
      }
      else{
        header("Location: transfer.php?id=$trans_id&err=true");
    }
  }
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="Css/customers.css">
    <link rel="stylesheet" href="Css/transfer.css">
    <title>BS | Transfer</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" />
</head>

<body <?php 
   if(isset($_GET['err']) && $_GET['err']=="true"){
	   echo 'onload="myFun()"';
   }
?>>
    <div class="main">
        <?php include 'Includes/_header.php'; ?>
    </div>
    <div class="container text-center">
        <div class="row heading">
            <b><h1>Transfer Amount<br><hr></h1></b>
        </div>
    </div>
    <div class="container my-1">
        <div class="container">
            <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">Transaction ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email Id</th>
                    <th scope="col">Account Balance</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  while($row = mysqli_fetch_assoc($result)){
                    $id = $row['transaction_id'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $balance = $row['balance'];
                    echo '<tr>
                    <th scope="row">'.$id.'</th>
                    <td>'.$name.'</td>
                    <td>'.$email.'</td>
                    <td>'.$balance.'</td>
                  </tr>';
                  }
                  ?>
                </tbody>
              </table>
              <br><br><br><br>
            <?php
            $trans_id = $_GET['id'];
            $sql = "SELECT * FROM `users` WHERE transaction_id=$trans_id";
            $result = mysqli_query($conn,$sql); 
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['transaction_id'];
                $name = $row['name'];
                $email = $row['email'];
                $balance = $row['balance'];
                if($balance>=100){
                    echo '<form action="transfer.php?id='.$id.'" method="post">
                    <div class="form-group">
                        <label for="trans_to">Transfer Amount To</label>
                        <select class="form-control" id="trans_to" name="trans_to">';
                        $sql1 = "SELECT * FROM `users` WHERE transaction_id!=$trans_id";
                        $result1 = mysqli_query($conn, $sql1);
                        while($row1 = mysqli_fetch_assoc($result1)){
                            echo '<option value="'.$row1['transaction_id'].'">'.$row1['name'].'</option>';
                        }
                    echo '</select>
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount to be Transferred</label>
                        <input type="number" class="form-control" id="amount" name="amount">
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Transfer Amount</button>
                    </div>
                </form>';
                }
                else{
                    echo '<div class="alert alert-secondary" role="alert">
                    <b><h4 class="alert-heading text-danger">Transaction Not Possible !</h4></b>
                    <p>Balance in your Account is less than 100 hence, transaction is not possible . </p>
                    <hr>
                    <p class="mb-0">CURRENT BALANCE : '.$balance.'</p>
                  </div>';
                }
            }
            ?>
        </div>
    </div>
    <?php include 'Includes/_footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script>
      function myFun(){
        swal({
		title: "Invalid amount !",
		text: "Please enter valid amount to transfer !",
		icon: "warning",
		button: "Ok",
	    });
      }
    </script>
</body>

</html>