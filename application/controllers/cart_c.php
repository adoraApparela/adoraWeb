<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* This class is a controller class
* All the data transformation part for the cart based functions is performed here
*/
class Cart_c extends CI_Controller {
  /**
  * Constructor of the class
  */
	function __construct()
    {
        // this is your constructor
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
    }
    
    /** 
  * This function is the main function which excecute loads the cart view
  * No parameters are passed to this method
  * @return nothing
  *  Mainly this loads all the components to display the page part by part if the user is logged in
  * else this will redirect the user to the login page
  */
  public function index()
    {
        $this->load->model("Cart_model"); // Loads the cart data model

            // Check if the user is logged in
            if($this->session->userdata('Reg_ID') != null) {
                // Retrieve cart items for the logged user using the cart model
                $this->data['Items'] = $this->Cart_model->retrieve_cart_items($this->session->userdata('Reg_ID'));
                // Retrieve the quantitiy of cart items for the user using cart model
                $this->cart_qty = $this->Cart_model->retrieve_cart_items_count($this->session->userdata('Reg_ID'));
                // Retrieve the total of cart items for the user using cart model
                $this->cart_total = $this->Cart_model->retrieve_cart_total($this->session->userdata('Reg_ID'));

            // load the view file , we are passing $data array,cart_qty and cart total to view file
            $this->load->view('/cart', $this->data,$this->cart_qty,$this->cart_total); 
            }
            // If the user is not a logged user redirect him to the login page
            else {
             $_POST['cart_error'] = '<div class="alert alert-danger">
              <strong>Please Login to continue shopping</strong>   You should have an account to shopping here.
            </div>';
             redirect('welcome/login');
        }
    }

  /** 
  * This function is the main function which excecute loads the cart view
  * No parameters are passed to this method
  * @return nothing
  *  Mainly this loads all the components to display the page part by part if the user is logged in
  * else this will redirect the user to the login page
  */
	public function cart()
    {
    		$this->load->model("Cart_model"); // Loads the cart data model

            // Check if the user is logged in
            if($this->session->userdata('Reg_ID') != null) {
                // Retrieve cart items for the logged user using the cart model
                $this->data['Items'] = $this->Cart_model->retrieve_cart_items($this->session->userdata('Reg_ID'));
                // Retrieve the quantitiy of cart items for the user using cart model
                $this->cart_qty = $this->Cart_model->retrieve_cart_items_count($this->session->userdata('Reg_ID'));
                // Retrieve the total of cart items for the user using cart model
                $this->cart_total = $this->Cart_model->retrieve_cart_total($this->session->userdata('Reg_ID'));

            // load the view file , we are passing $data array,cart_qty and cart total to view file
        		$this->load->view('/cart', $this->data,$this->cart_qty,$this->cart_total); 
            }
            // If the user is not a logged user redirect him to the login page
            else {
             $_POST['cart_error'] = '<div class="alert alert-danger">
              <strong>Please Login to continue shopping</strong>   You should have an account to shopping here.
            </div>';
             redirect('welcome/login');
        }
    }

    /**
    * This function adds items to the cart
    * @param $itemID : This is the itemID which the entry should be added to the cart.
    * @param $unitPrice : This is the unit price for the item which should be added for
    * @return nothing
    */
    public function add_to_cart($itemID,$unitPrice) {

        $this->cart_qty = 0; // Initialize the cart qunatity to be zero

        // If the user is a logged user
        if($this->session->userdata('Reg_ID') != null) {
            $form_data = $this->input->post();

            // If the user has specified a qunatity to be added
            if(isset($form_data["qty"])) {
                $qty = $form_data["qty"];
            }
            else {
                $qty = 100;
            }

        	$this->load->model("Cart_model");  // Load the cart data model

            // Retrieve the available quantity for the selected item using the data model
            $available_qty = $this->Cart_model->retrieve_available_qty($itemID);
            // Retrieve items count on the user's cart
            $this->cart_qty = $this->Cart_model->retrieve_cart_items_count($this->session->userdata('Reg_ID'));

            // If the user specified quantity is less than the available qunatity 
            if($qty <= $available_qty) {
               $this->Cart_model->update_items($itemID,$available_qty,$qty); // Update the database by reducing avaialble quantity
               // Add the specified item to the users cart and to the database
        	     $this->Cart_model->add_cart_items($this->session->userdata('Reg_ID'),$itemID,$unitPrice,$qty);
               // Redirect the user to the cart page
               return redirect('cart_c/cart');
            }
            // If the user has specified a quantity greater than the available qunatity
            else if($available_qty > 0) {
                 // Add the available quantiity to the user's cart
                 $this->Cart_model->update_items($itemID,$available_qty,$available_qty);
                 $this->Cart_model->add_cart_items($this->session->userdata('Reg_ID'),$itemID,$unitPrice,$available_qty);
                 return redirect('cart_c/cart');
            }
        }
        // If the user is not a logged user
        else {
             $_POST['cart_error'] = '<div class="alert alert-danger">
              <strong>Please Login to continue shopping</strong>   You should have an account to shopping here.
            </div>';
             redirect('welcome/login'); // Redirect to the login page
        }
        
    }

    /**
    * This function removes items from the cart
    * @param $itemID : This is the itemID which the entry should be removed from the cart.
    * @param $qty : This is the quantity of the item which is going to be removed from the cart.
    * @param $cartID : This is the cartID of the entry which is needed to be removed from the cart table
    * @return redirect to cart page
    */
    public function remove_cart_item($cartID,$itemID,$qty) {

        // Load the cart data model
        $this->load->model("Cart_model");

        // Retrieve the available quantity for the selected item using the data model
        $available_qty = $this->Cart_model->retrieve_available_qty($itemID);

        // Remove an item from the cart for a given cart ID
        $this->Cart_model->remove_cart_items($cartID);

        // Update items table to reflect the changes
        $this->Cart_model->update_items($itemID,$available_qty,(-1*$qty));

        return redirect('cart_c/cart'); // Redirect the user to the cart page.
    }
}