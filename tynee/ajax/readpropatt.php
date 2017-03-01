<?php
if (isset($_POST['PropID']) && isset($_POST['PropID']) != "") { 
require 'lib.php';
$PropID = $_POST['PropID']; 
 
$object = new CRUD();
 
// Design initial table header
$data = '<table class="table table-bordered table-striped">
                        <tr>
                            <th>Attribute</th>
                            <th>Label1</th>
                            <th>Value1</th>
                            <th>Label2</th>
                            <th>Value2</th>
							<th>Label3</th>
                            <th>Value3</th>
							<th>Label4</th>
                            <th>Value4</th>
							<th>Label5</th>
                            <th>Value5</th>
							<th>Delete</th>
                        </tr>';
 
 
$rooms = $object->ReadPropAttributes($PropID);
 
if (count($rooms) > 0) {
    $number = 1;
    foreach ($rooms as $room) {
        $data .= '<tr>
                <td>' . $room['AttLabel'] . '</td>
                <td>' . $room['Label1'] . '</td>
                <td>' . $room['Value1'] . '</td>
                <td>' . $room['Label2'] . '</td>
                <td>' . $room['Value2'] . '</td>
				<td>' . $room['Label3'] . '</td>
                <td>' . $room['Value3'] . '</td>
				<td>' . $room['Label4'] . '</td>
                <td>' . $room['Value4'] . '</td>
				<td>' . $room['Label5'] . '</td>
                <td>' . $room['Value5'] . '</td>
				<td>
                    <button onclick="deleteRoom(' . $room['ID'] . ')" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>';
        $number++;
    }
} else {
    // records not found
    $data .= '<tr><td colspan="5">Records not found!</td></tr>';
}
 
$data .= '</table>';


 
echo $data;

}
?>