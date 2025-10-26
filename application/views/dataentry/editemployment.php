<!doctype html>
<html lang="en" dir="ltr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $_SESSION['pageTitle']; ?></title>
    <link rel="icon" href="<?php echo base_url() ?>assets/images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/dropify/css/dropify.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/summernote/dist/summernote.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body class="font-muli right_tb_toggle <?php echo " " . $_SESSION['theme_mode']; ?>">

    <div class="page-loader-wrapper">
        <div class="loader"></div>
    </div>

    <div id="main_content">

        <?php $this->load->view('incs/header'); ?>
        <?php $this->load->view('incs/lside'); ?>

        <div class="page">

            <?php $this->load->view('incs/pageheader'); ?>

            <div class="section-body">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center ">
                        <div class="header-action">
                            <h1 class="page-title">Staff</h1>
                            <ol class="breadcrumb page-breadcrumb">
                                <li class="breadcrumb-item"><a href="#">FUBK-PORTAL</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Staff</li>
                            </ol>
                        </div>
                        <ul class="nav nav-tabs page-header-tab">
                            <li class="nav-item">
                                <a class="nav-link active p-10" href="#"><i class="fa fa-print"></i>Print Profile</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="section-body mt-4">
                <div class="container-fluid">
                    <form action="<?php echo site_url("dataentry/updateEmploy")?>" method="POST">
                        <div class="card-footer text-left">
                            <div class="row">
                                <div class="col-12">
                                    <div class="font-18 font-weight-bolder uppercase">
                                        EMPLOYMENT INFORMATION
                                        <a class="nav-link float-right p-10" href="<?php echo site_url('dataentry/view'); ?>">&lt;&lt; Go Back </a>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                               
                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                    <div class="font-18 font-weight-bold">Employee Number</div>
                                    <div>
                                        <input type="text" class="form-control" name="employee_no" required value="<?php echo $staff->employee_no; ?>" />
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                    <div class="font-18 font-weight-bold">Registry File Number</div>
                                    <div>
                                        <input type="text" class="form-control" name="registry_file_no" required value="<?php echo $staff->registry_file_no; ?>" />
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                    <div class="font-18 font-weight-bold">Designation</div>
                                    <div>
                                        <select name="designation" class="form-control" required>
                                            <?php foreach ($designations as $row) { 
                                            ?>
                                                <option <?php echo ($staff->designation_id == $row->id) ? "selected" : ""; ?> value="<?php echo $row->id; ?>">
                                                    <?php echo $row->designation; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                    <div class="font-18 font-weight-bold">Type of Appointment</div>
                                    <div>
                                        <select name="appt_type" class="form-control" required>
                                            <?php foreach ($appt_types as $row) { 
                                            ?>
                                                <option <?php echo ($staff->appt_type == $row->id) ? "selected" : ""; ?> value="<?php echo $row->id; ?>">
                                                    <?php echo $row->appointment_type; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                    <div class="font-18 font-weight-bold">Date of 1<sup>st</sup> Appointment</div>
                                    <div>
                                    <div><input type="date" class="form-control" name="dofa" required value="<?php echo $staff->dofa; ?>" /></div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                    <div class="font-18 font-weight-bold">Date of Last Promotion</div>
                                    <div>
                                    <div><input type="date" class="form-control" name="dolp" value="<?php echo $staff->dolp; ?>" /></div>
                                    
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                    <div class="font-18 font-weight-bold">Division</div>
                                    <div>
                                        <select name="division" id="division" class="form-control" required>
                                            <?php foreach ($divisions as $row) { 
                                            ?>
                                                <option <?php echo ($staff->division_id == $row->id) ? "selected" : ""; ?> value="<?php echo $row->id; ?>">
                                                    <?php echo $row->division_name; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <em>Current Division: <?php echo $staff->division_name; ?></em>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                    <div class="font-18 font-weight-bold">Department</div>
                                    <div>
                                        <select name="department" id="department" class="form-control" required></select>
                                        <em>Current Department: <?php echo $staff->dept_name; ?></em>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 p-10">
                                    <div><input type="submit" class="form-control btn btn-success" value="Update Employment Information" /></div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <?php $this->load->view('incs/footer'); ?>

                </div>
            </div>

            <script src="<?php echo base_url() ?>assets/bundles/lib.vendor.bundle.js" type="e27f9daa9c2f25670b2c3761-text/javascript"></script>
            <script src="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="e27f9daa9c2f25670b2c3761-text/javascript"></script>
            <script src="<?php echo base_url() ?>assets/plugins/dropify/js/dropify.min.js" type="e27f9daa9c2f25670b2c3761-text/javascript"></script>
            <script src="<?php echo base_url() ?>assets/bundles/summernote.bundle.js" type="e27f9daa9c2f25670b2c3761-text/javascript"></script>
            <script src="<?php echo base_url() ?>assets/js/core.js" type="e27f9daa9c2f25670b2c3761-text/javascript"></script>
            <script src="<?php echo base_url() ?>assets/js/form/dropify.js" type="e27f9daa9c2f25670b2c3761-text/javascript"></script>
            <script src="<?php echo base_url() ?>assets/js/page/summernote.js" type="e27f9daa9c2f25670b2c3761-text/javascript"></script>
            <script src="<?php echo base_url() ?>assets/js/rocket-loader.min.js" data-cf-settings="e27f9daa9c2f25670b2c3761-|49" defer=""></script>
            <script src="<?php echo base_url() ?>assets/js/table/datatable.js" type="7ab396837eea337a09d7c15b-text/javascript"></script>
            <script src="<?php echo base_url() ?>assets/bundles/dataTables.bundle.js" type="7ab396837eea337a09d7c15b-text/javascript"></script>
            <script>
                $("#division").change(function(){
                    var divisionid = $("#division").val();
                    $.post("<?php echo site_url('dataEntry/load_depts')?>", {divisionid: divisionid}, function(result){
                        $("#department").empty();
                        result = JSON.parse(result);
                        $.each(result, function(index) {
                            $("#department").append("<option value='"+result[index].id+"'>"+result[index].dept_name+"</option>");
                        });
                    });
                });
            </script>
    </body>



</html>