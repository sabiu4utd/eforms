<!doctype html>
<html lang="en" dir="ltr">
<?php //echo $_SESSION['form_id']; exit; ?>
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

        .bold{
            font-weight: 800;
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
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body pb-4">
                                    <img src="<?php echo base_url('uploads/'.$_SESSION['passport'])?>" alt="Passport picture" style="display:block;width:350px; margin:auto">
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
                                        <div class="card-header text-center">
                                            <a href="#" class="card-options-collapse text-center" data-toggle="card-collapse">
                                                <h3 class="card-title text-center" style="min-width: 100%;">
                                                    eForm Preview
                                                </h3>
                                            </a>
                                        </div>
                                        <?php if($form->form_type != "PUTME Form" and !$putme_search){ ?>
                                        <form action="<?php echo site_url('form/process') ?>" method="post">
                                            <div class="card-body">
                                                <div class="row clearfix row-deck mb-3">
                                                    <div class="col-md-2 bold">Fullname</div>
                                                    <div class="col-md-4">
                                                        <?php echo strtoupper($applicant->surname) . ", " . $applicant->firstname ?>
                                                    </div>
                                                    <div class="col-md-2 bold">Email</div>
                                                    <div class="col-md-4"><?php echo $applicant->email; ?></div>
                                                </div>
                                                <div class="row clearfix row-deck mb-3">
                                                    <div class="col-md-2 bold">Gender</div>
                                                    <div class="col-md-4"><?php echo $applicant->gender; ?></div>
                                                    <div class="col-md-2 bold">Date of Birth</div>
                                                    <div class="col-md-4"><?php echo $applicant->dob; ?></div>
                                                </div>
                                                <div class="row clearfix row-deck mb-3">
                                                    <div class="col-md-2 bold">Form Name</div>
                                                    <div class="col-md-4"><?php echo $form->form_name; ?></div>
                                                    <div class="col-md-2 bold">Form Type</div>
                                                    <div class="col-md-4">
                                                        <?php echo $form->form_type; ?>
                                                        <input type="hidden" name="form_type" value="<?php echo $form->form_type?>" id="form_type" />
                                                    </div>
                                                </div>
                                                <div class="row clearfix row-deck mb-3">
                                                    <div class="col-md-2 bold">Form Price</div>
                                                    <div class="col-md-4">
                                                        N <?php echo number_format($form->fees, 2, ',', '.') ?>
                                                        <input type="hidden" name="totalamount" value="<?php echo $form->fees ?>" id="totalamount" />
                                                    </div>
                                                    <div class="col-md-2 bold">Session</div>
                                                    <div class="col-md-4"><?php echo $form->active_session?></div>
                                                </div>
                                                <div class="row clearfix row-deck mb-3">
                                                    <div class="col-md-2 bold">Faculty/School</div>
                                                    <div class="col-md-4">
                                                        <select name="faculty" class="form-control" id="faculty" required>
                                                            <option selected disabled>-[Choose Option]-</option>
                                                            <?php
                                                                foreach($faculties as $row){
                                                                    echo "<option value='".$row->id."'>".$row->faculty."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2 bold">Department</div>
                                                    <div class="col-md-4">
                                                        <select name="department" class="form-control" required id="department"></select>
                                                    </div>
                                                </div>
                                                <div class="row clearfix row-deck mb-3">
                                                    <div class="col-md-2 bold">Programme</div>
                                                    <div class="col-md-10">
                                                        <select name="programme" id="programme" class="form-control" required>
                                                            <option selected disabled>-[Choose Option]-</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row clearfix row-deck mb-3">
                                                    <div class="col-md-2 bold">Invoice Reference</div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" value="Not Generated" required readonly name="rrr" id="rrr" />
                                                        
                                                    </div>
                                                    <div class="col-md-2 bold">Date Generated</div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" value="Not Generated" readonly id="dategen" />
                                                    </div>
                                                </div>
                                                <div class="row clearfix row-deck mb-3">
                                                    <div class="col-12 mt-4 mb-4">
                                                        <div id="error" class="badge badge-danger form-control text-center"></div>
                                                    </div>
                                                    <div class="col-sm-12 mt-4 ">
                                                        <input type="hidden" id="form_id" name="form_id" value="<?php echo $form->id?>" />
                                                        <input type="hidden" name="order_hash" id="order_hash" />
                                                        <button class="form-control btn btn-primary" style="visibility: hidden" id="submit" type="submit">Generate Invoice</button>
                                                        <a href="" class="form-control btn btn-success" style="visibility: hidden" id="paystack_link" class>Click to Pay using Paystack</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <?php }else if(($form->form_type == "PUTME Form" and !$putme_search) or !$jamb_info){ ?>
                                        <form action="<?php echo site_url('form/order') ?>" method="post">
                                            <div class="card-body">
                                                <div class="row clearfix row-deck mb-3">
                                                    <div class="col-md-2 bold">JAMB Number</div>
                                                    <div class="col-md-6">
                                                       <input type="text" class="form-control" required name="jamb_no" placeholder="Enter your JAMB Number here" />
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="submit" class="form-control btn btn-success btn-sm" value="Load Information" />
                                                        <input type="hidden" name="form_type" value="<?php echo $form->id?>" />
                                                    </div>
                                                </div>
                                        </form>
                                        <?php } else { ?>
                                        <form action="<?php echo site_url('form/process') ?>" method="post">
                                            <div class="card-body">
                                                <div class="row clearfix row-deck mb-3">
                                                    <div class="col-md-2 bold">Fullname</div>
                                                    <div class="col-md-4">
                                                        <?php echo strtoupper($jamb_info->surname) . ", " . $applicant->firstname.' '.$jamb_info->middlename ?>
                                                    </div>
                                                    <div class="col-md-2 bold">Email</div>
                                                    <div class="col-md-4"><?php echo $applicant->email; ?></div>
                                                </div>
                                                <div class="row clearfix row-deck mb-3">
                                                    <div class="col-md-2 bold">Gender</div>
                                                    <div class="col-md-4"><?php echo $jamb_info->gender; ?></div>
                                                    <div class="col-md-2 bold">Date of Birth</div>
                                                    <div class="col-md-4">
                                                        <?php echo $applicant->dob; ?>
                                                        
                                                    </div>
                                                </div>
                                                <div class="row clearfix row-deck mb-3">
                                                    <div class="col-md-2 bold">JAMB No</div>
                                                    <div class="col-md-4">
                                                        <?php echo $jamb_info->jamb_no; ?>
                                                        <input name="jamb_no" class="form-control" required type="hidden" value="<?php echo $jamb_info->jamb_no; ?>" />
                                                    </div>
                                                    <div class="col-md-2 bold">JAMB Score</div>
                                                    <div class="col-md-4"><?php echo $jamb_info->jamb_score; ?></div>
                                                </div>
                                                <div class="row clearfix row-deck mb-3">
                                                    <div class="col-md-2 bold">Form Name</div>
                                                    <div class="col-md-4"><?php echo $form->form_name; ?></div>
                                                    <div class="col-md-2 bold">Form Type</div>
                                                    <div class="col-md-4">
                                                        <?php echo $form->form_type; ?>
                                                        <input type="hidden" name="form_type" value="<?php echo $form->form_type?>" id="form_type" />
                                                    </div>
                                                </div>
                                                <div class="row clearfix row-deck mb-3">
                                                    <div class="col-md-2 bold">Form Price</div>
                                                    <div class="col-md-4">
                                                        N <?php echo number_format($form->fees, 2, ',', '.') ?>
                                                        <input type="hidden" name="totalamount" value="<?php echo $form->fees ?>" id="totalamount" />
                                                    </div>
                                                    <div class="col-md-2 bold">Session</div>
                                                    <div class="col-md-4"><?php echo $form->active_session?></div>
                                                </div>
                                                <div class="row clearfix row-deck mb-3">
                                                    <div class="col-md-2 bold">Faculty/School</div>
                                                    <div class="col-md-4">
                                                        <select name="faculty" class="form-control" id="faculty" required>
                                                            <option selected disabled>-[Choose Option]-</option>
                                                            <?php
                                                                foreach($faculties as $row){
                                                                    echo "<option value='".$row->id."'>".$row->faculty."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2 bold">Department</div>
                                                    <div class="col-md-4">
                                                        <select name="department" class="form-control" required id="department"></select>
                                                    </div>
                                                </div>
                                                <div class="row clearfix row-deck mb-3">
                                                    <div class="col-md-2 bold">Programme</div>
                                                    <div class="col-md-10">
                                                        <select name="programme" id="programme" class="form-control" required>
                                                            <option selected disabled>-[Choose Option]-</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row clearfix row-deck mb-3">
                                                    <div class="col-md-2 bold">Invoice Reference</div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" value="Not Generated" required readonly name="rrr" id="rrr" />
                                                        
                                                    </div>
                                                    <div class="col-md-2 bold">Date Generated</div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" value="Not Generated" readonly id="dategen" />
                                                    </div>
                                                </div>
                                                <div class="row clearfix row-deck mb-3">
                                                    <div class="col-12 mt-4 mb-4">
                                                        <div id="error" class="badge badge-danger form-control text-center"></div>
                                                    </div>
                                                    <div class="col-sm-12 mt-4 ">
                                                        <input type="hidden" class="form-control" id="form_id" name="form_id" value="<?php echo $form->id; ?>" />
                                                        <input type="hidden" name="order_hash" id="order_hash" />
                                                        <button class="form-control btn btn-primary" style="visibility: hidden" id="submit" type="submit">Generate PUTME Invoice</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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
    <script src="<?php echo base_url() ?>assets/js/form/dropify.js" type="e27f9daa9c2f25670b2c3761-text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/page/summernote.js" type="e27f9daa9c2f25670b2c3761-text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/rocket-loader.min.js" data-cf-settings="e27f9daa9c2f25670b2c3761-|49" defer=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>
<script type="text/javascript">
    $("#faculty").change(function(){
        $("#department").empty().append("<option>Loading...</option>")
        var facultyid = $("#faculty").val();
        $.ajax({
           url: '<?php echo site_url('form/getDepartmentByFacultyID')?>',
           type: 'POST',data: {facultyid: facultyid},
           error: function(data) {alert('Something went wrong');},
           success: function(data) {$("#department").empty().append(data)}
        });
    });

    $("#department").change(function(){
        $("#programme").empty().append("<option>Loading...</option>")
        var departmentid = $("#department").val();
        var form_id = $("#form_id").val();
        $.ajax({
           url: '<?php echo site_url('form/getProgrammeByDeptID')?>',
           type: 'POST',data: {departmentid: departmentid, form_id:form_id},
           error: function(data) {alert('Something went wrong');},
           success: function(data) {
              console.log(data);
               $("#programme").empty().append(data);
           }
        });
    });

    $("#programme").change(function(){
        var programid = $("#programme").val();
        var form_id = $("#form_id").val();
        $("#rrr").val("Invoice is being generated. Please wait...")
        if(programid == -1){
            alert("Please choose a programme")
            return
        }else{
            $.ajax({
                url: '<?php echo site_url('form/getRemitaRRR')?>',
                type: 'POST',
                data: {"amount": $("#totalamount").val(), "form_type": $("#form_type").val()},
                success: function(data) {
                    console.log(data)
                    $("#order_hash").val(false);
                    $("#error").text("")
                    if(!data){
                        $("#dategen").val("Oops! Try again later")
                        $("#order_hash").val(false);
                    }else{
                        
                        if(data.length < 200){
                        let result = JSON.parse(data)
                            $("#error").text("")
                            $("#rrr").val(result["rrr"])
                            $("#order_hash").val(result["orderId"])
                            $("#dategen").val(new Date().toUTCString())
                            
                            if(result.hasOwnProperty('authorization_url')){
                                $('#paystack_link').css('visibility', "visible");
                                $('#submit').css('visibility', "hidden");
                                $("#paystack_link").attr('href', result["authorization_url"]);

                                
                            }else{
                                $('#paystack_link').css('visibility', "hidden");
                                $('#submit').css('visibility', "visible");
                            }
                        }else{
                            
                            $("#error").text("Remita Servers are down. Please try again later")
                        }
                        
                    }
                },
                error: function(data){
                    console.log(data)
                }
            });
        }
    });


</script>
</html>