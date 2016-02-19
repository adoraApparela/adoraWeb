<?php

class Adv_model extends CI_Model
{

/*
* function name insertCarousel
* gets $heading,$ImageLink,$Description as inputs
* inserts record to DB table
*/
public function insertCarousel($heading,$ImageLink,$Description)
{
	$data = array(
			'Heading' => $heading,
			'ImageLink' => $ImageLink,
			'Description' => $Description
			);
	$id = $this->db->insert('Carousel', $data);
	return $id;
}



}

?>