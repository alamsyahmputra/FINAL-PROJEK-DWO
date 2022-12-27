<?php
	include('connect_dwo.php');

	$output= array();

	$sql = "SELECT * FROM store";
	$totalQuery = mysqli_query($conn,$sql);
	$count_all_rows = mysqli_num_rows($totalQuery);

	$columns = array(
		0 => 'CustomerID',
		1 => 'Name',
		2 => 'SalesPersonID',
	);

	if(isset($_POST['search']['value'])){
		$search_value = $_POST['search']['value'];
		$sql .= " WHERE CustomerID like '%".$search_value."%'";
		$sql .= " OR Name like '%".$search_value."%'";
		$sql .= " OR SalesPersonID like '%".$search_value."%'";
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
		$sub_array[] = $row['Name'];
		$sub_array[] = $row['SalesPersonID'];
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

