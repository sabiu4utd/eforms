<ul class="list-group list-group-horizontal mx-auto">
    <li class="list-group-item">
        <a href="<?php echo site_url('registration/admin_view/' . md5(time()) . '/' . $student_id . '/' . md5(rand())) ?>">Student Home</a>
    </li>
    <li class="list-group-item">
        <a href="<?php echo site_url('registration/admin_payments/' . md5(time()) . '/' . $student_id . '/' . md5(rand())) ?>">Payments</a>
    </li>
    <li class="list-group-item">
        <a href="<?php echo site_url('registration/admin_bio/' . md5(time()) . '/' . $student_id . '/' . md5(rand())) ?>">Biodata</a>
    </li>
    <li class="list-group-item">
        <a href="<?php echo site_url('registration/admin_creg/' . md5(time()) . '/' . $student_id . '/' . md5(rand())) ?>">Courses</a>
    </li>
    <li class="list-group-item">
        <a href="<?php echo site_url('registration/admin_resultSummary/' . md5(time()) . '/' . $student_id . '/' . md5(rand())) ?>">Results</a>
    </li>
    <li class="list-group-item">
        <a href="<?php echo site_url('registration/admin_exams_card/' . md5(time()) . '/' . $student_id . '/' . md5(rand())) ?>">Exams Card</a>
    </li>
    <li class="list-group-item">
        <a target="_blank" href="<?php echo site_url('registration/admin_idcard/' . md5(time()) . '/' . $student_id . '/' . md5(rand())) ?>">ID Card</a>
    </li>
    <li class="list-group-item">
        <a href="#" onclick='alert("This Feature is Coming Soon")'>Accomodation <i class="fa fa-times text-danger"></i></a>
    </li>
    <li class="list-group-item">
        <a href="#" onclick='alert("This Feature is Coming Soon")'>Course Evaluation <i class="fa fa-times text-danger"></i></a>
    </li>
    <li class="list-group-item">
        <a href="#" onclick='alert("This Feature is Coming Soon")'>Other Forms <i class="fa fa-times text-danger"></i></a>
    </li>
</ul>