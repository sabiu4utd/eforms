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
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/extra.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <style>
        .blink_me {
            animation: blinker 3s linear infinite;
            font-weight: bolder;
            color: brown;
            text-decoration: underline;
        }

        @keyframes blinker {
            50% {
                opacity: 0;
            }
        }

        .raise:hover,
        .raise:focus {
            box-shadow: 0 0.1em 0.1em -0.1em;
            transform: translateY(-0.45em);
            border-color: #ffa260;
        }

        .green {
            color: #4ff00a;
        }

        .red {
            color: #900C3F;
            margin-left: 2px;
            font-size: 15px;
        }

        .greenbg {
            background-color: #4ff00a;
        }

        .redbg {
            background-color: #900C3F;
        }

        .table,
        table th,
        table td {
            color: black;
        }

        th {
            width: 200px;
            color: black;
        }
    </style>
</head>

<body class="font-muli right_tb_toggle <?php echo " " . $_SESSION['theme_mode']; ?>">
    <!--<div class="page-loader-wrapper">
        <div class="loader"></div>
    </div>-->
    <div id="main_content">
        <?php
        $this->load->view('incs/header');
        $this->load->view('incs/lside');
        ?>
        <div class="page">
            <?php $this->load->view('incs/pageheader'); ?>
            <div class="section-body">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center ">
                        <div class="header-action"></div>
                    </div>
                </div>
            </div>
            <div class="section-body mt-4">
                <div class="container-fluid">
                    <div class="row">
                        <?php $this->load->view('incs/form_timeline') ?>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="row clearfix">
                                <div class="col-xl-8 mx-auto">
                                    <div class="card p-4">
                                        <div class="card-header">
                                            <a href="#" class="card-options-collapse" data-toggle="card-collapse">
                                                <h3 class="card-title" style="min-width: 100%;">
                                                    FORM SUMMARY
                                                </h3>
                                            </a>
                                        </div>
                                        <table class="table table-stripped table-bordered" style="color:black">
                                            <tr>
                                                <th colspan="4">PERSONAL INFORMATION</th>
                                            </tr>
                                            <tr>
                                                <th>Full name</th>
                                                <td colspan="3"><?php echo strtoupper($applicant->surname) . ' ' . ucwords(trim($applicant->firstname . ' ' . $applicant->middlename)) ?></td>
                                            </tr>
                                            <!--<?php if ($jamb_info) {?>-->
                                            <!--<tr>-->
                                            <!--    <th>JAMB Number</th>-->
                                            <!--    <td><?php echo $jamb_info->gender ?></td>-->
                                            <!--    <th>JAMB Score</th>-->
                                            <!--    <td><?php echo $jamb_info->dob ?></td>-->
                                            <!--</tr>-->
                                            <!--<?php } ?>-->
                                            <tr>
                                                <th>Gender</th>
                                                <td><?php echo $applicant->gender ?></td>
                                                <th>Date of Birth</th>
                                                <td><?php echo $applicant->dob ?></td>
                                            </tr>
                                            <tr>
                                                <th>Phone</th>
                                                <td><?php echo $applicant->phone ?></td>
                                                <th>Email</th>
                                                <td><?php echo $applicant->email ?></td>
                                            </tr>
                                            <tr>
                                                <th>State of Origin</th>
                                                <td><?php echo $applicant->state_name ?></td>
                                                <th>LGA of Origin</th>
                                                <td><?php echo $applicant->lga_name ?></td>
                                            </tr>
                                        </table>
                                        <table class="table table-stripped table-bordered" style="color:black">
                                            <tr>
                                                <th colspan="4">PROGRAMME APPLIED</th>
                                                <?php $activeForm = $_SESSION['activeForm'] ?>
                                            </tr>
                                            <tr>
                                                <th>Programme</th>
                                                <td><?php echo $activeForm->prog_abbr; ?></td>
                                                <th>Department</th>
                                                <td><?php echo $activeForm->department; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Faculty</th>
                                                <td><?php echo $activeForm->faculty; ?></td>
                                                <th>Remita Reference</th>
                                                <td><?php echo "1234-5678-9012-4567"; ?></td>
                                            </tr>
                                        </table>
                                        <table class="table table-stripped table-bordered" style="color:black">
                                            <tr>
                                                <th colspan="6">O'LEVEL INFORMATION</th>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <div class="row">
                                                        <?php foreach ($olevels as $row) {
                                                            echo "<div class='col'>" . $row->subject . ' (' . $row->grade . ')</div>';
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                       <?php if($_SESSION['activeForm']->form_id ==1){?>
                                        <table class="table table-stripped table-bordered" style="color:black">
                                            <tr>
                                                <th colspan="6">A'LEVEL INFORMATION</th>
                                            </tr>
                                            <tr>
                                                <th>Insititution</th>
                                                <th>Year</th>
                                                <th>Qualification</th>
                                                <th>Result</th>
                                            </tr>
                                            <?php foreach ($alevels as $row) { ?>
                                                <tr>
                                                    <td style="width: 45%; font-weight: 900;"><?php echo $row->institution_name; ?></td>
                                                    <td><?php echo $row->graduation_year; ?></td>
                                                    <td><?php echo $row->qualification; ?></td>
                                                    <td><?php echo $row->grade; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                        <?php } ?>
                                        <table class="table table-stripped table-bordered" style="color:black">
                                            <tr>
                                                <th colspan="6">Documents Uploaded</th>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <div class="row">
                                                        <?php foreach ($uploads as $row) {
                                                            echo "<div class='col'>" . $row->file_type . ' (' . $row->year_obtained . ')</div>';
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <?php if($_SESSION['activeForm']->form_id ==1){?>
                                        <table class="table table-stripped table-bordered" style="color:black">
                                            <tr>
                                                <th colspan="6">Referees Information</th>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <div class="row">
                                                        <?php foreach ($referees as $row) {
                                                            echo '<div class="col">'
                                                            .'<b>' . $row->referee_title.' '. $row->referee_name . '</b><br>'
                                                            . $row->referee_rank . '<br>'
                                                            . '<b>e: </b>'.$row->referee_email . '<br>'
                                                            . '<b>t: </b>'.$row->referee_phone . '<br>'
                                                            .'</div>';
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <?php } ?>
                                    </div>
                                    <?php if (!$_SESSION['activeForm']->app_status){ ?>
                                    <div class="card mt-4">
                                        <a href="<?php echo site_url('applicant/submitapp/' . $_SESSION['activeForm']->order_hash)?>" class="form-control btn btn-info">Submit Application</a>
                                    </div>
                                    <?php } else{ ?>
                                        <div class="card mt-4">
                                        <a target="_blank" href="<?php echo site_url('applicant/print/' . $_SESSION['activeForm']->order_hash)?>" class="form-control btn btn-success">Print Application</a>
                                    </div>
                                    <?php }  ?>
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
    <script src="<?php echo base_url() ?>assets/js/core.js" type="e27f9daa9c2f25670b2c3761-text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/form/dropify.js" type="e27f9daa9c2f25670b2c3761-text/javascript">
    </script>
    <script src="<?php echo base_url() ?>assets/js/page/summernote.js" type="e27f9daa9c2f25670b2c3761-text/javascript">
    </script>
    <script src="<?php echo base_url() ?>assets/js/rocket-loader.min.js" data-cf-settings="e27f9daa9c2f25670b2c3761-|49" defer=""></script>
</body>

</html>