<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* This is a model class.
* This is the class which retrieves the data relating to the cart functions from the database
* and insert/ edit and delete data related to the cart table of the database
*/
class Cart_model extends CI_Model
{
	/**
	* This function returns cart item details from the database
	*
	* @param $user_id : This is the user id which the cart items should be retrieved for
	* @return cart item details  as an associative array
	*			
	*/
    public function retrieve_cart_items($user_id) {
      $this->db->select("*");
	  $this->db->from('Cart');
	  $this->db->where('Cart.Reg_ID',$user_id);
	  $this->db->join('Items', 'Cart.Item_ID = Items.Item_ID');
	  $this->db->join('ItemImage', 'ItemImage.ItemID = Items.Item_ID');
	  $this->db->group_by('Cart.Cart_ID');
	  $this->db->order_by("Cart.AddedTime", "desc"); 
	  $query = $this->db->get();
	  return $query->result();
    }

    /**
	* This function returns cart total for a given user 
	*
	* @param $user_id : This is the user id which the cart total should be retrieved for
	* @return cart total for the given user 
	*			
	*/
     public function retrieve_cart_total($user_id) {
      $this->db->select("SUM(Total) as subTot");
	  $this->db->from('Cart');
	  $this->db->where('Cart.Reg_ID',$user_id); 
	  $this->db->group_by('Cart.Reg_ID');
	  $query = $this->db->get();
	  return $query->row('subTot');
    }

    /**
	* This function adds cart item details to the database
	*
	* @param $user_id : This is the user id which the cart items should be added for
	* @param $item_id : This is the item id which the cart items should be added for
	* @param $unit_price : This is the unit price of the item to be added 
	* @return cart item details  as an associative array
	*			
	*/
    public function add_cart_items($user_id, $item_id,$unit_price,$qty) {
     $data = array(
		   'Item_ID' => $item_id ,
		   'Reg_ID' => $user_id ,
		   'Quantity' => $qty ,
		   'UnitPrice' => $unit_price ,
		   'Total' => $unit_price*$qty
		);

		return $this->db->insert('Cart', $data); 
    }

    /**
	* This function returns number of items available for a give itemID from the database
	*
	* @param $item_id : This is the item id which the item details should be retrieved for
	* @return item details  as an associative array
	*			
	*/
    public function retrieve_available_qty($item_id) {
      $this->db->select("Medium_Quantity");
	  $this->db->from('Items');
	  $this->db->where('Items.Item_ID',$item_id);
	  $query = $this->db->get();
	  return $query->row('Medium_Quantity');
    }

    /**
	* This function updates the item table for a given itemID 
	*
	* @param $item_id : This is the item id which the item details should be retrieved for
	* @param $qty : This is the quantity of the item which is going to be removed/added from/to the items table.
	* @param $avail_qty : This is the quantity of the item which is available currently.
	* @return id : number of rows affected
	*			
	*/
    public function update_items($item_id,$avail_qty,$qty) {
     $data = array(
		   'Medium_Quantity' => $avail_qty-$qty
		);

     $this->db->where('Item_ID',$item_id);
	 $id = $this->db->update('Items', $data);

		return $id;
    }

    /**
    * This function removes items from the cart
    * @param $cartID : This is the cartID of the entry which is needed to be removed from the cart table
    * @return Nothing
    */
    public function remove_cart_items($cartID) {
    	$this->db->where('Cart_ID', $cartID);
		$this->db->delete('Cart'); 
    }

    /**
    * This function retrieves items count from the cart for a given user
    * @param $user_ID : This is the user_ID of the user which the cart items count should be retrieved for
    * @return Nothing
    */
    public function retrieve_cart_items_count($user_id) {
	  $this->db->where('Cart.Reg_ID',$user_id);
	  $this->db->from('Cart');
	  return $this->db->count_all_results();
    }

    /**
	* This function returns cart items in the carts of all users for admin purposes
	*
	* No paramters are accepted by this method
	* @return cart item details  as an associative array
	*			
	*/
    public function retrieve_cart_items_admin() {
      $this->db->select("Cart.Cart_ID,Registered_Users.Name as uName,Items.Name as iName,Cart.UnitPrice,Cart.Quantity,Cart.Total,Cart.AddedTime,Items.Item_ID");
	  $this->db->from('Cart');
	  $this->db->join('Items', 'Cart.Item_ID = Items.Item_ID');
	  $this->db->join('Registered_Users', 'Registered_Users.Reg_ID = Cart.Reg_ID');
	  $this->db->group_by('Cart.Cart_ID');
	  $query = $this->db->get();
	  return $query->result();
    }

    public function get_id_by_name($name)
	{
		$this->db->select("Reg_ID");
	  	$this->db->from('Registered_Users');
	  	$this->db->where('Username',$name);
	  	$query = $this->db->get();
	  	
	 	return $query->result()[0]->Reg_ID;
	}

	public function getTotal($items)
    {
    	$total=0;
    	foreach ($items as $itm) {
    		$total = $total + $itm->Total;
    	}
    	return $total;
    }

    public function get_cart_items_only($user_id)
    {
    	$this->db->select("*");
	  	$this->db->from('Cart');
	  	$this->db->where('Reg_ID',$user_id);
	  	$query = $this->db->get();
	  	return $query->result();
    }

    public function insert_perchase($itm)
    {
    	$data = array(
		   'Item_ID' => $itm->Item_ID ,
		   'Reg_ID' => $itm->Reg_ID ,
		   'PurchasedTime' => $itm->AddedTime ,
		   'Total' => $itm->Total,
		   'Quantity' => $itm->Quantity,
		   'UnitPrice' => $itm->UnitPrice
		);
    	//var_dump($data);
		return $this->db->insert('Purchases', $data); 

    }
}