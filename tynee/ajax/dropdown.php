<?php 
if (isset($_POST['TableName']) && isset($_POST['TableName']) != "") {
	require 'lib.php';
	$TableName = $_POST['TableName'];    
	
	$object = new CRUD();
	
	$lookuptypes = $object->Dropdown($TableName);
	echo json_encode($lookuptypes);
}else{
	echo "No Records!";
	 }
?>