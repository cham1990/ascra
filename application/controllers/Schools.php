<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schools extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('school');
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

        $data['schools'] = $this->school->getRows();
        $data['title'] = 'All schools';
        
        //load the list page view
        $this->load->view('templates/header', $data);
        $this->load->view('schools/index', $data);
        $this->load->view('templates/footer');
    }
    
    /*
     * School details
     */
    public function view($id){
        $data = array();
        
        //check whether school id is not empty
        if(!empty($id)){
            $data['school'] = $this->school->getRows($id);
            $data['title'] = $data['school']['school_name'];
            $schoolCourseRows = $this->school->getSchoolCourseDetails($id);
            $schoolCourseData = array();
            if(!empty($schoolCourseRows)){
                foreach($schoolCourseRows as $schoolCourse){
                    $schoolCourseData[] = $schoolCourse['course_name'];
                }
            }
            
            $data['school_courses'] = $schoolCourseData;
            
            //load the details page view
            $this->load->view('templates/header', $data);
            $this->load->view('schools/view', $data);
            $this->load->view('templates/footer');
        }else{
            redirect('schools');
        }
    }
    
    /*
     * Add school
     */
    public function add(){
        $data = array();
        $schoolData = array();
        
        //if add request is submitted
        if($this->input->post('schoolSubmit')){
            //form field validation rules
            $this->form_validation->set_rules('school_name', 'School name', 'required');
            $this->form_validation->set_rules('school_email', 'School email', 'required');
            $this->form_validation->set_rules('school_mobile', 'School mobile no', 'required');
            $this->form_validation->set_rules('school_register', 'School registration number', 'required');
            $this->form_validation->set_rules('school_contact', 'School contact person name', 'required');
            $this->form_validation->set_rules('school_email', 'School email', 'valid_email');
            $this->form_validation->set_rules('school_url', 'School website', 'valid_url');
            $this->form_validation->set_rules('school_mobile', 'School mobile no', 'numeric');
            $this->form_validation->set_rules('school_mobile', 'School mobile no', 'exact_length[10]');
            
            
            //prepare school data
            $schoolData = array(
                'school_name' => $this->input->post('school_name'),
                'school_email' => $this->input->post('school_email'),
                'school_mobile' => $this->input->post('school_mobile'),
                'school_url' => $this->input->post('school_url'),
                'school_register_no' => $this->input->post('school_register'),
                'school_board' => $this->input->post('school_board'),
                'school_contact_person' => $this->input->post('school_contact'),
                'school_note' => $this->input->post('school_note'),
                'is_delete' => '0',
            );
														
            //validate submitted form data
            if($this->form_validation->run() == true){
                //insert school data
                $insert = $this->school->insert($schoolData);

                if(!empty($this->input->post('school_course'))){
                    $school_courses = $this->input->post('school_course');
                    $school_course_data = array();
                    foreach($school_courses as $key=>$course){
                        $school_course_data[$key]['school_id'] = $insert;
                        $school_course_data[$key]['course_id'] = $course;
                    }

                    $this->school->insertSchoolCourses($insert,$school_course_data);                    
                }
                
                if($insert){
                    $this->session->set_userdata('success_msg', 'School has been added successfully.');
                    redirect('schools');
                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        }
        
        $courseData = $this->course->getRows();
        $data['courses'] = $courseData;
        $data['school'] = $schoolData;
        $data['title'] = 'Create School';
        $data['action'] = 'Add';
        
        //load the add page view
        $this->load->view('templates/header', $data);
        $this->load->view('schools/add-edit', $data);
        $this->load->view('templates/footer');
    }
    
    /*
     * Update school content
     */
    public function edit($id){
        $data = array();
        
        //get school data
        $schoolData = $this->school->getRows($id);
        
        //if update request is submitted
        if($this->input->post('schoolSubmit')){
            //form field validation rules
            $this->form_validation->set_rules('school_name', 'School name', 'required');
            $this->form_validation->set_rules('school_email', 'School email', 'required');
            $this->form_validation->set_rules('school_mobile', 'School mobile no', 'required');
            $this->form_validation->set_rules('school_register', 'School registration number', 'required');
            $this->form_validation->set_rules('school_contact', 'School contact person name', 'required');
            $this->form_validation->set_rules('school_email', 'School email', 'valid_email');
            $this->form_validation->set_rules('school_url', 'School website', 'valid_url');
            $this->form_validation->set_rules('school_mobile', 'School mobile no', 'numeric');
            $this->form_validation->set_rules('school_mobile', 'School mobile no', 'exact_length[10]');
            
           //prepare school data
            $schoolData = array(
                'school_name' => $this->input->post('school_name'),
                'school_email' => $this->input->post('school_email'),
                'school_mobile' => $this->input->post('school_mobile'),
                'school_url' => $this->input->post('school_url'),
                'school_register_no' => $this->input->post('school_register'),
                'school_board' => $this->input->post('school_board'),
                'school_contact_person' => $this->input->post('school_contact'),
                'school_note' => $this->input->post('school_note'),
                'is_delete' => '0',
            );
            
            //validate submitted form data
            if($this->form_validation->run() == true){
                //update school data
                $update = $this->school->update($schoolData, $id);
                
                if(!empty($this->input->post('school_course'))){
                    $school_courses = $this->input->post('school_course');
                    $school_course_data = array();
                    foreach($school_courses as $key=>$course){
                        $school_course_data[$key]['school_id'] = $id;
                        $school_course_data[$key]['course_id'] = $course;
                    }

                    $this->school->insertSchoolCourses($id,$school_course_data);                    
                }

                if($update){
                    $this->session->set_userdata('success_msg', 'school has been updated successfully.');
                    redirect('/schools');
                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        }

        $courseData = $this->course->getRows();
        $schoolCourseRows = $this->school->getSchoolCourses($id);
        $schoolCourseData = array();
        if(!empty($schoolCourseRows)){
            foreach($schoolCourseRows as $schoolCourse){
                $schoolCourseData[] = $schoolCourse['course_id'];
            }
        }

        $data['courses'] = $courseData;
        $data['school_courses'] = $schoolCourseData;
        $data['school'] = $schoolData;
        $data['title'] = 'Update school';
        $data['action'] = 'Edit';
        
        //load the edit page view
        $this->load->view('templates/header', $data);
        $this->load->view('schools/add-edit', $data);
        $this->load->view('templates/footer');
    }
    
    /*
     * Delete school data
     */
    public function delete($id){
        //check whether school id is not empty
        if($id){
            //delete school
            $delete = $this->school->delete($id);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'school has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }

        redirect('/schools');
    }
}