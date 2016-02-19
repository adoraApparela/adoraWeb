<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* This is a controller class.
* This is where all the request and data transformation is processed for the 
* home page and other general methods involving navigation and sendig of mails
*/
class Welcome extends CI_Controller {

	/**
	* This is the constructor of this class
	*/
	function __construct()
    {
        // this is your constructor
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
    }

	/**
	* This function is the main function which excecute after calling the
	*		welcome controller
	* No parameters are passed to this method
	* @return nothing
	*  Mainly this loads all the components to display the page part by part
	*/
	public function index()
	{
		// Load the required model to retrieve and edit data from database
		$this->load->model("Home_page_model"); 
		$this->load->model("Cart_model");
		$this->load->model("Recommend_model");

		// Retrieve the brought categories for the user using the data model
		$this->bought_items = $this->Recommend_model->retrieve_brought_categories($this->session->userdata('Reg_ID'));
		$rItems = array();

		// For each category that the user has bought before
		foreach ($this->bought_items as $item) {
			// Get the other available items for that category
			$itemX = $this->Recommend_model->retrieve_items_for_category($item->Catagory);
			foreach($itemX as $it) {
				array_push($rItems,$it);
			}
		}

		$this->data['recommended_items'] = $rItems;
		$this->cart_qty = $this->Cart_model->retrieve_cart_items_count($this->session->userdata('Reg_ID'));

		$this->data['carousel_items'] = $this->Home_page_model->retrieve_carousel_items();	// Get the carousel items

		$this->data['latest_items'] = $this->Home_page_model->retrieve_latest_items(6); // Get the latest items

		// Load the items according to their categories
		$this->data['T_shirts'] = $this->Home_page_model->retrieve_items_by_category('T-shirt');
		$this->data['Pants'] = $this->Home_page_model->retrieve_items_by_category('Pants');
		$this->data['Frocks'] = $this->Home_page_model->retrieve_items_by_category('Frocks');
		$this->data['Kids'] = $this->Home_page_model->retrieve_items_by_category('Kids');
		$this->data['Underwears'] = $this->Home_page_model->retrieve_items_by_category('Underwears');

		$this->data['SideBarAdvertiesments'] = $this->Home_page_model->retrieve_sidebar_advertiesments();

		$this->load->view('components/head_section.php');
		$this->load->view('components/body_header.php',$this->cart_qty);
		$this->load->view('components/index_scripts.php');
		$this->load->view('components/slider.php', $this->data); 
		$this->load->view('components/container.php'); 
		$this->load->view('components/footer.php'); 

   		$this->load->view('index'); // load the view file , we are passing $data array to view file

	}
        
    public function logout()
    {  
        $this->session->sess_destroy();
        redirect('welcome/index', 'refresh');
    }
        
    public function login()
    {
        $loggin_status = $this->session->userdata('login_status');

        $this->load->model("Cart_model");
		$this->cart_qty = $this->Cart_model->retrieve_cart_items_count($this->session->userdata('Reg_ID'));


        if($loggin_status==true)
        {
            redirect('welcome/index', 'refresh');

        }else
        {
            $this->load->view('login',$this->cart_qty);
        }
    }

    /**
    * This function loads all the components to display the product details page part by part
	*		
	* @param $item_id : This is the itemId which the product details should be retrieved for
	* @returns nothing
	*   
	*/
    public function product_details($item_id)
    {
    		$this->load->model("Home_page_model");
    		$this->load->model("Item_details_model");
    		$this->load->model("Cart_model");

			$this->cart_qty = $this->Cart_model->retrieve_cart_items_count($this->session->userdata('Reg_ID'));

            $this->data['item_details'] = $this->Home_page_model->retrieve_specific_item($item_id); // Get the selected product details
            $this->data['reviews'] = $this->Item_details_model->retrieve_reviews($item_id); // Get the selected product details
            $this->data['images'] = $this->Item_details_model->retrieve_image_list($item_id); // Get the image list for selected item

            $this->load->view('components/head_section.php');
			$this->load->view('components/body_header.php',$this->cart_qty);
			$this->load->view('components/index_scripts.php');
            $this->load->view('product_details',$this->data);
            $this->load->view('components/footer.php'); 
    }

    /**
    * This function loads all the components to display the shop page part by part
	*		
	* No parameters are passed to this method
	* @return nothing
	*   
	*/
    public function shop()
    {
    		$this->load->model("Home_page_model");
    		$this->load->model("Cart_model");

			$this->cart_qty = $this->Cart_model->retrieve_cart_items_count($this->session->userdata('Reg_ID'));

            $this->data['latest_items'] = $this->Home_page_model->retrieve_latest_items(12); // Get the most latest 12 items

            $this->data['SideBarAdvertiesments'] = $this->Home_page_model->retrieve_sidebar_advertiesments();
            $this->data['BannerAdvertiesments'] = $this->Home_page_model->retrieve_banner_advertiesments(); // Get the most latest 12 items

            $this->load->view('components/head_section.php');
			$this->load->view('components/body_header.php',$this->cart_qty);
			$this->load->view('components/index_scripts.php');
            $this->load->view('shop', $this->data); // load the view file , we are passing $data array to view file
            $this->load->view('components/footer.php'); 
    }

    public function checkout()
    {
            $this->load->model("Cart_model");

			$this->cart_qty = $this->Cart_model->retrieve_cart_items_count($this->session->userdata('Reg_ID'));

			 if(isset($_SESSION['Username']))
            {
                $user_id = $this->Cart_model->get_id_by_name($_SESSION['Username']);
                $items = $this->Cart_model->retrieve_cart_items($user_id);
                $this->data['Items'] =  $items;
                $this->data['Total'] =  $this->Cart_model->getTotal($items);
                $this->cart_qty = $this->Cart_model->retrieve_cart_items_count($user_id);

			$this->load->view('checkout',$this->data,$this->cart_qty); 
			}
    }

   

    /**
    * This function loads all the components to display the contact-us page part by part
	*		
	* No parameters are passed to this method
	* @return nothing
	*   
	*/
    public function contact_us()
    {
    		$this->load->model("Cart_model");

			$this->cart_qty = $this->Cart_model->retrieve_cart_items_count($this->session->userdata('Reg_ID'));

    		$this->load->view('components/head_section.php');
			$this->load->view('components/body_header.php',$this->cart_qty);
    		$this->load->view('contact_us');

    }

    /**
    * This function loads the items selected by the user for male 
	*		
	* @param $category : This is the selected category name by the user
	* @return nothing
	*   
	*/
    public function load_selected_items_male($category)
    {
    		$this->load->model("Home_page_model");

    		$this->data['Items'] = $this->Home_page_model->retrieve_items_by_category_male($category);

    		$this->load->view('filter_result', $this->data); // load the view file , we are passing $data array to view file
    }

    /**
    * This function loads the items selected by the user for female 
	*		
	* @param $category : This is the selected category name by the user
	* @return nothing
	*   
	*/
    public function load_selected_items_female($category)
    {
    		$this->load->model("Home_page_model");

    		$this->data['Items'] = $this->Home_page_model->retrieve_items_by_category_female($category);

    		$this->load->view('filter_result', $this->data); // load the view file , we are passing $data array to view file
    }

    /**
    * This function loads the items selected by the user for both male and female 
	*		
	* @param $category : This is the selected category name by the user
	* @return nothing
	*   
	*/
    public function load_selected_items($category)
    {
    		$this->load->model("Home_page_model");

    		$this->data['Items'] = $this->Home_page_model->retrieve_items_by_category($category);

    		$this->load->view('filter_result', $this->data); // load the view file , we are passing $data array to view file
    }

