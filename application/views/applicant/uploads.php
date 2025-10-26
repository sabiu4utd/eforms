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
                                                    Uploads Information
                                                    <span style="float: left;">
                                                        <a href="<?php echo site_url('applicant/alevel/' . $_SESSION['activeForm']->order_hash) ?>">
                                                            <i class="fa fa-arrow-left"></i> Back
                                                        </a>
                                                    </span>
                                                </h3>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <div class="row form-group">
                                                <div class="col-12 pr-4 mb-4">
                                                    <form method="post" action="<?php echo site_url('applicant/saveupload') ?>" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <label>File Type <span class="red">*</span></label>
                                                            <select name="file_type" required class="form-control">
                                                                <?php if(in_array($_SESSION['activeForm']->form_id, [2,3])){?>
                                                               <option>JAMB Slip</option>
                                                               <option>OLevel Certificate</option>
                                                                <option>Other dcoument</option>
                                                                <?php } else { ?>
                                                                <option>OLevel Certificate</option>
                                                                <option>Diploma Certificate</option>
                                                                <option>Degree Certificate</option>
                                                                <option>HND Certificate</option>
                                                                <option>Masters Certificate</option>
                                                                <option>PhD Certificate</option>
                                                                <option>Publication</option>
                                                                <option>Transcript</option>
                                                                <option>Other Documents</option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-3">
                                                            <label>Choose File <span class="red">*</span></label>
                                                            <input type="file" name="file_name" required placeholder="Choose File to Upload" class="form-control" />
                                                        </div>
                                                        <div class="col-3">
                                                            <label>Year Obtained <span class="red">*</span></label>
                                                            <select class="form-control" name="year_obtained" required>
                                                                            <?php for ($i = date('Y'); $i >= 1970; $i--) { ?>
                                                                                <option><?php echo $i; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                        </div>
                                                        <div class="col-3 mt-4">
                                                            <button type="submit" class="form-control btn btn-success">Submit Upload</button>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                                <div class="col-12"><hr></div>
                                                <div class="col-12">
                                                    <table class="table table-stripped table-bordered">
                                                        <thead>
                                                            <th>File Type</th>
                                                            <th class="text-center">Year Obtained</th>
                                                            <th class="text-center">Preview</th>
                                                            <th class="text-center">Delete</th>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($uploads as $row){ ?>
                                                            <tr>
                                                                <td><?php echo $row->file_type; ?></td>
                                                                <td class="text-center"><?php echo $row->year_obtained; ?></td>
                                                                <td class="text-center">
                                                                    <a target="_blank" href="<?php echo base_url('uploads/'.$row->file_name)?>">
                                                                        <i class="fa fa-eye"></i> Preview
                                                                    </a>
                                                                </td>
                                                                <td class="text-center">
                                                                    <a href="<?php echo site_url('applicant/delete_upload/'.$row->id)?>">
                                                                        <i class="fa fa-times red"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="row form-group clearfix mt-4">
                                                <?php if (!$_SESSION['activeForm']->app_status){ ?>
                                                <div class="col">
                                                    <a href="<?php echo site_url('applicant/save_uploads_progress/' . $_SESSION['activeForm']->order_hash) ?>" class="btn btn-primary form-control">Save &amp; Continue</a>
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