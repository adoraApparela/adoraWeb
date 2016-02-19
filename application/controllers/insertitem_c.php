<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class insertitem_c extends CI_controller
{
	
	public function index()
	{

	$this->load->helper('url');
    $this->load->helper('html');
    $this->load->model('Insert_item_model');
	
		$data["status"] = 0;
		$this->load->view("AdminComponents/header");
		$this->load->view("AdminComponents/leftnavbar");
		$this->load->view("AdminComponents/insertitems",array('error' => ' ' ));
		$this->load->view("AdminComponents/footer");
	
		//check for submit button click
		if(isset($_POST['submit'])) 
		{
		
			$name = $this->input->post('name'); 
			$catagory = $this->input->post('catagory');
			$description = $this->input->post('description');
			$price = $this->input->post('price');
			$date = $this->input->post('date');
			//$gender = $this->input->post('gender');
			$small_qty = 0;
			$medium_qty = $this->input->post('medium_qty');
			$large_qty = 0;
			$xlarge_qty = 0;
			$freesize_qty = 0;
			
			if( strcmp(substr($catagory,0,1),"m") == 0)
			{
				$gender = "Male";
			}
			else if(strcmp(substr($catagory,0,1),"f") == 0)
			{
				$gender = "Female";
			}
			else
			{
				$gender = "Unisex";
			}

			$catagory = substr($catagory,1);

			$image_link = "";

			if(!$_FILES['photo']['name'])
			{
				$image_link = "/images/home/default.jpg";
			}
			else{
				$image_link = "/images/home/".$_FILES['photo']['name'];
			}

		// if the information has therefore been successfully saved in the db
		if ($id = $this->Insert_item_model->insert_items($name,$catagory,$description,$price,$date,
		$gender,$small_qty,$medium_qty,$large_qty,$xlarge_qty,$freesize_qty,$image_link)) 
			{ 
			    $data["status"] = 1;
			    echo '<script>alert("Item Successfully Added");</script>';
			}
	 	}

		

	}

//function used to load data to the view
public function itemhandle()
	{
	    $this->load->model('Insert_item_model');
		$this->load->view("AdminComponents/header");
		$this->load->view("AdminComponents/leftnavbar");

		if($data["content"] = $this->Insert_item_model->get_item_info())
		{
			$this->load->view("AdminComponents/update_delete_items_v",$data);
		}

		$this->load->view("AdminComponents/footer");

	}

//function to deelete items
public function delete_item($item_id)
	{
	    $this->load->model('Insert_item_model');
		$this->load->view("AdminComponents/header");
		$this->load->view("AdminComponents/leftnavbar");
		if($data["content"] = $this->Insert_item_model->delete_items($item_id))
		{
			$this->load->view("AdminComponents/update_delete_items_v",$data);
		}
		
		$this->load->view("AdminComponents/footer");

	}

//function to update items
public function update_item($item_id)
	{
		if(isset($_POST['submit']))
		{
			$item_idp =$item_id;
			$name = $this->input->post('name'); 
			$catagory = $this->input->post('catagory');
			$description = $this->input->post('description');
			$price = $this->input->post('price');
			$date = $this->input->post('date');
			//$gender = $this->input->post('gender');
			$small_qty = 0;
			$medium_qty = $this->input->post('medium_qty');
			$large_qty = 0;
			$xlarge_qty = 0;
			$freesize_qty = 0;

			if( strcmp(substr($catagory,0,1),"m") == 0)
			{
				$gender = "Male";
			}
			else if(strcmp(substr($catagory,0,1),"f") == 0)
			{
				$gender = "Female";
			}
			else
			{
				$gender = "Unisex";
			}

			$catagory = substr($catagory,1);

			$this->load->model('Insert_item_model');
			$this->load->view("AdminComponents/header");
			$this->load->view("AdminComponents/leftnavbar");
			if ($id = $this->Insert_item_model->update_items($item_idp,$name,$catagory,$description,$price,$date,
				$gender,$small_qty,$medium_qty,$large_qty,$xlarge_qty,$freesize_qty)) 
			{ 
			    if($data["content"] = $this->Insert_item_model->get_item_info())
				{
					echo '<script>alert("Item Updated");</script>';
					$this->load->view("AdminComponents/update_delete_items_v",$data);
				}

			}
			$this->load->view("AdminComponents/footer");

		}else
		{
			$this->load->model('Insert_item_model');
			$this->load->view("AdminComponents/header");
			$this->load->view("AdminComponents/leftnavbar");
			if($data["content"] = $this->Insert_item_model->get_single_item_info($item_id))
			{
				$this->load->view("AdminComponents/updateitems",$data);

			}
			$this->load->view("AdminComponents/footer");

		}
	}

	/**
    * This function navigates the admin to the cart handling page 
    * No parameters are passed to this method
    * @return nothing
    */
	public function cartHandle()
	{
	    $this->load->model('Cart_model');	// Load the cart model
		$this->load->view("AdminComponents/header");
		$this->load->view("AdminComponents/leftnavbar");

		if($data["content"] = $this->Cart_model->retrieve_cart_items_admin())
		{
			$this->load->view("AdminComponents/update_delete_cart",$data);
		}

		$this->load->view("AdminComponents/footer");

	}

	/**
    * This function removes items from the cart
    * @param $itemID : This is the itemID which the entry should be removed from the cart.
    * @param $qty : This is the quantity of the item which is going to be removed from the cart.
    * @param $cartID : This is the cartID of the entry which is needed to be removed from the cart table
    * @return nothing
    */
	public function delete_cart_item($cart_id,$itemID,$qty)
	{
	    $this->load->model('Cart_model');
		$this->load->view("AdminComponents/header");
		$this->load->view("AdminComponents/leftnavbar");

		// Retrieve the available quantity for the selected item using the data model
		$available_qty = $this->Cart_model->retrieve_available_qty($itemID);

		// Remove an item from the cart for a given cart ID
        $this->Cart_model->remove_cart_items($cart_id);

        // Update items table to reflect the changes
        $this->Cart_model->update_items($itemID,$available_qty,(-1*$qty));

		$data["content"] = $this->Cart_model->retrieve_cart_items_admin();
			$this->load->view("AdminComponents/update_delete_cart",$data);
		
		$this->load->view("AdminComponents/footer");

	}
}

?>