<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">course Details <a href="<?php echo site_url('courses/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Course Name:</label>
                    <p><?php echo !empty($course['course_name'])?$course['course_name']:''; ?></p>
                </div>
                
                <div class="form-group">
                    <label>course note:</label>
                    <p><?php echo !empty($course['course_note'])?$course['course_note']:''; ?></p>
                </div>                
            </div>
        </div>
    </div>
</div>