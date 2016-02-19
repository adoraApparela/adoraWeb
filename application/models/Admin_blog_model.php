<?php
/**
     * Admin_blog_model class has the db function for admin blog functions
     * 
     *
     */
class Admin_blog_model extends CI_Model
{

	/**
     * This funtion adds a new blog post
     * 
     * @param  String Array     Form Data
     * @return the state after adding the blog post to db
     */
	public function add_post($form_data) 
	{

		$data = array(
		   'Heading' =>$form_data['title'],
		   'Content' => $form_data['message'],
	   	   'Priority' => $form_data['priority'],
	   	   'imageLink' => "/images/blog/".$form_data['file']	
		);// array with data which is ready to insert to Articles table
		return $this->db->insert('Articles', $data); 
    }


    /**
     * This function is used to get all blog post from the db 
     * @return an array with blog post data
     */
    function get_blog_posts()
    {
      $this->db->select("*");
	  $this->db->from('Articles');
	  $query = $this->db->get();
	  // var_dump($query->result());
	  return $query->result();
    }

    /**
     * This function is used to delete a post from the db
     * 
     * @param  String           Blog Post ID
     * @return the state after deleting the post
     */
    public function delete_post($aritcle_id)
	{
		$this->db->where('Article_ID',$aritcle_id);
		$id = $this->db->delete('Articles');
	    return $this->get_blog_posts();
	}


	/**
     * This function is ued to get single blog post data
     * 
     * @param  String           Article ID
     * @return an array with single Article Data
     */
	function get_blog_posts_singel($aritcle_id)
    {
      $this->db->select("*");
	  $this->db->from('Articles');
	  $this->db->where('Article_ID',$aritcle_id);
	  $query = $this->db->get();
	  // var_dump($query->result());
	  return $query->result();
    }


    /**
     * This functio is used to update blog post
     * 
     * @param  String Array     An array of formdata from POST
     * @param  String           Blog Post ID
     * @return the state after updating
     */
	public function update_post($form_data, $post_id) 
	{
		$data = array(
		   'Heading' =>$form_data['title'],
		   'Content' => $form_data['message'],
	   	   'Priority' => $form_data['priority'],
	   	   'imageLink' => "/images/blog/".$form_data['file']	
		);

		$this->db->where('Article_ID',$post_id);
		$state = $this->db->update('Articles', $data);
		
		return $state;
    }
}
?>