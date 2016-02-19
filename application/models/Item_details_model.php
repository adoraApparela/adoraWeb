<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item_details_model extends CI_Model
{
	/**
	* This function returns review details from the database
	*
	* @param $id : This is the item id which the reviews should be retrieved
	* @return review details  as an associative array
	*			in the form of(Name,Date,Time,Comment)
	*/
    public function retrieve_reviews($id) {
      $this->db->select("Review.Name,date(Review.AddedTime) as Date, time(Review.AddedTime) as Time, Review.Comment");
	  $this->db->from('Review');
	  $this->db->where('Review.Item_ID',$id);
	  $this->db->join('Items', 'Review.Item_ID = Items.Item_ID');
	  $this->db->order_by("AddedTime", "desc"); 
	  $query = $this->db->get();
	  return $query->result();
    }

    /**
    * This function adds review details to the database
	*
	* @param $id : This is the item id which the reviews details should be added
	* @param $form_data : This is the review data which should be added to the database
	* @return number of affected rows of the database
	*/
    public function add_review($id,$form_data) {
    	$data = array(
		   'Name' => $form_data['name'] ,
		   'Email' => $form_data['email']  ,
		   'Comment' => $form_data['comment'] ,
		   'Item_ID' => $id
		);

		return $this->db->insert('Review', $data); 
    }

    /**
	* This function returns imageLinks for a particular item from the database
	*
	* @param $id : This is the item id which the images should be retrieved
	* @return imageLinks  as an associative array
	*	
	*/
    public function retrieve_image_list($id) {
      $this->db->select("*");
	  $this->db->from('ItemImage');
	  $this->db->where('itemID',$id);
	  $query = $this->db->get();
	  return $query->result();
    }
}