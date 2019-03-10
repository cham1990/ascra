<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class School extends CI_Model{
    /*
     * Get schools
     */
    function getRows($id = ""){
        if(!empty($id)){
            $query = $this->db->get_where('schools', array('id' => $id));
            return $query->row_array();
        }else{
            $query = $this->db->get_where('schools',array('is_delete' => 0));
            return $query->result_array();
        }
    }
    
    /*
     * Insert school
     */
    public function insert($data = array()) {
        $insert = $this->db->insert('schools', $data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    
    /*
     * Update school
     */
    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('schools', $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }
    
    /*
     * Delete school
     */
    public function delete($id){
        $delete = $this->db->update('schools', array('is_delete'=>1), array('id'=>$id));
        return $delete?true:false;
    }
    
     /*
     * Insert school courses
     */
    public function insertSchoolCourses($school_id,$courses){
        
        $this->db->delete('school_courses', array('school_id' => $school_id));
        $this->db->insert_batch('school_courses', $courses);
        return true;
    }
    
     public function getSchoolCourses($school_id){        
         $query = $this->db->get_where('school_courses', array('school_id' => $school_id));
         return $query->result_array();
    }
    
     public function getSchoolCourseDetails($school_id){ 
            $this->db->select('courses.course_name');
            $this->db->join('courses', 'courses.id = school_courses.course_id', 'inner'); 
            $query = $this->db->get_where('school_courses', array('school_id' => $school_id));
            return $query->result_array();         
       
    }
}