<?php
	include('connect_dwo.php');

	$output= array();

	$sql = "SELECT * FROM vendor";
	$totalQuery = mysqli_query($conn,$sql);
	$count_all_rows = mysqli_num_rows($totalQuery);

	$columns = array(
		0 => 'VendorID',
		1 => 'AccountNumber',
		2 => 'Name',
		3 => 'AddressID',
		4 => 'City',
		5 => 'StateProvinceID',
		6 => 'PostalCode',
	);

	if(isset($_POST['search']['value'])){
		$search_value = $_POST['search']['value'];
		$sql .= " WHERE VendorID like '%".$search_value."%'";
		$sql .= " OR AccountNumber like '%".$search_value."%'";
		$sql .= " OR Name like '%".$search_value."%'";
		$sql .= " OR AddressID like '%".$search_value."%'";
		$sql .= " OR City like '%".$search_value."%'";
		$sql .= " OR StateProvinceID like '%".$search_value."%'";
		$sql .= " OR PostalCode like '%".$search_value."%'";
	}

	if(isset($_POST['order'])){
		$column_name = $_POST['order'][0]['column'];
		$order = $_POST['order'][0]['dir'];
		$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
	} else{
		$sql .=" ORDER BY VendorID DESC";
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
		$sub_array[] = $row['VendorID'];
		$sub_array[] = $row['AccountNumber'];
		$sub_array[] = $row['Name'];
		$sub_array[] = $row['AddressID'];
		$sub_array[] = $row['City'];
		$sub_array[] = $row['StateProvinceID'];
		$sub_array[] = $row['PostalCode'];
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

