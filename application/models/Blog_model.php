
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model
{
	/**
     * Return All the blog details to customer end controller blog_C
     * @return blog data as an assosiate array 
     */
	public function load_blog_details() {
    	 $this->db->select("*");
		 $this->db->from('Articles');
		 $query = $this->db->get();
		 return $query->result();
	}

	/**
     * Add items to the cart
     * 
     * @param  String           Blog Post ID
     * @return data of a single blog post as an assosiate array
     */
	public function blog_singel_load($post_id) {
    	 $this->db->select("*");
		 $this->db->from('Articles');
		 $this->db->where('Article_ID',$post_id);
		 $query = $this->db->get();
		 return $query->result();
	}

	/**
     * Get reviews for a specific blog post
     *
     * @param  String           Blog Post ID
     * @return reviews for a blog post as an assosiate array
     */
	public function get_review($post_id)
	{
		 $this->db->select("*");
		 $this->db->from('Articel_review');
		 $this->db->where('Articel_ID',$post_id);
		 $query = $this->db->get();
		 return $query->result();
	}

	/**
     * Adding a review for a blog post
     * 
     * @param  String 		    BLog post ID
     * @param  String  Array    POST data from the form
     * @param  String 			User name of the person posting the review
     * @return state after insert
     */
	public function add_review($id,$form_data, $uname) {

			$data = array(
    	   'Articel_ID' => $id,
    	   'user_name' => $uname,
		   'comment' => $form_data['comment'] 
		);
		//var_dump($this->db->insert('Articel_review', $data));
		return $this->db->insert('Articel_review', $data);     	
    }

    /**
     * Delete Review for a post
     * 
     * @param  String           Review ID
     * @return state after delete
     */
    public function delete_review($review_id)
    {
    	$this->db->where('id', $review_id);
		return $this->db->delete('Articel_review'); 
    }
    	
}
?>