
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_us_model extends CI_Model
{
	/**
	* This function adds a new inquiry detail to the database
	*
	* @param $form_data : This is the inquiry data which should be added to the database
	* @return Affected rows of database
	*
	*/
	public function add_new_inquiry($form_data) {
		$data = array(
		   'name' => $form_data['name'] ,
		   'email' => $form_data['email']  ,
		   'subject' => $form_data['subject'] ,
		   'message' => $form_data['message'] ,
		);

		return $this->db->insert('inquire', $data); 
	}

	/**
	* This function adds a new item inquiry detail to the database
	*
	* @param $form_data : This is the inquiry data which should be added to the database
	* @return Affected rows of database
	*
	*/
	public function add_new_item_inquiry($form_data) {
		$data = array(
		   'Item_ID' => $form_data['itmID'],
		   'Name' => $form_data['name'],
		   'Email' => $form_data['email']  ,
		   'Subject' => $form_data['subject'] ,
		   'Comment' => $form_data['comment'] ,
		);

		return $this->db->insert('ItemInquiry', $data); 
	}
}