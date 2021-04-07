<?php
echo '<nav class="navbar navbar-expand-lg navbar-dark">
<a href="#"><img class="navbar-brand logo" src="Images/logo (1).png" alt="" height="70px" width="60px" style="margin-left: 1rem"></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link text-dark" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark" href="user.php">Create User</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark" href="customers.php">View Customers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark" href="transaction.php">Transfer Money</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark" href="history.php">Transaction History</a>
        </li>
    </ul>
</div>
</nav>';
?>