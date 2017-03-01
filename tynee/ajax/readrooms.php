<?php
if (isset($_POST['PropID']) && isset($_POST['PropID']) != "") { 
require 'lib.php';
$PropID = $_POST['PropID']; 
 
$object = new CRUD();
 
// Design initial table header
$data = '<table class="table table-bordered table-striped">
                        <tr>
                            <th>Type</th>
                            <th>Size</th>
                            <th>Own Access?</th>
                            <th>Ensuite?</th>
                            <th>Rent p/w</th>
							<th>Update</th>
                            <th>Delete</th>
                        </tr>';
 
 
$rooms = $object->ReadRooms($PropID);
 
if (count($rooms) > 0) {
    $number = 1;
    foreach ($rooms as $room) {
        $data .= '<tr>
                <td>' . $room['RoomType'] . '</td>
                <td>' . $room['RoomSize'] . '</td>
                <td>' . $room['OwnEntrance'] . '</td>
                <td>' . $room['Ensuite'] . '</td>
                <td>' . $room['RentPW'] . '</td>
				<td>
                    <button onclick="GetRoomDetails(' . $room['RoomID'] . ')" class="btn btn-warning">Update</button>
                </td>
                <td>
                    <button onclick="deleteRoom(' . $room['RoomID'] . ')" class="btn btn-danger">Delete</button>
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