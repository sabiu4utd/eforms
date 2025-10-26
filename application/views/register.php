<!doctype html>
<html lang="en" dir="ltr">

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
    <form method="post" action="<?php echo site_url('auth/signup'); ?>" autocomplete="off">
        <div class="auth option2">
            <div class="auth_left" style="width:750px;">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <a class="header-brand" href="#">
                                <div class="card-title mt-3"><img src="<?php echo base_url(); ?>assets/images/university-logo.png" /></div>
                                <div class="card-title mt-2" style="font-size: 18px;">Central e-Forms Portal</div>
                            </a>
                            <?php if ($this->session->flashdata('msg')) { ?>
                                <p class="alert alert-warning text-center" style="font-size:14px">
                                    <?php echo $this->session->flashdata('msg') ?>
                                </p>
                            <?php } ?>
                        </div>
                        <div class="card">
                            <div class="card-title pt-4 text-center">Register an account</div>
                            <div class="card-body pt-0">
                                <div class="form-group">
                                    <label>Enter your Email</label>
                                    <input type="email" class="form-control" placeholder="Enter your email" required name="email" autocomplete="off">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 col-md-6">
                                        <label>Enter your Surname</label>
                                        <input type="text" class="form-control" placeholder="Enter your surname" required name="surname" autocomplete="off">
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label>Enter your Firstname</label>
                                        <input type="text" class="form-control" placeholder="Enter your firstname" required name="firstname" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 col-md-6">
                                        <label>Date of Birth</label>
                                        <input type="date" class="form-control" placeholder="Enter your date of birth" required name="dob" autocomplete="off">
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label>Enter your Gender</label>
                                        <select class="form-control" required name="gender" autocomplete="off">
                                            <option>Female</option>
                                            <option>Male</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 col-md-6">
                                        <label>Enter your password</label>
                                        <input type="password" class="form-control" placeholder="Choose a password" required name="password" autocomplete="off">
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label>Confirm your password</label>
                                        <input type="password" class="form-control" placeholder="Confirm password" required name="cpassword" autocomplete="off">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <input type="hidden" id="g-token" name="g-token">
                                    <button class="btn btn-primary btn-block" type="submit">Create an account</button>
                                    <div class="text-muted mt-4">
                                        <hr>
                                    </div>
                                    <div class="text-muted mt-1">Login? <a href="<?php echo site_url('auth/login') ?>">Click here</a></div>
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