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
    <style>
        .nav-item .nav-link {
            font-weight: bolder;
            color: #000;
        }
    </style>

</head>





<body class="font-muli right_tb_toggle <?php echo " " . $_SESSION['theme_mode']; ?>">



    <div class="page-loader-wrapper">

        <div class="loader">

        </div>

    </div>

    <div id="main_content">

        <?php $this->load->view('incs/header'); ?>

        <?php //$this->load->view('incs/rside');
        ?>

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
                                <li class="breadcrumb-item active" aria-current="page">View Staff</li>
                            </ol>
                        </div>
                        <ul class="nav nav-tabs page-header-tab">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#biodata">Biodata</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#employment">Employment</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#finance">Finance</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#education">Education</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="section-body mt-4">
                <div class="container-fluid">
                    <div class="tab-content">
                        <div class="tab-pane active" id="biodata">
                            <div class="card-footer text-left">

                                <div class="row">

                                    <div class="col-12">

                                        <div class="font-18 font-weight-bolder uppercase">

                                            PERSONAL INFORMATION

                                            <a class="nav-link float-right p-10" href="<?php echo site_url('dataentry/editbio'); ?>"><i class="fa fa-edit"></i>Edit </a>

                                        </div>

                                        <hr>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">

                                        <div class="font-18 font-weight-bold">Title</div>

                                        <div><?php echo $staff->title; ?></div>

                                    </div>

                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">

                                        <div class="font-18 font-weight-bold">Staff Name</div>

                                        <div><?php echo strtoupper($staff->surname) . ' ' . ucwords(strtolower($staff->firstname . ' ' . $staff->othernames)); ?></div>

                                    </div>

                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">

                                        <div class="font-18 font-weight-bold">Gender</div>

                                        <div><?php echo $staff->gender; ?></div>

                                    </div>

                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">

                                        <div class="font-18 font-weight-bold">Date of Birth</div>

                                        <div><?php echo $staff->dob; ?></div>

                                    </div>



                                </div>

                                <div class="row">

                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">

                                        <div class="font-18 font-weight-bold">Marital Status</div>

                                        <div><?php echo $staff->marital_status; ?></div>

                                    </div>

                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">

                                        <div class="font-18 font-weight-bold">State of Origin</div>

                                        <div><?php echo $contact_info->state_name; ?></div>

                                    </div>

                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">

                                        <div class="font-18 font-weight-bold">LGA of Origin</div>

                                        <div><?php echo $contact_info->lga_name; ?></div>

                                    </div>

                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">

                                        <div class="font-18 font-weight-bold">Town of Birth</div>

                                        <div><?php echo $contact_info->town; ?></div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">

                                        <div class="font-18 font-weight-bold">University Email</div>

                                        <div><?php echo $staff->username; ?></div>

                                    </div>

                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">

                                        <div class="font-18 font-weight-bold">Phone number</div>

                                        <div><?php echo $contact_info->personal_phone; ?></div>

                                    </div>

                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">

                                        <div class="font-18 font-weight-bold">Personal Email</div>

                                        <div><?php echo $contact_info->personal_email; ?></div>

                                    </div>

                                    <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3 p-10">

                                        <div class="font-18 font-weight-bold">Contact Address</div>

                                        <div><?php echo $contact_info->contact_address; ?></div>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="employment">
                            <div class="card-footer text-left">

                                <div class="row">

                                    <div class="col-12">

                                        <div class="font-18 font-weight-bolder">

                                            EMPLOYEMENT INFORMATION

                                            <a class="nav-link float-right p-10" href="<?php echo site_url('dataentry/editemployment'); ?>"><i class="fa fa-edit"></i>Edit </a>

                                        </div>

                                        <hr>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">

                                        <div class="font-18 font-weight-bold">Employee Number</div>

                                        <div><?php echo $staff->employee_no; ?></div>

                                    </div>

                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">

                                        <div class="font-18 font-weight-bold">Registry File Number</div>

                                        <div><?php echo $staff->registry_file_no; ?></div>

                                    </div>

                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">

                                        <div class="font-18 font-weight-bold">Designation</div>

                                        <div><?php echo $staff->designation; ?></div>

                                    </div>

                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">

                                        <div class="font-18 font-weight-bold">Appointment Type</div>

                                        <div><?php echo $staff->appointment_type; ?></div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">

                                        <div class="font-18 font-weight-bold">Date of First Appointment</div>

                                        <div><?php echo $staff->dofa; ?></div>

                                    </div>

                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">

                                        <div class="font-18 font-weight-bold">Date of Last Promotion</div>

                                        <div><?php echo $staff->dolp; ?></div>

                                    </div>

                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">

                                        <div class="font-18 font-weight-bold">Division</div>

                                        <div><?php echo $staff->division_name; ?></div>

                                    </div>

                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">

                                        <div class="font-18 font-weight-bold">Department</div>

                                        <div><?php echo $staff->dept_name; ?></div>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="finance">
                            <div class="card-footer text-left">

                                <div class="row">

                                    <div class="col-12">

                                        <div class="font-18 font-weight-bolder">
                                            FINANCIAL INFORMATION
                                            <a class="nav-link float-right p-10" href="<?php echo site_url('dataentry/editfinance'); ?>"><i class="fa fa-edit"></i>Edit </a>
                                        </div>

                                        <hr>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">

                                        <div class="font-18 font-weight-bold">IPPIS Number</div>

                                        <div><?php echo $staff->ippis_no; ?></div>

                                    </div>

                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">

                                        <div class="font-18 font-weight-bold">BVN</div>

                                        <div><?php echo $fin_info->bvn; ?></div>

                                    </div>

                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">

                                        <div class="font-18 font-weight-bold">Bank Name</div>

                                        <div><?php echo $fin_info->bank; ?></div>

                                    </div>

                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">

                                        <div class="font-18 font-weight-bold">Account Number</div>

                                        <div><?php echo $fin_info->account_number; ?></div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">

                                        <div class="font-18 font-weight-bold">PFA Administrator</div>

                                        <div><?php echo $fin_info->pfa; ?></div>

                                    </div>

                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">

                                        <div class="font-18 font-weight-bold">PFA PIN</div>

                                        <div><?php echo $fin_info->pfa_pin; ?></div>

                                    </div>

                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">

                                        <div class="font-18 font-weight-bold">Salary Structure</div>

                                        <div><?php echo $fin_info->structure; ?></div>

                                    </div>

                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">

                                        <div class="font-18 font-weight-bold">Grade/ Step</div>

                                        <div><?php echo $fin_info->grade_level . "/ " . $fin_info->step; ?></div>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="education">
                            <div class="card-footer text-left">

                                <div class="row">

                                    <div class="col-12">

                                        <div class="font-18 font-weight-bolder">ACADEMIC QUALIFICATION</div>

                                        <hr>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-12 p-10">

                                        <div class="table-responsive">

                                            <table class="table table-hover js-basic-example dataTable table-striped table_custom border-style spacing5">

                                                <thead>

                                                    <tr>

                                                        <th>#</th>

                                                        <th>Institution Name</th>

                                                        <th>Start Date`</th>

                                                        <th>End Date</th>

                                                        <th>Qualification Obtained</th>

                                                        <th>Grade</th>

                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    <?php $i = 1;
                                                    foreach ($acad_info as $row) { ?>

                                                        <tr>

                                                            <td><?php echo $i++; ?></td>

                                                            <td><?php echo $row->school_name ?></td>

                                                            <td><?php echo $row->start_date ?></td>

                                                            <td><?php echo (strlen($row->end_date) < 7 ? "Ongoing" : $row->end_date) ?></td>

                                                            <td><?php echo $row->qual_obtained; ?></td>

                                                            <td><?php echo ucwords(strtolower($row->grade)); ?></td>

                                                        </tr>

                                                    <?php } ?>

                                                </tbody>

                                            </table>

                                        </div>

                                    </div>



                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <?php $this->load->view('incs/footer'); ?>

        </div>

    </div>



    <script src="<?php echo base_url() ?>assets/bundles/lib.vendor.bundle.js" type="e27f9daa9c2f25670b2c3761-text/javascript"></script>



    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="e27f9daa9c2f25670b2c3761-text/javascript"></script>

    <script src="<?php echo base_url() ?>assets/plugins/dropify/js/dropify.min.js" type="e27f9daa9c2f25670b2c3761-text/javascript"></script>

    <script src="<?php echo base_url() ?>assets/bundles/summernote.bundle.js" type="e27f9daa9c2f25670b2c3761-text/javascript"></script>



    <script src="<?php echo base_url() ?>assets/js/core.js" type="e27f9daa9c2f25670b2c3761-text/javascript">

    </script>

    <script src="<?php echo base_url() ?>assets/js/form/dropify.js" type="e27f9daa9c2f25670b2c3761-text/javascript">

    </script>

    <script src="<?php echo base_url() ?>assets/js/page/summernote.js" type="e27f9daa9c2f25670b2c3761-text/javascript">

    </script>

    <script src="<?php echo base_url() ?>assets/js/rocket-loader.min.js" data-cf-settings="e27f9daa9c2f25670b2c3761-|49" defer=""></script>



    <script src="<?php echo base_url() ?>assets/js/table/datatable.js" type="7ab396837eea337a09d7c15b-text/javascript"></script>

    <script src="<?php echo base_url() ?>assets/bundles/dataTables.bundle.js" type="7ab396837eea337a09d7c15b-text/javascript"></script>

</body>



</html>