    /**
    * This function sends a mail to newly subscribed users and
    * send the subscribers mail address to the database using the data model	
	* @param $category : This is the selected category name by the user
	* @return nothing
	*   
	*/
    public function send_new_subscription_mail()
	{
		// If a valid email address is given
		if(isset($_POST["emailAddress"])) {
			$status = $this->add_subscriber(); 	// Add the email address to the database
			
			// If the INSERT query is sucessfull, send a mail to that email address
			if($status) 
			{
					// Send mail configurations
				   $config = Array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'ssl://smtp.googlemail.com',
				  'smtp_port' => 465,
				  'smtp_user' => 'adora.apparel@gmail.com', 
				  'smtp_pass' => 'tryandtry', 
				  'mailtype' => 'html',
				  'charset' => 'iso-8859-1',
				  'wordwrap' => TRUE
					);

			      $message = 'You have sucessfully subscribed to recieve our promotional mails. Thank you!';
			      $this->load->library('email', $config);
			      $this->email->set_newline("\r\n");
			      $this->email->from('adora.apparel@gmail.com'); 
			      $this->email->to($_POST["emailAddress"]);
			      $this->email->subject('Welcome to Adora Apparel');
			      $this->email->message($message);

			      if($this->email->send())
			     {
			      	echo "Sent";
			     }
			     else
			    {
			     	echo "Failed";
			    }
			}
		
			else {
					echo "Already Subscribed";
			}
		}
		
