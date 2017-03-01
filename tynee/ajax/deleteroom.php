<?php
if (isset($_POST['RoomID']) && isset($_POST['RoomID']) != "") {
    require 'lib.php';
    $RoomID = $_POST['RoomID'];
 
    $object = new CRUD();
    $object->DeleteRoom($RoomID);
}
?>