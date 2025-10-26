<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?php echo base_url()?>assets/images/favicon.ico" type="image/x-icon" />
    <title><?php echo $_SESSION['pageTitle']; ?></title>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <script src="https://www.google.com/recaptcha/api.js?render=6Lc-pgseAAAAACDHAkWOeBm6RpQMX2bNTUJ750UB"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('6Lc-pgseAAAAACDHAkWOeBm6RpQMX2bNTUJ750UB', {action: 'submit'}).then(function(token) {
                //console.log(token);
                document.getElementById("g-token").value = token;
                if(token.length < 10) location.reload();
            });
        });
    </script>
</head>
<body class="font-muli theme-cyan gradient">
	<form method="post" action="<?php echo site_url('auth/authenticate');?>" autocomplete="off">
    <div class="auth option2">
        <div class="auth_left" style="width:500px;">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <a class="header-brand" href="#">
                            <div class="card-title mt-3"><img src="<?php echo base_url();?>assets/images/university-logo.png" /></div>
                            <div class="card-title mt-2">University Portal<br>Screen Locked, Enter Password to Continue</div>
                        </a>
                        <?php if($this->session->flashdata('msg')){ ?>
                        <p class="alert alert-warning text-center" style="font-size:14px">
                            <?php echo $this->session->flashdata('msg') ?>
                        </p>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control text-center" value="<?php echo $_SESSION['username']?>" readonly>
                    <input type="hidden" name="username" value="<?php echo $_SESSION['username']?>">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control text-center" id="exampleInputPassword1" placeholder="Enter Password" required name="password" autocomplete="off">
                        <input type="hidden" id="g-token" name="g-token">
                    </div>
                    <div class="text-center">
                         <button class="btn btn-primary btn-block" type="submit">Unlock Account</button>
                        <!--<div class="text-muted mt-4">Your 1<sup>st</sup> time here? <a href="<?php echo site_url('auth/activate')?>">Activate Account</a></div>-->
                        <div class="text-muted mt-4"><hr></div>
                        <div class="text-muted mt-1"><a href="<?php echo site_url('auth/logout')?>">Logout</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	</form>
    <script src="<?php echo base_url()?>assets/bundles/lib.vendor.bundle.js" type="e4a7806aed088581f862dd92-text/javascript"></script>
    <script src="<?php echo base_url()?>assets/js/core.js" type="e4a7806aed088581f862dd92-text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var txt = document.getElementById("g-token").innerHTML;
        //console.log(txt);
        /*if(tok.length < 10){
            //window.location.reload();
        }*/
    </script>
</body>
</html>
