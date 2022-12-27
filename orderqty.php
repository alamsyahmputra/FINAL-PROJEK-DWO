<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
                        <li class="sidebar-item  active">
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
                                <div class="card" style="background-color: #a76bfa;">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row" style="padding-left: 160px;">
                                            <div class="col-md-4">
                                            <div class="stats-icon" style="background-color: #b988fc;">
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="font-semibold" style="color: white;">Order Quantity</h6>
                                                <h6 class="font-extrabold mb-0" style="color: white;"><?php echo number_format($row['count'], 0, ".", ",");?></h6>
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
                            <h3>Order Quantity</h3>
                            <p class="text-subtitle text-muted">All data in order quantity table</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Order</li>
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
                                    <th>ProductID</th>
                                    <th>ShipMethodID</th>
                                    <th>Order Quantity</th>
                                    <th>TimeID</th>    
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>  
            <!-- Content Row -->

            <div class="row">

<!-- Area Chart -->
<div class="col-xl-8 col-lg-8">
    <div class="card shadow mb-4">
        <!-- Card Header -->
        <div class="card-header py-5 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Jumlah Customer Per Bulan</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
                <canvas id="myAreaChart"></canvas>
            </div>
        </div>
    </div>
</div>
 <!-- doughnut Chart -->
 <div class="col-xl-4 col-lg-5">
                        <div class="card shadow mb-4">
                            <!-- Card Header-->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Customer Dengan Order Terbanyak</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-pie pt-4 pb-2">
                                    <canvas id="myPieChart"></canvas>
                                </div>
                                <div class="mt-4 text-center small">
                                    <?php
                                    include 'connect_dwo.php';

                                        // Pemanggilan Data untuk Donut Chart
                                        $produk = mysqli_query($conn, "SELECT DISTINCT(customerid), Sum(orderqty) AS jumlah FROM fact_sales GROUP BY customerid ORDER BY jumlah DESC limit 10");
                                        while ($data = mysqli_fetch_array($produk)) {
                                            $sql = mysqli_query($conn, "SELECT s.name AS name, Sum(f.orderqty) AS jumlah FROM store s JOIN fact_sales f ON f.customerid=s.customerid WHERE f.customerid='" . $data['customerid'] . "'"."GROUP BY name ORDER BY jumlah DESC limit 10");
                                            $data = $sql->fetch_array();
                                            $name[] = $data['name'];
                                            $jumlah[]=$data['jumlah'];
                                        }

                                    
                                    ?>
                                    
                                    <!--<span class="mr-2">
                                        <i class="fas fa-circle" style="color: #d94f00;"></i> <?php echo $name[0]; ?>
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle" style="color: #d9c300;"></i> <?php echo $name[1]; ?>
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle" style="color: #94d900;"></i> <?php echo $name[2]; ?>
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle" style="color: #00d953;"></i> <?php echo $name[3]; ?>
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle" style="color: #00d9c7;"></i> <?php echo $name[4]; ?>
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle" style="color: #0028d9;"></i> <?php echo $name[5]; ?>
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle" style="color: #8900d9;"></i> <?php echo $name[6]; ?>
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle" style="color: #8900d9;"></i> <?php echo $name[7]; ?>
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle" style="color: #d90033;"></i> <?php echo $name[8]; ?>
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle" style="color: #969696;"></i> <?php echo $name[9]; ?>
                                    </span>-->
                                </div>
                            </div>
                        </div>
                    </div>
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
    <script src="assets/vendors/chartjs/Chart.min.js"></script>
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
                'url': 'fetch_data_orderqty.php',
                'type': 'post',
              },
              "aoColumnDefs": [{
                  'aTargets': [4], 
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
<?php
    // Connect ke Database
    include 'connect_dwo.php';

    

    // Pemanggilan Data untuk Line Chart
    $i = 1;
    $query_bulan = mysqli_query($conn, "SELECT CONCAT(MONTHNAME(t.tanggallengkap), ' ', YEAR(t.tanggallengkap)) bulan FROM fact_sales f JOIN time t ON f.Time_ID=t.time_id GROUP BY t.bulan ORDER BY t.tanggallengkap");
    $jumlah_bulan = mysqli_num_rows($query_bulan);
    $chart_bulan = "";
    while ($row = mysqli_fetch_array($query_bulan)) {
        if ($i < $jumlah_bulan) {
            $chart_bulan .= '"';
            $chart_bulan .= $row['bulan'];
            $chart_bulan .= '",';
            $i++;
        } else {
            $chart_bulan .= '"';
            $chart_bulan .= $row['bulan'];
            $chart_bulan .= '"';
        }
    }
    $a = 1;
    $query_customer = mysqli_query($conn, "SELECT COUNT(f.customerid) as customer FROM fact_sales f JOIN time t ON f.time_id=t.time_id GROUP BY t.bulan ORDER BY t.tanggallengkap");
    $jumlah_customer = mysqli_num_rows($query_customer);
    $chart_customer = "";
    while ($row1 = mysqli_fetch_array($query_customer)) {
        if ($a < $jumlah_customer) {
            $chart_customer .= $row1['customer'];
            $chart_customer .= ',';
            $a++;
        } else {
            $chart_customer .= $row1['customer'];
        }
    }

    ?>

    <script>
        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        // line Chart Script
        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [<?php echo $chart_bulan; ?>],
                datasets: [{
                    label: "Jumlah Customer",
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointBorderColor: "rgba(78, 115, 223, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: [<?php echo $chart_customer; ?>],
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ':' + number_format(tooltipItem.yLabel);
                        }
                    }
                }
            }
        });

        // doughnut Chart Script
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: "doughnut",
            data: {
                labels: <?php echo json_encode($name); ?>,
                datasets: [{
                    data: <?php echo json_encode($jumlah); ?>,
                    backgroundColor: ["#d94f00", "#d9c300", "#94d900", "#00d953",
                    "#00d9c7 ", "#0028d9 ", "#8900d9", "#d90033", "#969696 ", "#ff26ac"],
                    hoverBackgroundColor: ["#fa8948", "#f7e439", "#bef743", "#4af78c", "#52faec",
                    "#4e6efc", "#bd4dff", "#ff4773","black","#ff1c4d"],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }, ],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: "#dddfeb",
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false,
                },
                cutoutPercentage: 80,
            },
        });
    </script>


</html>