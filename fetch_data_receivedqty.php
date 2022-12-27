<?php
	include('connect_dwo.php');

	$output= array();

	$sql = "SELECT * FROM fact_purchase";
	$totalQuery = mysqli_query($conn,$sql);
	$count_all_rows = mysqli_num_rows($totalQuery);

	$columns = array(
		0 => 'ProductID',
		1 => 'ShipMethodID',
		2 => 'VendorID',
		3 => 'ReceivedQty',
		4 => 'time_id',
	);

	if(isset($_POST['search']['value'])){
		$search_value = $_POST['search']['value'];
		$sql .= " WHERE ProductID like '%".$search_value."%'";
		$sql .= " OR ShipMethodID like '%".$search_value."%'";
		$sql .= " OR VendorID like '%".$search_value."%'";
		$sql .= " OR ReceivedQty like '%".$search_value."%'";
		$sql .= " OR time_id like '%".$search_value."%'";
	}

	if(isset($_POST['order'])){
		$column_name = $_POST['order'][0]['column'];
		$order = $_POST['order'][0]['dir'];
		$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
	} else{
		$sql .=" ORDER BY ProductID DESC";
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
		$sub_array[] = $row['ProductID'];
		$sub_array[] = $row['ShipMethodID'];
		$sub_array[] = $row['VendorID'];
		$sub_array[] = $row['ReceivedQty'];
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

