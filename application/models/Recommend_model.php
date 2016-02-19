<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* This is a model class.
* This is the class which retrieves the data relating to the recommandation functions from the database
*/
class Recommend_model extends CI_Model
{
	/**
	* This function returns category list which a user has bought before for a given user
	*
	* @param $userID : This is the user id which the categories should be retrieved for
	* @return category details  as an associative array
	*			
	*/
	public function retrieve_brought_categories($userID) {
	  $this->db->distinct();
	  $this->db->select("Catagory");
	  $this->db->from('Purchases');
	  $this->db->where('Purchases.Reg_ID',$userID);
	  $this->db->join('Items', 'Purchases.Item_ID = Items.Item_ID');
	  $query = $this->db->get();
	  return $query->result();
	}

	/**
	* This function returns item list for a given category
	*
	* @param $category : This is the category which the items should be retrieved for
	* @return item details  as an associative array
	*			
	*/
	public function retrieve_items_for_category($category) {
	  $this->db->select("*");
	  $this->db->from('Items');
	  $array = array('Catagory' => $category, 'Medium_Quantity >' =>0);
	  $this->db->where($array);
	  $this->db->join('ItemImage', 'ItemImage.itemID = Items.Item_ID');
	  $this->db->group_by("Items.Item_ID");
	  $query = $this->db->get();
	  return $query->result();
	}
}