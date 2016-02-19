<?php

class Notification_model extends CI_Model
{

/**
* Function used to retrieve number of registered users
* inputs a perios
* outputs the number in the particular period
*/
public function getRegisteredUsers($period)
{
	
	if($period == "week")
	{
		$query = $this->db->query("SELECT * FROM Registered_Users WHERE Date > DATE_SUB(NOW(), INTERVAL 1 WEEK)");
	}
	else if($period == "month")
	{
		$query = $this->db->query("SELECT * FROM Registered_Users WHERE Date > DATE_SUB(NOW(), INTERVAL 1 MONTH)");
	}
	else if($period == "year")
	{
		$query = $this->db->query("SELECT * FROM Registered_Users WHERE Date > DATE_SUB(NOW(), INTERVAL 1 YEAR)");
	}
	else
	{	
		$query = $this->db->query("SELECT * FROM Registered_Users");
	}
	
	return $query->num_rows();
}

/*
Function used to retrieve number of Subscribers
inputs a perios
outputs the number in the particular period
*/
public function getSubscribers($period)
{

	if($period == "week")
	{
		$query = $this->db->query("SELECT * FROM subscribers WHERE Date > DATE_SUB(NOW(), INTERVAL 1 WEEK)");
	}
	else if($period == "month")
	{
		$query = $this->db->query("SELECT * FROM subscribers WHERE Date > DATE_SUB(NOW(), INTERVAL 1 MONTH)");
	}
	else if($period == "year")
	{
		$query = $this->db->query("SELECT * FROM subscribers WHERE Date > DATE_SUB(NOW(), INTERVAL 1 YEAR)");
	}
	else
	{	
		$query = $this->db->query("SELECT * FROM subscribers");
	}
	
	return $query->num_rows();
}

/*
Function used to retrieve number of New Messages
no inputs
outputs the number of messages
*/
public function getMessages($period)
{
	
	$query = $this->db->query("SELECT * FROM inquire WHERE Responded = 0");
	return $query->num_rows();
}

/*
Function used to retrieve number of sales done
inputs a period
outputs the number in the particular period
*/
public function getSales($period)
{
	if($period == "week")
	{
		$query = $this->db->query("SELECT * FROM Purchases WHERE PurchasedTime > DATE_SUB(NOW(), INTERVAL 1 WEEK)");
	}
	else if($period == "month")
	{
		$query = $this->db->query("SELECT * FROM Purchases WHERE PurchasedTime > DATE_SUB(NOW(), INTERVAL 1 MONTH)");
	}
	else if($period == "year")
	{
		$query = $this->db->query("SELECT * FROM Purchases WHERE PurchasedTime > DATE_SUB(NOW(), INTERVAL 1 YEAR)");
	}
	else
	{	
		$query = $this->db->query("SELECT * FROM Purchases");
	}
	
	return $query->num_rows();
}

}