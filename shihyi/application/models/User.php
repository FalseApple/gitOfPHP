<?php
class User extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function getSender()
	{
		return $this->db->get("users")->Result();
	}
	
	function setReceiver($_Data)
	{
		unset($_Data->No);
		
		return $this->db->insert("user", $_Data);
	}
	
	function getHomework()
	{
		$objUsers = $this->db->get("users")->Result();
		
		foreach($objUsers as $key => $value)
		{
			// $this->db->select("Name");
			$this->db->where("UserNo", $value->No);
			$objFamily = $this->db->get("family");
			$value->family = $objFamily->Result();
			/*if($objFamily->num_rows() > 0)
			{
				$value->family = $objFamily->Result();
			}*/
		}
		return $objUsers;
	}
}
?>