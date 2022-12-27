<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store page</title>
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
<?php
        include 'connect_dwo.php';

        $query = mysqli_query($conn, 'SELECT count(OrderQty) as count FROM fact_sales');
        $row = mysqli_fetch_array($query);

        $query2 = mysqli_query($conn, 'SELECT count(ReceivedQty) as count FROM fact_purchase');
        $row2 = mysqli_fetch_array($query2);

        $query3 = mysqli_query($conn, 'SELECT count(CustomerID) as count FROM store');
        $row3 = mysqli_fetch_array($query3);

        $query4 = mysqli_query($conn, 'SELECT count(ProductID) as count FROM product');
        $row4 = mysqli_fetch_array($query4);

        $query5 = mysqli_query($conn, 'SELECT count(VendorID) as count FROM vendor');
        $row5 = mysqli_fetch_array($query5);
    ?>
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
                        <li class="sidebar-item  active">
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
                        <li class="sidebar-item  ">
                            <a href="vendor.php" class='sidebar-link'>
                                <i class="bi bi-building"></i>
                                <span>Vendor</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="orderqty.php" class='sidebar-link'>
                                <i class="bi bi-cart"></i>
                                <span>Order Quantity</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="receivedqty.php" class='sidebar-link'>
                                <i class="bi bi-pencil-fill"></i>
                                <span>Received Quantity</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
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
    <div class="d-flex justify-content-around row">
                            <div class="col-6 col-lg-12 col-md-6">
                                <div class="card" style="background-color: #04d183;">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row" style="padding-left: 160px;">
                                            <div class="col-md-4">
                                            <div class="stats-icon" style="background-color: #1eeb9c;">
                                                    <i class="fa-solid fa-store"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="font-semibold" style="color: white;">Store</h6>
                                                <h6 class="font-extrabold mb-0" style="color: white;"><?php echo $row3['count'];?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    </div>
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Store Table</h3>
                            <p class="text-subtitle text-muted">All data in store table</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Store</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="datatables">
                                <thead>
                                    <tr>
                                    <th>CustomerID</th>
                                    <th>Name</th>
                                    <th>SalesPersonID</th>  
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>                
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
<!--baru-->
<script src="assets/js/jquery-3.6.1.min.js" ></script>
<script src="assets/js/jquery.min.js" ></script>
<script src="assets/DataTables/DataTables-1.13.1/js/jquery.dataTables.min.js" ></script>
<script src="assets/DataTables/DataTables-1.13.1/js/dataTables.bootstrap5.min.js" ></script>

<script src="assets/DataTables/Buttons-2.3.3/js/dataTables.buttons.min.js" > </script>
<script src="assets/DataTables/Buttons-2.3.3/js/buttons.bootstrap5.min.js" > </script>
<script src="assets/DataTables/JSZip-2.5.0/jszip.min.js" > </script>
<script src="assets/DataTables/pdfmake-0.1.36/pdfmake.min.js"> </script>
<script src="assets/DataTables/pdfmake-0.1.36/vfs_fonts.js" > </script>
<script src="assets/DataTables/Buttons-2.3.3/js/buttons.html5.min.js" > </script>
<script src="assets/DataTables/Buttons-2.3.3/js/buttons.print.min.js" > </script>
<script src="assets/DataTables/Buttons-2.3.3/js/buttons.colVis.min.js" > </script>


    <script type="text/javascript">
    $(document).ready(function(){
      $('#datatables').DataTable({
            "fnCreatedRow": function(nRow, aData, iDataIndex) {
              $(nRow).attr('id', aData[0]);
              },
              'serverSide': 'true',
              'processing': 'true',
              'paging': 'true',
              'order': [],
              'ajax': {
                'url': 'fetch_data_store.php',
                'type': 'post',
              },
              "aoColumnDefs": [{
                  'aTargets': [2], 
                  'orderable': true,
                }], 
              lengthMenu:[
                [10,25,50,100,-1],
                [10,25,50,100,"All"]
              ]
          });
    });
</script>
</body>
</html>