<?php
if (isset($_POST['PropID']) && isset($_POST['PropID']) != "") { 
require 'lib.php';
$PropID = $_POST['PropID']; 
 
$object = new CRUD();
 
$attributes = $object->ReadAttStructure();
$data ='';
$totalatts = count($attributes);

$data .= '<ul class="nav nav-tabs">';

										
$attcount2 = 1;						
foreach ($attributes as $attribute) {
//Create TAB structure
	if ($attcount2 == 1) {
		$data .= '<li id="tabatthead1" class="active"><a data-toggle="tab" href="#tabatt1">'.$attribute['AttLabel'].'</a></li>';
	}else{
		$data .= '<li id="tabatthead'.$attcount2.'"><a data-toggle="tab" href="#tabatt'.$attcount2.'">'.$attribute['AttLabel'].'</a></li>';
	}	
$attcount2++;
}

$data .= '</ul> 
			<div class="tab-content">';

$attcount = 1;
$number = 1;
$columns = 1;
foreach ($attributes as $attribute) {
	$data .= '<div id="tabatt'.$number.'" class="tab-pane fade in active">';
//START! -Create table+data here but must loop inline with the attribute for each above
	// Will need to pass $attribute[AttID] to SQL to get only relevant data
	
    $data .= '<h3>' . $attribute['AttLabel'] . '</h3>';
	// Design initial table header
	$data .= '<table class="table table-bordered table-striped">;
                        <tr>';
		While($attcount < 12) {
			if(isset($attribute['InputType'. $attcount]) &&  $attribute['InputType'. $attcount] != "") {
				
				$data .= '<th>'.$attribute['Label' . $attcount] . '</th>';
				$attcount++;		  
			
			}else{
				$columns = $attcount;
				$data .= '<th>Delete</th>
                        </tr>';
				$attcount = 12;			
			}				
		}					
$attcount = 1;
	//Start populating the table rows using columns variable to dicate how many sub atts
	$rooms = $object->ReadPropAttributesOf($PropID,$attribute['ID']);
	if (count($rooms) > 0) {
    foreach ($rooms as $room) {
		$data .= '<tr>';
        $subattcount = 1;
		while($subattcount < $columns){
		$data .= '<td>' . $room['Value' . $subattcount ] . '</td>';
        $subattcount++;
		}
		$data .= '<td>
                    <button onclick="deleteRoom(' . $room['ID'] . ')" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>';
    }
	} else {
    // records not found
    $data .= '<tr><td colspan="5">Records not found!</td></tr>';
	}
 
$data .= '</table>';


//END! -Create table+data here but must loop inline with the attribute for each above

//START! -Adjust att structure form to also loop inline with the above forEach	
While($attcount < 12) {
	if(isset($attribute['InputType'. $attcount]) &&  $attribute['InputType'. $attcount] != "") {	
	$data .= '<form class="form-inline">';	
		
		if($attribute['InputType'. $attcount] == 'Select') {
		$data .= '
							<div class="form-group">
								<label for="Att_'.$number.$attcount.'">'. $attribute['Label'.$attcount].'</label>
								<select id="Att'.$number.$attcount.'" class= form-control title="'.$attribute['Label'.$attcount].'">';
								
				
		// Read data to dropdown Populate values in select box
		$values = explode('#', $attribute['Values'. $attcount]);
		$valuecount =1;
		foreach ($values as $value) {
			if ($valuecount == 1) {
				$data .= '<option value="'.$value.'" selected>'.$value.'</option>';	
				
			}else{
				$data .= '<option value="'.$value.'">'.$value.'</option>';
				
			}
		$valuecount++;
		}
		
		$data .= '</select>
							</div>';
		
		}elseif ($attribute['InputType'. $attcount] == 'Checkbox'){
		$data .= '	<div class="form-group">
								<label for="Att_'.$number.$attcount.'">'. $attribute['Label'.$attcount].'</label>
								<input type="checkbox" id="Att'.$number.$attcount.'" class="form-control"/>
							</div>';	

		}elseif ($attribute['InputType'. $attcount] == 'Number'){
		$data .= '	<div class="form-group">
								<label for="Att_'.$number.$attcount.'">'. $attribute['Label'.$attcount].'</label>
								<input type="number" id="Att'.$number.$attcount.'" class="form-control"/>
							</div>';	

		}elseif ($attribute['InputType'. $attcount] == 'Date'){
		$data .= '	<div class="form-group">
								<label for="Att_'.$number.$attcount.'">'. $attribute['Label'.$attcount].'</label>
								<input type="date" id="Att'.$number.$attcount.'" class="form-control"/>
							</div>';	

		}elseif ($attribute['InputType'. $attcount] == 'Text'){
		$data .= '	<div class="form-group">
								<label for="Att_'.$number.$attcount.'">'. $attribute['Label'.$attcount].'</label>
								<input type="text" id="Att'.$number.$attcount.'" class="form-control"/>
							</div>';	

		}
	}else{
	//End this attribute as the value is null
	//START! -Moved into the while loop
			$data .= '
					<div class="form-group">
						<label for="saveNewRoomBtn">Add</label>
						<button type="button" class="btn btn-success btn-sm" id="saveNewAtt" onclick="addAttribute('.$number.')" > + </button>
					</div>	
			</div>
			<input type="hidden" id="hidden_att_id'.$number.'" value="'.$attribute['ID'].'">
			<input type="hidden" id="hidden_att_count'.$number.'" value="'.$attcount.'"> 
			</form>'; //end of row </div>                         //may need to minus -1 from attcount
			

	//END! -Moved into the while loop
	
			$attcount = 12;
	}
	

$attcount++;
}
//START! -Moved into the while loop
//END! -Moved into the while loop
$attcount = 1; //reset att count for next attribute
$number++;
}
$data .= '</div>'; //What is this DIV for

echo $data;
} 
?>