		else {
			echo "Please Provide a valid email address to subscribe";
		}

	}

	/**
	* This function adds subscriber details to the database
	* No parameters are passed to this method.
	* but it access the POST data array element called emailAddress
	* @return a boolean value for the operation
	*   	if sucess returns true
	*/
	public function add_subscriber()
	{
		$this->load->model("Home_page_model");
		return $this->Home_page_model->add_subscriber($_POST["emailAddress"]);	// Add new subscriber details to the database through the modal
	}

	public function change_user_profile()
    {
    	$this->load->model("Cart_model");
		$this->cart_qty = $this->Cart_model->retrieve_cart_items_count($this->session->userdata('Reg_ID'));

        $this->load->view('change_user_profile',$this->cart_qty);
    }

	/**
	* This function adds review details to the database
	* @param $item_id : This is the itemID which the review should be added for
	* @return nothing
	*   
	*/
	public function add_review($item_id)
	{
		$form_data = $this->input->post();
		$this->load->model("Item_details_model");
		$status = $this->Item_details_model->add_review($item_id,$form_data);


    	$this->product_details($item_id);
	}

	/**
	* This function adds a new genearal inquiry to the database
	* No parameters are passed to this method
	* @return nothing
	*   
	*/
	public function add_inquiry() {
		$form_data = $this->input->post();
      	$this->load->model("Contact_us_model");

    	$status = $this->Contact_us_model->add_new_inquiry($form_data);

    	if($status){
    		echo '<script language="javascript">';
			echo 'alert("Your message is sucessfully sent. You will recieve a asnwer with in 3 working days from out support team. Thank you!")';
			echo '</script>';
    	}
    	else {
    		echo '<script language="javascript">';
			echo 'alert("Your message counldn\'t sent at this time. try again later. Thank you!")';
			echo '</script>';
    	}
    	$this->load->view("contact_us");
	}

	/**
	* This function adds a new item inquiry to the database
	* No parameters are passed to this method
	* @return nothing
	*   
	*/
	public function add_item_inquiry() {
		$form_data = $this->input->post();
      	$this->load->model("Contact_us_model");

    	$status = $this->Contact_us_model->add_new_item_inquiry($form_data);

    	if($status){
    		echo '<script language="javascript">';
			echo 'alert("Your message is sucessfully sent. You will recieve a asnwer with in 3 working days from out support team. Thank you!")';
			echo '</script>';
    	}
    	else {
    		echo '<script language="javascript">';
			echo 'alert("Your message counldn\'t sent at this time. try again later. Thank you!")';
			echo '</script>';
    	}
    	$this->contact_us();
	}

	 public function log_current_user_validation()
    {
            $this->load->helper(array('form','url'));
        
            $this->load->model('Login_user_model');     // loading login_user_model
            
            $this->cart_qty = 0;

            $result = $this->Login_user_model->get_user_profile($this->input->post('username_or_email'),$this->input->post('password_login'));  // getting results from login_user_model

            if($this->input->post('remember_me'))
            {
                $this->session->sess_expiration = 30*30*24*30;
            }

            if($result == -100)     // Error code -100 means Incorrect password, If -100 return it'll POST to the same page with Error message
            {
                $_POST['invalid_password'] = '<div class="alert alert-danger">
  <strong>Invalid Password!</strong>   Password is wrong.
</div>';
                $this->load->view('login',$this->cart_qty);
            }
            
            if($result == -10)  // Error code -10 means Invalid username or Password (Username or email doesn't exist in database), If -10 return it'll POST to the same page with Error message
            {
                $_POST['invalid_email_or_username'] = '<div class="alert alert-danger">
  <strong>Invalid Username or Email!</strong>   Please check your username or email.
</div>';
                $this->load->view('login',$this->cart_qty);
            }
            
            if(is_array($result))   // If username/email and password both are correct
            {
                $user_logged_true = array("login_status" => TRUE);
                $user = array_merge($result,$user_logged_true);
                $this->session->set_userdata($user);

                redirect('welcome/index', 'refresh');

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
        define("DEFAULT_QTY", 100);

        // If the user is a logged user
        if($this->session->userdata('Reg_ID') != null) {
            $form_data = $this->input->post();

            // If the user has specified a qunatity to be added
            if(isset($form_data["qty"])) {
                $qty = $form_data["qty"];
            }
            else {
                $qty = DEFAULT_QTY;
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
               return redirect('welcome/cart');
            }
            // If the user has specified a quantity greater than the available qunatity
            else if($available_qty > 0) {
                 // Add the available quantiity to the user's cart
                 $this->Cart_model->update_items($itemID,$available_qty,$available_qty);
                 $this->Cart_model->add_cart_items($this->session->userdata('Reg_ID'),$itemID,$unitPrice,$available_qty);
                 return redirect('welcome/cart');
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

        return redirect('welcome/cart'); // Redirect the user to the cart page.
    }

    /*
	 * initially load the login screen
	 */
	public function adminLogin()
	{
		$this->load->helper('url');
		$this->load->view('admin-login');
	}

    /*
	*Index function
	*Loads the initial components of the administrator view	
	*/
	public function adminIndex()
	{
		//model is loaded
		$this->load->model("Notification_model");
		//other components are loaded	
		$this->load->view("AdminComponents/header");
		$this->load->view("AdminComponents/leftnavbar");
		//functions of notification_model is calles and initialized to variables
		//weekly records are checked
		$purchases = $this->Notification_model->getSales("week");
		$messages = $this->Notification_model->getMessages("week");
		$users = $this->Notification_model->getRegisteredUsers("week");
		$subscribers = $this->Notification_model->getSubscribers("week");
		//initialized to an array called array1
		$array1 = array($purchases,$messages,$users,$subscribers);
		//arrays are murged purchase qualuty private function is appended
		$data['records'] = array_merge($array1, $this->purchaseQuality());
		//data array is passed to div1 view
		$this->load->view("AdminComponents/AdminHome",$data);
		$this->load->view("AdminComponents/footer");
	}

	/*
  * Admin/ Backend Login method
  * User can log using either username or email with the correct password
  *
  * Error code -100 means Incorrect password
  * Error code -10 means Invalid username or Password (Username or email doesn't exist in database)
  *
  */
	public function admin_login()
	{
		$this->load->library('session');

		$this->load->helper(array('form','url'));

		$this->load->model('Admin_login_model');

		$result = $this->Admin_login_model->get_admin_profile($this->input->post('admin_username'),$this->input->post('admin_password'));  // getting results from login_user_model

		if($result == -100)     // Error code -100 means Incorrect password, If -100 return it'll POST to the same page with Error message
		{
			$_POST['invalid_admin_password'] = '<div class="alert alert-danger">
  <strong>Invalid Password!</strong>   Password is wrong.
</div>';
			$this->load->view('admin-login');
		}

		if($result == -10)  // Error code -10 means Invalid username or Password (Username or email doesn't exist in database), If -10 return it'll POST to the same page with Error message
		{
			$_POST['invalid_admin_email_or_username'] = '<div class="alert alert-danger">
  <strong>Invalid Username or Email!</strong>   Please check your username or email.
</div>';
			$this->load->view('admin-login');
		}

		if(is_array($result))   // If username/email and password both are correct
		{
			$user_logged_true = array("admin_login_status" => TRUE);
			$admin_user = array_merge($result,$user_logged_true);
			$this->session->set_userdata($admin_user);

			$this->adminIndex();

		}
	}


	/*
	 * login out and deleting the session
	 */
	public function admin_logout()
	{

		$this->session->sess_destroy();
		$this->adminLogin();
		redirect('welcome/adminLogin');

	}


	/*
	 * loads the admin profile page
	 * admin profile page manipulate profile info,
	 * change credentials
	 */
	public function changeAdminProfile()
	{
		$this->load->view("AdminComponents/header");
		$this->load->view("AdminComponents/leftnavbar");

		$this->load->view("AdminComponents/change_admin_profile");
		$this->load->view("AdminComponents/footer");
	}


	/*
	 * Validate and update basic admin profile info
	 * Name, Email, Phone #
	 */
	public function validate_and_update_admin_profile_info()
	{


		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');


			$new_user_name = false;	// flags initially false
			$new_email = false;	// flags initially false


			$this->load->model('Admin_login_model');

			$user_enterd_password_hash = md5($this->input->post('admin_current_password'));	// get user entered password
			$current_admin = $this->Admin_login_model->get_admin_from_username($this->session->userdata('Admin_Username')); // get logged in admin's user object

			if ($user_enterd_password_hash == $current_admin->Admin_Password) {		// check if user entered password == current password


				if (strlen($_POST['admin_new_name']) >= 3) {	// check whether new entered name length > 3, Min value is 3 characters for a name

					$new_user_name = $_POST['admin_new_name'];

					$this->load->model('Admin_login_model');

					$user_array = array(						// creates the user object to save in the database
						'Admin_Name' => $new_user_name
					);

					$user_id = $this->session->userdata('Admin_Username');	// get the current admin's user name from the session

					$success = $this->Admin_login_model->update_admin_profile($user_array, $user_id);	// updates the database

					$this->session->set_userdata('Admin_Name', $new_user_name);		// update the current session variable with new value

					if (!$success) {			// if not success shows JS error message
						echo '<script language="javascript">';
						echo 'alert("Error Occured While updating username. Try again !")';
						echo '</script>';

						$this->changeAdminProfile();
					}
				}

				if (strlen($_POST['admin_new_email']) >= 3) {	// check whether new email has more than 3 characters. Min value is 3 characters for an email

					$new_email = $_POST['admin_new_email'];		// get the newly entered email from the POST var

					$this->load->model('Admin_login_model');

					$user_array = array(				// create object with new email to save on DB
						'Admin_Email' => $new_email
					);

					$user_id = $this->session->userdata('Admin_Username');	// get the currently logged in user's user name from session

					$success = $this->Admin_login_model->update_admin_profile($user_array, $user_id);	// save new data on DB

					$this->session->set_userdata('Admin_Email', $new_email);	// update the session with new value

					if (!$success) {
						echo '<script language="javascript">';
						echo 'alert("Error Occured while updating email. Try again !")';	// if not success shows JS error message
						echo '</script>';

						$this->changeAdminProfile();
					}

				}

				if (strlen($_POST['admin_new_phone']) >= 5) {	// check whether new phone num has more than 5 characters. Min value is 5 characters for a phone num

					$new_Phone = $_POST['admin_new_phone'];  // get the newly entered phone num from the POST var

					$this->load->model('Admin_login_model');

					$user_array = array(				// create object with new phone num to save on DB
						'Admin_Phone' => $new_Phone
					);

					$user_id = $this->session->userdata('Admin_Username');	// get current logged user's username using session

					$success = $this->Admin_login_model->update_admin_profile($user_array, $user_id);	// save new data on DB

					$this->session->set_userdata('Admin_Phone', $new_Phone);	// update the session variable with new data

					if (!$success) {
						echo '<script language="javascript">';		// if not success shows JS error message
						echo 'alert("Error Occured while updating phone number. Try again !")';
						echo '</script>';

						$this->changeAdminProfile();
					}

				}

				if ($_POST['admin_new_email'] || $_POST['admin_new_name'] || $_POST['admin_new_phone']) {  // if all successfully happened show success msg
					echo '<script language="javascript">';
					echo 'alert("Successfully Updated !!!")';
					echo '</script>';

					$this->changeAdminProfile();

				}else{

					echo '<script language="javascript">';		// If there is no new values entered and user just click update, shows error msg
					echo 'alert("Nothing changed !!!")';
					echo '</script>';

					$this->changeAdminProfile();

				}
			} else {

				echo '<script language="javascript">';		// if password is wrong show JS error msg
				echo 'alert("Wrong Password !!!")';
				echo '</script>';

				$this->changeAdminProfile();


			}


		}


	/*
	 * this method changes the admin password
	 * check the old password
	 * then check newly entered password with confirmation password
	 * if all are correct updates the password
	 * if something wrong shows corresponding error msg
	 */
	public function change_admin_password()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->load->model('Admin_login_model');

		$user_enterd_password_hash = md5($this->input->post('admin_old_password'));		// get user entered password
		$current_admin = $this->Admin_login_model->get_admin_from_username($this->session->userdata('Admin_Username'));  // get current user object

		$new_pass = $this->input->post('admin_new_password');	 // get new password from post
		$new_pass_again = $this->input->post('admin_new_password_again'); // get new confirm password from post

		if($new_pass != $new_pass_again)	// if new password and confirm password not same, shows error msg in JS
		{
			echo '<script language="javascript">';
			echo 'alert("New Password and New Confirm Password field does not match !!!")';
			echo '</script>';

			$this->changeAdminProfile();
		}else{

			if($user_enterd_password_hash == $current_admin->Admin_Password && strlen($new_pass)>0)		// if user entered password hash == current user password's hash
			{

				$this->load->model('Admin_login_model');

				$user_array = array(				// create the user object to save new data on db
					'Admin_Password' => md5($new_pass)
				);

				$user_id = $this->session->userdata('Admin_Username');	// get current user name from the session

				$success = $this->Admin_login_model->update_admin_profile($user_array, $user_id);	// update admin profile on DB

				$this->session->set_userdata('Admin_Password', md5($new_pass));		// update curent session data

				if ($success) {
					echo '<script language="javascript">';
					echo 'alert("Password successfully changed !!!")';		// If success show JS confirmation
					echo '</script>';

					$this->changeAdminProfile();
				}else{
					echo '<script language="javascript">';
					echo 'alert("Error occured while changing the password. Try again !!!")';	// If not success shows JS Error
					echo '</script>';

					$this->changeAdminProfile();
				}
			}else{
				echo '<script language="javascript">';						// This else part will execute if the password is wrong
				echo 'alert("Current password is wrong. Try again !!!")';	// show error in JS
				echo '</script>';

				$this->changeAdminProfile();
			}

		}




	}


	/*
	*purchaseQuality private function
	*Used to calculate and check if the week's sales is up to expected standards
	*returns an array with 3 elements
	*/
	private function purchaseQuality()
	{
		//loads model
		$this->load->model("notification_model");
		//weekly and yearly sales are initialized
		$Weekpurchases = $this->notification_model->getSales("week");
		$Monthpurchases = $this->notification_model->getSales("month");
		//variable to check validity of purchases
		
		$PurchaseValidity = true;
		if($Monthpurchases <= 0)
		{
			$PurchaseValidity = false;
		}
		else{
		//percentage calculation
		$percentage = $Weekpurchases*100/$Monthpurchases;
		}

		//check if week's purchases if at least 20% of the month
		if($Weekpurchases >= $Monthpurchases*(20/100) && $PurchaseValidity)
		{
			return array(true,"This is a good week for sales!",
				$percentage."% of monthly sales were done this week");
		}
		else if(!$PurchaseValidity)
		{
			return array(false,"No Sales done in this month","No sales were done this week");
		}
		else
		{
			return array(false,"Sales are not that good!",
				"Only ".$percentage."% of monthly sales were done this week");
		}

	}

	/*
	* function name AddSlider
	* no inputs
	* used to add a new record to Table
	*/
	public function AddSlider()
	{
		$this->load->model('Adv_model');
		$this->load->view("AdminComponents/header");
		$this->load->view("AdminComponents/leftnavbar");
		$this->load->view("AdminComponents/Carousel",array('error' => ' ' ));
		$this->load->view("AdminComponents/footer");
		//checks for button click
		if(isset($_POST['submit']))
		{
			//gets the information from POST method
			$Heading = $this->input->post('Header');
			$Description = $this->input->post('Description');
			$ImageLink = "";

			if(!$_FILES['photo']['name'])
			{
				$ImageLink = "/images/home/default.jpg";
			}
			else{
				$ImageLink = "/images/home/".$_FILES['photo']['name'];
			}

			if ($id = $this->Adv_model->insertCarousel($Heading,$ImageLink,$Description)) 
			{ 
			    $data["status"] = 1;
			    echo '<script>alert("Item Successfully Added");</script>';
			}
			else
			{
				echo '<script>alert("Failed To Add");</script>';
			}


		}

	}

	public function purchaseChart()
{
	$this->load->model("Charts_model");
	$this->load->view("AdminComponents/header");
	$this->load->view("AdminComponents/leftnavbar");
	

	$data = array();

	foreach ($this->Charts_model->SalesChart() as $row)
	{
		$data[] = $row;
	}
	$output['displey'] = json_encode( $data );

	$this->load->view("AdminComponents/Charts/purchase_chart",$output);

	$this->load->view("AdminComponents/footer");	
}

	/*
	*function purchaseChart
	*used to display monthly purchases 
	*output is a chart view
	*/
	public function userRegChart()
	{
		$this->load->model("Charts_model");
		$this->load->view("AdminComponents/header");
		$this->load->view("AdminComponents/leftnavbar");
		
		$data = array();

		foreach ($this->Charts_model->userRegChart() as $row)
		{
			$data[] = $row;
		}
		$output['displey'] = json_encode( $data );

		$this->load->view("AdminComponents/Charts/userReg_chart",$output);

		$this->load->view("AdminComponents/footer");	
	}

	/*
	* function name Loadinquiry
	* 
	*/
	public function Loadinquiry()
	{
	    $this->load->model('Inquiry_model');
		$this->load->view("AdminComponents/header");
		$this->load->view("AdminComponents/leftnavbar");

		if($data["content"] = $this->Inquiry_model->get_inquiry_info())
		{
			$this->load->view("AdminComponents/ItemInquiry",$data);
		}

		$this->load->view("AdminComponents/footer");

	}

	public function LoadGeneralinquiry()
	{
	    $this->load->model('Inquiry_model');
		$this->load->view("AdminComponents/header");
		$this->load->view("AdminComponents/leftnavbar");

		if($data["content"] = $this->Inquiry_model->get_general_inquiry_info())
		{
			$this->load->view("AdminComponents/GeneralInquiry",$data);
		}

		$this->load->view("AdminComponents/footer");

	}

	public function DeleteGI($ID)
	{
		$this->load->model('Inquiry_model');
		$this->load->view("AdminComponents/header");
		$this->load->view("AdminComponents/leftnavbar");
		if($data["content"] = $this->Inquiry_model->DeleteGI($ID))
		{
			$this->load->view("AdminComponents/GeneralInquiry",$data);

		}
		$this->load->view("AdminComponents/footer");

	} 

	public function DeleteII($ID)
	{
		$this->load->model('Inquiry_model');
		$this->load->view("AdminComponents/header");
		$this->load->view("AdminComponents/leftnavbar");
		if($data["content"] = $this->Inquiry_model->DeleteII($ID))
		{
			$this->load->view("AdminComponents/ItemInquiry",$data);

		}
		$this->load->view("AdminComponents/footer");

	}

	public function RedirectInquiry($ID)
	{
		
		$this->load->model('Inquiry_model');
		$this->load->view("AdminComponents/header");
		$this->load->view("AdminComponents/leftnavbar");
		if($data["content"] = $this->Inquiry_model->get_single_general_inquiry_info($ID))
		{
			$this->load->view("AdminComponents/ReplyInquiry",$data);

		}
		$this->load->view("AdminComponents/footer");
		
	}

	public function RedirectItemInquiry($ID)
	{
		
		$this->load->model('Inquiry_model');
		$this->load->view("AdminComponents/header");
		$this->load->view("AdminComponents/leftnavbar");
		if($data["content"] = $this->Inquiry_model->get_single_inquiry_info($ID))
		{
			$this->load->view("AdminComponents/ReplyItemInquiry",$data);

		}
		$this->load->view("AdminComponents/footer");
		
	}

	public function sendItemInqEmail($ID)
	{

		$this->load->model('Inquiry_model');
		
		//configuration of e mail
	    $config = Array(
	     'protocol' => 'smtp',
	     'smtp_host' => 'ssl://smtp.googlemail.com',
	     'smtp_port' => 465,
	     'smtp_user' => 'adora.apparel@gmail.com',
	     'smtp_pass' => 'tryandtry',
	     'mailtype' => 'html',
	     'charset' => 'iso-8859-1',
	     'wordwrap' => TRUE
	    );

	     $this->load->library('email', $config);
	     $this->email->set_newline("\r\n");
	     $this->email->from('adora.apparel@gmail.com'); // change it to yours
	     $this->email->to($_POST["emailAddress"]);// change it to yours
	     $this->email->subject($_POST["subject"]);
	     $this->email->message($_POST["message"]);
	     
	     //if the e mail is sent successfully
	    if($this->email->send())
	    {
	    	$this->Inquiry_model->setRepliedItem($ID);
	    	echo '<script>alert("Successfully Sent Message");</script>';
	    }
	    else
	    {
	    	show_error($this->email->print_debugger());
	    }

	    $this->load->view("AdminComponents/header");
		$this->load->view("AdminComponents/leftnavbar");
		

		if($data["content"] = $this->Inquiry_model->get_inquiry_info())
		{
			$this->load->view("AdminComponents/ItemInquiry",$data);
		}

		$this->load->view("AdminComponents/footer");
	}

	public function sendGeneralInqEmail($ID)
	{
		$this->load->model('Inquiry_model');
		//configuration of e mail
	    $config = Array(
	     'protocol' => 'smtp',
	     'smtp_host' => 'ssl://smtp.googlemail.com',
	     'smtp_port' => 465,
	     'smtp_user' => 'adora.apparel@gmail.com',
	     'smtp_pass' => 'tryandtry',
	     'mailtype' => 'html',
	     'charset' => 'iso-8859-1',
	     'wordwrap' => TRUE
	    );

	     $this->load->library('email', $config);
	     $this->email->set_newline("\r\n");
	     $this->email->from('adora.apparel@gmail.com'); // change it to yours
	     $this->email->to($_POST["emailAddress"]);// change it to yours
	     $this->email->subject($_POST["subject"]);
	     $this->email->message($_POST["message"]);
	     
	     //if the e mail is sent successfully
	    if($this->email->send())
	    {
	    	$this->Inquiry_model->setRepliedGeneral($ID);
	    	echo '<script>alert("Successfully Sent Message");</script>';
	    }
	    else
	    {
	    	show_error($this->email->print_debugger());
	    }

		
		$this->load->view("AdminComponents/header");
		$this->load->view("AdminComponents/leftnavbar");
		

		if($data["content"] = $this->Inquiry_model->get_general_inquiry_info())
		{
			$this->load->view("AdminComponents/GeneralInquiry",$data);
		}

		$this->load->view("AdminComponents/footer");

	}

	public function insertItemIndex()
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
			$small_qty = $this->input->post('small_qty');
			$medium_qty = $this->input->post('medium_qty');
			$large_qty = $this->input->post('large_qty');
			$xlarge_qty = $this->input->post('xlarge_qty');
			$freesize_qty = $this->input->post('freesize_qty');
			
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
			$small_qty = $this->input->post('small_qty');
			$medium_qty = $this->input->post('medium_qty');
			$large_qty = $this->input->post('large_qty');
			$xlarge_qty = $this->input->post('xlarge_qty');
			$freesize_qty = $this->input->post('freesize_qty');

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

	public function subscriberIndex()
{
  $this->load->model('Subscribers_m');
  $this->load->view("AdminComponents/header");
  $this->load->view("AdminComponents/leftnavbar");
  $this->load->view("AdminComponents/subscribers");
  $this->load->view("AdminComponents/footer");
}

	/*Function to send mails to all the subscribers*/
	public function sendMail()
	{
	if(isset($_POST["submit"])) {
	  $this->load->model('Subscribers_m');

	  //get subscribers from DB and pass it to $data variable
	  $data = $this->Subscribers_m->get_subscribers();
	  //loading components in the page
	  $this->load->view("AdminComponents/header");
	  $this->load->view("AdminComponents/leftnavbar");
	  $this->load->view("AdminComponents/subscribers");
	  $this->load->view("AdminComponents/footer");
	  //formatting the subscribers list to a string with commas
	  $email_array = "";

	  foreach ($data->result() as $row)
	  {
	    $email_address = $row->email;
	    $email_array = $email_array.$email_address.",";
	  }
	  
	  $email_array = rtrim($email_array, ",");

	    //configuration of e mail
	    $config = Array(
	     'protocol' => 'smtp',
	     'smtp_host' => 'ssl://smtp.googlemail.com',
	     'smtp_port' => 465,
	     'smtp_user' => 'adora.apparel@gmail.com',
	     'smtp_pass' => 'tryandtry',
	     'mailtype' => 'html',
	     'charset' => 'iso-8859-1',
	     'wordwrap' => TRUE
	    );

	     $this->load->library('email', $config);
	     $this->email->set_newline("\r\n");
	     $this->email->from('adora.apparel@gmail.com'); // change it to yours
	     $this->email->to($email_array);// change it to yours
	     $this->email->subject($_POST["subject"]);
	     $this->email->message($_POST["message"]);

	     //if the e mail is sent successfully
	    if($this->email->send())
	    {
	      echo '<script>alert("Successfully Sent Message");</script>';
	    }
	    else
	    {
	    show_error($this->email->print_debugger());
	    }
	    
	  }

	}

	/**
	 * Load the add post view to the center panel
	 * 
	 */
	public function add_post()
	{

		$this->load->helper('url');
    	$this->load->helper('html');
		//$data["status"] = 0;
		$this->load->view("AdminComponents/header");
		$this->load->view("AdminComponents/leftnavbar");
		$this->load->view("blogAdmin/insertPost",array('error' => ' ' ));//insert post view
		$this->load->view("AdminComponents/footer");
	}

	/**
	 * Add blog post
	 * Post data is taken from the form as POST 
	 * After successfull add the post data is loaded
	 * 
	 */
	public function add_post_data()
	{
		$this->load->helper('url');
	    $this->load->helper('html');
	    $this->load->model('Admin_blog_model');
		//$data["status"] = 0;
		$form_data = $this->input->post();

		if ($this->Admin_blog_model->add_post($form_data)) 
		{ 
		    //$data["status"] = 1;
		    echo '<script>alert("Post Successfully Added");</script>';
		    $this->load_post_data();//load post data function to load all blogpost data after adding post
		}
	 }


	 /**
	 * Blog Post data is load to a table view in admin panel
	 *  
	 *
	 */
	 function load_post_data()
	 {
		$this->load->model('Admin_blog_model');
		$this->load->view("AdminComponents/header");
		$this->load->view("AdminComponents/leftnavbar");

		if($data["content"] = $this->Admin_blog_model->get_blog_posts())
		{
			$this->load->view("blogAdmin/post_update_delete",$data);//view all data of blog post 
		}

		$this->load->view("AdminComponents/footer");
	 }


	 /**
	 * Delete an blog post (post item)
	 * 
	 * @param  String          The Articel ID in the form of Art00000000
	 *
	 */
	 public function delete_item_blog($aritcle_id)
	{
	    $this->load->model('Admin_blog_model');
		if($this->Admin_blog_model->delete_post($aritcle_id))
		{
			echo "<script>alert('Post Successfully deleted');</script>";//display alert after successfull delete
			$this->load_post_data();//load all blog post data after delete
		}
		else
		{
			echo "<script>alert('Failed delete the post.');</script>";//display alert on a fail delete
			$this->load_post_data();//load all blog post data after fail delete
		}
	}



	/**
	 * Edit and update blog post data
	 * 
	 * @param  int           The Articel_Review id
	 *
	 */
	public function update_post_data($post_id)
	{
		$this->load->helper('url');
	    $this->load->helper('html');
	    $this->load->model('Admin_blog_model');
		$this->load->view("AdminComponents/header");
		$this->load->view("AdminComponents/leftnavbar");
		//$data["status"] = 0;
		if(isset($_POST['submit'])) //check for submit button press
		{
			$form_data = $this->input->post();
			$stat = $this->Admin_blog_model->update_post($form_data, $post_id);//update blogpost method call
		    //$data["status"] = 1;
		    echo '<script>alert("Post Successfully Updated");</script>';//display alert after successfull post update
		    $data["content"] = $this->Admin_blog_model->get_blog_posts();
			$this->load->view("blogAdmin/post_update_delete",$data);// load all blog post data to table view after update
		}
		else
		{
			$data["contentx"] = $this->Admin_blog_model->get_blog_posts_singel($post_id);
			$this->load->view("blogAdmin/update_post",$data);
		}
		$this->load->view("AdminComponents/footer");

	 }

	 /**
	 * To get the blog post from the database
	 *
	 *
	 */
	public function blog()
	{
	    $this->load->model("Blog_model");
	    $this->data['blog_details'] = $this->Blog_model->load_blog_details();// Get the article details
	    $this->load->model("Cart_model");

		$this->cart_qty = $this->Cart_model->retrieve_cart_items_count($this->session->userdata('Reg_ID'));
	    //$this->data['blog_comment_back'] = "This is just defineing"; 
	    $this->load->view('blog',$this->data,$this->cart_qty);
	}

	/**
	 * To get the single blog from the post id
	 * 
	 * @param  String           The Articel
	 *
	 */
	function blog_single($pots_id)
	{
	    $this->load->library("Unirest");
	    $this->load->model("Blog_model");
	    $this->load->model("Cart_model");

		$this->cart_qty = $this->Cart_model->retrieve_cart_items_count($this->session->userdata('Reg_ID'));
	    $this->data['blog_s'] = $this->Blog_model->blog_singel_load($pots_id); // Get the article details
	    $this->data['blog_review'] = $this->Blog_model->get_review($pots_id); //pass review data to the view
	    //$this->data['blog_comment_back'] = 0;
	    $this->load->view('blog-single',$this->data,$this->cart_qty);

	}

	/**
	 * Add review to a specific blog post
	 * 
	 * @param  String           The Articel
	 *
	 */
	public function add_review_blog($pots_id)
	{
	    $form_data = $this->input->post();
	    $this->load->model("Blog_model");
	    $this->load->model("Cart_model");

		$this->cart_qty = $this->Cart_model->retrieve_cart_items_count($this->session->userdata('Reg_ID'));
	    //$this->data['blog_comment_back'] = -1;
	    

	    if(strcmp(substr($pots_id,0,3), "Art")==0)//check for Articel ID pattern to avoid javascript conflict
        {
            $uri = base_url()."welcome/blog_single/".$pots_id;
        } 

	    if(isset($form_data['comment']))// ckeck for comment
	    { 
	        $state = $this->isBad($form_data['comment']);//check for inappropriate word in the comment
	    }
	    else
	    {
	        $state = $this->isBad("");
	    }
	   
	    
	    if(isset($_SESSION['Username']))//check for login
	    {
	        if(strcmp($state, "-1")==0)// if the state == -1 the comment do not have bad words. can proceed with the comment
	        {
	            
	            if(strcmp(substr($pots_id,0,3), "Art")==0)
	            {
	                $status = $this->Blog_model->add_review($pots_id, $form_data,$_SESSION['Username']);
	            }        
	        }
	        else// if the comment has bad word comment is not allowed publish
	        {
	           
	            $this->data['blog_comment_back'] = $state;//bad comment is sent to the view with strast for bad words
	            echo "<script>alert('Please check your comments. You have got inappropriate words in it.');</script>";//display alert
	        }
	    }
	    else//if the user is not loged in.
	    {
	         // *** the architecture has been changed. There is no need to check for logged user as commenting text box 
	    	 // will not avaible for user who have not loged in.
	    	 //this code will not execute 

	        $this->session->set_flashdata('redirectToCurrent', $uri);//
	        $this->session->set_flashdata('crurrentData', $form_data['comment']);
	        $urlx = base_url()."welcome/login";
	        // var_dump($this->session->flashdata('redirectToCurrent'));
                 echo "<script>javascript:alert('Please Login to comment'); window.location = '".$urlx."'</script>";
	        //redirect(base_url().'welcome/login','refresh');
	        // var_dump($this->session->flashdata('crurrentData'));
	        // var_dump($this->session->flashdata('redirectToCurrent'));
	    }
	    

	        $this->data['blog_s'] = $this->Blog_model->blog_singel_load($pots_id); // Get the article details
	        $this->data['blog_review'] = $this->Blog_model->get_review($pots_id);
	        $this->load->view('blog-single',$this->data,$this->cart_qty);
	    
	}
	

	/**
	 * chek the input string for bad words(inappropriate words). 
	 * 
	 * @param  String           Words or sentence
	 *
	 */
	public function isBad($yourstring)
	{

	    $this->load->library('banbuilder/lang/EN_US_WORDLIST_REGEX');// load the library with inappropriate words
	    $us_wordlist = new EN_US_WORDLIST_REGEX();// the word list with regex

	    $badwords = $us_wordlist->getBadWords();
	    $this->load->library('banbuilder/Censor_Function');// loads the library  Censor_function 

	    $censorFunction = new Censor_Function();

	    $string = "NULL";
	    $string = $censorFunction->censorString($yourstring, $us_wordlist->getBadWords(),'*');// getting the replaced word list
	    $return_s = $string['clean'];// clean variable give the list with bad words replaced with star (*)

	    if(strcmp( $string['clean'], $string['orig'])==0)//compare the original string and new replaced sting
	    {
	        $return_s = -1;// return_s -1 if both strings are same -> not bad words
	    }
	    
	    return $return_s;// return the string.
	}

	/**
	 * Delete a review related to a post. 
	 * 
	 * @param  String           Review ID
	 * @param  String           The Articel ID
	 */
	public function delete_review($review_id, $post_id)
	{
		$this->load->model("Blog_model");
	     	if ($this->Blog_model->delete_review($review_id))//delete function call
	     	{
	     		 echo "<script>javascript:alert('Successfully deleted the comment'); window.location = '".base_url()."Blog_c/blog_single/".$post_id."'</script>";
	     	}

	}

	 /**
     * add purchas data to the databese 
     * 
     */
    public function add_purchase_data()
    {
        $this->load->model("Cart_model");

            if(isset($_SESSION['Username']))
            {
                $user_id = $this->Cart_model->get_id_by_name($_SESSION['Username']);
                $items = $this->Cart_model->get_cart_items_only($user_id);
                foreach ($items as $itm) {
                    $this->Cart_model->insert_perchase($itm);
                    $this->Cart_model->remove_cart_items($itm->Cart_ID);
                }
                $urlx = base_url()."welcome/index";
                echo "<script>javascript:alert('Successfully purchased'); window.location = '".$urlx."'</script>";//successfull messege
               
            }
            
    }


	/**
     * Search function with out any filter
     * 
     */
	public function search()
	{
		$this->load->model("Home_page_model");
		$this->load->model('Sw_search');
		$keyword = $this->input->post('searchtext');

		$_SESSION['keyw'] = $keyword;
		$data["keyword"] =  $keyword;//passing the keyword to the view useing session

		//$this->data['latest_items'] = $this->Home_page_model->retrieve_latest_items();
		$keyword = $this->input->post('searchtext');

		$data["datax"] =json_decode(json_encode( $this->Sw_search->searchx($keyword)), TRUE);
		$data["raw_data"] = json_decode(json_encode( $this->Sw_search->searchx($keyword)), TRUE);
		$data["price_filter_not_set"] = true;
		
		$this->load->view('applications/search_results',$data); // load the view file , we are passing $data array to view file
	}

    /**
     * Search with filters
     */
	public function search_with_filter()
	{
		if($this->input->post('filter')==true)
		{
			$this->load->model("Home_page_model");
			$this->load->model('Sw_search');
			$keyword = $this->input->post('hidden_keyword');

			$_SESSION['keyw'] = $keyword;
			$data["keyword"] =  $keyword;

			$min = $this->input->post('min');
			$max = $this->input->post('max');

			$data["datax"] = json_decode(json_encode( $this->Sw_search->search_adv_price($keyword, $min,  $max)), TRUE);
			$data["raw_data"] = json_decode(json_encode( $this->Sw_search->search_adv_price($keyword, $min,  $max)), TRUE);
			
			$this->load->model("sw_search");
			$this->data['auto_load_data_names']=json_decode(json_encode($this->Sw_search->get_names()), TRUE);
			//$this->data['latest_items'] = $this->Home_page_model->retrieve_latest_items();//get latest item details
			//$data["$price_filter_not_set"] = false;
			$this->load->view('applications/search_results',$data); // load the view file , we are passing $data array to view file
		}
	}

	/**
     * 
	 * this function is used to get suggestions in search
	 */
	function getResults()
	{
		$this->load->model("Sw_search");
		$name_list=json_decode(json_encode($this->Sw_search->get_names()), TRUE);
		return $name_list;
	}

	/**
     *this function returens the filtered search results with available sizes
     */
	public function filter_by_size($size, $keyword)
	{
		$this->load->model("Home_page_model");
		$this->load->model('Sw_search');

		if($keyword == -1)
		{
			$_SESSION['keyw'] = "";
			$data["keyword"] =  "";
		}
		else
		{
			$_SESSION['keyw'] = $keyword;
			$data["keyword"] =  $keyword;
		}

		$this->load->model("sw_search");
		$this->data['auto_load_data_names']=json_decode(json_encode($this->Sw_search->get_names()), TRUE);
		$data["datax"] = json_decode(json_encode( $this->Sw_search->retrieve_items_by_size($size,$keyword)), TRUE);
		$data["raw_data"] = json_decode(json_encode( $this->Sw_search->retrieve_items_by_size($size,$keyword)), TRUE);
		$data["keyword"] =  $keyword;
		//$this->data['latest_items'] = $this->Home_page_model->retrieve_latest_items();
		$this->load->view('applications/filterData',$data); // load the view file , we are passing $data array to view file
	}

	/**
     * Get search results with type filter
     * 
     *
     */

	function getType_filter()
	{
		$this->load->model("Home_page_model");
		$this->load->model('Sw_search');
		//$keyword = $this->input->post('hidden_keyword');
		$keyword =$_GET["keyw"];
		$datac = $_GET["datac"];
		
		if (!empty($_GET["value"])) 
		{
			$value = $_GET["value"];
		}
		else
		{
			$value = -1;
		}
		if($keyword == -1)
		{
			$_SESSION['keyw'] = "";
			$data["keyword"] =  "";
		}
		else
		{
			$_SESSION['keyw'] = $keyword;
			$data["keyword"] =  $keyword;
		}
		
		$this->load->model("Sw_search");
		$this->data['auto_load_data_names']=json_decode(json_encode($this->Sw_search->get_names()), TRUE);
		$data["raw_data"] = $datac;
		$data["datax"] = json_decode(json_encode($this->Sw_search->cat_filter($value, $datac)), TRUE);
		$data["keyword"] =  $keyword;
		//$this->data['latest_items'] = $this->Home_page_model->retrieve_latest_items();
		$this->load->view('applications/filterData',$data); // load the view file , we are passing $data array to` view file
	}

	public function facebook_login()
    {
        $this->load->library('Facebook');
        $this->load->helper('url');

        $data['user'] = array();

        if ($this->Facebook->logged_in())   // check whether user already logged in
        {
            $user = $this->Facebook->user();

            if ($user['code'] === 200)
            {
                unset($user['data']['permissions']);
                $data['user'] = $user['data'];
		    }
            $current_user = $this->Facebook->user();

            $user_name = $current_user['data']['name']; // get the user name from facebook profile
            $user_username = strtolower(str_replace(' ','',$user_name));

            $_POST['full_name'] = $user_name;
            $_POST['user_name'] = $user_username;

            $this->login();

        }else
        {
            redirect($this->Facebook->login_url());     // If the user is nt logged in redirect user to log in

        }

    }


    /*
     * facebook_logout
     * destroys the session
     */
    public function facebook_logout()
    {
        $this->Facebook->destroy_session();
        redirect('welcome/login', redirect);
    }

    /*
     * Check whether username available or not when user filling the registration form (Use for Ajax method)
     * Return true if the username available
     * Return false if the username unavailable
     */
    public function check_username_availability_from_ajax($username)
    {
        if(isset($_POST['ajax_username']))  // getting username from POST array
        {
            $checking_username = $_POST['ajax_username'];
        
            $this->load->model('Register_new_user_model');  // loading the register new user model for checking the username availability
             
            $user_name_available = $this->Register_new_user_model->username_available($checking_username); // checking username availability using username_available method in register_new_user_model
             
            if($user_name_available)
            {
                return true;    // username available -> return true
                
            }else
            {
                return false;   // username taken -> return false
            }
             
        }
    }

    /*
 * Registering new user
 * Validations are done using CodeIgniter form_validation
 * If all the validations are correct, It creates a new user using register_new_user_model
 */
    public function register_new_user_validation()
    {
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->model('Login_user_model');
        $this->load->model("Cart_model");

			$this->cart_qty = $this->Cart_model->retrieve_cart_items_count($this->session->userdata('Reg_ID'));
        
        // Form validation rules
        $this->form_validation->set_rules('full_name','Full Name', 'trim|required|max_length[45]');
        $this->form_validation->set_rules('user_name', 'User Name', 'trim|required|max_length[35]');
        $this->form_validation->set_rules('email','E-mail','trim|required|valid_email|max_length[50]');
        $this->form_validation->set_rules('password','Password','trim|required|max_length[35]|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password','Confirm Password','trim|required');
        $this->form_validation->set_rules('phone_number','Phone Number','trim|numeric|min_length[10]|max_length[16]');
        
        if($this->form_validation->run() == FALSE)  // If there are problems with form validation it load the same page and show errors
        {
            $_POST['register_new_user_error_message'] = validation_errors();
            $this->load->view('login',$this->cart_qty );
        }
        else        // If all the validations are correct it check for availabilty of email and username.
        {
            $this->load->model('Register_new_user_model');
            
            $user_name_available = $this->Register_new_user_model->username_available($this->input->post('user_name'));
            $user_email_available = $this->Register_new_user_model->email_available($this->input->post('email'));
            
            if(!$user_name_available)   // If username already taken it create an error message record in POST array
            {
                $_POST['username_unavailable'] = '<div class="alert alert-danger">
  <strong>Username unavailable</strong>   Username is already taken.
</div>';
            }
            
            if(!$user_email_available)  // If email is already taken it create an error message record in POST array
            {
                $_POST['email_unavailable'] = '<div class="alert alert-danger">
  <strong>Email already exist</strong>   There is an existing account with this email.
</div>';
            }
            
            if(!$user_name_available || !$user_email_available) // If either username or email or both are taken it show corresponding error message
            {
                $this->load->view('login',$this->cart_qty );
            }
            
            if($user_name_available && $user_email_available)   // If both are available creates a new user
            {
                
                //Creating an associative array containing all the user data
                $user_data = array(
                    'Name' => $this->input->post('full_name'),
                    'Username' => $this->input->post('user_name'),
                    'Password' => md5($this->input->post('password')),
                    'Email' => $this->input->post('email'),
                    'Phone' => $this->input->post('phone_number'),
                    'Date' => date("Y-m-d")
                );

                $new_user_status = $this->Register_new_user_model->save_user($user_data); // save user on database

                if($new_user_status)    // Iff saving successful
                {

                    $this->load->model('Login_user_model');
                    $user_profile = $this->Login_user_model->get_user_profile($this->input->post('user_name'),$this->input->post('password'));
                    $user_logged_true = array("login_status" => TRUE);
                    $user = array_merge($user_profile,$user_logged_true);
                    $this->session->set_userdata($user);    // setting up the session

                    $this->index();

                }else
                {
                    $this->load->view('create-user-error-page',$this->cart_qty );    // if something went to wrong Displays an error page
                }
            }
            
        }
        
    }

    /*
     * This method is use to change user information
     * Change info on user profile
     */
    public function changeNameOrEmail()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
         $this->load->model('Login_user_model');
         $this->load->model("Cart_model");

			$this->cart_qty = $this->Cart_model->retrieve_cart_items_count($this->session->userdata('Reg_ID'));

        // CI VALIDATION RULES
        $this->form_validation->set_rules('newUserName', 'Full Name', 'trim|max_length[45]|min_length[3]');
        $this->form_validation->set_rules('newEmail', 'E-mail', 'trim|valid_email|max_length[50]|min_length[3]');
        $this->form_validation->set_rules('current_password', 'Password', 'required');
        $this->form_validation->set_rules('newPhone','Phone Number','trim|numeric|min_length[10]|max_length[16]');

        if ($this->form_validation->run() == FALSE)  // If there are problems with form validation it load the same page and show errors
        {
            $_POST['changeNameOrEmailErrors'] = validation_errors();
            $this->load->view('change_user_profile',$this->cart_qty);
        } else {

            $this->load->model('Register_new_user_model');

            $new_user_name = false; // to store POST vars
            $new_email = false;     // to store POST vars


            $this->load->model('Login_user_model');

            $user_enterd_password_hash = md5($this->input->post('current_password'));
            $profile_password_hash = $this->Login_user_model->get_user_password_hash($this->session->userdata('Username'));

            if ($user_enterd_password_hash == $profile_password_hash) {

                if (strlen($_POST['newUserName']) >= 3) {   // If new user's name is larger than 3. validated by CI rules
                    $new_user_name = $_POST['newUserName'];

                    $this->load->model('Login_user_model');

                    $user_array = array(            // creates the user object with new data to save on db
                        'Name' => $new_user_name
                    );

                    $user_id = $this->session->userdata('Username');    // get the username from the session

                    $success = $this->Login_user_model->update_user_profile($user_array, $user_id);  // updates the db

                    $this->session->set_userdata('Name', $new_user_name);   // update the session with new data

                    if (!$success) {
                        echo '<script language="javascript">';
                        echo 'alert("Error Occured While updating username. Try again !")';
                        echo '</script>';
                    }
                }

                if (strlen($_POST['newEmail']) >= 3) {  // If new user's email is larger than 3 letters. validated by CI rules

                    $new_email = $_POST['newEmail'];

                    $this->load->model('Login_user_model');

                    $user_array = array(        // creates a user object with email.
                        'Email' => $new_email
                    );

                    $user_id = $this->session->userdata('Username'); // get the username from the session

                    $success = $this->Login_user_model->update_user_profile($user_array, $user_id); // updates the db

                    $this->session->set_userdata('Email', $new_email);  // update the session with new data

                    if (!$success) {
                        echo '<script language="javascript">';
                        echo 'alert("Error Occured while updating email. Try again !")';
                        echo '</script>';
                    }

                }

                if (strlen($_POST['newPhone']) >= 10) { // If new phone num is larger than or equal 10 digits. validated by CI rules

                    $new_Phone = $_POST['newPhone'];

                    $this->load->model('Login_user_model');

                    $user_array = array(        // creates a user object with phone num.
                        'Phone' => $new_Phone
                    );

                    $user_id = $this->session->userdata('Username');    // get the username from the session

                    $success = $this->Login_user_model->update_user_profile($user_array, $user_id); // updates the db

                    $this->session->set_userdata('Phone', $new_Phone);  // update the session with new data

                    if (!$success) {
                        echo '<script language="javascript">';
                        echo 'alert("Error Occured while updating phone number. Try again !")';
                        echo '</script>';
                    }

                }

                if ($_POST['newEmail'] || $_POST['newUserName'] || $_POST['newPhone']) {
                    echo '<script language="javascript">';
                    echo 'alert("Successfully Updated !!!")';       // if success, success msg on JS
                    echo '</script>';

                    $this->load->view('change_user_profile',$this->cart_qty);

                }
            } else {

                $_POST['password_invalid'] = '<div class="alert alert-danger">
  <strong>Incorrect Password</strong>   Wrong password. Try again
</div>';
                $this->load->view('change_user_profile',$this->cart_qty);


            }
        }
    }



    /*
     * change password on user profile
     */
    public function changeUserPassword()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('Login_user_model');
        $this->load->model("Cart_model");

			$this->cart_qty = $this->Cart_model->retrieve_cart_items_count($this->session->userdata('Reg_ID'));

        $this->form_validation->set_rules('old_password', 'Old Password ', 'trim|max_length[45]|required');
        $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|max_length[50]|min_length[3]|matches[new_password_again]');
        $this->form_validation->set_rules('new_password_again', 'Confirm New Password', 'required');

        if ($this->form_validation->run() == FALSE)  // If there are problems with form validation it load the same page and show errors
        {
            $_POST['changePasswordErrors'] = validation_errors();
            $this->load->view('change_user_profile',$this->cart_qty);

        }else
        {
            $this->load->model('Login_user_model');

			$this->cart_qty = $this->Cart_model->retrieve_cart_items_count($this->session->userdata('Reg_ID'));
            $user_enterd_password_hash = md5($this->input->post('old_password'));
            $profile_password_hash = $this->Login_user_model->get_user_password_hash($this->session->userdata('Username'));

            if ($user_enterd_password_hash == $profile_password_hash) { // check current user's password is eq to entered password

                $new_pass = $this->input->post('new_password');

                $this->load->model('Login_user_model');

                $user_array = array(
                    'Password' => md5($new_pass)    // creates a user object with new password.
                );

                $user_id = $this->session->userdata('Username');    // get user name from the session

                $success = $this->Login_user_model->update_user_profile($user_array, $user_id);     //save data on db

                $this->session->set_userdata('Password', md5($new_pass));   // updates the password in session
                $this->load->model("Cart_model");


                if ($success) {
                    echo '<script language="javascript">';
                    echo 'alert("Successfully Changed the password")';
                    echo '</script>';

                    $this->load->view('change_user_profile',$this->cart_qty);
                }else{
                    echo '<script language="javascript">';
                    echo 'alert("Error Occured While updating password. Try again !")';
                    echo '</script>';

                    $this->load->view('change_user_profile',$this->cart_qty);
                }

            }else
            {
                $_POST['change_password_invalid'] = '<div class="alert alert-danger">
  <strong>Incorrect Password</strong>   Wrong password. Try again
</div>';
                $this->load->view('change_user_profile',$this->cart_qty);
            }

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


