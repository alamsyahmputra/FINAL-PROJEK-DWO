<?php
	include('connect_dwo.php');

	$output= array();

	$sql = "SELECT * FROM fact_sales";
	$totalQuery = mysqli_query($conn,$sql);
	$count_all_rows = mysqli_num_rows($totalQuery);

	$columns = array(
		0 => 'CustomerID',
		1 => 'ProductID',
		2 => 'ShipMethodID',
		3 => 'OrderQty',
		4 => 'time_id',
	);

	if(isset($_POST['search']['value'])){
		$search_value = $_POST['search']['value'];
		$sql .= " WHERE CustomerID like '%".$search_value."%'";
		$sql .= " OR ProductID like '%".$search_value."%'";
		$sql .= " OR ShipMethodID like '%".$search_value."%'";
		$sql .= " OR OrderQty like '%".$search_value."%'";
		$sql .= " OR time_id like '%".$search_value."%'";
	}

	if(isset($_POST['order'])){
		$column_name = $_POST['order'][0]['column'];
		$order = $_POST['order'][0]['dir'];
		$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
	} else{
		$sql .=" ORDER BY CustomerID DESC";
	}

	if($_POST['length'] != -1)
	{
		$start = $_POST['start'];
		$length = $_POST['length'];
		$sql .= " LIMIT  ".$start.", ".$length;
	}	

	$query = mysqli_query($conn,$sql);
	$count_rows = mysqli_num_rows($query);
	$data = array();
	while($row = mysqli_fetch_assoc($query)){
		$sub_array = array();
		$sub_array[] = $row['CustomerID'];
		$sub_array[] = $row['ProductID'];
		$sub_array[] = $row['ShipMethodID'];
		$sub_array[] = $row['OrderQty'];
		$sub_array[] = $row['time_id'];
		$data[] = $sub_array;
	}

	$output = array(
		'data'=>$data,
		'draw'=>intval($_POST['draw']),
		'recordsTotal'=>$count_rows,
		'recordsFiltered'=>$count_all_rows,
	);

	echo json_encode($output);

?> 

