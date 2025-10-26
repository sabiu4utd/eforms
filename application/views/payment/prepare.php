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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <style>
        .blink_me {
            font-weight: bolder;
            color: brown;
            font-size: 15px;
            text-decoration: underline;
        }

        @keyframes blinker {
            50% {
                opacity: 0;
            }
        }

        .history-tl-container {
            font-family: "Roboto", sans-serif;
            width: 100%;
            margin: auto;
            display: block;
            position: relative;
        }

        .history-tl-container ul.tl {
            margin: 10px 0;
            padding: 0;
            display: inline-block;
        }

        .history-tl-container ul.tl li {
            list-style: none;
            margin: auto;
            margin-left: 200px;
            min-height: 25px;
            /*background: rgba(255,255,0,0.1);*/
            border-left: 1px dashed #86D6FF;
            padding: 0 0 30px 10px;
            position: relative;
        }

        .history-tl-container ul.tl li:last-child {
            border-left: 0;
        }

        .history-tl-container ul.tl li::before {
            position: absolute;
            left: -18px;
            top: -5px;
            content: " ";
            border: 8px solid rgba(255, 255, 255, 0.74);
            border-radius: 500%;
            background: #258CC7;
            height: 20px;
            width: 20px;
            transition: all 500ms ease-in-out;

        }

        .history-tl-container ul.tl li:hover::before {
            border-color: #258CC7;
            transition: all 1000ms ease-in-out;
        }

        ul.tl li .item-detail {
            color: rgba(0, 0, 0, 0.5);
            font-size: 12px;
        }

        ul.tl li .timestamp {
            color: #fff;
            position: absolute;
            width: 110px;
            left: -95%;
            text-align: center;
            font-size: 14px;
        }

        .timeline-container {
            line-height: 1.3em;
            min-width: 920px;
        }
    </style>


</head>


