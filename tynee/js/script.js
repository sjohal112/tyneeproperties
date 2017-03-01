// Add Record
function addProperty() {
    // get values
    var Postcode = $("#Postcode").val();
	Postcode = Postcode.trim();
    var BuildingNameNumber = $("#BuildingNameNumber").val();
	BuildingNameNumber = BuildingNameNumber.trim();
    var Street = $("#Street").val();
	Street = Street.trim();
	var Address2 = $("#Address2").val();
	Address2 = Address2.trim();
	var Town = $("#Town").val();
	Town = Town.trim();
	var County = $("#County").val();
	County = County.trim();
	var Type = $("#Type").val();
	Type = Type.trim();
	var Ownership = $("#Ownership").val();
	Ownership = Ownership.trim();
	var Lease = $("#Lease").val();
	Lease = Lease.trim();
	var Floors = $("#Floors").val();
	Floors = Floors.trim();
 
    if (Postcode == "") {
        alert("Postcode field is required!");
    }
    else if (BuildingNameNumber == "") {
        alert("Building name or No. field is required!");
    }
    else if (Street == "") {
        alert("Street field is required!");
    }
    else {
        // Add record
        $.post("ajax/create.php", {
         	Postcode: Postcode,
			BuildingNameNumber: BuildingNameNumber,
            Street: Street,
			Address2: Address2,
			Town: Town,
			County: County,
			Type: Type,
			Ownership: Ownership, 
			Lease: Lease,
			Floors: Floors
			
        }, function (data, status) {
            // close the popup
            $("#add_new_record_modal").modal("hide");
 
            // read records again
            readRecords();
 
            // clear fields from the popup
            $("#Postcode").val("");
            $("#BuildingNameNumber").val("");
            $("#Street").val("");
			$("#Address2").val("");
			$("#Town").val("");
			$("#County").val("");
			$("#Type").val("");
			$("#Ownership").val("");
			$("#Lease").val("");
			$("#Floors").val("");
        });
    }
}

