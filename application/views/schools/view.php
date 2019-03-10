<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">School Details <a href="<?php echo site_url('schools/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>School Name:</label>
                    <p><?php echo !empty($school['school_name'])?$school['school_name']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>School Email:</label>
                    <p><?php echo !empty($school['school_email'])?$school['school_email']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>School Contact number:</label>
                    <p><?php echo !empty($school['school_mobile'])?$school['school_mobile']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>School Website:</label>
                    <p><?php echo !empty($school['school_url'])?$school['school_url']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>School Registration number:</label>
                    <p><?php echo !empty($school['school_register_no'])?$school['school_register_no']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>School board:</label>
                    <p><?php echo !empty($school['school_board'])?$school['school_board']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>School contact person:</label>
                    <p><?php echo !empty($school['school_contact_person'])?$school['school_contact_person']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>School courses:</label>
                    <p><?php echo !empty($school_courses)?implode(', ',$school_courses):''; ?></p>
                </div>
                <div class="form-group">
                    <label>School note:</label>
                    <p><?php echo !empty($school['school_note'])?$school['school_note']:''; ?></p>
                </div>                
            </div>
        </div>
    </div>
</div>