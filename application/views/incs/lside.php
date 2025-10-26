<?php
if (!isset($_SESSION['loginStatus']) or !isset($_SESSION['email'])) {
	redirect('auth/logout', 'refresh');
}
