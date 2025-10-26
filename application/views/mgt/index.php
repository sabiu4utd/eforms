<!doctype html>
<html lang="en" dir="ltr">
<?php  //$myforms['admission_status']; ?>
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
    </style>
</head>

<body class="font-muli right_tb_toggle <?php echo " " . $_SESSION['theme_mode']; ?>">
    <!--<div class="page-loader-wrapper">-->
    <!--    <div class="loader"></div>-->
    <!--</div>-->
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
                        <div class="col-12">
                            <div class="card row">
                                <div class="p-3 text-center alert alert-info col" style="font-weight:bold;">
                                    <a href="<?php echo site_url('applicant/index'); ?>" class="card-title btn btn-sm btn-primary float-start" style="float:left" data-bs-toggle="collapse">
                                        Go Back
                                    </a>
                                    
                                    <a href="<?php echo site_url('mgt/add'); ?>" class="card-title btn btn-sm btn-success float-end" style="float:right" data-bs-toggle="collapse">
                                        Add New Payment
                                    </a>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="row clearfix">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Submitted Applications
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-stripped">
                                                <thead>
                                                    <th>#</th>
                                                    <th>Candidate Name</th>
                                                    <th>Email</th>
                                                    <th>Programme</th>
                                                    <th>Form</th>
                                                    <th>Paid</th>
                                                    <th>Submitted</th>
                                                    <th>View</th>
                                                </thead>
                                                <tbody>
                                                    <?php $i= 1; foreach($result as $row){ ?>
                                                    <tr>
                                                        <td><?php echo $i++;?></td>
                                                        <td><?php echo strtoupper($row->surname). ", ".ucwords(strtolower($row->firstname. " ".$row->middlename)) ;?></td>
                                                        <td><?php echo strtolower($row->email) ;?></td>
                                                        <td><?php echo $row->prog_abbr ;?></td>
                                                        <td>Part time</td>
                                                        <td><?php echo $row->payment_status ? "<i class='fa fa-check text-green'></i>": "<i class='fa fa-ban text-danger'></i>"; ?></td>
                                                        <td><?php echo $row->app_status ? "<i class='fa fa-check text-green'></i>": "<i class='fa fa-ban text-danger'></i>"; ?></td>
                                                        <td class="text-center">
                                                            <a href="<?php echo site_url('mgt/view/'.$row->applicant_id) ?>">
                                                                <i class='fa fa-chevron-right text-black'></i>
                                                            </a>
                                                        </td>
                                                        </tr>
                                                    <?php }?>
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
    <script src="<?php echo base_url() ?>assets/js/core.js" type="e27f9daa9c2f25670b2c3761-text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/form/dropify.js" type="e27f9daa9c2f25670b2c3761-text/javascript">
    </script>
    <script src="<?php echo base_url() ?>assets/js/page/summernote.js" type="e27f9daa9c2f25670b2c3761-text/javascript">
    </script>
    <script src="<?php echo base_url() ?>assets/js/rocket-loader.min.js" data-cf-settings="e27f9daa9c2f25670b2c3761-|49" defer=""></script>
</body>

</html>