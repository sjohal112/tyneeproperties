<?php
if (isset($_POST['PropID']) && isset($_POST['AttID'])) {
    require("lib.php");
 
    $PropID = $_POST['PropID'];
	$AttID = $_POST['AttID'];
	$Att1 = $_POST['Att1'];
	$Att2 = $_POST['Att2'];
	$Att3 = $_POST['Att3'];
	$Att4 = $_POST['Att4'];
	$Att5 = $_POST['Att5'];
	
 
    $object = new CRUD();
   //$object->CreateRoom(5, 2, 2, true, false);
   $object->CreateRoom($PropID, $AttID, $Att1, $Att2, $Att3, $Att4, $Att5);
}
?>



