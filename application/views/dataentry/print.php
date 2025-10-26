<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $_SESSION['pageTitle']; ?></title>

    <link rel="icon" href="<?php echo base_url()?>assets/images/favicon.ico" type="image/x-icon" />

    <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet"
        href="<?php echo base_url()?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/dropify/css/dropify.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/summernote/dist/summernote.css" />

    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
	<style>
		body, div{
			color:#000;
		}
	</style>
</head>


<body class="font-muli right_tb_toggle">

    <div id="main_content">
            <div class="section-body mt-4">
                <div class="container-fluid">
                    <div class="card-footer text-left">
                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="font-20 font-weight-bolder">FEDERAL UNIVERSITY BIRNIN KEBBI</div>
                                <div class="font-18 font-weight-bolder">HUMAN RESOURCE MANAGEMENT SYSTEM</div>
                                <div class="font-15 font-weight-bolder">EMPLOYEE DATA PROFILE</div>
								<hr>
                            </div>
							<div class="col-12">
                                <div class="font-18 font-weight-bolder">Personal Information</div>
								<hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">Title</div>
                                <div><?php echo $staff->title; ?></div>
                            </div>
							<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">Staff Name</div>
                                <div><?php echo strtoupper($staff->surname).' '.ucwords(strtolower($staff->firstname.' '.$staff->othernames));?></div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">Gender</div>
                                <div><?php echo $staff->gender; ?></div>
                            </div>
							<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">Date of Birth</div>
                                <div><?php echo $staff->dob; ?></div>
                            </div>
                            
                        </div>
                        <div class="row">
							<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">Marital Status</div>
                                <div><?php echo $staff->marital_status; ?></div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">State of Origin</div>
                                <div><?php echo $staff->ippis_no; ?></div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">LGA of Origin</div>
                                <div><?php echo $staff->designation; ?></div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">Town</div>
                                <div><?php echo $staff->gender; ?></div>
                            </div>
                        </div>
                        <div class="row">
							<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">Phone number</div>
                                <div><?php echo $staff->marital_status; ?></div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">Email Address</div>
                                <div><?php echo $staff->ippis_no; ?></div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">Contact Address</div>
                                <div><?php echo $staff->designation; ?></div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">Permanent Address</div>
                                <div><?php echo $staff->gender; ?></div>
                            </div>
                        </div>
                    </div>
					<div class="card-footer text-left">
                        <div class="row">
                            <div class="col-12">
                                <div class="font-18 font-weight-bolder">Employement Information</div>
								<hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">Employee Number</div>
                                <div><?php echo $staff->employee_no; ?></div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">Registry File Number</div>
                                <div><?php echo $staff->registry_file_no; ?></div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">Designation</div>
                                <div><?php echo $staff->designation; ?></div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">Appointment Type</div>
                                <div><?php echo $staff->dofa; ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">Date of First Appointment</div>
                                <div><?php echo $staff->dofa; ?></div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">Date of Last Promotion</div>
                                <div><?php echo $staff->dob; ?></div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">Rank</div>
                                <div><?php echo $staff->ippis_no; ?></div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">Area of Specialization</div>
                                <div><?php echo $staff->designation; ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">Salary Structure</div>
                                <div><?php echo $staff->dofa; ?></div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">Grade Level</div>
                                <div><?php echo $staff->dob; ?></div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">Step</div>
                                <div><?php echo $staff->ippis_no; ?></div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">Area of Specialization</div>
                                <div><?php echo $staff->designation; ?></div>
                            </div>
                        </div>
                    </div>
					<div class="card-footer text-left">
                        <div class="row">
                            <div class="col-12">
                                <div class="font-18 font-weight-bolder">Financial Information</div>
								<hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">Bank Name</div>
                                <div><?php echo $staff->employee_no; ?></div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">Account Number</div>
                                <div><?php echo $staff->registry_file_no; ?></div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">Sort Code</div>
                                <div><?php echo $staff->designation; ?></div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">BVN</div>
                                <div><?php echo $staff->dofa; ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">PFA Administrator</div>
                                <div><?php echo $staff->dofa; ?></div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">PFA PIN</div>
                                <div><?php echo $staff->dob; ?></div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">Rank</div>
                                <div><?php echo $staff->ippis_no; ?></div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-10">
                                <div class="font-18 font-weight-bold">Area of Specialization</div>
                                <div><?php echo $staff->designation; ?></div>
                            </div>
                        </div>
                    </div>

                   
            </div>

            <script src="<?php echo base_url()?>assets/bundles/lib.vendor.bundle.js"
                type="e27f9daa9c2f25670b2c3761-text/javascript"></script>

            <script src="<?php echo base_url()?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"
                type="e27f9daa9c2f25670b2c3761-text/javascript"></script>
            <script src="<?php echo base_url()?>assets/plugins/dropify/js/dropify.min.js"
                type="e27f9daa9c2f25670b2c3761-text/javascript"></script>
            <script src="<?php echo base_url()?>assets/bundles/summernote.bundle.js"
                type="e27f9daa9c2f25670b2c3761-text/javascript"></script>

            <script src="<?php echo base_url()?>assets/js/core.js" type="e27f9daa9c2f25670b2c3761-text/javascript">
            </script>
            <script src="<?php echo base_url()?>assets/js/form/dropify.js"
                type="e27f9daa9c2f25670b2c3761-text/javascript">
            </script>
            <script src="<?php echo base_url()?>assets/js/page/summernote.js"
                type="e27f9daa9c2f25670b2c3761-text/javascript">
            </script>
            <script src="<?php echo base_url()?>assets/js/rocket-loader.min.js"
                data-cf-settings="e27f9daa9c2f25670b2c3761-|49" defer=""></script>
</body>

</html>
