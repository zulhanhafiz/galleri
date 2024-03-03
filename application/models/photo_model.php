<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photo_model extends CI_Model {

    public function get_photo_details($photo_id) {
        // Replace 'your_photo_table' with your actual table name for photo details
        $query = $this->db->get_where('gallery', array('id_photo' => $photo_id));
        return $query->row_array();
    }

    public function get_photo_likes($photo_id) {
        // Replace 'your_like_table' with your actual table name for photo likes
        $query = $this->db->get_where('gallery', array('like_post' => $photo_id));
        return $query->num_rows();
    }

    public function get_photo_comments($photo_id) {
        // Replace 'your_comment_table' with your actual table name for photo comments
        $query = $this->db->get_where('comment_log', array('id_comment' => $photo_id));
        return $query->result_array();
    }

    public function add_like($photo_id) {
        // Implement logic to add a like, update your_like_table or similar
    }

    public function add_comment($photo_id, $comment) {
        // Implement logic to add a comment, update your_comment_table or similar
    }
}