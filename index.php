<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>BS | Main</title>
</head>

<body>
    <?php
        if(isset($_GET['createdSuccess']) && $_GET['createdSuccess']=='true'){
            echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
          <strong>Success!</strong> User has been created Successfully !
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }
        if(isset($_GET['error']) && $_GET['error']){
            echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                <strong>Error!</strong> '.$_GET['error'].'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }
    ?>
    <div class="container-fluid main">
        <nav class="navbar navbar-expand-lg navigation navbar-dark">
            <a href="#"><img class="navbar-brand logo" src="Images/logo (1).png" alt=""></a>
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
        </nav>

        <div class="row">
            <div class="col-sm-6 First-sec">
                <h1 class="main-text">Welcome to Heritage Bank.</h1>
                <p style="color: black;">Now transfer money easily.</p>
                <a href="transaction.php"><button type="button" class="btn btn-outline-secondary btn-lg">Transfer
                        Amount</button></a>
                <a href="customers.php"><button type="button" class="btn btn-outline-secondary btn-lg">View
                        Customers</button></a>
            </div>
            <div class="col-lg-6 ">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/slider1.png" class="images-slider" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/slider2.png" class="images-slider" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/slider3.png" class="images-slider" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid features">
        <div class="container" style="padding-top: 8rem; padding-bottom: 8rem;">
            <div class="row text-center py-4 px-5">
                <div class="col-sm-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa fa-shield" aria-hidden="true"
                                    style="font-size: 4rem;"></i></h5>
                            <h6 class="card-subtitle mb-2 text-muted">Secure Banking</h6>
                            <p class="card-text">Secure and safe services are provided.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa fa-desktop" aria-hidden="true"
                                    style="font-size: 4rem;"></i></h5>
                            <h6 class="card-subtitle mb-2 text-muted">Convenient System</h6>
                            <p class="card-text">A convenient and complete financial planning experience.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa fa-check-square" aria-hidden="true"
                                    style="font-size: 4rem;"></i></h5>
                            <h6 class="card-subtitle mb-2 text-muted">Easy Transactions</h6>
                            <p class="card-text">Transactions are easy to handle With this system.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid description text-center"
        style="padding: 3rem; padding-top: 6rem; padding-bottom: 6rem;">
        <div class="container">
            <h1>Welcome to Heritage Bank</h1>
            <h2>An Online Banking system To make your transactions Easy and secure.</h2><br>
            <a href="transaction.php"><button type="button" class="btn btn-outline-secondary btn-lg">Transfer
                    Amount</button></a>
            <a href="customers.php"><button type="button" class="btn btn-outline-secondary btn-lg">View
                    Customers</button></a>
        </div>
    </div>
    <!-- Footer -->
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