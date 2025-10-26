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
</head>


<body class="font-muli right_tb_toggle <?php echo " ".$_SESSION['theme_mode']; ?>">

    <div class="page-loader-wrapper">
        <div class="loader">
        </div>
    </div>
    <div id="main_content">
        <?php $this->load->view('incs/header');?>
        <?php //$this->load->view('incs/rside');?>
        <?php $this->load->view('incs/lside');?>

        <div class="page">

            <?php $this->load->view('incs/pageheader');?>

            <div class="section-body">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center ">
                        <div class="header-action">
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="section-body mt-4">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-body w_user">
                                    <div class="user_avtar">
                                        <img class="rounded-circle" src="<?php echo base_url()?>assets/images/image.jpg"
                                            alt="">
                                    </div>
                                    <div class="wid-u-info">
                                        <h5>
                                            <?php echo strtoupper($staff->surname).' '.ucwords(strtolower($staff->firstname.' '.$staff->othernames));?>
                                            <hr>
                                        </h5>

                                        <p class="text-muted m-b-0">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <b>Employee Number </b>
                                                <div><?php echo $staff->employeeID; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>University Email </b>
                                                <div><?php echo $staff->username; ?></div>
                                            </li>
                                        </ul>
                                        </p>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12">
                            <div class="card">
                                <form action="<?php echo site_url('dataentry/find');?>" method="post">
                                    <div class="card-body">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <b>Enter SP/JP Number: </b>
                                            </li>
                                            <li class="list-group-item">
                                                <input class="form-control" name="search" required placeholder="Enter SP/JP Number Here" />
                                            </li>
                                            <li class="list-group-item">
                                                <input type="submit" class="form-control btn btn-primary" value="Search Staff" />
                                            </li>

                                        </ul>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        <?php $this->load->view('incs/footer');?>
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

    <script src="<?php echo base_url()?>assets/js/core.js" type="e27f9daa9c2f25670b2c3761-text/javascript"></script>
    <script src="<?php echo base_url()?>assets/js/form/dropify.js" type="e27f9daa9c2f25670b2c3761-text/javascript">
    </script>
    <script src="<?php echo base_url()?>assets/js/page/summernote.js" type="e27f9daa9c2f25670b2c3761-text/javascript">
    </script>
    <script src="<?php echo base_url()?>assets/js/rocket-loader.min.js" data-cf-settings="e27f9daa9c2f25670b2c3761-|49"
        defer=""></script>
</body>

</html>
