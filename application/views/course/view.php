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
        table tbody td, table thead th{
            color:#000;
        }

        .offcanvas-active .page {
            left: 20px;
            width: calc(100% - 20px);
        }
    </style>
</head>
<body class="font-muli right_tb_toggle <?php echo " " . $_SESSION['theme_mode']; ?>">
    <div class="page-loader-wrapper">
        <div class="loader"></div>
    </div>
    <div id="main_content">
        <?php
        //$this->load->view('incs/header');
        //$this->load->view('incs/lside');
        ?>
        <div class="page">
            <?php //$this->load->view('incs/pageheader'); ?>
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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    
                                    <p class="text-muted m-b-0">
                                    <div class="table-responsive">
                                        <table border="1" class="table table-hover js-basic-example dataTable table-striped table_custom spacing5" style="border: 1px solid #000; border-collapse:collapse">
                                            <thead>
                                                <tr>
                                                    <th style="vertical-align: top;">
                                                        <a href="<?php echo site_url('staff/index')?>" class="float:left">
                                                            <i class="fa fa-home fa-lg"></i>
                                                        </a>
                                                    </th>
                                                    <th colspan="6">
                                                        <h5 class="text-center">
                                                            <?php 
                                                                echo $courseinfo->course_code." - ".$courseinfo->course_title. "<br>".$courseinfo->value." semester, ".$courseinfo->session ;
                                                            ?>
                                                        </h5>
                                                    </th>
                                                    <th>
                                                        <a href="#" onclick="window.print()" class="float:right">
                                                            <i class="fa fa-print fa-lg"></i>
                                                        </a>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>#</th>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Program</th>
                                                    <th>CA</th>
                                                    <th>Exams</th>
                                                    <th>Total</th>
                                                    <th>Status</th>
                                                    <!--<th>Date Updated</th>-->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                function computeGrade($total){
                                                    $grade = "F";
                                                    if($total >= 69.45){
                                                        $grade = "A";
                                                    }else if($total >= 59.45 && $total < 69.45){
                                                        $grade = "B";
                                                    }else if($grade >= 49.45 && $total < 59.45){
                                                        $grade = "C";
                                                    }else if($grade >= 44.49 && $total < 49.45){
                                                        $grade = "D";
                                                    }elseif($grade >= 39.45 && $total < 44.49){
                                                        $grade = "E";
                                                    }else{
                                                        $grade = "F";
                                                    }
                                                    return $grade;
                                                }
                                                $i = 1;
                                                foreach ($coursemarks as $row) { 
                                                    $total = '-';
                                                    if(is_numeric($row->ca) && is_numeric($row->exams)){
                                                        $total = $row->ca + $row->exams;
                                                    }else if(is_numeric($row->ca) && $row->exams == "ABS"){
                                                        $total = $row->ca;
                                                    }else if($row->ca == "ABS" && is_numeric($row->exams)){
                                                        $total = $row->exams;
                                                    }

                                                    computeGrade($total) == "F" ? $analysis[$row->prog_abbr]['fail']++ : $analysis[$row->prog_abbr]['pass']++;
                                                    $analysis[$row->prog_abbr]['fail'] += $total < 39.45 ? 1 : 0;
                                                    $analysis[$row->prog_abbr][computeGrade($total)] += 1;

                                                ?>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $row->pnumber ?></td>
                                                        <td><?php 
                                                            echo strtoupper($row->surname).", ".ucwords(strtolower($row->firstname." ".$row->othername)); 
                                                        ?></td>
                                                        <td><?php echo $row->prog_abbr ?></td>
                                                        <td><?php echo $row->ca ?></td>
                                                        <td><?php echo $row->exams; ?></td>
                                                        <td><?php echo $total;  ?></td>
                                                        <td><?php  echo is_numeric($total) ? "UPLOADED" : "PENDING";  ?></td>
                                                        <!--<td><?php echo $row->date; ?></td>-->
                                                    </tr>
                                                <?php } ?>
                                                <tr><th colspan="8"><hr></th></tr>
                                                <tr><th colspan="8" style="color:#000; font-weight:bold">RESULT SUMMARY ANALYSIS</th></tr>
                                                <tr>
                                                    <td colspan="8">
                                                    <table class="table table-hover js-basic-example dataTable table-striped table_custom spacing5" style="border: 1px solid #000; border-collapse:collapse">
                                                        <thead>
                                                            <tr>
                                                                <th>Programme</th>
                                                                <th>Total Students</th>
                                                                <th>PASSED</th>
                                                                <th>FAILED</th>
                                                                <th>A</th>
                                                                <th>B</th>
                                                                <th>C</th>
                                                                <th>D</th>
                                                                <th>E</th>
                                                                <th>F</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                            $tall = 0; $tpass = 0; $tfail = 0;$ta=0;$tb=0;$tc=0;$td=0;$te=0;$tf=0;
                                                            foreach($analysis as $key=>$value){
                                                                $t = $value['pass'] + $value['fail'];
                                                                $tall += $t;
                                                                $tpass += $value['pass'];
                                                                $tfail += $value['fail'];
                                                                $ta += $value['A'];
                                                                $tb += $value['B'];
                                                                $tc += $value['C'];
                                                                $td += $value['D'];
                                                                $te += $value['E'];
                                                                $tf += $value['F'];
                                                                
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $key; ?></td>
                                                                <td><?php 
                                                                echo number_format($t, 0, ".", ',').' ('.number_format(100*$t/$i, 1, ".", ',').'%)';
                                                                ?></td>
                                                                <td><?php echo number_format($value['pass'], 0, ".", ',').' ('.number_format(100*$value['pass']/$t, 1, ".", ',').'%)';?></td>
                                                                <td><?php echo number_format($value['fail'], 0, ".", ',').' ('.number_format(100*$value['fail']/$t, 1, ".", ',').'%)';?></td>
                                                                <td><?php echo number_format($value['A'], 0, ".", ',').' ('.number_format(100*$value['A']/$t, 1, ".", ',').'%)';?></td>
                                                                <td><?php echo number_format($value['B'], 0, ".", ',').' ('.number_format(100*$value['B']/$t, 1, ".", ',').'%)';?></td>
                                                                <td><?php echo number_format($value['C'], 0, ".", ',').' ('.number_format(100*$value['C']/$t, 1, ".", ',').'%)';?></td>
                                                                <td><?php echo number_format($value['D'], 0, ".", ',').' ('.number_format(100*$value['D']/$t, 1, ".", ',').'%)';?></td>
                                                                <td><?php echo number_format($value['E'], 0, ".", ',').' ('.number_format(100*$value['E']/$t, 1, ".", ',').'%)';?></td>
                                                                <td><?php echo number_format($value['F'], 0, ".", ',').' ('.number_format(100*$value['F']/$t, 1, ".", ',').'%)';?></td>
                                                            </tr>
                                                            <?php } ?>
                                                            <tr>
                                                                <th>TOTAL</th>
                                                                <td><?php echo number_format($tall, 0, ".", ',').' ('.number_format(100*$tall/$i, 1, ".", ',').'%)';?></td>
                                                                <td><?php echo number_format($tpass, 0, ".", ',').' ('.number_format(100*$tpass/$tall, 1, ".", ',').'%)';?></td>
                                                                <td><?php echo number_format($tfail, 0, ".", ',').' ('.number_format(100*$tfail/$tall, 1, ".", ',').'%)';?></td>
                                                                <td><?php echo number_format($ta, 0, ".", ',').' ('.number_format(100*$ta/$tall, 1, ".", ',').'%)';?></td>
                                                                <td><?php echo number_format($tb, 0, ".", ',').' ('.number_format(100*$tb/$tall, 1, ".", ',').'%)';?></td>
                                                                <td><?php echo number_format($tc, 0, ".", ',').' ('.number_format(100*$tc/$tall, 1, ".", ',').'%)';?></td>
                                                                <td><?php echo number_format($td, 0, ".", ',').' ('.number_format(100*$td/$tall, 1, ".", ',').'%)';?></td>
                                                                <td><?php echo number_format($te, 0, ".", ',').' ('.number_format(100*$te/$tall, 1, ".", ',').'%)';?></td>
                                                                <td><?php echo number_format($tf, 0, ".", ',').' ('.number_format(100*$tf/$tall, 1, ".", ',').'%)';?></td>
                                                            </tr>
                                                        </tbody>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan="10" style="color:red; text-align:right; font-weight:700">
                                                        PRINTED ON <?php echo date("l jS F Y")?>
                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php //$this->load->view('incs/footer'); ?>
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