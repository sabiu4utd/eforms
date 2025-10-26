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
    <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url()?>assets/plugins/datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url()?>assets/plugins/datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">

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
                            <h1 class="page-title">Staff Dashboard</h1>
                            <ol class="breadcrumb page-breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo site_url('principal')?>">FUBK-PORTAL</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Staff</li>
                            </ol>
                        </div>
                        <ul class="nav nav-tabs page-header-tab">
                            <li class="nav-item"> 
								<a class="btn btn-primary p-10" href="<?php echo base_url('staff/nominal_roll')?>"><i class="fa fa-cloud-download-alt"></i>Generate Nominal Roll</a>
							</li>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="section-body mt-4">
                <div class="container-fluid">
                    <div class="tab-content">
                        <div class="tab-pane active" id="Staff-all">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table
                                            class="table table-hover js-basic-example dataTable table-striped table_custom border-style spacing5">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Staff ID</th>
                                                    <th>IPPIS No</th>
                                                    <th>Staff Name</th>
                                                    <th>DoFA</th>
                                                    <th>DoB</th>
                                                    <th>Gender</th>
                                                    <th>Designation</th>
                                                    <th>Manage</th>
                                                </tr>
                                            </thead>
                                            <tbody>
												<?php $i = 1; foreach($staff as $row){ ?>
                                                <tr>
                                                    <td><?php echo $i++;?></td>
                                                    <td><?php echo strtoupper($row->employee_no)?></td>
                                                    <td><?php echo strtoupper($row->ippis_no)?></td>
                                                    <td><?php echo strtoupper($row->surname). " ".ucwords(strtolower($row->firstname." ".$row->othernames))?></td>
                                                    <td><?php echo $row->dofa; ?></td>
                                                    <td><?php echo $row->dob; ?></td>
                                                    <td><?php echo $row->gender; ?></td>
                                                    <td><?php echo $row->designation; ?></td>
                                                    <td>
														<a class="btn btn-block btn-info" href="<?php echo site_url('staff/view/'.$row->user_hash); ?>">
															<i class="fa fa-user-shield"></i> view
														</a>
													</td>
                                                </tr>
												<?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <?php $this->load->view('incs/footer');?>
        </div>
    </div>

    <script src="<?php echo base_url()?>assets/bundles/lib.vendor.bundle.js"
        type="7ab396837eea337a09d7c15b-text/javascript"></script>

    <script src="<?php echo base_url()?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"
        type="7ab396837eea337a09d7c15b-text/javascript"></script>
    <script src="<?php echo base_url()?>assets/bundles/dataTables.bundle.js"
        type="7ab396837eea337a09d7c15b-text/javascript"></script>
    <script src="<?php echo base_url()?>assets/plugins/sweetalert/sweetalert.min.js"
        type="7ab396837eea337a09d7c15b-text/javascript"></script>

    <script src="<?php echo base_url()?>assets/js/core.js" type="7ab396837eea337a09d7c15b-text/javascript"></script>
    <script src="<?php echo base_url()?>assets/js/page/dialogs.js" type="7ab396837eea337a09d7c15b-text/javascript">
    </script>
    <script src="<?php echo base_url()?>assets/js/table/datatable.js" type="7ab396837eea337a09d7c15b-text/javascript">
    </script>
    <script src="<?php echo base_url()?>assets/js/rocket-loader.min.js" data-cf-settings="7ab396837eea337a09d7c15b-|49"
        defer=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>
