<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Register_new_user_model is use to register new users
 * This model has 3 functions
 * 1. Save user - Save the user in the database - Should pass an array with user data
 * 2. Username_available - Return true if username available, False if username already taken
 * 3. Email_available - Return true if email available, return false if there is an existing account with that email
 */
class Register_new_user_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();
    }

    /*
     * This is save_user function
     * If new user successfully saved to the database this returns the user newly created profile page
     * If some error occurred user will return to the create-user-error-page
     */
    public function save_user($new_user) 
    {
        
        $success = $this->db->insert('Registered_Users',$new_user); // Saving the new user record in database
        return $success;

    }



    
    /*
     * Checking whether username available or not
     * If username available return true
     * If username already taken return false
     */
    public function username_available($username)
    {
        $query = $this->db->get('Registered_Users');

        $username_available_flag = true;
        
        foreach ($query->result() as $row)
        {
             if($row->Username == $username)    // Username already exist
             {
                 $username_available_flag = false;
             }
        }
        
        return $username_available_flag;
    }
    
    /*
     * Checking whether there is an existing account from that email
     * If email available (There is no existing account from that email) return true
     * If there is an existing account from that email returns false
     */
    public function email_available($email)
    {
        $query = $this->db->get('Registered_Users');

        $email_exist_flag = true;
        
        foreach ($query->result() as $row)
        {
             if($row->Email == $email)      // Email already exist
             {
                 $email_exist_flag = false;
             }
        }
        
        return $email_exist_flag;
    }
    
    
}