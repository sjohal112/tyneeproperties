<?php
if (isset($_POST['Postcode']) && isset($_POST['BuildingNameNumber']) && isset($_POST['Street']) && isset($_POST['Address2']) && isset($_POST['Town']) && isset($_POST['County']) && isset($_POST['Type']) && isset($_POST['Ownership']) && isset($_POST['Lease']) && isset($_POST['Floors'])) {
    require("lib.php");
 
    $Postcode = $_POST['Postcode'];
	$BuildingNameNumber = $_POST['BuildingNameNumber'];
	$Street = $_POST['Street'];
	$Address2 = $_POST['Address2'];
	$Town = $_POST['Town'];
	$County = $_POST['County']; 
	$Type = $_POST['Type']; 
	$Ownership = $_POST['Ownership']; 
	$Lease = $_POST['Lease']; 
	$Floors = $_POST['Floors'];
 
    $object = new CRUD();
	
	//$object->Create('sa1', '21', 'Maes Collen', 'Morriston', 'Swansea', 'Swansea', 2, 2, 2, 2); 
    $object->Create($Postcode, $BuildingNameNumber, $Street, $Address2, $Town, $County, $Type, $Ownership, $Lease, $Floors);
}
?>



