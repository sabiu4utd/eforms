<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FUBK-PGS Applicantion Form Printout for <?php echo strtoupper($applicant->surname) . ' ' . ucwords(trim($applicant->firstname . ' ' . $applicant->middlename))?></title>
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
        <div class="page">
            <div class="section-body mt-4">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row clearfix">
                                <div class="col-xl-8 mx-auto">
                                    <div class="card p-4" style="color: #000;">
                                        <div class="row">
                                            <?php //var_dump($_SESSION['activeForm']->form_id); exit; ?>
                                            <div class="col-12 mx-auto" style="display:flex; flex-direction: column; justify-content: center;">
                                                <img src="<?php echo base_url('assets/images/fubk-icon.png')?>" style="width: 100px; margin:auto; position:relative"/>
                                                <div style="text-align: center;">Federal University Birnin Kebbi</div>
                                                <?php if($_SESSION['activeForm']->form_id ==1){?>
                                                <div style="text-align: center;">School of Postgraduate Studies</div>
                                                <?php } else if($_SESSION['activeForm']->form_id ==2) { ?>
                                                <div style="text-align: center;">Office of the Registrar</div>
                                                <?php } else if($_SESSION['activeForm']->form_id ==3) { ?>
                                                <div style="text-align: center;">School of Basic Studies</div>
                                                <?php } else if($_SESSION['activeForm']->form_id ==4) { ?>
                                                <div style="text-align: center;">Inter University Transfer</div>
                                                <?php }else{ ?>
                                                <div style="text-align: center;">Office of the Registrar</div>
                                                <?php }?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="alert alert-info text-center">Application submitted successfully<br> Please come back in 48 hours to print your slip</div>
                                       
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