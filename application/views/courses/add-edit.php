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
                <div class="panel-heading"><?php echo $action; ?> course <a href="<?php echo site_url('courses/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
                <div class="panel-body">
                    <form method="post" action="" class="form">
                        <div class="form-group">
                            <label for="course-name">course Name</label>
                            <input type="text" class="form-control" name="course_name" placeholder="Enter course Name" value="<?php echo !empty($course['course_name'])?$course['course_name']:''; ?>">
                            <?php echo form_error('course_name','<p class="help-block text-danger">','</p>'); ?>
                        </div>
                      
                        <div class="form-group">
                            <label for="course-note">course Note</label>
                            <textarea name="course_note" class="form-control" placeholder="Enter course note"><?php echo !empty($course['course_note'])?$course['course_note']:''; ?></textarea>
                            <?php echo form_error('course_note','<p class="text-danger">','</p>'); ?>
                        </div>
                        <input type="submit" name="courseSubmit" class="btn btn-primary" value="Submit"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>