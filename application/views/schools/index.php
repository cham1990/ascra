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
                <div class="panel-heading">Schools <a href="<?php echo site_url('schools/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
                <table id="schools_table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>School Name</th>
                            <th>Email</th>
                            <th>Contact number</th>
                            <th>Website</th>
                            <th>Registration number</th>
                            <th>School board</th>
                            <th>Contact Person</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="userData">
                        <?php if(!empty($schools)): foreach($schools as $school): ?>
                        <tr>
                            <td><?php echo $school['school_name']; ?></td>
                            <td><?php echo $school['school_email']; ?></td>
                            <td><?php echo $school['school_mobile']; ?></td>
                            <td><?php echo $school['school_url']; ?></td>
                            <td><?php echo $school['school_register_no']; ?></td>
                            <td><?php echo $school['school_board']; ?></td>
                            <td><?php echo $school['school_contact_person']; ?></td>                          
                            <td>
                                <a href="<?php echo site_url('index.php/schools/view/'.$school['id']); ?>" class="glyphicon glyphicon-eye-open"></a>
                                <a href="<?php echo site_url('index.php/schools/edit/'.$school['id']); ?>" class="glyphicon glyphicon-edit"></a>
                                <a href="<?php echo site_url('index.php/schools/delete/'.$school['id']); ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr><td colspan="8">School(s) not found......</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
