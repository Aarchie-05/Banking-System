<?php 
    include 'Includes/_dbconnect.php';
 ?>
 <?php
    $showError = "false";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include 'Includes/_dbconnect.php';
        $name = $_POST['name'];
        $email = $_POST['email'];
        $balance = $_POST['balance'];

        // checking if the account already exists
        $existSql = "SELECT * FROM `users` WHERE email='$email'";
        $result = mysqli_query($conn,$existSql);
        $numRows = mysqli_num_rows($result);
        if($numRows>0){
            $showError = "Email already exists.";
        }
        else{
            $sql = "INSERT INTO `users` (`name`, `email`, `balance`, `timestamp`) VALUES ('$name', '$email', '$balance', current_timestamp())";
            $result = mysqli_query($conn,$sql);
            if($result){
                $showAlert = true;
                header('Location: index.php?createdSuccess=true');
                exit;
            }
        }
        header("Location: index.php?createdSuccess=false&error=$showError");
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
    <link rel="stylesheet" href="Css/user.css">
    <title>BS | Create User</title>
</head>

<body>
    <div class="main">
        <?php include 'Includes/_header.php'; ?>
    </div>
    <div class="container my-1">
        <div class="container account">
            <div class="log">
                <h2>Create a New User Account</h2>
                <form action="user.php" method="post">
                  <div class="input-cont">
                    <input type="text" id="name" aria-describedby="emailHelp" name="name" onblur="myFun()">
                    <label for="name" class="blur">Name</label>
                    <div class="border1"></div>
                  </div>
                  <div class="input-cont">
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                    <label for="email">Email Id</label>
                    <div class="border2"></div>
                  </div>
                  <div class="input-cont">
                    <input type="number" id="balance" aria-describedby="emailHelp" name="balance">
                    <label for="balance">Account Balance</label>
                    <div class="border1"></div>
                  </div>
                  <div class="clear"></div>
                  <input type="submit" value="Create User">   
                </form>
            </div>
        </div>
    </div>
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
            document.getElementByClassName("blur").style.color="white";
        }
    </script>
</body>

</html>