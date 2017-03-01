<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tynee Properties</title>
 
    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
</head>

<!-- Load attribute structure on load one time. -->
<!-- <body onload="ReadAttStructure()">  
<!-- /Navigation Bar -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="container-fluid">
                <div class="navbar-header">

                </div>
                <div class="collapse navbar-collapse" id="bs-dtb_master_item-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="index.html">Home</a></li>
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Data <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="master-item.html">Item</a></li>
                                <li><a href="master-brand.html">Brand</a></li>
                                <li><a href="master-supplier.hatml">Supplier</a></li>
                                <li><a href="master-customer.html">Customer</a></li>
                                <li><a href="master-expedition.html">Expedition</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Transaksi <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="receiving.html">Receiving</a></li>
                                <li><a href="update-data.html">Update Data</a></li>
                                <li><a href="delivery-order.html">Delivery Order</a></li>
                                <li><a href="packing-slip.html">Packing Slip</a></li>
                            </ul>
                        </li>
                    </ul> 
                </div>
            </div>
        </nav>
    </div>
<!-- Navigation Bar -->

<!-- Content Section -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Tynee Properties - Index</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-success" onclick="GetDropdownDetails('proptype', 'Type')" data-toggle="modal" data-target="#add_new_record_modal" >Add New Record</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Records:</h3>
 
            <div class="records_content"></div>
        </div>
    </div>
</div>
<!-- /Content Section -->
 
<!-- Bootstrap Modals -->
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Property</h4>
            </div>
            <div class="modal-body">
 
                <div class="form-group">
                    <label for="BuildingNameNumber">Building name or No.</label>
                    <input type="text" id="BuildingNameNumber" placeholder="Building name or No." class="form-control"/>
                </div>
				
				<div class="form-group">
                    <label for="Street">Street</label>
                    <input type="text" id="Street" placeholder="Street address" class="form-control"/>
                </div>
				
				<div class="form-group">
                    <label for="Address2">Address line 2</label>
                    <input type="text" id="Address2" placeholder="Address line 2" class="form-control"/>
                </div>
 
                <div class="form-group">
                    <label for="Town">Town or city</label>
                    <input type="text" id="Town" placeholder="Town or city" class="form-control"/>
                </div>
 
                <div class="form-group">
                    <label for="County">County</label>
                    <input type="text" id="County" placeholder="County" class="form-control"/>
                </div>
				
				<div class="form-group">
                    <label for="Postcode">Postcode</label>
                    <input type="text" id="Postcode" placeholder="Postcode" class="form-control"/>
                </div>
				
				<div class="form-group">
                    <label for="Type">Type</label>
                    <select id="Type" class="form-control"/>
					
                    </select>
                </div>
				
				<div class="form-group">
                    <label for="Ownership">Owner</label>
                    <input type="text" id="Ownership" placeholder="Type" class="form-control"/>
                </div>
				
				<div class="form-group">
                    <label for="Lease">Tenure type</label>
                    <input type="text" id="Lease" placeholder="Tenure type" class="form-control"/>
                </div>
				
				<div class="form-group">
                    <label for="Floors">No. of floors</label>
                    <input type="number" id="Floors" placeholder="Type" class="form-control"/>
                </div>				
				
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="addProperty()">Add Property</button>
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->
 <!-- Modal - Update User details -->
<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update Property</h4>
            </div>
            <div class="modal-body">
 
                <div class="form-group">
                    <label for="BuildingNameNumber">Building name or No.</label>
                    <input type="text" id="U_BuildingNameNumber" placeholder="Building name or No." class="form-control"/>
                </div>
				
				<div class="form-group">
                    <label for="Street">Street</label>
                    <input type="text" id="U_Street" placeholder="Street address" class="form-control"/>
                </div>
				
				<div class="form-group">
                    <label for="Address2">Address line 2</label>
                    <input type="text" id="U_Address2" placeholder="Address line 2" class="form-control"/>
                </div>
 
                <div class="form-group">
                    <label for="Town">Town or city</label>
                    <input type="text" id="U_Town" placeholder="Town or city" class="form-control"/>
                </div>
 
                <div class="form-group">
                    <label for="County">County</label>
                    <input type="text" id="U_County" placeholder="County" class="form-control"/>
                </div>
				
				<div class="form-group">
                    <label for="Postcode">Postcode</label>
                    <input type="text" id="U_Postcode" placeholder="Postcode" class="form-control"/>
                </div>
				
				<div class="form-group">
                    <label for="U_Type">Type</label>
                    <select id="U_Type" class="form-control"/>
					
                    </select>
                </div>
				
				<div class="form-group">
                    <label for="Ownership">Owner</label>
                    <input type="text" id="U_Ownership" placeholder="Type" class="form-control"/>
                </div>
				
				<div class="form-group">
                    <label for="Lease">Tenure type</label>
                    <input type="text" id="U_Lease" placeholder="Tenure type" class="form-control"/>
                </div>
				
				<div class="form-group">
                    <label for="Floors">No. of floors</label>
                    <input type="number" id="U_Floors" placeholder="Type" class="form-control"/>
                </div>				
 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="UpdatePropertyDetails()" >Save Changes</button>
                <input type="hidden" id="hidden_prop_id">
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->
<!-- Modal - Update X Property details -->
<div class="modal fade" id="update_prop_detail_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="propAttModal">Property Attribute Details</h4>
            </div>
            <div class="modal-body" >  <!--onload="ReadAttStructure(hidden_prop_id2)">-->
			<div class="row">
				<div class="col-md-12">
					<div class="room_records_content"></div>
				</div>
			</div>
			<div class="attribute_form_content"></div>
			</div>
			<div class="modal-footer>
				<input type="hidden" id="hidden_prop_id2">
			</div>			 
		</div>
	</div>
</div> 
<!-- // Modal -->

 
<!-- Jquery JS file -->
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
 
<!-- Bootstrap JS file -->
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
 
<!-- Custom JS file -->
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/upload.js"></script>
 
</body>
</html>