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
                                                    National Identity Number (NIN) Verification 
                                                    <span style="float: left;">
                                                        <a href="<?php echo site_url('applicant/bio/' . $_SESSION['activeForm']->order_hash)?>">
                                                            <i class="fa fa-arrow-left"></i> Back
                                                        </a>
                                                    </span>
                                                </h3>
                                            </a>
                                        </div>
                                        <p class="alert alert-info text-center" style="font-weight:bold">You can dial <em>*346#</em> on your phone to retrieve your NIN.</p>
                                        <form action="<?php echo site_url('applicant/verifynin') ?>" method="post">
                                            <div class="card-body">
                                                <div class="row form-group p-2">
                                                    
                                                    <div class="col-sm-12 col-md-4">
                                                        <label>Surname</label>
                                                        <input type="text" class="form-control" readonly required name="surname" autocomplete="off" value="<?php echo $applicant->surname; ?>">
                                                    </div>
                                                    <div class="col-sm-12 col-md-4">
                                                        <label>Firstname</label>
                                                        <input type="text" class="form-control" readonly required name="firstname" autocomplete="off" value="<?php echo $applicant->firstname; ?>">
                                                    </div>

                                                    <div class="col-sm-12 col-md-4">
                                                        <label>Middlename</label>
                                                        <input type="text" class="form-control" placeholder="" name="middlename" autocomplete="off" value="<?php echo $applicant->middlename; ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-sm-12 col-md-3">
                                                        <label>Gender</label>
                                                        <select class="form-control" required name="gender" autocomplete="off" readonly>
                                                            <option <?php echo $applicant->gender == 'Male' ? 'selected' : '';?>>Male</option>
                                                            <option <?php echo $applicant->gender == 'Female' ? 'selected' : '';?>>Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3">
                                                        <label>Date of Birth</label> 
                                                        <input type="date" class="form-control" placeholder="" required name="dob" autocomplete="off" value="<?php echo $info->dob; ?>" readonly>
                                                    </div>
                                                    <?php if($_SESSION['activeForm']->form_id == 2){ ?>
                                                    <div class="col-sm-12 col-md-3">
                                                        <label>JAMB Number</label> 
                                                        <input type="text" class="form-control" placeholder="" name="jamb_no" autocomplete="off" value="<?php echo $_SESSION['activeForm']->jamb_no; ?>" readonly>
                                                    </div>
                                                    <?php }else{ ?>
                                                    <div class="col-sm-12 col-md-3">
                                                        <label>JAMB Number</label> 
                                                        <input type="text" class="form-control" placeholder=""  name="jamb_no" autocomplete="off" value="">
                                                    </div>
                                                    <?php } ?>
                                                    <div class="col-sm-12 col-md-3">
                                                        <label>NIN Verification</label>
                                                        <input type="text" class="form-control" placeholder="Enter your NIN" minlength="11" required name="nin" autocomplete="off" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="row form-group clearfix">
                                                    <div class="col-12">
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="row form-group clearfix">
                                                    <?php if (!$_SESSION['activeForm']->app_status){ ?>
                                                    <div class="col">
                                                        <button class="btn btn-primary form-control">Verify &amp; Continue</button>
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
    <script>
        $(document).ready(function() {
            $('#state').on('change', function() {
              
                var state_id = $(this).val();
                $('#lga').empty()
                $.ajax({
                    url: "<?php echo site_url('/applicant/getLGA') ?>",
                    type: "POST",
                    data: {
                        'state_id': state_id
                    },
                    success: function(data) {
                        console.log(data)
                        $('#lga').empty()
                        $('#lga').html(data);
                    },
                });
            });
            
        });
    </script>
</body>

</html>