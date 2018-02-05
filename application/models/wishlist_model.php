<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class wishlist_model extends CI_Model {

    public function addwish($table,$wish){
      $this->db->insert($table,$wish);
    }

  //  public function fetchwish(){
     //   $query = $this->db->get("wishlist");
//
     //   foreach ($query->result() as $row)
     //   {
     //       echo $row->title;
     //   };
   // }

    public function getAllWishlist($cond){
        $this->db->select('*');
        $this->db->where($cond);
        $q = $this->db->get('wishlist');
        return $q->result();
    }

    public function removeWish($cond){
        $this->db->delete('*');
        $this->db->where($cond);
        $q = $this->db->get('wishlist');
        return $q->result();
    }
   // public function checkWishlist($cond){
    //    $this->db->select('*');
  //      $this->db->where($cond);
   //     $q = $this->db->get('wishlist');
  //      return $q->result();
 //   }
}

?>