<?php
 
require 'lib.php';
 
$object = new CRUD();
 
// Design initial table header
$data = '<table class="table table-bordered table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Building Name</th>
                            <th>Street</th>
                            <th>Address</th>
                            <th>Town</th>
							<th>County</th>
							<th>Type</th>
							<th>Lease</th>
							<th>Floors</th>
							<th>Details</th>
							<th>Update</th>
                            <th>Delete</th>
                        </tr>';
 
 
$properties = $object->Read();
 
if (count($properties) > 0) {
    $number = 1;
    foreach ($properties as $property) {
        $data .= '<tr>
                <td>' . $property['PropID'] . '</td>
                <td>' . $property['BuildingNameNumber'] . '</td>
                <td>' . $property['Street'] . '</td>
                <td>' . $property['Address2'] . '</td>
                <td>' . $property['Town'] . '</td>
				<td>' . $property['County'] . '</td>
				<td>' . $property['Type'] . '</td>
		     	<td>' . $property['Lease'] . '</td>
				<td>' . $property['Floors'] . '</td>
				<td>
                    <button onclick="ReadAttStructure(' . $property['PropID'] . ');showRoomDetailModal()" class="btn btn-info">Details</button>
                </td>
				<td>
                    <button onclick="GetPropDetails(' . $property['PropID'] . '); GetDropdownDetails(\'proptype\', \'U_Type\');" class="btn btn-warning">Update</button>
                </td>
                <td>
                    <button onclick="DeleteProperty(' . $property['PropID'] . ')" class="btn btn-danger">Delete</button>
                </td>
            </tr>';
        $number++;
    }
} else {
    // records not found
    $data .= '<tr><td colspan="6">Records not found!</td></tr>';
}
 
$data .= '</table>';
 
echo $data;
 
?>