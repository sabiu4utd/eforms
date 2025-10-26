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
                    <form action="<?php echo site_url("dataentry/updatebio") ?>" method="POST">
                        <div class="card-footer text-left">
                            <div class="row">
                                <div class="col-12">
                                    <div class="font-18 font-weight-bolder uppercase">
                                        PERSONAL INFORMATION
                                        <a class="nav-link float-right p-10" href="<?php echo site_url('dataentry/view'); ?>">&lt;&lt; Go Back </a>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                    <div class="font-18 font-weight-bold">Title</div>
                                    <div>
                                        <select name="title" class="form-control">
                                            <option <?php echo ($staff->title == "Malam") ? "selected" : ""; ?>>Malam</option>
                                            <option <?php echo ($staff->title == "Malama") ? "selected" : ""; ?>>Malama</option>
                                            <option <?php echo ($staff->title == "Mr") ? "selected" : ""; ?>>Mr</option>
                                            <option <?php echo ($staff->title == "Mrs") ? "selected" : ""; ?>>Mrs</option>
                                            <option <?php echo ($staff->title == "Dr") ? "selected" : ""; ?>>Dr</option>
                                            <option <?php echo ($staff->title == "Prof") ? "selected" : ""; ?>>Prof</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                    <div class="font-18 font-weight-bold">Surname</div>
                                    <div>
                                        <input type="text" class="form-control" name="surname" required value="<?php echo $staff->surname; ?>" />
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                    <div class="font-18 font-weight-bold">Firstname</div>
                                    <div>
                                        <input type="text" class="form-control" name="firstname" required value="<?php echo $staff->firstname; ?>" />
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                    <div class="font-18 font-weight-bold">Othername(s)</div>
                                    <div>
                                        <input type="text" class="form-control" name="othernames" value="<?php echo $staff->othernames; ?>" />
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                    <div class="font-18 font-weight-bold">Gender</div>
                                    <div>
                                        <select name="gender" class="form-control" required>
                                            <option <?php echo ($staff->gender == "Male") ? "selected" : ""; ?>>Male</option>
                                            <option <?php echo ($staff->gender == "Female") ? "selected" : ""; ?>>Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                    <div class="font-18 font-weight-bold">Marital Status</div>
                                    <div>
                                        <select name="marital_status" class="form-control" required>
                                            <option <?php echo ($staff->marital_status == "Single") ? "selected" : ""; ?>>Single</option>
                                            <option <?php echo ($staff->marital_status == "Married") ? "selected" : ""; ?>>Married</option>
                                            <option <?php echo ($staff->marital_status == "Divorced") ? "selected" : ""; ?>>Divorced</option>
                                            <option <?php echo ($staff->marital_status == "Widow") ? "selected" : ""; ?>>Widow</option>
                                            <option <?php echo ($staff->marital_status == "Widower") ? "selected" : ""; ?>>Widower</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                    <div class="font-18 font-weight-bold">Date of Birth</div>
                                    <div><input type="date" class="form-control" name="dob" required value="<?php echo $staff->dob; ?>" /></div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                    <div class="font-18 font-weight-bold">University Email</div>
                                    <div><input type="email" class="form-control" name="university_email" required value="<?php echo $staff->username; ?>" /></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                    <div class="font-18 font-weight-bold">State of Origin</div>
                                    <div>
                                        <select name="state" id="state" class="form-control" required>
                                            <?php
                                            $curr = "";
                                            foreach ($states as $row) {
                                                if ($contact_info->stateid == $row->stateid) $curr = $row->state_name;
                                            ?>
                                                <option <?php echo ($contact_info->stateid == $row->stateid) ? "selected" : ""; ?> value="<?php echo $row->stateid; ?>">
                                                    <?php echo $row->state_name; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <em>Current State: <?php echo $curr; ?></em>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                    <div class="font-18 font-weight-bold">LGA of Origin</div>
                                    <div>
                                        <select name="lga_name" id="lga_name" class="form-control" required></select>
                                        <em>Current LGA: <?php echo $contact_info->lga_name; ?></em>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                    <div class="font-18 font-weight-bold">Place of Birth</div>
                                    <div><input type="text" name="town" class="form-control" value="<?php echo $contact_info->town; ?>" /></div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                    <div class="font-18 font-weight-bold">Phone number</div>
                                    <div><input type="text" name="personal_phone" class="form-control" value="<?php echo $contact_info->personal_phone; ?>" /></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                    <div class="font-18 font-weight-bold">Personal Email</div>
                                    <div><input type="text" name="personal_email" class="form-control" value="<?php echo $contact_info->personal_email; ?>" /></div>
                                </div>

                                <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9 p-10">
                                    <div class="font-18 font-weight-bold">Contact Address</div>
                                    <div><textarea name="contact_address" class="form-control" required rows="2"><?php echo $contact_info->contact_address; ?></textarea></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                    <div class="font-18 font-weight-bold">Next of Kin Fullname</div>
                                    <div>
                                        <input type="text" class="form-control" name="nok_name" required value="<?php echo $contact_info->nok_name; ?>" />
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                    <div class="font-18 font-weight-bold">Relationship</div>
                                    <div>
                                        <select name="nok_relationship" class="form-control" required>
                                            <option <?php echo ($contact_info->relationship == "Father") ? "selected" : ""; ?>>Parent</option>
                                            <option <?php echo ($contact_info->relationship == "Spouse") ? "selected" : ""; ?>>Spouse</option>
                                            <option <?php echo ($contact_info->relationship == "Sibling") ? "selected" : ""; ?>>Sibling</option>
                                            <option <?php echo ($contact_info->relationship == "Relative") ? "selected" : ""; ?>>Relative</option>
                                            <option <?php echo ($contact_info->relationship == "Others") ? "selected" : ""; ?>>Others</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                    <div class="font-18 font-weight-bold">Firstname</div>
                                    <div>
                                        <input type="text" class="form-control" name="firstname" required value="<?php echo $staff->firstname; ?>" />
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                    <div class="font-18 font-weight-bold">Othername(s)</div>
                                    <div>
                                        <input type="text" class="form-control" name="othernames" value="<?php echo $staff->othernames; ?>" />
                                    </div>
                                </div>

                                

                                <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9 p-10">
                                    <div class="font-18 font-weight-bold">Contact Address</div>
                                    <div><textarea name="contact_address" class="form-control" required rows="2"><?php echo $contact_info->contact_address; ?></textarea></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 p-10">
                                    <div><input type="submit" class="form-control btn btn-success" value="Update Biodata" /></div>
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
                $("#state").change(function() {
                    var stateid = $("#state").val();
                    $.post("<?php echo site_url('staff/loadlga') ?>", {
                        stateid: stateid
                    }, function(result) {
                        $("#lga_name").empty();
                        result = JSON.parse(result);
                        $.each(result, function(index) {
                            $("#lga_name").append("<option value='" + result[index].id + "'>" + result[index].lga_name + "</option>");
                        });
                    });
                });
            </script>
</body>



</html>