<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/*
 * This model is all about registered users
 * There are 3 methods in this Login_user_model
 * 1.get_user_from_email - get the current_user object when we enter a email
 * 2.get_user_from_username - get the current user object when we enter a username
 * 3.get_user_profile - if both username/email and password correct return the user object 
 */
class Login_user_model extends CI_Model
{
    
    const INCORRECT_PASSWORD_ERROR = -100;
    const USERNAME_OR_EMAIL_ERROR = -10;
    

    function __construct() 
    {
        parent::__construct();
    }


    /*
     * this method returns User object when email entered
     * Otherwise returns false
     */
    public function get_user_from_email($email)
    {
        $query = $this->db->get('Registered_Users');

        $get_user_flag = false;
        
        foreach ($query->result() as $current_user)
        {
             if($current_user->Email == $email)   // email == current_user email
             {
                 $get_user_flag = $current_user;
             }
        }
        
        return $get_user_flag;
    }


    /*
    * This method returns user object when username entered
    * Otherwise returns false
    */
    public function get_user_from_username($username)
    {
        $query = $this->db->get('Registered_Users');

        $get_user_flag = false;
        
        foreach ($query->result() as $current_user)
        {
             if($current_user->Username == $username)   // username == current_user username
             {
                 $get_user_flag = $current_user;
             }
        }
        
        return $get_user_flag;
    }

    /*
     * if both username/email and password correct return the user object with all user information
     * Error Code INCORRECT_PASSWORD_ERROR returns -100 - This means there is a existing account but entered password is incorrect
     * Error Code USERNAME_OR_EMAIL_ERROR returns -10 - This means there is no account existing the email or username user entered
     */
    public function get_user_profile($email_or_username,$password)
    {
        $query = $this->db->get('Registered_Users');

        $result_flag = self::USERNAME_OR_EMAIL_ERROR;
        
        foreach ($query->result() as $current_user)  // Going through user array
        {
             if($current_user->Username == $email_or_username || $current_user->Email == $email_or_username)    // there is a corresponding account to what user entered
             {
                 $result_flag = self::INCORRECT_PASSWORD_ERROR;

                 if($current_user->Password == md5($password))  // check if it's password == user enterd password
                 {
                     $result_flag = (array)$current_user;   // If both username/email && password is matching return user JASON array
                 }

             }
        }
        
        return $result_flag;
    }

    /*
     * updates the user profile
     * $user_array - all the new data to update the DB
     * $user_name = unique identifier to identify the user
     */
    public function update_user_profile($user_array,$user_name)
    {

        $this->db->where('Username',$user_name);

        $return_value = $this->db->update('Registered_Users', $user_array);

        return $return_value;
    }


    /*
     * get user's password (md5 hash)
     * $username - enter the username which you want to get the password
     */
    public function get_user_password_hash($username)
    {
        $query = $this->db->get('Registered_Users');

        $get_user_password_flag = false;

        foreach ($query->result() as $current_user)
        {
            if($current_user->Username == $username)   // username == current_user username
            {
                $get_user_password_flag = $current_user->Password;  // get password in hash - md5
            }
        }

        return $get_user_password_flag;
    }

    /*
     * retrieve purchased items from a $user_id
     */
    public function retrieve_user_purchased_items($user_id)
    {
        $this->db->select("Name,Price,imageLink");
        $this->db->from('Purchases');
        $this->db->where('Purchases.Reg_ID',$user_id);
        $this->db->join('Items', 'Items.item_ID = Purchases.Item_ID','left');
        $this->db->join('ItemImage','ItemImage.itemID = Items.Item_ID','left');

        $query = $this->db->get();

        return $query->result();
    }





    }