<?php 

/**
* 
*/
class Admin extends CI_Controller
{
	
	function index()
	{
		$this->load->view("AdminComponents/header");
		$this->load->view("AdminComponents/leftnavbar");
		$this->load->view("AdminComponents/div1");
		$this->load->view("AdminComponents/footer");
	}

}

?>