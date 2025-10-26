<!DOCTYPE html>
<?php $userid;
?>
<html lang="en">

<?php  //echo  ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?php echo base_url() ?>assets/images/favicon.ico" type="image/x-icon" />
    <title><?php echo $_SESSION['pageTitle']; ?> .::. Federal University Birnin Kebbi</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <script src="https://www.google.com/recaptcha/api.js?render=6Lc-pgseAAAAACDHAkWOeBm6RpQMX2bNTUJ750UB"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7683315879221411" crossorigin="anonymous"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('6Lc-pgseAAAAACDHAkWOeBm6RpQMX2bNTUJ750UB', {
                action: 'submit'
            }).then(function(token) {
                document.getElementById("g-token").value = token;
                if (token.length < 10) location.reload();
            });
        });
    </script>
</head>


<body class="sidebar-noneoverflow">



    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN TOPBAR  -->
        <div class="topbar-nav header navbar" role="banner">
            <?php //$this->load->view('panels/topbar'); 
            ?>
        </div>
        <!--  END TOPBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="card" style="width: 55%; margin:auto; box-shadow: blue 10px 10px 10px 10px ">
          
                <div class="card-body">
                    <div class="layout-px-spacing">
                        <form method="post" action="<?php echo site_url('auth/referee_report'); ?>" enctype="multipart/form-data">
                            <div class="row layout-spacing">
                                <div class="col-3  layout-top-spacing">
                                </div>

                                <div class="col-6  layout-top-spacing">
                                    <div class="user-profile layout-spacing">
                                        <div class="widget-content widget-content-area">
                                            <div class="d-flex justify-content-between">

                                                <h6 class=""> <span style="color:red">All Field mark with asterisk are Mandatory*</span> </h6>
                                                <a href="#" class="mt-2 edit-profile"> <i data-feather="user-check"></i></a>
                                            </div>
                                            <div class="user-info-list">

                                                <div class="">
                                                    <div class="form-group row mb-4">
                                                        1.  What capacity do you known the applicant?</strong><span style="color:red">*</span>
                                                    </div>
                                                    <div class="form-group row mb-4">                                                       
                                                        <div class="col-xl-12 col-lg-12 col-sm-12">
                                                            <input type="radio" name="did_you_know" value="Direct Supervisor">Direct Supervisor<br />
                                                            <input type="radio" name="did_you_know" value="Previous Supervisor">Previous Supervisor<br />
                                                            <input type="radio" name="did_you_know" value="Other Manager"> Other Manager (not Direct Manager)<br />
                                                            <input type="radio" name="did_you_know" value="Professional Mentor"> Professional Mentor <br />
                                                            <input type="radio" name="did_you_know" value="Colleague/Peer"> Colleague/Peer <br />
                                                            <input type="radio" name="did_you_know" value="Professor/Instructor"> Professional Instructor<br />
                                                            <input type="radio" name="did_you_know" value="Academic/Advisor">Academic Advisor <br />
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row mb-4">
                                                        <label for="hEmail" class="col-xl-12 col-sm-12 col-sm-4 col-form-label"><strong>Please give your personal assessment of the applicant’s technical competence, initiative, diligence and motivation in the graduate program for which he/she has applied</strong>. <span style="color:red">*</span></label>
                                                        
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                      
                                                        <div class="col-xl-12 col-lg-12 col-sm-12">
                                                            <textarea name="Personal_assesment" id="" cols="52" rows="5"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-4 center">
                                                        <h6>
                                                            Please rate the candidate on the following characteristics with 1 being lowest and 5 being highest
                                                        </h6>
                                                    </div>
                                                    <div class="form-group row mb-4 center">
                                                        <table class="table">
                                                            <tr>
                                                                <td></td>
                                                                <td>1</td>
                                                                <td>2</td>
                                                                <td>3</td>
                                                                <td>4</td>
                                                                <td>5</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="font-family:arial; font-size:12pt">Preparation for proposed course</td>
                                                                <td><input type="radio" name="preparation_for_course" value="1" class="form-control"> </td>
                                                                <td><input type="radio" name="preparation_for_course" value="2" class="form-control"> </td>
                                                                <td><input type="radio" name="preparation_for_course" value="3" class="form-control"> </td>
                                                                <td><input type="radio" name="preparation_for_course" value="4" class="form-control"> </td>
                                                                <td><input type="radio" name="preparation_for_course" value="5" class="form-control"> </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="font-family:arial; font-size:12pt">Ability to organize and express idea</td>
                                                                <td><input type="radio" name="expression" value="1" class="form-control"> </td>
                                                                <td><input type="radio" name="expression" value="2" class="form-control"> </td>
                                                                <td><input type="radio" name="expression" value="3" class="form-control"> </td>
                                                                <td><input type="radio" name="expression" value="4" class="form-control"> </td>
                                                                <td><input type="radio" name="expression" value="5" class="form-control"> </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="font-family:arial; font-size:12pt">Critical and Analytical Ability</td>
                                                                <td><input type="radio" name="analtical_ability" value="1" class="form-control"> </td>
                                                                <td><input type="radio" name="analtical_ability" value="2" class="form-control"> </td>
                                                                <td><input type="radio" name="analtical_ability" value="3" class="form-control"> </td>
                                                                <td><input type="radio" name="analtical_ability" value="4" class="form-control"> </td>
                                                                <td><input type="radio" name="analtical_ability" value="5" class="form-control"> </td>
                                                            </tr>

                                                            <tr>
                                                                <td style="font-family:arial; font-size:12pt">Ability to plan and complete work</td>
                                                                <td><input type="radio" name="planning" value="1" class="form-control"> </td>
                                                                <td><input type="radio" name="planning" value="2" class="form-control"> </td>
                                                                <td><input type="radio" name="planning" value="3" class="form-control"> </td>
                                                                <td><input type="radio" name="planning" value="4" class="form-control"> </td>
                                                                <td><input type="radio" name="planning" value="5" class="form-control"> </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="font-family:arial; font-size:12pt">Technical Competence in the proposed field of research</td>
                                                                <td><input type="radio" name="technical_competence" value="1" class="form-control"> </td>
                                                                <td><input type="radio" name="technical_competence" value="2" class="form-control"> </td>
                                                                <td><input type="radio" name="technical_competence" value="3" class="form-control"> </td>
                                                                <td><input type="radio" name="technical_competence" value="4" class="form-control"> </td>
                                                                <td><input type="radio" name="technical_competence" value="5" class="form-control"> </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="font-family:arial; font-size:12pt">Intellectual Promise</td>
                                                                <td><input type="radio" name="intellectual_promise" value="1" class="form-control"> </td>
                                                                <td><input type="radio" name="intellectual_promise" value="2" class="form-control"> </td>
                                                                <td><input type="radio" name="intellectual_promise" value="3" class="form-control"> </td>
                                                                <td><input type="radio" name="intellectual_promise" value="4" class="form-control"> </td>
                                                                <td><input type="radio" name="intellectual_promise" value="5" class="form-control"> </td>
                                                            </tr>



                                                        </table>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label for="hEmail" class="col-xl-12 col-sm-12 col-sm-4 col-form-label"><strong>Motivation</strong><span style="color:red">*</span></label>
                                                        
                                                    </div> 
                                                    <div class="form-group row mb-4">
                                                        
                                                        <div class="col-xl-12 col-lg-12 col-sm-12">
                                                            <input type="radio" name="motivation" value="Academic Achivement"> Academic Achivement<br />
                                                            <input type="radio" name="motivation" value="Research Potential"> Research Potential<br />
                                                            <input type="radio" name="motivation" value="Social and Emotional Maturity"> Social and Emotional Maturity<br />
                                                            <input type="radio" name="motivation" value="Inter Personal Skills"> Inter Personal Skills <br />
                                                            <input type="radio" name="motivation" value="Ethical Responsibility"> Ethical Responsibility <br />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label for="hEmail" class="col-xl-12 col-sm-12 col-sm-12 col-form-label"><strong>Overall Recommendation</strong><span style="color:red">*</span></label>
                                                        
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                       
                                                        <div class="col-xl-12 col-lg-12 col-sm-12">
                                                            <input type="radio" name="recommendation" value="Strongly Recommended">Strongly Recommended<br />
                                                            <input type="radio" name="recommendation" value="Recommended"> Recommended<br />
                                                            <input type="radio" name="recommendation" value="Recommended with Reservation">Recommended with Reservation<br />
                                                            <input type="radio" name="recommendation" value="Do not Recommend"> Do not Recommend <br />

                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label for="hEmail" class="col-xl-12 col-sm-12 col-sm-4 col-form-label"><strong> give permission to the FUBK to contact me if necessary </strong><span style="color:red">*</span></label>
                                                       
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                       
                                                        <div class="col-xl-12 col-lg-12 col-sm-12">
                                                            <input type="radio" name="permission" value="Yes"> Yes
                                                            <input type="radio" name="permission" value="No"> No
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3  layout-top-spacing">
                                </div>
                                <input type="hidden" name="referee_hash" value="<?php echo $refree_hash;; ?>">

                                <div class="col-12 layout-top-spacing">
                                    <div class="form-group row mb-3">
                                        <div class="col-xl-12 col-lg-12 col-sm-12">
                                            <input type="submit" class="form-control btn btn-success btn-block" value="Save and Proceed">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                        </div>
            </div>
                    </div>
                    <?php $this->load->view('incs/footer'); ?>
                    <!--  END CONTENT AREA  -->
                </div>
                <!-- END MAIN CONTAINER -->

                <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
                <script src="<?php echo base_url() ?>assets/js/libs/jquery-3.1.1.min.js"></script>
                <script src="<?php echo base_url() ?>assets/bootstrap/js/popper.min.js"></script>
                <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
                <script src="<?php echo base_url() ?>assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
                <script src="<?php echo base_url() ?>assets/js/app.js"></script>

                <script>
                    $(document).ready(function() {
                        App.init();
                        <?php if ($this->session->flashdata('msg')) { ?>
                            const toast = swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                padding: '2em'
                            });

                            toast({
                                type: 'success',
                                title: '<?php echo $this->session->flashdata('msg'); ?>',
                                padding: '1em',
                            });
                        <?php } ?>
                    });
                </script>
                <script src="<?php echo base_url() ?>assets/js/custom.js"></script>
                <!-- END GLOBAL MANDATORY SCRIPTS -->
                <script>
                    $(document).ready(function() {
                        $('#state').on('change', function() {

                            var state_id = $(this).val();

                            $.ajax({
                                url: "<?php echo base_url() ?>/applicant/getLga",
                                type: "POST",
                                data: {
                                    'state_id': state_id
                                },
                                success: function(data) {
                                    $('#lga').html(data);
                                },
                            });
                        });
                    });

                    $(document).ready(function() {
                        $('#faculty').on('change', function() {

                            var facultyid = $(this).val();
                            // alert(facultyid);
                            $.ajax({
                                url: "<?php echo base_url() ?>/applicant/getDept",
                                type: "POST",
                                data: {
                                    'facultyid': facultyid
                                },
                                success: function(data) {
                                    $('#dept').html(data);
                                },
                            });
                        });
                    });
                </script>

                <script src="<?php echo base_url() ?>assetsassets/js/scrollspyNav.js"></script>
                <script src="<?php echo base_url() ?>assets/plugins/font-icons/feather/feather.min.js"></script>
                <script src="<?php echo base_url() ?>assets/plugins/sweetalerts/sweetalert2.min.js"></script>
                <script src="<?php echo base_url() ?>assets/plugins/sweetalerts/custom-sweetalert.js"></script>
                <script type="text/javascript">
                    feather.replace();
                </script>
</body>

</html>