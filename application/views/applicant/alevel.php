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
                        <div class="header-action"></div>
                    </div>
                </div>
            </div>
            <div class="section-body mt-4">
                <div class="container-fluid">
                    <div class="row mx-auto">
                        <?php $this->load->view('incs/form_timeline') ?>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="row clearfix">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#" class="card-options-collapse" data-toggle="card-collapse">
                                                <h3 class="card-title" style="width: 100%; display:flex; justify-content: space-between;">
                                                    A'Level Information
                                                    <span style="float: left;">
                                                        <a href="<?php echo site_url('applicant/olevel/' . $_SESSION['activeForm']->order_hash) ?>">
                                                            <i class="fa fa-arrow-left"></i> Back
                                                        </a>
                                                    </span>
                                                </h3>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <div class="row form-group">
                                                <div class="col-12">
                                                    <form method="post" action="<?php echo site_url('applicant/savealevel') ?>">
                                                        <table class="table table-stripped">
                                                            <thead>
                                                                <th>Insititution</th>
                                                                <th>Graduation Year</th>
                                                                <th>Qualification</th>
                                                                <th>Result Obtained</th>
                                                                <th>Save</th>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width: 45%;">
                                                                        <input type="text" name="institution_name" required placeholder="Enter Insitution Name" class="form-control" />
                                                                    </td>
                                                                    <td>
                                                                        <select class="form-control" name="graduation_year" required>
                                                                            <?php for ($i = date('Y'); $i >= 1970; $i--) { ?>
                                                                                <option><?php echo $i; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <select class="form-control" name="qualification" required>
                                                                            <option>NCE Certificate</option>
                                                                            <option>Diploma Certificate</option>
                                                                            <option>Bachelor Degree</option>
                                                                            <option>HND Certificate</option>
                                                                            <option>Masters Degree</option>
                                                                            <option>PhD Degree</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <select class="form-control" name="grade" required>
                                                                            <option>Distinction</option>
                                                                            <option>Second Class Upper</option>
                                                                            <option>Second Class Lower</option>
                                                                            <option>Third Class</option>
                                                                            <option>Pass Degree</option>
                                                                        </select>
                                                                    </td>

                                                                    <td>
                                                                        <button type="submit" class="form-control btn btn-success">Save Qualification</button>
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="row form-group clearfix">
                                                <div class="col-12">
                                                    <hr>
                                                </div>
                                                <div class="col-12">
                                                    <table class="table table-stripped table-bordered">
                                                        <thead>
                                                            <th>Insititution</th>
                                                            <th class="text-center">Graduation Year</th>
                                                            <th>Qualification</th>
                                                            <th>Result Obtained</th>
                                                            <th class="text-center">Delete</th>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($alevels as $row) { ?>
                                                                <tr>
                                                                    <td style="width: 45%; font-weight: 900;"><?php echo $row->institution_name; ?></td>
                                                                    <td class="text-center"><?php echo $row->graduation_year; ?></td>
                                                                    <td><?php echo $row->qualification; ?></td>
                                                                    <td><?php echo $row->grade; ?></td>
                                                                    <td class="text-center">
                                                                        <a href="<?php echo site_url('applicant/delete_alevel/' . $row->id) ?>">
                                                                            <i class="fa fa-times red"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row form-group clearfix">
                                                <div class="col-12">
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="row form-group clearfix">
                                                <?php if (!$_SESSION['activeForm']->app_status) { ?>
                                                    <div class="col">
                                                        <a href="<?php echo site_url('applicant/save_alevel_progress/' . $_SESSION['activeForm']->order_hash) ?>" class="btn btn-primary form-control">Save &amp; Continue</a>
                                                    </div>
                                                <?php } ?>
                                            </div>
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