<?php
$showError = "false";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '_dbconnect.php';
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
            header('Location: /Banking%20System/index.php?createdSuccess=true');
            exit;
        }
    }
    header("Location: /Banking%20System/index.php?createdSuccess=false&error=$showError");
}
?>