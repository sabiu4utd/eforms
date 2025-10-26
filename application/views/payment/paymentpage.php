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
            font-weight: bolder;
            color: brown;
            font-size: 15px;
            text-decoration: underline;
        }

        @keyframes blinker {
            50% {
                opacity: 0;
            }
        }

        .history-tl-container {
            font-family: "Roboto", sans-serif;
            width: 100%;
            margin: auto;
            display: block;
            position: relative;
        }

        .history-tl-container ul.tl {
            margin: 10px 0;
            padding: 0;
            display: inline-block;
        }

        .history-tl-container ul.tl li {
            list-style: none;
            margin: auto;
            margin-left: 200px;
            min-height: 25px;
            /*background: rgba(255,255,0,0.1);*/
            border-left: 1px dashed #86D6FF;
            padding: 0 0 30px 10px;
            position: relative;
        }

        .history-tl-container ul.tl li:last-child {
            border-left: 0;
        }

        .history-tl-container ul.tl li::before {
            position: absolute;
            left: -18px;
            top: -5px;
            content: " ";
            border: 8px solid rgba(255, 255, 255, 0.74);
            border-radius: 500%;
            background: #258CC7;
            height: 20px;
            width: 20px;
            transition: all 500ms ease-in-out;

        }

        .history-tl-container ul.tl li:hover::before {
            border-color: #258CC7;
            transition: all 1000ms ease-in-out;
        }

        ul.tl li .item-detail {
            color: rgba(0, 0, 0, 0.5);
            font-size: 12px;
        }

        ul.tl li .timestamp {
            color: #fff;
            position: absolute;
            width: 110px;
            left: -95%;
            text-align: center;
            font-size: 14px;
        }

        .timeline-container {
            line-height: 1.3em;
            min-width: 920px;
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
                        <div class="header-action">

                        </div>

                    </div>
                </div>
            </div>
            <div class="section-body mt-4">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <p class="text-muted m-b-0">
                                        <h5 class="align-center alert alert-info">Payment Schedule Summary</h5><hr>
                                    </p>
                                    <div class="row text-muted m-b-0">
                                        <div class="col-md-3">
                                            <b>Student's Number</b>
                                            <div><?php echo $student->pnumber; ?></div>
                                        </div>
                                        <div class="col-md-5">
                                            <b>Student's Fullname</b>
                                            <div><?php echo strtoupper($student->surname) . ", " . ucwords(strtolower($student->firstname . " " . $student->othername)); ?></div>
                                        </div>
                                        <div class="col-md-2">
                                            <b>Level</b>
                                            <div><?php echo $student->current_level; ?></div>
                                        </div>
                                        <div class="col-md-2">
                                            <b>Session</b>
                                            <div><?php echo $_SESSION['active_session']; ?></div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <table class="table js-table table-stripped">
                                                <thead>
                                                    <tr><th colspan="3" class="text-center"><?php echo $description; ?></th></tr>
                                                    <tr><th>#</th><th>Item</th><th>Amount</th></tr>
                                                </thead>
                                                <tbody>
                                                    <?php if($type == "single"){ ?>
                                                        <tr>
                                                            <td>1</td><td><?php echo $description; ?></td><td><?php echo number_format($feesInfo, 2, '.', ','); ?></td>
                                                        </tr>
                                                    <?php }else{
                                                        $total = 0;
                                                        $i = 1; 
                                                        foreach($feesInfo as $row){
                                                            $total += $row->amount; 
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $i++; ?></td>
                                                            <td><?php echo $row->item; ?></td>
                                                            <td>&#8358; <?php echo number_format($row->amount, 2, '.', ','); ?></td>
                                                        </tr>
                                                    <?php }} 
                                                        $_SESSION['rrr_invoice_amount'] = $total; 
                                                        $_SESSION['rrr_invoice_description'] = $description; 
                                                        $_SESSION['rrr_invoice_type'] = $type; 
                                                    ?>
                                                    <tr>
                                                        <td colspan="2">TOTAL</td>
                                                        <td>&#8358; <?php echo number_format($total, 2, '.', ','); ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                   
                                    <p>
                                        <hr>
                                        <a class="form-control btn btn-success" href="<?php echo site_url("payment/init") ?>">
                                            Generate Invoice via Remita
                                        </a>
                                    </p>
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