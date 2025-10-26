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
  <form method="post" action="<?php echo site_url('auth/authenticate'); ?>" autocomplete="off">
    <div class="auth option2">
      <div class="auth_left" style="width:550px;">
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
            <div class="alert alert-warning text-center" style="font-weight: bold">PUTME (UTME &amp; DE) Registration starts on<br/>Wed, 2nd Oct, 2024 </div>
            <div class="card">
              <div class="card-title pt-4 text-center">
                Let's get you back into your account
              </div>
              <div class="card-body pt-0">
              <div class="form-group">
                  <input type="email" class="form-control text-center" placeholder="Enter your username (usually your email)" required
                          name="email" autocomplete="off" >
              </div>
              <div class="form-group">
                  <input type="password" class="form-control text-center"  id="exampleInputPassword1" placeholder="Enter your password" required name="password" autocomplete="off">
                  <input type="hidden" id="g-token" name="g-token">
              </div>
              <div class="text-center">
                    <button class="btn btn-primary btn-block" type="submit">Sign in securely</button>
                    <div class="text-muted mt-4">Your 1<sup>st</sup> time here? <a href="<?php echo site_url('auth/register') ?>">Create an Account</a></div>
                  <div class="text-muted mt-4"><hr></div>
                  <div class="text-muted mt-1">Forgot Password? <a href="<?php echo site_url('auth/reset') ?>">Reset here</a></div>
                  <div class="text-muted mt-1"><a href="application/views/SCREENING PROCEDURE.pdf">PUTME Screening Procedure</a></div>
                  <div class="text-muted mt-1"><a href="application/views/requirement.pdf">Postgraduate Admission Requirement</a></div>
                  <div class="text-muted mt-1">For enquiry email us @ <span style='color:red'>mis@fubk.edu.ng </span> </div>
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