<div class="container">
    <?php if(!empty($success_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-success"><?php echo $success_msg; ?></div>
    </div>
    <?php }elseif(!empty($error_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-danger"><?php echo $error_msg; ?></div>
    </div>
    <?php } ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default ">
                <div class="panel-heading">courses <a href="<?php echo site_url('courses/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
                <table id="courses_table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Course note</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="userData">
                        <?php if(!empty($courses)): foreach($courses as $course): ?>
                        <tr>
                            <td><?php echo $course['course_name']; ?></td>
                            <td><?php echo $course['course_note']; ?></td>                     
                            <td>
                                <a href="<?php echo site_url('courses/view/'.$course['id']); ?>" class="glyphicon glyphicon-eye-open"></a>
                                <a href="<?php echo site_url('courses/edit/'.$course['id']); ?>" class="glyphicon glyphicon-edit"></a>
                                <a href="<?php echo site_url('courses/delete/'.$course['id']); ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr><td colspan="3">course(s) not found......</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