<body class="font-muli right_tb_toggle <?php echo " " . $_SESSION['theme_mode']; ?>">

    <div class="page-loader-wrapper">
        <div class="loader"></div>
    </div>
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
                        <div class="header-action">

                        </div>

                    </div>
                </div>
            </div>
            <div class="section-body mt-4">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <div style="width: 100%; font-weight:bolder" class="text-center card-title blink_me alert alert-info">Registration Workflow for 2021/2022 Session</div>
                                </div>
                                <div class="card-body">
                                    <div class="widget-content widget-content-area">
                                        <div class="timeline-container">
                                            <div class="history-tl-container">
                                                <ul class="tl">
                                                    <li class="tl-item" ng-repeat="item in retailer_history">
                                                        <div class="timestamp badge badge-<?php echo ($_SESSION['workflow']->acceptance_fee == 0)?"danger":"success"; ?>">
                                                            <?php echo ($_SESSION['workflow']->acceptance_fee == 0)?"Pending":"Completed"; ?>
                                                        </div>
                                                        <div class="item-title">
                                                            <a href="<?php echo site_url('payment/paymentPage/UG_ACCEPTANCE_FEES');?>">
                                                                Pay Acceptance Fee
                                                            </a>
                                                        </div>
                                                        <div class="item-detail">
                                                            <a href="">
                                                                Pay Acceptance Fee
                                                            </a>
                                                        </div>
                                                    </li>
                                                    <li class="tl-item" ng-repeat="item in retailer_history">
                                                        <div class="timestamp badge badge-<?php echo ($_SESSION['workflow']->clearance == 0)?"danger":"success"; ?>">
                                                            <?php echo ($_SESSION['workflow']->clearance == 0)?"Pending":"Completed"; ?>
                                                        </div>
                                                        <div class="item-title">Complete Clearance</div>
                                                        <div class="item-detail">Print form</div>
                                                    </li>
                                                    <li class="tl-item" ng-repeat="item in retailer_history">
                                                        <div class="timestamp badge badge-<?php echo ($_SESSION['workflow']->pay_tuition == 0)?"danger":"success"; ?>">
                                                            <?php echo ($_SESSION['workflow']->pay_tuition == 0)?"Pending":"Completed"; ?>
                                                        </div>
                                                        <div class="item-title">Pay Tuition Fees</div>
                                                        <div class="item-detail">Print Receipt</div>
                                                    </li>
                                                    <li class="tl-item" ng-repeat="item in retailer_history">
                                                        <div class="timestamp badge badge-<?php echo ($_SESSION['workflow']->print_admission == 0)?"danger":"success"; ?>">
                                                            <?php echo ($_SESSION['workflow']->print_admission == 0)?"Pending":"Completed"; ?>
                                                        </div>
                                                        <div class="item-title">Print Admission Offer</div>
                                                        <div class="item-detail">Collected your ID Card? </div>
                                                    </li>
                                                    <li class="tl-item" ng-repeat="item in retailer_history">
                                                        <div class="timestamp badge badge-<?php echo ($_SESSION['workflow']->course_registration == 0)?"danger":"success"; ?>">
                                                            <?php echo ($_SESSION['workflow']->course_registration == 0)?"Pending":"Completed"; ?>
                                                        </div>
                                                        <div class="item-title">Register Courses</div>
                                                        <div class="item-detail">Print form</div>
                                                    </li>
                                                    <li class="tl-item" ng-repeat="item in retailer_history">
                                                        <div class="timestamp badge badge-<?php echo ($_SESSION['workflow']->reserve_accomodation == 0) ?"danger":"success"; ?>">
                                                            <?php echo ($_SESSION['workflow']->reserve_accomodation == 0)?"Pending":"Completed"; ?>
                                                        </div>
                                                        <div class="item-title">Reserve Accomodation</div>
                                                        <div class="item-detail">Print invoice</div>
                                                    </li>
                                                    <li class="tl-item" ng-repeat="item in retailer_history">
                                                        <div class="timestamp badge badge-<?php echo ($_SESSION['workflow']->complete_documentation == 0)?"danger":"success"; ?>">
                                                            <?php echo ($_SESSION['workflow']->complete_documentation == 0)?"Pending":"Completed"; ?>
                                                        </div>
                                                        <div class="item-title">Complete Documentation</div>
                                                        <div class="item-detail">Print receipt</div>
                                                    </li>

                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <p class="text-muted m-b-0">
                                        <hr>
                                    </p>
                                    <p class="text-muted m-b-0">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <b>Gender</b>
                                            <div><?php echo $student->gender; ?></div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Date of Birth</b>
                                            <div><?php echo $student->dob; ?></div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Entry Mode </b>
                                            <div><?php echo $student->entrymode; ?></div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>JAMB Number</b>
                                            <div><?php echo $student->jamb_no; ?></div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Program of Study</b>
                                            <div><?php echo $student->prog_abbr; ?></div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Date of Birth </b>
                                            <div><?php echo $student->dob; ?></div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Session Admitted </b>
                                            <div><?php echo $student->session_admitted; ?></div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>University Email </b>
                                            <div><?php echo $student->username; ?></div>
                                        </li>
                                    </ul>
                                    </p>

                                </div>

                            </div>

                        </div>
                        
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <img class="rounded-circle" src="http://mis.fubk.edu.ng/uploads/<?php echo $student->passport; ?>" alt="<?php echo $student->passport; ?>">
                                    <hr>
                                    <div class="wid-u-info">
                                        <h5>
                                            <?php echo strtoupper($student->surname) . '<br>' . ucwords(strtolower($student->firstname . ' ' . $student->othernames)); ?>
                                            <hr>
                                        </h5>
                                        <p class="text-muted m-b-0">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <b>Admission Number </b>
                                                <div><?php echo $student->uniqueID; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Last Login </b>
                                                <div><?php echo $student->last_login; ?></div>
                                            </li>
                                        </ul>
                                        </p>
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

    <script src="<?php echo base_url() ?>assets/js/core.js" type="e27f9daa9c2f25670b2c3761-text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/form/dropify.js" type="e27f9daa9c2f25670b2c3761-text/javascript">
    </script>
    <script src="<?php echo base_url() ?>assets/js/page/summernote.js" type="e27f9daa9c2f25670b2c3761-text/javascript">
    </script>
    <script src="<?php echo base_url() ?>assets/js/rocket-loader.min.js" data-cf-settings="e27f9daa9c2f25670b2c3761-|49" defer=""></script>
</body>

</html>