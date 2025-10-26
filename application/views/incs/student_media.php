<p class="text-muted">
    <div class="text-center badge badge-info" style="width: 100%;">
        <?php echo $_SESSION['admin_student_pnumber']; ?>
    </div>
    <div class="text-center badge badge-info" style="width: 100%;">
        <?php echo $_SESSION['admin_student_name']; ?>
    </div>
    <ul class="list-group">
        <li class="list-group-item">
            <img src="<?php echo base_url('assets/images/'.$_SESSION['admin_student_passport']);?>" style="width:280px; margin:auto " /> 
        </li>
    </ul>
</p>