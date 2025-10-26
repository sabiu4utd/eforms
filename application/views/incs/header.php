<style>
    .fa-lock {
        font-size: 0.45rem;
    }
</style>
<div id="header_top" class="header_top">
    <div class="container">
        <div class="hleft">
            <a class="header-brand" href="<?php echo site_url($_SESSION['home_url']) ?>" data-toggle="tooltip" data-placement="right" title="Go Home">
                <img src="<?php echo base_url('assets/images/fubk-icon.png') ?>" />
            </a>
            <a href="<?php echo site_url($_SESSION['home_url']) ?>" data-toggle="tooltip" data-placement="right" title="Go Home" class="nav-link icon theme_btn">
                <i class="fa fa-home"></i>
            </a>
            <div class="dropdown">
                <a href="<?php echo site_url('auth/change_theme/' . $this->router->fetch_class() . '/' . $this->router->fetch_method()); ?>" class="nav-link icon theme_btn" data-toggle="tooltip" data-placement="right" title="Change Theme">
                    <i class="fa fa-feather"></i>
                </a>
            </div>
        </div>
        <div class="hright">
            <a href="<?php echo site_url('auth/resspswd') ?>" class="nav-link icon" data-toggle="tooltip" data-placement="right" title="Reset Password">
            <i class="fa fa-undo"></i>
            </a>
            <a href="<?php echo site_url('auth/logout') ?>" class="nav-link icon" data-toggle="tooltip" data-placement="right" title="Logout"><i class="fa fa-power-off"></i></a>
        </div>
    </div>
</div>