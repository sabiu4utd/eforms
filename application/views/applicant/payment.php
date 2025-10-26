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
                                <div class="col-md-6 mx-auto">
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#" class="card-options-collapse" data-toggle="card-collapse">
                                                <h3 class="card-title" style="width: 100%; display:flex; justify-content: space-between;">
                                                    Invoice Information 
                                                    <span style="float: left;">
                                                        <a href="<?php echo site_url('applicant/')?>">
                                                            <i class="fa fa-arrow-left"></i> Back
                                                        </a>
                                                    </span>
                                                </h3>
                                            </a>
                                        </div>
                                        <form action="<?php echo site_url('applicant/checkPaymentStatus') ?>" method="post">
                                            <div class="card-body">
                                                <div class="row form-group p-2">
                                                    <div class="col-sm-12 col-md-4">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" placeholder="Enter your email" required name="email" readonly autocomplete="off" value="<?php echo $applicant->email; ?>">
                                                    </div>
                                                    <div class="col-sm-12 col-md-4">
                                                        <label>Surname</label>
                                                        <input type="text" class="form-control" readonly required name="surname" autocomplete="off" value="<?php echo $applicant->surname; ?>">
                                                    </div>
                                                    <div class="col-sm-12 col-md-4">
                                                        <label>Firstname</label>
                                                        <input type="text" class="form-control" readonly required name="firstname" autocomplete="off" value="<?php echo $applicant->firstname; ?>">
                                                    </div>

                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-sm-12 col-md-4">
                                                        <label>Remita Retrieval Reference</label>
                                                        <input type="text" class="form-control" name="rrr" autocomplete="off" value="<?php echo $form->rrr; ?>" readonly>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4">
                                                        <label>Payment Status</label>
                                                        <span class="form-control badge-sm badge badge-<?php echo $form->payment_status ? 'success' : 'danger'?>">
                                                            <?php echo $form->payment_status ? 'PAID' : 'PENDING'?>
                                                        </span>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4">
                                                        <label>Payment Date</label>
                                                        <input type="text" class="form-control" readonly value="<?php echo $form->created_at; ?>" readonly>
                                                        <input type="hidden" class="form-control" readonly value="<?php echo $form->id ?>" name="form_id">
                                                        <input type="hidden" class="form-control" readonly value="<?php echo $form->order_hash ?>" name="form_hash">
                                                    </div>
                                                </div>
                                                
                                                <div class="row form-group clearfix">
                                                    <div class="col-12">
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="row form-group clearfix">
                                                    <div class="col-md-4">
                                                        <a target="_blank" href="https://login.remita.net/remita/onepage/biller/<?php echo trim(str_replace("-", "",$form->rrr)); ?>/payment.spa">
                                                          <i class="fa fa-dollar"></i>  Pay Invoice
                                                        </a>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a target="_blank" href="https://login.remita.net/remita/exapp/api/v1/send/api/print/billsvc/biller/<?php echo $form->rrr?>/printinvoiceRequest.pdf">
                                                          <i class="fa fa-print"></i>  Reprint Invoice
                                                        </a>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a target="_blank" href="https://login.remita.net/remita/auto-receipt/receipt.reg">
                                                          <i class="fa fa-envelope"></i>  Resend Receipt
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row form-group clearfix">
                                                    <div class="col-12">
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="row form-group clearfix">
                                                    <?php  if(!$_SESSION['activeForm']->payment_status){ ?>
                                                        <div class="col">
                                                            <button class="btn btn-primary form-control ">Confirm Payment</button>
                                                        </div>
                                                    <?php }else{ ?>
                                                        <div class="col">
                                                            <a class="btn btn-primary form-control" href="<?php echo site_url('applicant/bio/'.$_SESSION['activeForm']->order_hash)?>">Continue</a>
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