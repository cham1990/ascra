<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Courses extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('course');
    }
    
    public function index(){
        $data = array();
        
        //get messages from the session
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }

        $data['courses'] = $this->course->getRows();
        $data['title'] = 'All courses';
        
        //load the list page view
        $this->load->view('templates/header', $data);
        $this->load->view('courses/index', $data);
        $this->load->view('templates/footer');
    }
    
    /*
     * course details
     */
    public function view($id){
        $data = array();
        
        //check whether course id is not empty
        if(!empty($id)){
            $data['course'] = $this->course->getRows($id);
            $data['title'] = $data['course']['course_name'];
            
            //load the details page view
            $this->load->view('templates/header', $data);
            $this->load->view('courses/view', $data);
            $this->load->view('templates/footer');
        }else{
            redirect('courses');
        }
    }
    
    /*
     * Add course
     */
    public function add(){
        $data = array();
        $courseData = array();
        
        //if add request is submitted
        if($this->input->post('courseSubmit')){
            //form field validation rules
            $this->form_validation->set_rules('course_name', 'course name', 'required');
            
            
            //prepare course data
            $courseData = array(
                'course_name' => $this->input->post('course_name'),               
                'course_note' => $this->input->post('course_note'),
                'is_delete' => '0',
            );
             																
            //validate submitted form data
            if($this->form_validation->run() == true){
                //insert course data
                $insert = $this->course->insert($courseData);

                if($insert){
                    $this->session->set_userdata('success_msg', 'course has been added successfully.');
                    redirect('courses');
                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        }
        
        $data['course'] = $courseData;
        $data['title'] = 'Create course';
        $data['action'] = 'Add';
        
        //load the add page view
        $this->load->view('templates/header', $data);
        $this->load->view('courses/add-edit', $data);
        $this->load->view('templates/footer');
    }
    
    /*
     * Update course content
     */
    public function edit($id){
        $data = array();
        
        //get course data
        $courseData = $this->course->getRows($id);
        
        //if update request is submitted
        if($this->input->post('courseSubmit')){
            //form field validation rules
            $this->form_validation->set_rules('course_name', 'course name', 'required');           
            
           //prepare course data
            $courseData = array(
                'course_name' => $this->input->post('course_name'),
                'course_note' => $this->input->post('course_note'),
                'is_delete' => '0',
            );
            
            //validate submitted form data
            if($this->form_validation->run() == true){
                //update course data
                $update = $this->course->update($courseData, $id);

                if($update){
                    $this->session->set_userdata('success_msg', 'course has been updated successfully.');
                    redirect('/courses');
                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        }

        
        $data['course'] = $courseData;
        $data['title'] = 'Update course';
        $data['action'] = 'Edit';
        
        //load the edit page view
        $this->load->view('templates/header', $data);
        $this->load->view('courses/add-edit', $data);
        $this->load->view('templates/footer');
    }
    
    /*
     * Delete course data
     */
    public function delete($id){
        //check whether course id is not empty
        if($id){
            //delete course
            $delete = $this->course->delete($id);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'course has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }

        redirect('/courses');
    }
}