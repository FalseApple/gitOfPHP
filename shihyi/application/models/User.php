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
		$objUsers = $this->db->get("user")->Result();
		
		foreach($objUsers as $key => $value)
		{
			// $this->db->select("user");
			$this->db->where("uid", $value->no);
			$objFamily = $this->db->get("familys");
			
			if($objFamily->num_rows() > 0)
			{
				$value->family = $objFamily->Result();
			}
			// unset($value->no);
		}
	
		return $objUsers;
	}
}
?>