<?php

class Subscribers_m extends CI_Model
{
	/*public method to get the subscriber details*/
	public function get_subscribers()
	{
		$this->db->select('email');
	    $this->db->from('subscribers');
	    $query = $this->db->get();
	    return $query;
	}



}

?>