<?php

class Inquiry_model extends CI_Model
{

/*
* function name get_inquiry_info
* no inputs
* outputs all the items in ItemInquiry table
*/
public function get_inquiry_info()
{
	$this->db->select('ItemInquiry.id,ItemInquiry.Name,ItemInquiry.Email,
        ItemInquiry.Subject,ItemInquiry.Comment,ItemInquiry.AddedTime,
        ItemInquiry.Responded,Items.Name as ItemName');
    $this->db->join('Items','Items.Item_ID = ItemInquiry.Item_ID');
    $this->db->from('ItemInquiry');
    $this->db->order_by("Responded", 0);
    $query = $this->db->get();
    return $result = $query->result();
}

/*
* funation name get_general_inquiry_info
* no inputs
* outputs all the items in inquire table
*/
public function get_general_inquiry_info()
{
	$this->db->select('*');
    $this->db->from('inquire');
    $this->db->order_by("Responded", 0);
    $query = $this->db->get();
    return $result = $query->result();
}

/*
* function name get_single_inquiry_info
* inputs ID
* outputs a single record in ItemInquiry table
*/
public function get_single_inquiry_info($ID)
{
	$this->db->where('id',$ID);
	$this->db->select('*');
    $this->db->from('ItemInquiry');
    $this->db->order_by("Responded", "desc");
    $query = $this->db->get();
    return $result = $query->result();
}

/*
* function name get_single_general_inquiry_info
* inputs ID
* outputs a single record in inquire table
*/
public function get_single_general_inquiry_info($ID)
{
	$this->db->where('inq_id',$ID);
	$this->db->select('*');
    $this->db->from('inquire');
    
    $query = $this->db->get();
    return $result = $query->result();
}

/*
* function name DeleteGI
* inputs ID
* used to delete a row in inquire table
*/
public function DeleteGI($ID)
{
    $this->db->where('inq_id',$ID);
    $id = $this->db->delete('inquire');

    $this->db->select('*');
    $this->db->from('inquire');
   
    $query = $this->db->get();
    
    return $result = $query->result();
}

/*
* function name DeleteII
* inputs ID
* used to delete a row in ItemInquiry table
*/
public function DeleteII($ID)
{
    $this->db->where('id',$ID);
    $id = $this->db->delete('ItemInquiry');

    $this->db->select('*');
    $this->db->from('ItemInquiry');
    
    $query = $this->db->get();
    
    return $result = $query->result();
}

/*
* function name setRepliedGeneral
* get ID as input
* will set the reply ststus to true 
*/
public function setRepliedGeneral($ID)
{
   $data = array('Responded'=>1); 
   $this->db->where('inq_id',$ID);
   $this->db->update('inquire',$data);
}

/*
* function name setRepliedItem
* get ID as input
* will set the reply ststus to true 
*/
public function setRepliedItem($ID)
{
   $data = array('Responded'=>1); 
   $this->db->where('id',$ID);
   $this->db->update('ItemInquiry',$data);
}

/*
* function name get_single_item_info
* get ID as input
* gets the name of item from Items table 
*/
public function get_single_item_info($item_id)
{
    $this->db->where('Item_ID',$item_id);
    $this->db->select('*');
    $this->db->from('Items');
    $query = $this->db->get();
    
    foreach ($query->result() as $row) {
        $result = $row->Name;
    }

    return $result;
}


}
?>