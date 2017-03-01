<?php
 
require __DIR__ . '/db_connection.php';

 
class CRUD
{
 
    protected $db;
 
    function __construct()
    {
        $this->db = DB();
    }
 
    function __destruct()
    {
        $this->db = null;
    }
 
    /*
     * Add new Record
     *
     * @param $first_name
     * @param $last_name
     * @param $email
     * @return $mixed
	 $Postcode, $BuildingNameNumber, $Street, $Address2, $Town, $County, $Type, $Ownership, $Lease, $Floors)
     * */
    public function Create($Postcode, $BuildingNameNumber, $Street, $Address2, $Town, $County, $Type, $Ownership, $Lease, $Floors)
    {
        $query = $this->db->prepare("INSERT INTO properties(Postcode, BuildingNameNumber, Street, Address2, Town, County, Type, Ownership, Lease, Floors) VALUES(:Postcode, :BuildingNameNumber, :Street, :Address2, :Town, :County, :Type, :Ownership, :Lease, :Floors)");
        $query->bindParam("Postcode", $Postcode, PDO::PARAM_STR);
        $query->bindParam("BuildingNameNumber", $BuildingNameNumber, PDO::PARAM_STR);
        $query->bindParam("Street", $Street, PDO::PARAM_STR);
		$query->bindParam("Address2", $Address2, PDO::PARAM_STR);
		$query->bindParam("Town", $Town, PDO::PARAM_STR);
		$query->bindParam("County", $County, PDO::PARAM_STR);
		$query->bindParam("Type", $Type, PDO::PARAM_INT);
		$query->bindParam("Ownership", $Ownership, PDO::PARAM_INT);
		$query->bindParam("Lease", $Lease, PDO::PARAM_INT);
		$query->bindParam("Floors", $Floors, PDO::PARAM_INT);
        $query->execute();
        return $this->db->lastInsertId();
    }
 
    /*
     * Read all records
     *
     * @return $mixed
     * */
    public function Read()
    {
        $query = $this->db->prepare("SELECT * FROM properties");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }
 
    /*
     * Delete Record
     *
     * @param $user_id
     * */
    public function Delete($PropID)
    {
        $query = $this->db->prepare("DELETE FROM properties WHERE PropID = :PropID");
        $query->bindParam("PropID", $PropID, PDO::PARAM_INT);
        $query->execute();
    }
 
    /*
     * Update Record
     *
     * @param $postcode
     * @param $last_name
     * @param $email
     * @return $mixed
     * */
    public function Update($Postcode, $BuildingNameNumber, $Street, $Address2, $Town, $County, $Type, $Ownership, $Lease, $Floors, $PropID)
    {
        $query = $this->db->prepare("UPDATE properties SET Postcode = :Postcode, BuildingNameNumber = :BuildingNameNumber, Street = :Street, Address2 = :Address2, Town = :Town, County = :County, Type = :Type, Ownership = :Ownership, Lease = :Lease, Floors = :Floors WHERE PropID = :PropID");
        $query->bindParam("Postcode", $Postcode, PDO::PARAM_STR);
        $query->bindParam("BuildingNameNumber", $BuildingNameNumber, PDO::PARAM_STR);
        $query->bindParam("Street", $Street, PDO::PARAM_STR);
		$query->bindParam("Address2", $Address2, PDO::PARAM_STR);
		$query->bindParam("Town", $Town, PDO::PARAM_STR);
		$query->bindParam("County", $County, PDO::PARAM_STR);
		$query->bindParam("Type", $Type, PDO::PARAM_INT);
		$query->bindParam("Ownership", $Ownership, PDO::PARAM_INT);
		$query->bindParam("Lease", $Lease, PDO::PARAM_INT);
		$query->bindParam("Floors", $Floors, PDO::PARAM_INT);
        $query->bindParam("PropID", $PropID, PDO::PARAM_INT);
        $query->execute();
		//te
    }
 
    /*
     * Get Details
     *
     * @param $user_id
     * */
    public function Details($PropID)
    {
        $query = $this->db->prepare("SELECT * FROM properties WHERE PropID = :PropID");
        $query->bindParam("PropID", $PropID, PDO::PARAM_INT);
        $query->execute();
        return json_encode($query->fetch(PDO::FETCH_ASSOC));

    }
	
