<!doctype html>
<html lang="en" dir="ltr">
<?php //echo $_SESSION['activeForm']->form_id; exit; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FUBK-PGS Applicantion Form Printout for <?php echo strtoupper($applicant->surname) . ' ' . ucwords(trim($applicant->firstname . ' ' . $applicant->middlename))?></title>
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

        .table,
        table th,
        table td {
            color: black;
        }

        th {
            width: 200px;
            color: black;
        }
        
        
    </style>
    <style type="text/css" media="print">
    @page 
    {
        size:  auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }

    html
    {
        background-color: #FFFFFF; 
        margin: 0px;  /* this affects the margin on the html before sending to printer */
    }

    body
    {
        border: solid 0px blue ;
        margin: 5mm 5mm 5mm 5mm; /* margin you want for the content */
    }
    </style>
</head>

<body class="font-muli right_tb_toggle <?php echo " " . $_SESSION['theme_mode']; ?>">
    <!--<div class="page-loader-wrapper">
        <div class="loader"></div>
    </div>-->
    <div id="main_content">
        <div class="page">
            <div class="section-body mt-4">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row clearfix">
                                <div class="col-xl-8 mx-auto">
                                    <div class="card p-4" style="color: #000;">
                                        <div class="row">
                                            <div class"col-2">
                                                <img src="<?php echo base_url('assets/images/fubk-icon.png')?>" style="width: 120px; margin:auto; position:relative"/>
                                            </div>
                                            <div class="col-7 mx-auto" style="display:flex; flex-direction: column; justify-content: center;">
                                                
                                                <div style="text-align: center; font-size:28px; font-weight:bold">Federal University Birnin Kebbi</div>
                                                <?php if($_SESSION['activeForm']->form_id ==1){
                                                    echo '<div style="text-align: center;  font-size:26px; font-weight:bold">School of Postgraduate Studies</div>';
                                                } else if($_SESSION['activeForm']->form_id == 2) {
                                                    echo '<div style="text-align: center; font-size:26px; font-weight:bold">Admissions Office</div>';
                                                    echo '<div style="text-align: center; font-size:26px; font-weight:bold">PUTME Registration Slip</div>';
                                                } else if($_SESSION['activeForm']->form_id == 4) {
                                                    echo '<div style="text-align: center; font-size:26px; font-weight:bold">Office of the Registrar</div>';
                                                    echo '<div style="text-align: center; font-size:26px; font-weight:bold">Inter University Transfer Form</div>';
                                                }else if(in_array($_SESSION['activeForm']->form_id, ['6','8','9'])){
                                                    echo '<div style="text-align: center; font-size:26px; font-weight:bold">Consultancy Unit</div>';
                                                    echo '<div style="text-align: center; font-size:26px; font-weight:bold">School of Part-Time Studies</div>';
                                                } else {
                                                   echo '<div style="text-align: center; font-size:26px; font-weight:bold">School of Basic Studies</div>'; 
                                                }
                                                ?>
                                            </div>
                                            <div class"col-3">
                                                <img src="<?php echo base_url('uploads/'.$applicant->passport)?>" style="width: 120px; margin:auto; position:relative"/>
                                            </div>
                                            
                                        </div>
                                        <hr>
                                        <style>
                                            table tr th{
                                                color:#000;
                                            }
                                        </style>
                                        <div class="alert alert-info text-center">Application submitted successfully. </div>
                                       <table class="table table-stripped table-bordered" style="color:black">
                                            <tr>
                                                <th style="color:#000; font-weight:bolder" style="color:#000"colspan="4">PERSONAL INFORMATION</th>
                                            </tr>
                                            <tr>
                                                <th style="color:#000; font-weight:bolder"style="color:#000">Full name</th>
                                                <td colspan="3"><?php echo strtoupper($applicant->surname) . ' ' . ucwords(trim($applicant->firstname . ' ' . $applicant->middlename)) ?></td>
                                            </tr>
                                            <tr>
                                                <th style="color:#000; font-weight:bolder">Gender</th>
                                                <td><?php echo $applicant->gender ?></td>
                                                <th style="color:#000; font-weight:bolder">Date of Birth</th>
                                                <td><?php echo $applicant->dob ?></td>
                                            </tr>
                                            <tr>
                                                <th style="color:#000; font-weight:bolder">Phone</th>
                                                <td><?php echo $applicant->phone ?></td>
                                                <th style="color:#000; font-weight:bolder">Email</th>
                                                <td><?php echo $applicant->email ?></td>
                                            </tr>
                                            <tr>
                                                <th style="color:#000; font-weight:bolder">State of Origin</th>
                                                <td><?php echo $applicant->state_name ?></td>
                                                <th style="color:#000; font-weight:bolder">LGA of Origin</th>
                                                <td><?php echo $applicant->lga_name ?></td>
                                            </tr>
                                        </table>
                                        <table class="table table-stripped table-bordered" style="color:black">
                                            <tr>
                                                <th style="color:#000; font-weight:bolder" style="color:#000"colspan="4">PROGRAMME APPLIED</th>
                                                <?php $activeForm = $_SESSION['activeForm'] ?>
                                            </tr>
                                            <tr>
                                                <th style="color:#000; font-weight:bolder">Application ID</th>
                                                <td><?php echo $applicant->application_number; ?></td>
                                                <th style="color:#000; font-weight:bolder">Session</th>
                                                <td><?php echo $applicant->session_applied; ?></td>
                                            </tr>
                                            <tr>
                                                <th style="color:#000; font-weight:bolder">Programme</th>
                                                <td><?php echo $activeForm->prog_abbr; ?></td>
                                                <th style="color:#000; font-weight:bolder">Department</th>
                                                <td><?php echo $activeForm->department; ?></td>
                                            </tr>
                                            <tr>
                                                <th style="color:#000; font-weight:bolder">Faculty</th>
                                                <td><?php echo $activeForm->faculty; ?></td>
                                                <th style="color:#000; font-weight:bolder">Remita Reference</th>
                                                <td><?php echo $applicant->rrr; ?></td>
                                            </tr>
                                            <tr>
                                                <th style="color:#000; font-weight:bolder">Date Paid</th>
                                                <td><?php echo $_SESSION['activeForm']->updated_at;  ?></td>
                                                <th style="color:#000; font-weight:bolder">Amount Paid</th>
                                                <td>&#8358;<?php echo number_format($_SESSION['activeForm']->fees, 2, ',', '.') ?? NULL; ?></td>
                                            </tr>
                                            <?php if($_SESSION['activeForm']->form_id ==2){?>
                                            <tr>
                                                <th style="color:#000; font-weight:bolder">JAMB Number</th>
                                                <td><?php echo $jamb_info->jamb_no; ?></td>
                                                <th style="color:#000; font-weight:bolder">JAMB Score</th>
                                                <td><?php echo $jamb_info->jamb_score; ?></td>
                                            </tr>
                                            <tr>
                                                <th style="color:#000; font-weight:bolder">Subjects</th>
                                                <td colspan="3" class=""><?php 
                                                    echo "Use of English (".$jamb_info->english_score.")&nbsp;&nbsp;&nbsp;"; 
                                                    echo $jamb_info->subject_1." (".$jamb_info->subject_1_score.")&nbsp;&nbsp;&nbsp;"; 
                                                    echo $jamb_info->subject_2." (".$jamb_info->subject_2_score.")&nbsp;&nbsp;&nbsp;"; 
                                                    echo $jamb_info->subject_3." (".$jamb_info->subject_3_score.")"; 
                                                    
                                                ?></td>
                                            </tr>
                                            <?php } ?>
                                        </table>
                                        <table class="table table-stripped table-bordered" style="color:black">
                                            <tr>
                                                <th style="color:#000; font-weight:bolder" style="color:#000"colspan="6">O'LEVEL INFORMATION</th>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <div class="row">
                                                        <?php foreach ($olevels as $row) {
                                                            echo "<div class='col'>" . $row->subject_code . ' (' . $row->grade . ')</div>';
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <?php if($_SESSION['activeForm']->form_id ==1){?>
                                        <table class="table table-stripped table-bordered" style="color:black">
                                            <tr>
                                                <th style="color:#000; font-weight:bolder" style="color:#000"colspan="6">A'LEVEL INFORMATION</th>
                                            </tr>
                                            <tr>
                                                <th style="color:#000; font-weight:bolder">Insititution</th>
                                                <th style="color:#000; font-weight:bolder">Year</th>
                                                <th style="color:#000; font-weight:bolder">Qualification</th>
                                                <th style="color:#000; font-weight:bolder">Result</th>
                                            </tr>
                                            <?php foreach ($alevels as $row) { ?>
                                                <tr>
                                                    <td style="width: 45%; font-weight: 900;"><?php echo $row->institution_name; ?></td>
                                                    <td><?php echo $row->graduation_year; ?></td>
                                                    <td><?php echo $row->qualification; ?></td>
                                                    <td><?php echo $row->grade; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                        <?php } ?>
                                        <table class="table table-stripped table-bordered" style="color:black">
                                            <tr>
                                                <th style="color:#000; font-weight:bolder" style="color:#000"colspan="6">Documents Uploaded</th>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <div class="row">
                                                        <?php foreach ($uploads as $row) {
                                                            echo "<div class='col'>" . $row->file_type . ' (' . $row->year_obtained . ')</div>';
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <?php if($_SESSION['activeForm']->form_id ==1){?>
                                        <table class="table table-stripped table-bordered" style="color:black">
                                            <tr>
                                                <th style="color:#000; font-weight:bolder" style="color:#000"colspan="6">Referees Information</th>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <div class="row">
                                                        <?php foreach ($referees as $row) {
                                                            echo '<div class="col-4">'
                                                            .'<b>' . $row->referee_title.' '. $row->referee_name . '</b><br>'
                                                            . $row->referee_rank . '<br>'
                                                            . $row->referee_email . '<br>'
                                                            . $row->referee_phone . '<br>'
                                                            .'</div>';
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <?php }  ?>
                                        <!--<table class="table table-stripped table-bordered" style="color:black">-->
                                        <!--    <tr>-->
                                        <!--        <th style="color:#000; font-weight:bolder" style="color:#000"colspan="4">PUTME SCHEDULE</th>-->
                                        <!--    </tr>-->
                                        <!--    <tr>-->
                                        <!--        <th style="color:#000; font-weight:bolder">DAY</th>-->
                                        <!--        <td>echo $schedule->days; ?></td>-->
                                        <!--        <th style="color:#000; font-weight:bolder">FACULTY</th>-->
                                        <!--        <td>echo $schedule->faculty; ?></td>-->
                                        <!--    </tr>-->
                                        <!--    <tr>-->
                                        <!--        <th style="color:#000; font-weight:bolder">DATE</th>-->
                                        <!--        <td>
                                        <!--        $date = strtotime($schedule->tt_date);-->
                                        <!--        echo date('D dS F, Y', $date);-->
                                        <!--        </td>-->
                                        <!--        <th style="color:#000; font-weight:bolder">TIME</th>-->
                                        <!--        <td> //echo $schedule->tt_time; ?></td>-->
                                        <!--    </tr>-->
                                        <!--    <tr>-->
                                        <!--        <th style="color:#000; font-weight:bolder">VENUE</th>-->
                                        <!--        <td colspan="3"> echo $schedule->venue; ?></td>-->
                                                
                                        <!--    </tr>-->
                                            
                                        <!--</table>-->
                                        <table class="table table-stripped table-bordered" style="color:black">
                                            <tr>
                                                <th style="color:red; font-weight:bolder; text-align:center">PUTME screening is strictly ONLINE, therefore, you do NOT need to visit any of our campuses.</th>
                                            </tr>
                                        </table>
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