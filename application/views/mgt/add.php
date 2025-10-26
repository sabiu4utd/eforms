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
                                <div class="p-3 text-center col" style="font-weight:bold;">
                                    <a href="<?php echo site_url('mgt/index'); ?>" class="card-title btn btn-sm btn-primary float-start" style="float:left" data-bs-toggle="collapse">
                                        Go Back
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
                                                Add New Online Payment
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="<?php echo site_url('mgt/add'); ?>" method="post">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <input type="email" name="email" id="email" placeholder="Enter the candidate's email" class="form-control" required />
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="submit" class="btn btn-success w-100" value="Search" />
                                                    </div>
                                                </div>
                                            </form>
                                            <hr/>
                                            <?php if(isset($error)){ ?>
                                            <div class="alert alert-danger"><?php echo $error?></div>
                                            <?php } 
                                            
                                            if(isset($applicant)){ ?>
                                            <form id="assignForm" action="<?php echo site_url('mgt/assign')?>" method="post">
                                            <table class="table table-stripped border">
                                                <tbody>
                                                    <tr>
                                                        <td style="width:320px">Form Type</td>
                                                        <td>Part time form</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:320px">Candidate's Email</td>
                                                        <td><?php echo $applicant->email?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:320px">Candidate's Name</td>
                                                        <td><?php echo $applicant->surname." ".$applicant->firstname." ".$applicant->middlename?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:320px">Candidate's Gender</td>
                                                        <td><?php echo $applicant->gender?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:320px">Candidate's Programme</td>
                                                        <td>
                                                            <select class="form-control" id="programSelect" name="programid" required> 
                                                                <option disabled selected>Choose programme</option>
                                                                <?php foreach($programmes as $row){
                                                                    echo "<option value='".$row->id."'>".$row->program."</option>";
                                                                }?>
                                                            </select>
                                                            <input type="hidden" name="userid" value="<?php echo $applicant->id ?? 0?>" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <input type="submit" id="submitButton" value="Create and Assign Form" class="form-control btn btn-primary" disabled />
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table></form>
                                            <?php } ?>
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

    <!-- JavaScript for Validation -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const programSelect = document.getElementById("programSelect");
            const submitButton = document.getElementById("submitButton");

            // Enable the submit button only when a program is selected
            programSelect.addEventListener("change", function () {
                if (programSelect.value) {
                    submitButton.disabled = false;
                } else {
                    submitButton.disabled = true;
                }
            });

            // Prevent form submission if no program is selected
            const assignForm = document.getElementById("assignForm");
            assignForm.addEventListener("submit", function (event) {
                if (!programSelect.value) {
                    event.preventDefault();
                    alert("Please select a program before submitting.");
                }
            });
        });
    </script>

    <script src="<?php echo base_url() ?>assets/bundles/lib.vendor.bundle.js" type="e27f9daa9c2f25670b2c3761-text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="e27f9daa9c2f25670b2c3761-text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/plugins/dropify/js/dropify.min.js" type="e27f9daa9c2f25670b2c3761-text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/bundles/summernote.bundle.js" type="e27f9daa9c2f25670b2c3761-text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/core.js" type="e27f9daa9c2f25670b2c3761-text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/form/dropify.js" type="e27f9daa9c2f25670b2c3761-text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/page/summernote.js" type="e27f9daa9c2f25670b2c3761-text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/rocket-loader.min.js" data-cf-settings="e27f9daa9c2f25670b2c3761-|49" defer=""></script>
</body>
</html>