	 /*
     * Read all records
     * @param $TableName
	 *
     * @return $mixed
     * */
    public function Dropdown($TableName)
    {
        $query = $this->db->prepare("SELECT * FROM ".$TableName." ORDER BY LookupID ASC");
        //$query->bindParam("TableName", $TableName, PDO::PARAM_STR);
		$query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }
	
	 /*
     * Read all records
     *
     * @return $mixed
     * */
    public function ReadRooms($PropID)
    {
        $query = $this->db->prepare("SELECT * FROM v_rooms WHERE PropID = :PropID");
        $query->bindParam("PropID", $PropID, PDO::PARAM_INT);
		$query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }
	
	/*
     * Get Details
     *
     * @param $user_id
     * */
    public function RoomDetails($RoomID)
    {
        $query = $this->db->prepare("SELECT * FROM rooms WHERE RoomID = :RoomID");
        $query->bindParam("RoomID", $RoomID, PDO::PARAM_INT);
        $query->execute();
        return json_encode($query->fetch(PDO::FETCH_ASSOC));

    }
	
	
	/*
     * Add new Record
     *($PropID, $RoomType, $RoomSize, $OwnAccess, $Ensuite)
     * @param $first_name
     * @param $last_name
     * @param $email
     * @return $mixed
	 $PropID, $RoomType, $RoomSize, $OwnAccess, $Ensuite)
     * */
    public function CreateRoom($PropID, $AttID, $Att1, $Att2, $Att3, $Att4, $Att5)
    {
        $query = $this->db->prepare("INSERT INTO prop_attributes(PropID, AttID, Value1, Value2, Value3, Value4, Value5) VALUES(:PropID, :AttID, :Value1, :Value2, :Value3, :Value4, :Value5)");
        $query->bindParam("PropID", $PropID, PDO::PARAM_INT);
        $query->bindParam("AttID", $AttID, PDO::PARAM_INT);
        $query->bindParam("Value1", $Att1, PDO::PARAM_STR);
		$query->bindParam("Value2", $Att2, PDO::PARAM_STR);
		$query->bindParam("Value3", $Att3, PDO::PARAM_STR);
		$query->bindParam("Value4", $Att4, PDO::PARAM_STR);
		$query->bindParam("Value5", $Att5, PDO::PARAM_STR);
		$query->execute();
        return $this->db->lastInsertId();
    }
	
	/*
     * Delete Record
     *
     * @param $user_id
     * */
      public function DeleteRoom($RoomID)
    {
        $query = $this->db->prepare("DELETE FROM prop_attributes WHERE ID = :RoomID");
        $query->bindParam("RoomID", $RoomID, PDO::PARAM_INT);
        $query->execute();
    }
	
	 /*
     * Read all records
     *
     * @return $mixed
     * */
    public function ReadPropAttributes($PropID)
    {
        $query = $this->db->prepare("SELECT * FROM v_prop_attributes WHERE PropID = :PropID");
        $query->bindParam("PropID", $PropID, PDO::PARAM_INT);
		$query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }
	
	/*
     * Read filtered records
     *
     * @return $mixed
     * */
	public function ReadPropAttributesOf($PropID, $AttID)
    {
        $query = $this->db->prepare("SELECT * FROM v_prop_attributes WHERE PropID = :PropID and AttID = :AttID");
        $query->bindParam("PropID", $PropID, PDO::PARAM_INT);
		$query->bindParam("AttID", $AttID, PDO::PARAM_INT);
		$query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }
	/*
     * Get Details
     *
     * @param $user_id
     * */
    public function PropAttDetails($RoomID)
    {
        $query = $this->db->prepare("SELECT * FROM v_prop_attributes WHERE ID = :ID");
        $query->bindParam("ID", $ID, PDO::PARAM_INT);
        $query->execute();
        return json_encode($query->fetch(PDO::FETCH_ASSOC));

    }
	
	 /*
     * Read all records
     *
     * @return $mixed
     * */
    public function ReadAttStructure()
    {
        $query = $this->db->prepare("SELECT * FROM attribute");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }
    
}
 
?>