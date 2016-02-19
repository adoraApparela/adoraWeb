
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_page_model extends CI_Model
{

	/**
	* This function returns the data to load the main carousel
	*
	* No parameters are passed
	* @return carousel details in a form of
	*		  (Heading,Description,imageLink) as an associative array
	*
	*/
    public function retrieve_carousel_items() {
      $this->db->select("Heading,Description,imageLink");
	  $this->db->from('Carousel');
	  $query = $this->db->get();
	  return $query->result();
    }

    /**
    * This function returns the latest item details from the items table
	*
	* @param $limit : this is the number of items which are required to retrieve
	* @return latest item details  as an associative array
	*
	*/
    public function retrieve_latest_items($limit) {
      $this->db->select("*");
	  $this->db->from('Items');
	  $this->db->where('Items.Medium_Quantity >',0);
	  $this->db->join('ItemImage', 'ItemImage.itemID = Items.Item_ID');
	  $this->db->order_by("Date", "desc"); 
	  $this->db->group_by("Items.Item_ID");
	  $this->db->limit($limit);
	  $query = $this->db->get();
	  return $query->result();
    }

   /**
    * This function returns an item details from the items table for a given itemID
	*
	* @param $limit : this is the number of items which are required to retrieve
	* @return latest item details  as an associative array
	*
	*/
    public function retrieve_specific_item($id) {
      $this->db->select("*");
	  $this->db->from('Items');
	   $this->db->where('Item_ID',$id);
	  $this->db->join('ItemImage', 'ItemImage.itemID = Items.Item_ID');
	  $this->db->group_by("Items.Item_ID");
	  $query = $this->db->get();
	  return $query->result();
    }

    /**
    * This function returns an item details from the items table for a given category for a female
	*
	* @param $category : this is the category which the items should be retrieved
	* @return item details  as an associative array
	*
	*/
    public function retrieve_items_by_category_female($category) {
      $this->db->select("*");
	  $this->db->from('Items');
	  $array = array('Catagory' => $category, 'Gender' => 'Female', 'Medium_Quantity >' =>0);
	  $this->db->where($array);
	  $this->db->join('ItemImage', 'ItemImage.itemID = Items.Item_ID');
	  $this->db->order_by("Date", "desc"); 
	  $this->db->group_by("Items.Item_ID");
	  $this->db->limit(4);
	  $query = $this->db->get();
	  return $query->result();
    }

    /**
    * This function returns an item details from the items table for a given category for both male and female
	*
	* @param $category : this is the category which the items should be retrieved
	* @return item details  as an associative array
	*
	*/
    public function retrieve_items_by_category($category) {
      $this->db->select("*");
	  $this->db->from('Items');
	  $array = array('Catagory' => $category, 'Medium_Quantity >' =>0);
	  $this->db->where($array);
	  $this->db->join('ItemImage', 'ItemImage.itemID = Items.Item_ID');
	  $this->db->order_by("Date", "desc");
	  $this->db->group_by("Items.Item_ID"); 
	  $this->db->limit(4);
	  $query = $this->db->get();
	  return $query->result();
    }

    /**
    * This function returns an item details from the items table for a given category for a male
	*
	* @param $category : this is the category which the items should be retrieved
	* @return item details  as an associative array
	*
	*/
    public function retrieve_items_by_category_male($category) {
      $this->db->select("*");
	  $this->db->from('Items');
	  $array = array('Catagory' => $category, 'Gender' => 'male', 'Medium_Quantity >' =>0);
	  $this->db->where($array);
	  $this->db->join('ItemImage', 'ItemImage.itemID = Items.Item_ID');
	  $this->db->order_by("Date", "desc");
	  $this->db->group_by("Items.Item_ID"); 
	  $this->db->limit(4);
	  $query = $this->db->get();
	  return $query->result();
    }

    /**
    * This function adds Subscriber details to the database
	*
	* @param $mail : this is the email address of the subscribe which is needed to be
	* 				added to the database
	* @return number of Affected rows of database
	*
	*/
    public function add_subscriber($mail) {
    	$query = $this->db->query("SELECT formatSubscriberTable('".$mail."') as status");
		$row = $query->row();
		return $row->status;
	}

	/**
	* This function returns blog details from the database
	*
	* No parameters are used in this method
	* @return blog details  as an associative array
	*
	*/
	public function load_blog_details() {
    	 $this->db->select("*");
		 $this->db->from('Articles');
		 $query = $this->db->get();
		 return $query->result();
	}

	/**
	* This function returns sidebar advertiesment details from the database
	*
	* No parameters are used in this method
	* @return sidebar advertiesment details  as an associative array
	*
	*/
	public function retrieve_sidebar_advertiesments() {
    	 $this->db->select("*");
		 $this->db->from('SideBarAdvertiesment');
		 $query = $this->db->get();
		 return $query->result();
	}

	/**
	* This function returns banner advertiesment details from the database
	*
	* No parameters are used in this method
	* @return banner advertiesment details  as an associative array
	*
	*/
	public function retrieve_banner_advertiesments() {
    	 $this->db->select("*");
		 $this->db->from('BannerAdvertiesment');
		 $query = $this->db->get();
		 return $query->result();
	}
}