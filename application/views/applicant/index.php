<!doctype html>
<html lang="en" dir="ltr">
<?php  //$myforms['admission_status']; 
?>

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
                                    PUTME Registration starts on Wed, 2nd Oct, 2024

                                    <?php if (isset($_SESSION['userid']) && in_array($_SESSION['userid'], [796, 466, 3404858, 3404022])) {
                                    ?>
                                        <a href="<?php echo site_url('mgt/index'); ?>" class="card-title btn btn-sm btn-primary float-end" style="float:right" data-bs-toggle="collapse">
                                            Admin
                                        </a>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body pb-4">
                                    <img src="<?php echo base_url('uploads/' . $_SESSION['passport']) ?>" alt="Passport picture" style="display:block;width:350px;height:350px; margin:auto">
                                    <form action="<?php echo site_url('applicant/doUpload') ?>" method="post" enctype="multipart/form-data">
                                        <div class=" mt-4 row">
                                            <div class="col-9">
                                                <input type="file" class="form-control" name="file" required />
                                            </div>
                                            <div class="col-3">
                                                <button type="submit" class="form-control">
                                                    <i class="fa fa-upload p-1 mx-auto" style="font-size: 17px;"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="wid-u-info mt-4">
                                        <h5 class="text-center">Hello, <?php echo $_SESSION['firstname'] ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="row clearfix">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#" class="card-options-collapse" data-toggle="card-collapse">
                                                <h3 class="card-title">
                                                    Select and order an e-form
                                                </h3>
                                            </a>

                                        </div>
                                        <?php if ($_SESSION['accountStatus'] == 'active') { ?>
                                            <form action="<?php echo site_url('form/order') ?>" method="post">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-8  raise">
                                                            <select name="form_type" required class="form-control" style="text-transform:uppercase">
                                                                <option disabled>Select a form</option>
                                                                <?php foreach ($forms as $form) { ?>
                                                                    Sale of Form Closed
                                                                    <option value="<?php echo $form->id ?>"> <?php echo $form->form_name ?></option>-->
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-12 col-md-4  raise">
                                                            <button class="btn btn-info" type="submit"><i class="fa fa-search"></i> Order eForm</button>
                                                        </div>
                                                        <div class="col-12  raise mt-4">
                                                            <div class="row">
                                                                <div class=" col-12 mb-2" style="font-weight: 900; font-size:18px">My Forms</div>
                                                                <div class="col-sm-11">
                                                                    <table class="table" style="width: 100%;">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Programme</th>
                                                                                <th>Session</th>
                                                                                <th>Payment</th>
                                                                                <th>Submission</th>
                                                                                <th>Admission</th>
                                                                                <th>Manage</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php $i = 1;
                                                                            foreach ($myforms as $form) { ?>
                                                                                <tr>
                                                                                    <td><?php echo $form->prog_abbr . "<br><em>[" . $form->form_type . "]</em>"; ?></td>
                                                                                    <td><?php echo $form->session_applied; ?></td>
                                                                                    <td>
                                                                                        <span class="badge badge-<?php echo $form->payment_status == 0 ? 'danger' : 'success' ?>">
                                                                                            <?php echo $form->payment_status == 0 ? 'Unpaid' : 'Paid'; ?>
                                                                                        </span>
                                                                                    </td>
                                                                                    <td>
                                                                                        <span class="badge badge-<?php echo $form->app_status == 0 ? 'danger' : 'success' ?>">
                                                                                            <?php echo $form->app_status == 0 ? 'Pending' : 'Submitted'; ?>
                                                                                        </span>
                                                                                    </td>
                                                                                    <td>
                                                                                        <span class="badge badge-<?php echo $form->admission_status == 'pending' ? 'danger' : 'success' ?>">
                                                                                            <?php echo $form->admission_status; ?>
                                                                                        </span>

                                                                                    </td>
                                                                                    <td>
                                                                                    <?php
                                                                                    if ($form->payment_status == 0) {
                                                                                        echo '<a href="' . site_url('applicant/payment/' . $form->order_hash . '/' . md5(time())) . '">
                                                                                        <i class="fa fa-recycle sm"></i> Confirm</a>';
                                                                                    } else {


                                                                                        if ($_SESSION['passport'] == "") {
                                                                                            echo "Upload Passport and Continue";
                                                                                        } else {

                                                                                            echo '<a href="' . site_url('applicant/bio/' . $form->order_hash . '/' . md5(time())) . '">
                                                                                            <i class="fa fa-arrow-right sm"></i> Continue</a>';
                                                                                        }
                                                                                    }
                                                                                }
                                                                                    ?>
                                                                                    </td>
                                                                                <tr>
                                                                        </tbody>

                                                                    </table>
                                                                    <!--<table class="table" style="width: 100%;">-->
                                                                    <!--    <thead>-->
                                                                    <!--        <tr>-->
                                                                    <!--            <td colspan="4" style="font-weight: 900; font-size:18px">Referees</td>-->
                                                                    <!--        </tr>-->
                                                                    <!--          <tr>-->
                                                                    <!--            <th style="text-align:left;">Name</th>-->
                                                                    <!--            <th style="text-align:left;">Email</th> -->
                                                                    <!--            <th style="text-align:left;">Responded?</th>-->
                                                                    <!--            <th style="text-align:left;">Send Reminder</th>-->
                                                                    <!--        </tr>-->

                                                                    <!--    </thead>-->
                                                                    <!--    </tbody>-->
                                                                    <!--        <?php foreach ($referees as $r) { ?>-->
                                                                    <!--        <tr>-->
                                                                    <!--            <td><?php echo $r->referee_title . " " . $r->referee_name; ?></td>-->
                                                                    <!--            <td><?php echo $r->referee_email; ?></td> -->
                                                                    <!--            <td>-->
                                                                    <!--                <span class="badge badge-<?php echo $r->recommendation == "" ? 'danger' : 'success' ?>">-->
                                                                    <!--                    <?php echo $r->recommendation == "" ? 'NO' : 'YES'; ?>-->
                                                                    <!--                </span>-->
                                                                    <!--            </td>-->
                                                                    <!--            <td>-->
                                                                    <!--                <a href="<?php echo site_url('applicant/reminder/' . $r->applicant_id . "/" . $r->referee_hash); ?>">Send Reminder</a>-->
                                                                    <!--            </td>-->
                                                                    <!--        </tr>-->

                                                                    <!--        <?php } ?>-->
                                                                    <!--    </tbody>-->

                                                                    <!--</table>-->
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </form>
                                        <?php } else { ?>
                                            <div class="alert alert-info">Please check your email to activate your account. If you can not find the email <a href="<?php echo site_url("auth/send_activation_link"); ?>">click here</a> to resend the actication link</div>
                                        <?php } ?>
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