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
                    <div class="row">
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
                                                    Personal Information
                                                    <span style="float: left;">
                                                        <a href="<?php echo site_url('applicant/bio/' . $_SESSION['activeForm']->order_hash) ?>">
                                                            <i class="fa fa-arrow-left"></i> Back
                                                        </a>
                                                    </span>
                                                </h3>
                                            </a>
                                        </div>
                                        <form action="<?php echo site_url('applicant/saveolevel') ?>" method="post">
                                            <div class="card-body">
                                                <div class="row form-group p-2">
                                                    <div class="col-12 text-center" style="font-weight: 900; font-size:18px">
                                                        Examination Result (5 credits required)
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-12">
                                                        <table class="table table-stripped">
                                                            <thead>
                                                                <th>#</th>
                                                                <th>Subject</th>
                                                                <th>Grade</th>
                                                                <th>Exam Type</th>
                                                                <th>Exam Number</th>
                                                                <th>Center Number</th>
                                                                <th>Exam Year</th>
                                                            </thead>
                                                            <tbody>
                                                                <?php if (!$olevels or count($olevels) == 0) { ?>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>
                                                                            <select class="form-control" name="subject[]" required>
                                                                                <option selected value="1">General Mathematics</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <select class="form-control" name="grade[]" required>
                                                                                <option>A</option>
                                                                                <option>B</option>
                                                                                <option>C</option>
                                                                                <option value="AR">Awaiting Result</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <select class="form-control" name="exam_type[]" required>
                                                                                <option>WAEC</option>
                                                                                <option>NECO</option>
                                                                                <option>IJMB</option>
                                                                                <option>NABTEB</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="exam_no[]" required placeholder="Enter Examination Number" class="form-control" />
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="center_no[]" maxlength="12" required placeholder="Enter Center Number" class="form-control" />
                                                                        </td>
                                                                        <td>
                                                                            <select class="form-control" name="exam_year[]" required>
                                                                                <?php for ($i = date('Y'); $i >= 1970; $i--) { ?>
                                                                                    <option><?php echo $i; ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>
                                                                            <select class="form-control" name="subject[]" required>
                                                                                <option selected value="2">English Language</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <select class="form-control" name="grade[]" required>
                                                                                <option>A</option>
                                                                                <option>B</option>
                                                                                <option>C</option>
                                                                                <option value="AR">Awaiting Result</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <select class="form-control" name="exam_type[]" required>
                                                                                <option>WAEC</option>
                                                                                <option>NECO</option>
                                                                                <option>IJMB</option>
                                                                                <option>NABTEB</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="exam_no[]" required placeholder="Enter Examination Number" class="form-control" />
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="center_no[]" maxlength="20" required placeholder="Enter Center Number" class="form-control" />
                                                                        </td>
                                                                        <td>
                                                                            <select class="form-control" name="exam_year[]" required>
                                                                                <?php for ($i = date('Y'); $i >= 1970; $i--) { ?>
                                                                                    <option><?php echo $i; ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                    <?php for ($j = 3; $j < 6; $j++) { ?>
                                                                        <tr>
                                                                            <td><?php echo $j; ?></td>
                                                                            <td>
                                                                                <select class="form-control" name="subject[]" required>
                                                                                    <?php foreach ($subjects as $row) {
                                                                                        echo "<option value='" . $row->id . "'>" . $row->subject . "</option>";
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select class="form-control" name="grade[]" required>
                                                                                    <option>A</option>
                                                                                    <option>B</option>
                                                                                    <option>C</option>
                                                                                <option value="AR">Awaiting Result</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select class="form-control" name="exam_type[]" required>
                                                                                    <option>WAEC</option>
                                                                                    <option>NECO</option>
                                                                                    <option>IJMB</option>
                                                                                    <option>NABTEB</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" name="exam_no[]" required placeholder="Enter Examination Number" class="form-control" />
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" name="center_no[]" maxlength="20" required placeholder="Enter Center Number" class="form-control" />
                                                                            </td>
                                                                            <td>
                                                                                <select class="form-control" name="exam_year[]" required>
                                                                                    <?php for ($i = date('Y'); $i >= 1970; $i--) { ?>
                                                                                        <option><?php echo $i; ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                    <?php }
                                                                } else {
                                                                    $k = 1;
                                                                    //var_dump($olevels);
                                                                    foreach ($olevels as $level) {
                                                                    ?>
                                                                        <tr>
                                                                            <td><?php echo $k++; ?></td>
                                                                            <td>
                                                                                <select class="form-control" name="subject[]" required>
                                                                                    <?php
                                                                                    if ($level->subject_id == 1 or $level->subject_id == 2) {
                                                                                        echo "<option value='" . $level->id . "'>" . $level->subject . "</option>";
                                                                                    } else {
                                                                                        foreach ($subjects as $row) {
                                                                                            echo "<option value='" . $row->id . "'>" . $row->subject . "</option>";
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select class="form-control" name="grade[]" required>
                                                                                    <option>A</option>
                                                                                    <option>B</option>
                                                                                    <option>C</option>
                                                                                <option value="AR">Awaiting Result</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select class="form-control" name="exam_type[]" required>
                                                                                    <option>WAEC</option>
                                                                                    <option>NECO</option>
                                                                                    <option>IJMB</option>
                                                                                    <option>NABTEB</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" name="exam_no[]" required placeholder="Enter Examination Number" class="form-control" value="<?php echo $level->exam_no; ?>" />
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" name="center_no[]" maxlength="20" required placeholder="Enter Center Number" class="form-control" value="<?php echo $level->center_no; ?>" />
                                                                            </td>
                                                                            <td>
                                                                                <select class="form-control" name="exam_year[]" required>
                                                                                    <?php for ($i = date('Y'); $i >= 1970; $i--) { ?>
                                                                                        <option><?php echo $i; ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </td>
                                                                        </tr>

                                                                <?php }
                                                                } ?>

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
                                                            <button class="btn btn-primary form-control ">Save &amp; Continue</button>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </form>
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