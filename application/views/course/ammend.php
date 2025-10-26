<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $_SESSION['pageTitle']; ?></title>

    <link rel="icon" href="<?php echo base_url()?>assets/images/favicon.ico" type="image/x-icon" />


    <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet"
        href="<?php echo base_url()?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url()?>assets/plugins/datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url()?>assets/plugins/datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
        
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    

</head>

<body class="font-muli right_tb_toggle <?php echo " ".$_SESSION['theme_mode']; ?>">

    <div class="page-loader-wrapper">
        <div class="loader">
        </div>
    </div>
    <div id="main_content">
        <?php $this->load->view('incs/header');?>
        <?php //$this->load->view('incs/rside');?>
        <?php $this->load->view('incs/lside');?>

        <div class="page">

            <?php $this->load->view('incs/pageheader');?>

            <div class="section-body">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center ">
                        <div class="header-action">
                            <h1 class="page-title">Payments</h1>
                            <ol class="breadcrumb page-breadcrumb">
                                <li class="breadcrumb-item"><a href="#">FUBK-PORTAL</a></li>
                                <li class="breadcrumb-item"><a href="#">Course Registration</a></li>
                                <li class="breadcrumb-item"><a href="#">Add &amp; Drop</a></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            
            <div class="section-body mt-4">
                <div class="container-fluid">
                    <div class="tab-content">
                        <div class="tab-pane active" id="Library-all">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
										    <h4 class="text-center">
										        Add & drop Form 
										    </h4>
										</div>
										<div class="col-md-4">
										    <h4 class="text-primary text-center">
										        <span id="unitsRegistered">0 </span> out of 48 Units
										    </h4>
										</div>
										<hr>
									</div>
									<div class="row">
										<div class="col-md-4">
										    <div class="form-group">
										        <div class="label">Select Faculty:</div>
												<div> 
												    <select name="faculty" id="faculty" class="form-control">
												        <option selected disabled>-[Select Faculty]-</option>
												        <?php 
												            foreach($faculty as $row){ 
												                echo "<option value='".$row->id."'>".$row->division_name."</option>";
												            }
												        ?>
												    </select>
												</div>
											</div>
										</div>
										<div class="col-md-4">
										    <div class="form-group">
										        <div class="label">Select Department:</div>
												<div> 
												    <select name="dept" id="dept" class="form-control"><option selected disabled>-[Select Department]-</option> </select>
												</div>
											</div>
										</div>
										<div class="col-md-2 col-sm-6">
										    <div class="form-group">
										        <div class="label">Select Level:</div>
												<div> 
												    <select name="level" id="level" class="form-control">
												        <option selected disabled>-[Select Level]-</option>
												    </select>
												</div>
											</div>
										</div>
										<div class="col-md-2 col-sm-6">
										    <div class="form-group">
										        <div class="label">Select Semester:</div>
												<div> 
												    <select name="semester" id="semester" class="form-control">
												        <option selected disabled>-[Select Semester]-</option>
												    </select>
												</div>
											</div>
										</div>
										<div class="col-md-10">
										    <div class="form-group">
										        <div class="label">Select Course:</div>
												<div> 
												    <select name="course" id="course" class="form-control"><option selected disabled>-[Select Course]-</option> </select>
												</div>
											</div>
										</div>
										<div class="col-md-2">
										    <div class="form-group">
										        <div class="label">&nbsp;</div>
												<div> 
												    <input type="submit" name="submit" id="submit" class="form-control btn btn-success" value="Add Course">
												</div>
											</div>
										</div>
										<div class"col-12"><hr></div>
										<div class="col-12 text-center text-danger font-weight-bold" id="errorMsg"></div>
										<div class"col-12"><hr></div>
									</div>
									
									<hr>
                                    <div class="col-12">
                                        <br>
                                        <table class="table" style="color:#000">
                                            <tr style="color:#000">
                                                <th style="color:#000; font-weight:bolder">#</th>
                                                <th style="color:#000; font-weight:bolder">Code</th>
                                                <th style="color:#000; font-weight:bolder">Course Title</th>
                                                <th style="color:#000; font-weight:bolder;text-align: center;">Units</th>
                                                <th style="color:#000; font-weight:bolder">Semester</th>
                                                <th style="color:#000; font-weight:bolder">Type</th>
                                            </tr>

                                            <?php
                                            $i = 1;
                                            $total = 0;
                                            foreach ($courses as $row) {
                                                $total += $row->credit_unit;
                                            ?>
                                                <tr>
                                                    <td style="vertical-align: center;"><?php echo $i++; ?></td>
                                                    <td><?php echo $row->course_code ?></td>
                                                    <td><?php echo $row->course_title; ?></td>
                                                    <td style="text-align: center;">
                                                        <?php echo $row->credit_unit ?>
                                                    </td>
                                                    <td><?php echo $row->value ?></td>
                                                    <td><?php echo isset($row->type) ? $row->type : "N/A"; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <th colspan="3" class="text-right" style="color:#000">Total Credit Units Registered</th>
                                                <th style="font-weight:bolder; color:#000; text-align:center" id="totalRegistered"><?php echo $total; ?></th>
                                                <th colspan="2">&nbsp;</th>
                                            </tr>
                                        </table>
                                    </div>
									
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <?php $this->load->view('incs/footer');?>
        </div>
    </div>
    
   
    <script src="<?php echo base_url()?>assets/bundles/lib.vendor.bundle.js"
        type="60cf6dc1a00fc0dbf92d681a-text/javascript"></script>

    <script src="<?php echo base_url()?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"
        type="60cf6dc1a00fc0dbf92d681a-text/javascript"></script>
    <script src="<?php echo base_url()?>assets/bundles/dataTables.bundle.js"
        type="60cf6dc1a00fc0dbf92d681a-text/javascript"></script>
    <script src="<?php echo base_url()?>assets/plugins/sweetalert/sweetalert.min.js"
        type="60cf6dc1a00fc0dbf92d681a-text/javascript">
    </script>

    <script src="<?php echo base_url()?>assets/js/core.js" type="60cf6dc1a00fc0dbf92d681a-text/javascript"></script>
    <script src="<?php echo base_url()?>assets/js/page/dialogs.js" type="60cf6dc1a00fc0dbf92d681a-text/javascript">
    </script>
    <script src="<?php echo base_url()?>assets/js/table/datatable.js" type="60cf6dc1a00fc0dbf92d681a-text/javascript">
    </script>
    <script src="<?php echo base_url()?>assets/js/rocket-loader.min.js" data-cf-settings="60cf6dc1a00fc0dbf92d681a-|49" defer=""></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type='text/javascript'>
        $(document).ready(function(){
            var numCourses = 0;
            
            $('#dept').empty();
            $('#level').empty();
            $('#semester').empty();
            $('#course').empty();
            $('#submit').prop('disabled', true);
            $('#errorMsg').text('');
            
            $('#faculty').change(function(){
                var faculty = $(this).val();
                $('#dept').empty().append('<option selected disabled>Please Wait...</option>');
                $('#level').empty();
                $('#semester').empty();
                $('#course').empty();
                $.ajax({
                    url:'<?php echo site_url('course/getDepartmentByFaculty')?>',
                    method: 'post',
                    data: {faculty: faculty},
                    dataType: 'json',
                    success: function(response){
                        $('#dept').empty().append('<option selected disabled>-[Select Department]-</option>');
                        $.each(response, function(index, item) {
                            $('#dept').append('<option value="'+item['id']+'">'+item['dept_name']+'</option>');
                        });
                   
                    }
                });
            });
            
            $('#dept').change(function(){
                $('#level').empty().append('<option selected disabled>Please Wait...</option>');
                $('#semester').empty();
                $('#course').empty();
                $('#level').empty().append('<option selected disabled>-[Select Level]-</option>');
                for(i=100; i<=600; i+=100){
                    $('#level').append('<option>'+i+'</option>');
                }
            });
            
            $('#level').change(function(){
                $('#semester').empty().append('<option selected disabled>Please Wait...</option>');
                $('#course').empty();
                $('#semester').empty().append('<option selected disabled>-[Select Semester]-</option>');
                $('#semester').append('<option <?php echo ($_SESSION["active_semester_value"]== "First") ? "" : "disabled"; ?>>First</option>');
                $('#semester').append('<option <?php echo ($_SESSION["active_semester_value"]== "Second") ? "" : "disabled"; ?>>Second</option>');
            });
            
            $('#semester').change(function(){
                var deptid = $('#dept').val();
                var level = $('#level').val();
                var semester = $('#semester').val();
                numCourses = 0;
                $('#errorMsg').text('');
                $('#course').empty().append('<option selected disabled>Please Wait...</option>');
                $.ajax({
                    url:'<?php echo site_url('course/getCoursesByFilter')?>',
                    method: 'post',
                    data: {deptid: deptid, level: level, semester: semester},
                    dataType: 'json',
                    success: function(response){
                        numCourses = response.length;
                        $('#course').empty().append('<option selected disabled>-[Select Course]-</option>');
                        if(response == ""){
                            $('#course').empty().append('<option selected disabled>No course with selected options found</option>');
                        }else{
                            
                            
                            $.each(response, function(index, item) {
                                var msg = item['course_code']+"&nbsp; - &nbsp;"+item['course_title']+"&nbsp; - &nbsp;"+item['credit_unit']+" unit(s)";
                                $('#course').append('<option value="'+item['id']+","+item['credit_unit']+'">'+msg+'</option>');
                            });
                        }
                        if(numCourses > 0){
                            $('#submit').prop('disabled', false);
                        }
                    }
                    
                });
            });
            
            $('#unitsRegistered').empty().text($('#totalRegistered').text());
            
            $('#submit').click(function(){
                $('#errorMsg').text('');
                var courseSelected = $('#course').val().split(",");
                var courseid = courseSelected[0];
                var units = courseSelected[1];
                var total = parseInt(units) + parseInt($('#totalRegistered').text());
                if(total > 48){
                    $('#errorMsg').text('Sorry, you cannot register more than 48 Units. Please select a course with lower credit units and try again');
                }else{
                    $.ajax({
                    url:'<?php echo site_url('course/addSingleCourse')?>',
                    method: 'get',
                    data: {courseid: courseid},
                    dataType: 'json',
                    success: function(response){
                        console.log(response)
                        $('#errorMsg').text('Course Registered Successfully');
                    }
                    
                });
                }
            });
            
        });
    </script>
</body>

</html>
