<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/*
 * This model is all about registered users
 * There are 3 methods in this Login_user_model
 * 1.get_admin_from_email - get the current_user object when we enter a email
 * 2.get_admin_from_username - get the current user object when we enter a username
 * 3.get_admin_profile - if both username/email and password correct return the user object 
 */
class Admin_login_model extends CI_Model
{
    
    
    const INCORRECT_PASSWORD_ERROR = -100;
    const USERNAME_OR_EMAIL_ERROR = -10;

        
    function __construct() 
    {
        parent::__construct();
    }

    /*
     * this method returns admin object when email entered
     * Otherwise returns false
     */
    public function get_admin_from_email($email)
    {
        $query = $this->db->get('Administrators');

        $admin_flag = false;
        
        foreach ($query->result() as $current_user)     // Go through all the results to check whether there is an existing account from entered email
        {
             if($current_user->Admin_Email == $email)
             {
                 $admin_flag = $current_user;   // If so it will return user object
             }
        }
        
        return $admin_flag;     // If not returns false
    }

    
    /*
     * This method returns admin object when username entered
     * Otherwise returns false
     */
    public function get_admin_from_username($username)
    {
        $query = $this->db->get('Administrators');

        $admin_flag = false;
        
        foreach ($query->result() as $current_user)  // Go through all the results to check whether there is an existing account from entered username
        {
             if($current_user->Admin_Username == $username)
             {
                 $admin_flag = $current_user;       // If so it will return user object
             }
        }
        
        return $admin_flag;     // If not returns false
    }
    
    /*
     * if both username/email and password correct return the user object with all user information
     * Error Code INCORRECT_PASSWORD_ERROR returns -100 - This means there is a existing account but entered password is incorrect
     * Error Code USERNAME_OR_EMAIL_ERROR returns -10 - This means there is no account from the email or username user entered 
     */
    public function get_admin_profile($email_or_username,$password)
    {
        $query = $this->db->get('Administrators');

        $admin_profile_flag = self::USERNAME_OR_EMAIL_ERROR;
        
        foreach ($query->result() as $current_user) // Going through user array
        {
             if($current_user->Admin_Username == $email_or_username || $current_user->Admin_Email == $email_or_username ) // Checking whether there is a record for user entered email or username
             {
                 $admin_profile_flag = self::INCORRECT_PASSWORD_ERROR;

                 if($current_user->Admin_Password == md5($password)) // If there is a record it checks user entered password md5 has with record's md5 hash
                 {
                     $admin_profile_flag = (array)$current_user;   // If both hashes identical it returns associative array with all user data
                 }

             }
        }
        
        return $admin_profile_flag; // If there isn't single user record matches with user entered email or user name returns USERNAME_OR_EMAIL_ERROR
    }


    /*
     * update the user data from using $user_array (Object that have all the data to update)
     * $user_name - user's unique identifier
     */
    public function update_admin_profile($user_array,$user_name)
    {

        $this->db->where('Admin_Username',$user_name);

        $return_value = $this->db->update('Administrators', $user_array);

        return $return_value;
    }
    
    
    
    
    
}