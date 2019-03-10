<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script> 
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type = 'text/javascript' src = "<?php echo base_url('assets/js/custom.js');?>"></script> 
    <link href="<?php echo base_url('assets/css/custom.css');?>" rel="stylesheet" />
</head>
<body>
    
<div class="container">
    <div class="panel-heading">
    <div class="col-xs-12">
        <div class="col-xs-3"><button type="button" onclick="document.location.href='<?php echo site_url('schools/add'); ?>';" class="btn btn-primary">School Add</button></div><div class="col-xs-3"><button type="button" onclick="document.location.href='<?php echo site_url('schools'); ?>';" class="btn btn-primary">School List</button></div><div class="col-xs-3"><button type="button" onclick="document.location.href='<?php echo site_url('courses/add'); ?>';" class="btn btn-primary">Course Add</button></div><div class="col-xs-3"><button type="button" onclick="document.location.href='<?php echo site_url('courses'); ?>';" class="btn btn-primary">Course List</button></div>
    </div>
    </div>
</div>