<?php

class Charts_model extends CI_Model
{

/*
* function name SalesChart
* no inputs
* returns an array of sales ordered by month
*/
public function SalesChart()
{
	$query = $this->db->query("
  	SELECT CONCAT(YEAR(PurchasedTime),\" \", MONTHNAME(PurchasedTime)) as PurchaseDate, SUM(TOTAL) as TOTALP
	FROM Purchases
	GROUP BY DATE_FORMAT(PurchasedTime,'%Y-%m')
  	");

	return $query->result_array();
} 

/*
* function name userRegChart
* no inputs
* returns an array of user registration ordered by month
*/
public function userRegChart()
{
	$query = $this->db->query("
  	select CONCAT(YEAR(Date),\" \", MONTHNAME(Date)) as DATEA, COUNT(*) as TOTALP
	from Registered_Users
	GROUP BY DATE_FORMAT(Date,'%Y-%m')
  	");

	return $query->result_array();
}  

}

?>