<?php
class Function_model extends CI_Model{

	function Function_model()
	{
		//parent::Model();
	}

	function getSearchResults($function_name, $description = TRUE){

		$this->db-like('Name',$function_name);
		$this->db-orderby('Name');
		
		$query = $this->db->get('Items');

		if($query->num_rows() > 0){

			$output='<ul>';

			foreach ($query->result() as $function_info) {
                if($description){
					$output .= '<li><strong>' . $function_info-> name . '</strong></>';
					$output .= $function_info->function_description . '</li>';
				}
				else{
					$output .= '<li>' . $function_info->function_name . '</li>';
				}	
			}
				
			$output='</ul>';
			return $output;
		}
		else{
			return '<p> Sorry No Search Results </p>';
		}
	}

	}

?>