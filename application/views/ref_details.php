<!doctype html>
<html lang="en" dir="ltr">
<?php //echo $referee->referee_hash; ?>
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

<body class="font-muli theme-cyan gradient">
    <form method="post" action="<?php echo site_url('auth/referee_update'); ?>" autocomplete="off">
        <div class="auth option2">
            <div class="auth_left" style="width:750px;">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <a class="header-brand" href="#">
                                <div class="card-title mt-3"><img src="<?php echo base_url(); ?>assets/images/university-logo.png" /></div>
                                <div class="card-title mt-2" style="font-size: 18px;">Referee Form</div>
                            </a>
                            <?php if ($this->session->flashdata('msg')) { ?>
                                <p class="alert alert-warning text-center" style="font-size:14px">
                                    <?php echo $this->session->flashdata('msg') ?>
                                </p>
                            <?php } ?>
                        </div>
                        <div class="card">
                            <!-- <div class="card-title pt-4 text-center">Referee Details</div> -->
                            <div class="card-body pt-0">
                                <div class="form-group">
                                    <label>Referee Name</label>
                                    <input type="text" class="form-control"  name="referee_name" value="<?php echo $referee->referee_name; ?>">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 col-md-6">
                                        <label>Referee Email</label>
                                        <input type="text" class="form-control"  name="referee_email" value="<?php echo $referee->referee_email; ?>">
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label>Referee Phone</label>
                                        <input type="text" class="form-control"  name="referee_phone" value="<?php echo $referee->referee_phone; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12 col-md-6">
                                        <label>Referee Rank</label>
                                        <input type="text" class="form-control"  name="referee_rank" value="<?php echo $referee->referee_rank; ?>">
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label>Referee Title</label>
                                        <input type="text" class="form-control"  name="referee_phone" value="<?php echo $referee->referee_title; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card-title pt-4 text-center">Applicant Details</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 col-md-6">
                                        <label>Applicant Full Name</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $form->firstname." ".$form->surname." ".$form->middlename; ?>">
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label>Applicant Phone</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $form->phone; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12 col-md-6">
                                        <label>Applicant Email</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $form->email; ?>">
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label>Course Applied</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $form->program; ?>">
                                    </div>
                            </div>

                                <input type="hidden" name="referee_hash" value="<?php echo $referee->referee_hash; ?>">                               
                                <input type="hidden" name="email" value="<?php echo $form->email; ?>">                               
                                <div class="text-center">
                                    <input type="hidden" id="g-token" name="g-token">
                                    <input class="btn btn-danger float-left mr-2" name="decline" type="submit" value="Decline Request">
                                    <input class="btn btn-primary float-right ml-2" name="proceed" type="submit" value="Save & Procced">
                                    
                                  
                                </div>
                            </div>
                        </div>
                        <!--
              -->
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="<?php echo base_url() ?>assets/bundles/lib.vendor.bundle.js" type="e4a7806aed088581f862dd92-text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/core.js" type="e4a7806aed088581f862dd92-text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var txt = document.getElementById("g-token").innerHTML;
        console.log(txt);
        /*if(tok.length < 10){
            //window.location.reload();
        }*/
    </script>
</body>

</html>