// READ records
function readRecords() {
    $.get("ajax/read.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}


function GetPropDetails(PropID) {
    // Add User ID to the hidden field
    $("#hidden_prop_id").val(PropID);
    $.post("ajax/details.php", {
		PropID: PropID
		},
        function(data, status) {
        
            // PARSE json data
            var property = JSON.parse(data);
            var dataList = document.getElementById("U_Type")
			//Populate & Assign values to drop downs
			//PropType
			for(i=0; i < dataList.options.length; i++)
			{ 
				var opt = dataList.options.item(i);
				if(parseInt(property.Type) === parseInt(opt.value))
				{
					opt.selected=true;
					i = 999;
				}
			}
			// Assign existing values to the modal popup fields
            $("#U_Postcode").val(property.Postcode);
            $("#U_BuildingNameNumber").val(property.BuildingNameNumber);
            $("#U_Street").val(property.Street);
			$("#U_Address2").val(property.Address2);
			$("#U_Town").val(property.Town);
			$("#U_County").val(property.County);
			$("#U_Ownership").val(property.Ownership);
			$("#U_Lease").val(property.Lease);
			$("#U_Floors").val(property.Floors);
        }
    );
    // Open modal popup
	$("#update_user_modal").modal("show");
	
}

function GetRoomDetails(RoomID) {
    // Add User ID to the hidden field
    $("#hidden_room_id").val(RoomID);
    $.post("ajax/roomdetails.php", {
		RoomID: RoomID
		},
        function(data, status) {
        
            // PARSE json data
            var room = JSON.parse(data);
            var dataList = document.getElementById("U_RoomType")
			//Populate & Assign values to drop downs
			//RoomType
			for(i=0; i < dataList.options.length; i++)
			{ 
				var opt = dataList.options.item(i);
				if(parseInt(room.RoomTypeID) === parseInt(opt.value))
				{
					opt.selected=true;
					i = 999;
				}
			}
			//RoomSize
			var dataList = document.getElementById("U_RoomSize")
			for(i=0; i < dataList.options.length; i++)
			{ 
				var opt = dataList.options.item(i);
				if(parseInt(room.RoomSizeID) === parseInt(opt.value))
				{
					opt.selected=true;
					i = 999;
				}
			}
			// Assign existing values to the modal popup fields
			if(room.OwnEntrance === 1){
				$("#U_OwnEntrance").prop('checked', true);
			}else{
				$("#U_OwnEntrance").prop('checked', false);
			}
            
			if(room.Ensuite === 1){
				$("#U_Ensuite").prop('checked', true);
			}else{
				$("#U_Ensuite").prop('checked', false);
			}
			
        }
    );
    // Open modal popup
	$('#t2').show();
	
}

function UpdatePropertyDetails() {
    // get values
    var Postcode = $("#U_Postcode").val();
	Postcode = Postcode.trim();
    var BuildingNameNumber = $("#U_BuildingNameNumber").val();
	BuildingNameNumber = BuildingNameNumber.trim();
    var Street = $("#U_Street").val();
	Street = Street.trim();
	var Address2 = $("#U_Address2").val();
	Address2 = Address2.trim();
	var Town = $("#U_Town").val();
	Town = Town.trim();
	var County = $("#U_County").val();
	County = County.trim();
	var Type = $("#U_Type").val();
	Type = Type.trim();
	var Ownership = $("#U_Ownership").val();
	Ownership = Ownership.trim();
	var Lease = $("#U_Lease").val();
	Lease = Lease.trim();
	var Floors = $("#U_Floors").val();
	Floors = Floors.trim();
 
    if (Postcode == "") {
        alert("Postcode field is required!");
    }
    else if (BuildingNameNumber == "") {
        alert("Building name or No. field is required!");
    }
    else if (Street == "") {
        alert("Street field is required!");
    }
    else {
        // get hidden field value
        var PropID = $("#hidden_prop_id").val();
 
        // Update the details by requesting to the server using ajax
        $.post("ajax/update.php", {
            Postcode: Postcode, 
            BuildingNameNumber: BuildingNameNumber,
            Street: Street,
			Address2: Address2,
			Town: Town,
			County: County,
			Type: Type,
			Ownership: Ownership ,
			Lease: Lease,
			Floors: Floors,
            PropID: PropID},
            function (data, status) {
                // hide modal popup
                $("#update_user_modal").modal("hide");
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}


function DeleteProperty(PropID) {
    var conf = confirm("Are you sure, do you really want to delete Property?");
    if (conf == true) {
        $.post("ajax/delete.php", {
                PropID: PropID
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    } 
}

	
function GetDropdownDetails(TableName, ElementID) {
    $.post("ajax/dropdown.php", {TableName: TableName}, function (data, status) {
		
		var dataset = JSON.parse(data);
        var dataList = document.getElementById(ElementID);
		for(i=0; i < dataset.length; i++) {
	
			//create new option element
			var option = document.createElement('option');
			option.value = dataset[i].LookupID;
			option.text = dataset[i].LookupValue;
			//option.selected=true;
			// Add the <option> element to the <datalist>.
			dataList.appendChild(option);
		} 
	}
	  );

}	


// READ records
function readRooms(PropID) {
    $.post("ajax/readrooms.php", {PropID: PropID}, function (data, status) {
        $(".room_records_content").html(data);
		$("#hidden_prop_id2").val(PropID) ;
    });
	
                
}

function showRoomDetailModal() {
	// show modal popup
	$("#update_prop_detail_modal").modal("show");
}

// Add Record
function addRoom() {
    // get values
    var PropID = $("#hidden_prop_id2").val();
	var RoomType = $("#U_RoomType").val();
	//Postcode = Postcode.trim();
    var RoomSize = $("#U_RoomSize").val();
	//BuildingNameNumber = BuildingNameNumber.trim();
	var OwnAccess = +$("#U_OwnEntrance").is(':checked');
	//Street = Street.trim();
	var Ensuite = +$("#U_Ensuite").is(':checked');
	//Address2 = Address2.trim();

        $.post("ajax/createroom.php", {
         	//5, 2, 2, true, false
			PropID: PropID,
			RoomType: RoomType,
			RoomSize: RoomSize,
            OwnAccess: OwnAccess,
			Ensuite: Ensuite
			
			
        }, function (data, status) {
            // close the popup
             readRooms(PropID);
			//$("#add_new_record_modal").modal("hide");
 
            
            /* clear fields from the popup
            $("#Postcode").val("");
            $("#BuildingNameNumber").val("");
            $("#Street").val("");
			$("#Address2").val("");
			$("#Town").val("");
			$("#County").val("");
			$("#Type").val("");
			$("#Ownership").val("");
			$("#Lease").val("");
			$("#Floors").val("");
			*/
        });
		// read records again
           
			
}
   
    
function deleteRoom(RoomID) {
    var conf = confirm("Are you sure, do you really want to delete room?");
    if (conf == true) {
        $.post("ajax/deleteroom.php", {
                RoomID: RoomID
            },
            function (data, status) {
                // reload Users by using readRecords();
				var PropID = $("#hidden_prop_id2").val();
				ReadPropAtts(PropID);
                
            }
        );
    //old reload code
	} 

}

// READ records
function ReadPropAtts(PropID) {
    $.post("ajax/readpropatt.php", {PropID: PropID}, function (data, status) {
        $(".room_records_content").html(data);
		$("#hidden_prop_id2").val(PropID) ;
    });
}

// READ records
function ReadAttStructure(PropID) {
    $.post("ajax/readattstructure.php", {PropID: PropID}, function (data, status) {
        $(".attribute_form_content").html(data);
		$("#hidden_prop_id2").val(PropID) ;
		
    });

}

//Show & hide the correct attribute forms
function DisplayAttForm(FormID, TotalAtts) {
	var count = 1;
	while(count < TotalAtts){
		var attributeRowID = "attrow";
		attributeRowID += count;
		document.getElementById(attributeRowID).style.visibility = 'hidden';
		count++;
	}
	
	var attributeShowRowID = "attrow";
		attributeShowRowID += 1;
		document.getElementById('attrow1').style.visibility = 'visible';
}

// Add Record
function addAttribute(attNo) {
    // get values
    var PropID = $("#hidden_prop_id2").val();
	var AttID = $("#hidden_att_id"+attNo).val();
	var TotalVals = $("#hidden_att_count"+attNo).val();
	
	var Att1 = $("#Att"+attNo+"1").val();
	var Att2 = $("#Att"+attNo+"2").val();
	var Att3 = +$("#Att"+attNo+"3").is(':checked');
	var Att4 = +$("#Att"+attNo+"4").is(':checked');
	var Att5 = +$("#Att"+attNo+"5").is(':checked');
	var ValAtt1;
	var ValAtt2;
	var ValAtt3;
	var ValAtt4;
	var ValAtt5;
	
	var AttValues = new Array();
	AttValues.push(PropID);
	AttValues.push(AttID);
	var i = 1;
	while(i < TotalVals){
		if($("#Att"+attNo+i).is(':checkbox')){
			AttValues.push($("#Att"+attNo+i).is(':checked'));
		}else{
			AttValues.push($("#Att"+attNo+i).val());
		}
	i++;
	}
        $.post("ajax/createroom.php", {
         	//5, 2, 2, true, false
			PropID: AttValues[0],
			AttID: AttValues[1],
			Att1: AttValues[2],
			Att2: AttValues[3],
			Att3: AttValues[4],
			Att4: AttValues[5],
			Att5: AttValues[6]
			
			
        }, function (data, status) {
           ReadPropAtts(PropID);
			
        });
		
           
			
}

function SetFirstTab() {
	//$('.nav-tabs a[href="#tabatt2"]').tab('show');
	//$('.nav-tabs a[href="#tabatt2"]').tab('hide');
	$('.nav-tabs a[href="#tabatt1"]').tab('show');
	//$('#tabatthead2').show();
	//$('#tabatthead2').hide();
	//$('#tabatthead1').show();
}
	
$('#propAttModal').on('show.bs.modal', function () {
  SetFirstTab();
});	
	
$(document).ready(function () {
    // READ records on page load
    readRecords(); // calling function
});



