<div class="container">
    <div class="col-xs-12">
    <?php 
        if(!empty($success_msg)){
            echo '<div class="alert alert-success">'.$success_msg.'</div>';
        }elseif(!empty($error_msg)){
            echo '<div class="alert alert-danger">'.$error_msg.'</div>';
        }
    ?>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $action; ?> School <a href="<?php echo site_url('schools/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
                <div class="panel-body">
                    <form method="post" action="" class="form">
                        <div class="form-group">
                            <label for="school-name">School Name</label>
                            <input type="text" class="form-control" name="school_name" placeholder="Enter School Name" value="<?php echo !empty($school['school_name'])?$school['school_name']:''; ?>">
                            <?php echo form_error('school_name','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="school-email">School Email</label>
                            <input type="text" class="form-control" name="school_email" placeholder="Enter School Email" value="<?php echo !empty($school['school_email'])?$school['school_email']:''; ?>">
                            <?php echo form_error('school_email','<p class="help-block text-danger">','</p>'); ?>
                        </div>                       
                        <div class="form-group">
                            <label for="school-mobile">School Mobile</label>
                            <input type="text" class="form-control" name="school_mobile" placeholder="Enter School mobile number" value="<?php echo !empty($school['school_mobile'])?$school['school_mobile']:''; ?>">
                            <?php echo form_error('school_mobile','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="school-url">School Website</label>
                            <input type="text" class="form-control" name="school_url" placeholder="Enter School Website" value="<?php echo !empty($school['school_url'])?$school['school_url']:''; ?>">
                            <?php echo form_error('school_url','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="school-register-number">School Registration Number</label>
                            <input type="text" class="form-control" name="school_register" placeholder="Enter School Registration Number" value="<?php echo !empty($school['school_register_no'])?$school['school_register_no']:''; ?>">
                            <?php echo form_error('school_register','<p class="help-block text-danger">','</p>'); ?>
                        </div>                        
                        <div class="form-group">
                            <label for="school-board">School Board</label>
                            <input type="text" class="form-control" name="school_board" placeholder="Enter School Board" value="<?php echo !empty($school['school_board'])?$school['school_board']:''; ?>">
                            <?php echo form_error('school_board','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="school-contact">School Contact Person</label>
                            <input type="text" class="form-control" name="school_contact" placeholder="Enter School contact person" value="<?php echo !empty($school['school_contact_person'])?$school['school_contact_person']:''; ?>">
                            <?php echo form_error('school_contact','<p class="help-block text-danger">','</p>'); ?>
                        </div>    
                         <div class="form-group">
                            <label for="school-course">School Courses</label>
                             <select class="form-control" id="school_course" name="school_course[]" multiple="multiple">                                
                                 <?php if(!empty($courses)){
                                            foreach($courses as $course){
                                                if(in_array($course['id'],$school_courses)){
                                                    $selected = 'selected';
                                                } else {
                                                    $selected = '';
                                                }
                                                echo '<option '.$selected.' value="'.$course['id'].'">'.$course['course_name'].'</option>';                                          
                                            }

                                      }  ?>
                            </select>
                            
                            <?php echo form_error('school_course','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="school-note">School Note</label>
                            <textarea name="school_note" class="form-control" placeholder="Enter school note"><?php echo !empty($school['school_note'])?$school['school_note']:''; ?></textarea>
                            <?php echo form_error('school_note','<p class="text-danger">','</p>'); ?>
                        </div>
                        <input type="submit" name="schoolSubmit" class="btn btn-primary" value="Submit"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
 $('#school_course').select2({tags: true});
</script>
   