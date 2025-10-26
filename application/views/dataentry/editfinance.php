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
                    <form action="<?php echo site_url("dataentry/updateFinance")?>" method="POST">
                        <div class="card-footer text-left">
                            <div class="row">
                                <div class="col-12">
                                    <div class="font-18 font-weight-bolder uppercase">
                                        FINANCIAL INFORMATION
                                        <a class="nav-link float-right p-10" href="<?php echo site_url('dataentry/view'); ?>">&lt;&lt; Go Back </a>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                               
                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                    <div class="font-18 font-weight-bold">IPPIS Number</div>
                                    <div>
                                        <input type="text" class="form-control" name="ippis_no" required value="<?php echo $finance->ippis_no; ?>" />
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                    <div class="font-18 font-weight-bold">BVN</div>
                                    <div>
                                        <input type="text" class="form-control" name="bvn" required value="<?php echo $finance->bvn; ?>" />
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                    <div class="font-18 font-weight-bold">Bank Name</div>
                                    <div>
                                        <select name="bank" class="form-control" required>
                                            <?php foreach ($banks as $row) { 
                                            ?>
                                                <option <?php echo ($finance->bank_id == $row->id) ? "selected" : ""; ?> value="<?php echo $row->id; ?>">
                                                    <?php echo $row->bank; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                    <div class="font-18 font-weight-bold">Account Number</div>
                                    
                                    <div><input type="number" class="form-control" name="account_no" required value="<?php echo $finance->account_number; ?>" /></div>
                                </div>
                                
                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                    <div class="font-18 font-weight-bold">PFA Administrator</div>
                                    <div>
                                        <select name="pfa_admin" class="form-control" required>
                                            <?php foreach ($pfas as $row) { 
                                            ?>
                                                <option <?php echo ($finance->pfa_admin_id == $row->id) ? "selected" : ""; ?> value="<?php echo $row->id; ?>">
                                                    <?php echo $row->pfa; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                    <div class="font-18 font-weight-bold">PFA PIN</div>
                                    
                                    <div><input type="text" class="form-control" name="pfa_pin" required value="<?php echo $finance->pfa_pin; ?>" /></div>
                                </div>
                                
                                <div class="col-sm-6 col-md-4 col-lg-2 col-xl-2 p-10">
                                    <div class="font-18 font-weight-bold">Salary Structure</div>
                                    <div>
                                        <select name="salary_structure" class="form-control" required>
                                            <?php foreach ($salary_structures as $row) { 
                                            ?>
                                                <option <?php echo ($finance->salary_structure == $row->id) ? "selected" : ""; ?> value="<?php echo $row->id; ?>">
                                                    <?php echo $row->structure; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3 col-md-2 col-lg-2 col-xl-2 p-10">
                                    <div class="font-18 font-weight-bold">Grade Level</div>
                                    <div>
                                        <select name="grade_level" class="form-control" required>
                                            <?php 
                                            for($i = 1; $i <= 15; $i++) { 
                                                echo '<option '.(($finance->grade_level == $i) ? "selected" : "").'>'.$i.'</option>';
                                            }
                                            ?>
                                        </select>
                                        <em>Current Grade: GL<?php echo $finance->grade_level; ?></em>
                                    </div>
                                </div>

                                <div class="col-sm-3 col-md-2 col-lg-2 col-xl-2 p-10">
                                    <div class="font-18 font-weight-bold">Step</div>
                                    <div>
                                        <select name="step" class="form-control" required>
                                            <?php 
                                            for($i = 1; $i <= 15; $i++) { 
                                                echo '<option '.(($finance->step == $i) ? "selected" : "").' >'.$i.'</option>';
                                            }
                                            ?>
                                        </select>
                                        <em>Current Step: <?php echo $finance->step; ?></em>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-12 p-10">
                                    <div><input type="submit" class="form-control btn btn-success" value="Update Financial Information" /></div>
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