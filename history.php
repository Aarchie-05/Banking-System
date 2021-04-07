<?php
include 'Includes/_dbconnect.php';
$sql = "SELECT * FROM `transactions`";
$result = mysqli_query($conn,$sql);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="Css/customers.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" />
    <title>BS | Users</title>
</head>

<body>
    <div class="main">
        <?php include 'Includes/_header.php'; ?>
    </div>
    <div class="container text-center">
        <div class="row heading">
            <b><h1>Transaction History<br><hr></h1></b>
        </div>
        <div class="row history">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">SNo</th>
                    <th scope="col">Sender</th>
                    <th scope="col">Receiver</th>
                    <th scope="col">Date of Transaction</th>
                    <th scope="col">Amount Transferred</th>
                    <th scope="col">Transaction Details</th>
                  </tr>
                </thead>
                <tbody>
                <?php
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
                    $date = $row['datetime'];
                    echo '<tr>
                    <th scope="row">'.$row['sno'].'</th>
                    <td>'.$from_name.'</td>
                    <td>'.$to_name.'</td>
                    <td>'.$date.'</td>
                    <td>'.$amount.'</td>
                    <td><a href="receipt.php?recId='.$row['sno'].'"><button type="button" class="btn btn-outline-secondary">View Details</button></a></td>
                  </tr>';
                }
                ?>
                </tbody>
              </table>
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
</body>

</html>