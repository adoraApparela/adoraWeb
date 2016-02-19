<?php

class Insert_item_model extends CI_Model
{
/**/
/*function used to insert items to the database.
Gets the name, catagory etc from the controler and sends it into the cloud database*/
public function insert_items($name,$catagory,$description,$price,$date,$gender,$small_qty,$medium_qty,$large_qty,$xlarge_qty,$freesize_qty,$image_link)
{
	
		$data = array(
			'Name' => $name,
			'Catagory' => $catagory,
			'Description' => $description,
			'Price' => $price,
			'Date' => $date,
			'Gender' => $gender,
			'Small_Quantity' => $small_qty,
			'Medium_Quantity' => $medium_qty,
			'Large_Quantity' => $large_qty,
			'XL_Quantity' => $xlarge_qty,
			'FreeSize_Quantity' => $freesize_qty
			);

		//print_r($data);
		//data array is inserted into the Items table and result is taken to $id variable
		$id = $this->db->insert('Items', $data);
		//$last_id = $conn->lastInsertId();

		$query=  $this->db->query("SELECT MAX(Item_ID) as ID_a from Items");
        $row = $query->row();
        $item_id_last = $row->ID_a;

		$imgdata = array(
			'itemID' => $item_id_last,
			'imageLink' => $image_link
			);
		$this->db->insert('ItemImage', $imgdata);


		return $id;

}

/*function to update items*/
public function update_items($item_id,$name,$catagory,$description,$price,$date,$gender,$small_qty,$medium_qty,$large_qty,$xlarge_qty,$freesize_qty)
{
	
		$data = array(
			'Name' => $name,
			'Catagory' => $catagory,
			'Description' => $description,
			'Price' => $price,
			'Date' => $date,
			'Gender' => $gender,
			'Small_Quantity' => $small_qty,
			'Medium_Quantity' => $medium_qty,
			'Large_Quantity' => $large_qty,
			'XL_Quantity' => $xlarge_qty,
			'FreeSize_Quantity' => $freesize_qty
			);

		//print_r($data);
		//data array is inserted into the Items table and result is taken to $id variable
		$this->db->where('Item_ID',$item_id);
		$id = $this->db->update('Items', $data);

		return $id;

}

/*function to delete an item when item id is given*/
public function delete_items($item_id)
{
		$this->db->where('Item_ID',$item_id);
		$id = $this->db->delete('Items');

		$this->db->select('*');
	    $this->db->from('Items');
	    $query = $this->db->get();
	    
	    return $result = $query->result();
}

/*function to get all the item details from the database*/
public function get_item_info()
{
	$this->db->select('*');
    $this->db->from('Items');
    $query = $this->db->get();
    return $result = $query->result();
}

/*function to get specific item details from the database*/
public function get_single_item_info($item_id)
{
	$this->db->where('Item_ID',$item_id);
	$this->db->select('*');
    $this->db->from('Items');

    $query = $this->db->get();
    return $result = $query->result();
}

}
?>