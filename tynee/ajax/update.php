<?php
if (isset($_POST)) {
    require 'lib.php';
 
    $PropID = $_POST['PropID'];
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
 
    $object->Update($Postcode, $BuildingNameNumber, $Street, $Address2, $Town, $County, $Type, $Ownership, $Lease, $Floors, $PropID);
}
?>



