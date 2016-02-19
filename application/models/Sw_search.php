<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sw_search extends CI_Model
{
     /**
    * This function returns the search results for a given keyword
    *
    * @param $keyword : This is the keyword to get the search results
    * @return item details  as an associative array
    *           
    */
    public function searchx($keyword)
    {
        if(!empty ($keyword))
        { 
           // $this->db->select("Name,Price,imageLink");
            $this->db->select('*');
            $this->db->from('Items');
            $this->db->like('Name',$keyword);
            $this->db->or_like('Description',$keyword);
            $this->db->join('ItemImage', 'ItemImage.itemID = Items.Item_ID');
            $this->db->order_by("Date", "desc");

            $query = $this->db->get();
        }
        else{
            $this->db->select('*');
           // $this->db->select("Name,Price,imageLink");
            $this->db->from('Items');
            $this->db->join('ItemImage', 'ItemImage.itemID = Items.Item_ID');
            $this->db->order_by("Date", "desc"); 
            $query = $this->db->get();

        }
        return $query->result();
    }

    //this functions retures the item list
    // public function search_default()
    // {
    //     $this->db->select("Name,Price,imageLink");
    //     $this->db->from('Items');
    //     $this->db->join('ItemImage', 'ItemImage.itemID = Items.Item_ID');
    //     $this->db->order_by("Date", "desc"); 
    //     $this->db->limit(9);

    //     $query = $this->db->get();

    //     return $query->result();
    // }

    //this function returns the search results with keyword , min and max values for price filter 




     /**
    * This function returns the search result with price range filter
    *
    * @param $keyword : The keyword to Search 
    * @param $min : Minimum Price
    * @param $max : Maximum price
    * @return item details  as an associative array
    *           
    */
    public function search_adv_price($keyword, $min, $max)
    {
        // $this->db->select("Name,Price,imageLink");
        // $this->db->from('Items');
        // $this->db->where('Price >', $min);
        // $this->db->where('Price <', $max);

        // //$this->db->like('Name',$keyword);
        // //$this->db->or_like('Description',$keyword);

        // $this->db->join('ItemImage', 'ItemImage.itemID = Items.Item_ID');
        // $this->db->order_by("Date", "desc"); 
        // $this->db->limit(9);

        // $query = $this->db->get();

        // return $query->result();
        $query = $this->db->query("SELECT * FROM Items i, ItemImage it WHERE Price > ".$min." AND Price < ".$max." AND i.Item_ID = it.itemID AND (Name LIKE '%".$keyword."%' OR Description LIKE '%".$keyword."%')");
       
        return $query->result();
    }
 /**
    * This function is used to get the words for autoload
    * @return A string of word seperated by commas.
    *
    *           
    */
    public function get_names(){
        $this->db->select('Name');
        $this->db->from('Items');
        $this->db->order_by("Date", "desc"); 
        $this->db->limit(50);
        $query = $this->db->get();
        $arr = $query->result_array();
        $name_list=[];
        
        foreach ($arr as $names) {
            // var_dump($names["Name"]);
            foreach (explode(" ", $names["Name"]) as $singe_name) {
                array_push($name_list, $singe_name);
            }            
        }
        $name_list = array_unique($name_list);
        $return_string = implode(',',  $name_list);
        //$return_string = '[ "'.$return_string.'" ]';
        return $return_string;
    }

     /**
    * This function returns the search result with size filters
    *
    * @param $keyword : The keyword to Search 
    * @param $size : Size of apperales
    * @return item details  as an associative array
    *           
    */
    public function retrieve_items_by_size($size, $keyword) {
    
    if($keyword == -1){
        $query = $this->db->query("SELECT * FROM Items i, ItemImage it WHERE ".$size." > 0 AND i.Item_ID = it.itemID");
    }
    else{
        $query = $this->db->query("SELECT * FROM Items i, ItemImage it WHERE ".$size." > 0 AND i.Item_ID = it.itemID AND (Name LIKE '%".$keyword."%' OR Description LIKE '%".$keyword."%')");        
    }
    
    return $query->result();
     
    }


 /**
    * This function returns the search result with price range filter
    *
    * @param $value : Assosiateve array of catagories
    * @param $datac : Assosiateve array of items
    *
    * @return item details  as an associative array
    *           
    */
    public function cat_filter($value, $datac) {

    $f_data_set = [];

    if (!($value == -1)) {
       foreach ($value as $elementx) {
        //var_dump($elementx);
                foreach ($datac as $item) {

                   if (substr($elementx, 0,2)=="m_") {
                       if (($item['Gender']=="Male")) {
                           array_push($f_data_set, $item);
                       }
                   }

                  
                   if (substr($elementx, 0,2)=="w_") {
                     if (($item['Gender']=="Female")&&($item['Catagory']==substr($elementx, 2,-1))) {
                           array_push($f_data_set, $item);
                       }  
                   }

                   if (!((substr($elementx, 0,2)=="m_")&&(substr($elementx, 0,2)=="w_"))) {
                     if (($item['Gender']=="Both")&&($item['Catagory']==$elementx)) {
                           array_push($f_data_set, $item);
                       } 
                   }
                }
            }
        }
        //var_dump($f_data_set);
        return $f_data_set;
    }
  }
?>