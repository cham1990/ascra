<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Course extends CI_Model{
    /*
     * Get courses
     */
    function getRows($id = ""){
        if(!empty($id)){
            $query = $this->db->get_where('courses', array('id' => $id));
            return $query->row_array();
        }else{
            $query = $this->db->get_where('courses',array('is_delete' => 0));
            return $query->result_array();
        }
    }
    
    /*
     * Insert course
     */
    public function insert($data = array()) {
        $insert = $this->db->insert('courses', $data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    
    /*
     * Update course
     */
    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('courses', $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }
    
    /*
     * Delete course
     */
    public function delete($id){
        $delete = $this->db->update('courses', array('is_delete'=>1), array('id'=>$id));
        return $delete?true:false;
    }
}