<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link href="assets/vendors/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/d5704e3023.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" >
    <link rel="stylesheet" href="assets/DataTables/DataTables-1.13.1/css/dataTables.bootstrap5.min.css" >
    <link rel="stylesheet" href="assets/DataTables/Buttons-2.3.3/css/buttons.bootstrap5.min.css" >
</head>
<body>
<div id="app">
<div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.php"><i class="fa-solid fa-database"></i>   Warehouse</a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
            <div class="sidebar-menu bg">
            <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item">
                            <a href="index.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="store.php" class='sidebar-link'>
                                <i class="bi bi-shop"></i>
                                <span>Store</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="product.php" class='sidebar-link'>
                                <i class="bi bi-archive"></i>
                                <span>Product</span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="vendor.php" class='sidebar-link'>
                                <i class="bi bi-building"></i>
                                <span>Vendor</span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="orderqty.php" class='sidebar-link'>
                                <i class="bi bi-cart"></i>
                                <span>Order Quantity</span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="receivedqty.php" class='sidebar-link'>
                                <i class="bi bi-pencil-fill"></i>
                                <span>Received Quantity</span>
                            </a>
                        </li>
                        <li class="sidebar-item active ">
                            <a href="olap.php" class='sidebar-link'>
                                <i class="bi bi-box"></i>
                                <span>Olap</span>
                            </a>
                        </li>
            </ul>
            </div>
        </div>
    </div>
    <div id="main">
    <div class="d-flex row">
                            <div class="col-6 col-lg-12 col-md-6">
                                <div class="card" style="background-color: #fc8803;">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row" style="padding-left: 160px;">
                                            <div class="col-md-4">
                                            <div class="stats-icon" style="background-color: #fa9f37;">
                                                    <i class="fa-solid fa-box-open"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="font-extrabold" style="color: white;">OLAP</h6>

                                                <h6 class="font-semibold mb-0" style="color: white;">Online Analytical Processing</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    </div>

    
    <div class="container">
        <iframe name="mondrian" src="http://localhost:8080/mondrian/" style="height: 600px; width:100%; border:none; background-color: none;" ></iframe>       
    </div>
    
</div>
</div>
<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>
    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js" ></script>
</body>
</html>