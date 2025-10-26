<?php
	//redirect('auth/lock_screen', 'refresh');
	//force login and lock screen code
	if(!isset($_SESSION['userid']) || !isset($_SESSION['loginStatus']) || !isset($_SESSION['last_activity']) ){
		redirect('auth/logout', 'refresh');
	}
	$time = $_SERVER['REQUEST_TIME'];
	$timeout_duration = 360;
	//using cookies
	$_COOKIE['last_activity'] =  $time;
	if (isset($_COOKIE['last_activity']) &&  ($time - $_COOKIE['last_activity']) > $timeout_duration) {
		redirect('auth/lock_screen', 'refresh');
	}
	//backup using Sessions
	if (isset($_SESSION['last_activity']) &&  ($time - $_SESSION['last_activity']) > $timeout_duration) {
		redirect('auth/lock_screen', 'refresh');
	}
	$_SESSION['last_activity'] = $_SERVER['REQUEST_TIME'];
	$_COOKIE['last_activity'] =  $_SERVER['REQUEST_TIME'];
?>
<div class="section-body  sticky-top" id="page_top">
    <div class="container-fluid">
        <?php if($this->session->flashdata('msg')) {?>
        <div class="alert alert-info font-14 font-weight-bold" role="alert" id="overall-alert">
            <?php 
				echo $this->session->flashdata('msg'); 
				unset($_SESSION['msg']);
				unset($_SESSION['__ci_vars']); 
			?>
        </div>
        <?php } ?>
        <div class="page-header">
            <div class="left">
                <div class="input-group">
                    <input type="text" readonly class="form-control text-center" style="font-weight: bold;"
                        value="<?php echo $_SESSION['schoolName']?>">
                </div>
            </div>
        </div>
    </div>
</div>