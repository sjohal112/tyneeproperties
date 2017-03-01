<?php
if (isset($_POST['PropID']) && isset($_POST['PropID']) != "") {
    require 'lib.php';
    $PropID = $_POST['PropID'];
 
    $object = new CRUD();
    $object->Delete($PropID);
}
?>