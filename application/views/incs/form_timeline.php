<?php
$activeForm = $_SESSION['activeForm'];

if (!$activeForm) {
    redirect('applicant/', 'refresh');
}
if (!isset($_SESSION['userid'])) {
    redirect('auth/logout', 'refresh');
}
?>

<div class="col-12 card  mx-auto">
    <ul id="breadcrumb" class="mx-auto" style="overflow-y: auto; width: 100%; margin: auto; display: flex; justify-content: center; align-items: center; align-content: center; margin-bottom: 0px; padding-bottom: 20px; padding-left: 200px;">
        <li class="greenbg">
            <a href="<?php echo site_url($_SESSION['home_url']) ?>">
                <i class="fa fa-home"> </i> Home
            </a>
        </li>
        <li class="<?php echo $activeForm->payment_status ? 'greenbg' : 'redbg' ?>">
            <a href="<?php echo site_url('applicant/payment/' . $activeForm->order_hash) ?>">
                <span>
                    <i class="fa fa-dollar"></i> Payment
                    <i class="fa fa-<?php echo $activeForm->payment_status ? 'check green' : 'times red' ?>"></i>
                </span>
            </a>
        </li>
        <li class="<?php echo $activeForm->bio_status ? 'greenbg' : 'redbg' ?>">
            <a href="<?php echo site_url('applicant/bio/' . $activeForm->order_hash) ?>">
            <span>
                <i class="fa fa-user"></i> Bio Data
                <i class="fa fa-<?php echo $activeForm->bio_status ? 'check green' : 'times red' ?>"></i></span>
            </a>
        </li>
        <li class="<?php echo $activeForm->nin_verified ? 'greenbg' : 'redbg' ?>">
            <a href="<?php echo site_url('applicant/nin/' . $activeForm->order_hash) ?>">
            <span>
                <i class="fa fa-shield"></i> Verify NIN
                <i class="fa fa-<?php echo $activeForm->nin_verified ? 'check green' : 'times red' ?>"></i></span>
            </a>
        </li>
        <li class="<?php echo $activeForm->olevel_status ? 'greenbg' : 'redbg' ?>">
            <a href="<?php echo site_url('applicant/olevel/' . $activeForm->order_hash) ?>"><span>
                <i class="fa fa-graduation-cap"></i> O'Level
                <i class="fa fa-<?php echo $activeForm->olevel_status ? 'check green' : 'times red' ?>"></i></span>
            </a>
        </li>
        <?php if($activeForm->form_id == 1){?> 
        <li class="<?php echo $activeForm->alevel_status ? 'greenbg' : 'redbg' ?>">
            <a href="<?php echo site_url('applicant/alevel/' . $activeForm->order_hash) ?>">
                <i class="fa fa-user-graduate"></i> A'Level
                <i class="fa fa-<?php echo $activeForm->alevel_status ? 'check green' : 'times red' ?>"></i>
            </a>
        </li>
        <?php } ?>
        <li class="<?php echo $activeForm->upload_status ? 'greenbg' : 'redbg' ?>">
            <a href="<?php echo site_url('applicant/uploads/' . $activeForm->order_hash) ?>">
                <i class="fa fa-upload"></i> Uploads
                <i class="fa fa-<?php echo $activeForm->upload_status ? 'check green' : 'times red' ?>"></i>
            </a>
        </li> 
        <?php if($activeForm->form_id == 1){?> 
        <li class="<?php echo $activeForm->referee_status ? 'greenbg' : 'redbg' ?>">
            <a href="<?php echo site_url('applicant/referees/' . $activeForm->order_hash) ?>">
                <i class="fa fa-user-tie"></i> Referees
                <i class="fa fa-<?php echo $activeForm->referee_status ? 'check green' : 'times red' ?>"></i>
            </a>
        </li>
           <?php } ?>
        <li>
            <a href="<?php echo site_url('applicant/submit/' . $activeForm->order_hash) ?>">
                <i class="fa fa-hourglass-end"> </i> Finish &amp; Submit
                <i class="fa fa-<?php echo $activeForm->app_status ? 'check green' : 'times red' ?>"></i>
            </a>
        </li>
    </ul>


    <div class="row ml-4 ml-4 mb-2" style="font-weight: 900;">
        <div class="col-md-3 bold">
            <i class="fa fa-graduation-cap px-3"></i><?php echo trim($activeForm->prog_abbr); ?>
        </div>
        <div class="col-md-3 bold">
            <i class="fa fa-filter px-3"></i> <?php echo trim($activeForm->form_type); ?>
        </div>
        <div class="col-md-3 bold">
            <i class="fa fa-chalkboard px-3"></i>Dept of <?php echo trim($activeForm->department); ?>
        </div>
        <div class="col-md-3 bold">
            <i class="fa fa-school px-3"></i>Faculty/School of <?php echo $activeForm->faculty; ?>
        </div>
    </div>
</div>