<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Leave Tracker</title>
    <!-- CSS -->
     <link rel="icon" href="<?php echo e(asset('content/img/fav.png')); ?>" type="image/gif" sizes="32x32">
    <link rel="stylesheet" href="<?php echo e(asset('content/css/bootstrap.min.css')); ?>" type="text/css">
     <link href="<?php echo e(asset('content/css/latofont.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('content/css/_lv_automation.css')); ?>" type=" text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="stylesheet" href="<?php echo e(asset('content/css/mobile-nav.css')); ?>" type=" text/css">
     <link rel="stylesheet" href="<?php echo e(asset('content/css/custom-select.css')); ?>" type=" text/css">
     <link rel="stylesheet" href="<?php echo e(asset('content/css/datepicker.css')); ?>" type=" text/css">
     <style type="text/css">
       .user-name{
        color: white;
       }
       ul.ldates{
           padding-inline-start: 0px;
       }
     </style>
</head>
<body class="grey-bg">
    <div id="preloader">
        <div class="loader">
         <img width="30" class="img-fluid d-block mx-auto mt-2" src="<?php echo e(asset('content/img/loader.svg')); ?>" />
        </div>
        </div>
  <!-- hyrbee -->
<div class="lv-automation">
  <div class="dashboard">
<header>
  <div class="top-nav gradient-bg">
    <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-8">
        <div class="menu btn-open d-lg-none">
          <i class="material-icons">menu</i></div>
        <a href="<?php echo e(route('employee.home')); ?>" class="logo">
        <h1><?php echo e($company->company_name); ?></h1>
      </a>
      </div>
    
      <div class="col-lg-6 col-4">
        <ul class="top-right-nav float-right mb-0">
      
          <li class="nav-item dropdown show user-info">
  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="user-name"><?php echo e(auth()->user()->name); ?></span>
   <span class="user-icon">
   <i class="material-icons md-light">account_circle</i>
   </span>
  </a>

  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="<?php echo e(route('employee.profile')); ?>">Profile</a>
    <a class="dropdown-item" href="<?php echo e(route('employee.change_password')); ?>">Change Password</a>
    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                            <span class="sign-out-icon"></span>Sign Out
                                        </a>
                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                                <?php echo csrf_field(); ?>
                                            </form>
  </div>

          </li>
        </ul>
      </div>
    </div>
    </div>
  </div>
<div class="main-navigation d-lg-block d-none">
  <ul class="mb-0">
    <li><a href="<?php echo e(route('employee.home')); ?>"><i class="material-icons md-light">dashboard</i> Dashboard</a></li>

    <li><a href="<?php echo e(route('employee.leaves')); ?>" class="active"><i class="material-icons md-light">holiday_village</i> Leave Info</a></li>
    <li><a href="<?php echo e(route('employee.documents')); ?>"><i class="material-icons md-light">folder</i> Documents</a></li>
    <?php if(isset($grp)): ?>
    <li><a href="<?php echo e(route('employee.groups')); ?>"><i class="material-icons md-light">people</i> Groups</a></li>
    <?php endif; ?>
    <li><a href="<?php echo e(route('employee.holidays')); ?>"><i class="material-icons md-light">holiday_village</i> Holiday</a></li>
  </ul>
</div>
<div class="zeynep">
                <ul>
    <li><a class="top_menuactive" href="<?php echo e(route('employee.home')); ?>"><i class="material-icons md-light">dashboard</i>Dashboard</a></li>



         <li class="has-submenu">
          <a href="#" data-submenu="stores1"><i class="material-icons md-light">holiday_village</i>Leave Request</a>

          <div id="stores1" class="submenu">
            <div class="submenu-header" data-submenu-close="stores1">
              <a href="#">Back</a>
            </div>

            <ul>
               <li>
                <a href="plan-creation.html">Request Leave</a></a>
              </li>

              <li>
                <a href="manage-plan.html">Applied</a>
              </li>
<li>
                <a href="manage-plan.html">Approved</a>
              </li>
             <li>
                <a href="manage-plan.html">Rejected</a>
              </li>
            </ul>
          </div>
        </li>  
                </ul>
            </div>
            <div class="zeynep-overlay"></div>


</header>

<div class="main-wrap">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="side-bar d-lg-block d-none">
                          <ul>
                            <li><a href="<?php echo e(route('employee.request_leave')); ?>" class="active"><i class="material-icons">add_circle</i> Request Leave</a></li>
                             <li><a href="<?php echo e(route('employee.leaves')); ?>"><i class="material-icons">person</i> Applied</a></li>
                             <li><a href="<?php echo e(route('employee.approved_leaves')); ?>"><i class="material-icons">thumb_up</i> Approved</a></li>
                             <li><a href="<?php echo e(route('employee.rejected_leaves')); ?>"><i class="material-icons">thumb_down</i> Rejected</a></li>
                          </ul>
                            </div>
                        </div>
                        <div class="col-lg-10 pr-0 pl-0">
                            <div class="dash-right-wrap">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card p-4 mt-2">
                                            <?php if($leave->leave_type=='medical_leave'): ?>
                                                <h4>Medical Leave</h4>
                                            <?php elseif($leave->leave_type=='paternity_leave'): ?>
                                                <h4>Paternity Leave</h4>
                                            <?php elseif($leave->leave_type=='maternity_leave'): ?>
                                                <h4>Maternity Leave</h4>
                                            <?php elseif($leave->leave_type=='bereavement_leave'): ?>
                                                <h4>Bereavement Leave</h4>
                                            <?php elseif($leave->leave_type=='comp_off'): ?>
                                                <h4>Comp Off Leave</h4>
                                            <?php elseif($leave->leave_type=='casual_leave'): ?>
                                                <h4>Casual Leave</h4>
                                            <?php elseif($leave->leave_type=='loss_of_pay'): ?>
                                                <h4>Loss of Pay</h4>
                                            <?php elseif($leave->leave_type=='half_day'): ?>
                                                <h4>Half Day Leave</h4>
                                            <?php endif; ?>
                                            <p><?php echo e(@$leave->leave_reason); ?></p>
                                            <ul class="ldates">
                                            <li><span>Date(s):</span></li>
                                                <?php $__currentLoopData = $start; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $starts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><?php echo e(date('M d Y', strtotime($start[$k]))); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                            <?php if(isset($file->path)): ?>
                                            <embed src="<?php echo e(asset('leave_files')); ?>/<?php echo e(@$file->path); ?>" height="2100px" />
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                </div>
                            </div>



                            <span class="powered">Copyright © <?php echo e(date('Y')); ?> Leave Tracker, All rights reserved. Powered by <a href="http://skiloratech.com/" target="_blank">Skilora Technologies</a></span>

                        </div>
                    </div>
                </div>
            </div>


<?php if($message = Session::get('success')): ?>
<div class="success-message">
  <i class="material-icons md-light green">done</i>
  <span><?php echo e($message); ?></span>
</div>
<?php endif; ?>


  </div>
</div>
  <!-- hyrbee end-->
<footer>
            
</footer>

<!-- jQuery plugins -->
<script src="<?php echo e(asset('scripts/jquery-2.1.4.min.js')); ?>"></script>
<script src="<?php echo e(asset('scripts/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('scripts/bootstrap.min.js')); ?>"></script> 
<script src="<?php echo e(asset('scripts/jquery.zeynep.min.js')); ?>"></script>
<script src="<?php echo e(asset('scripts/jquery.nice-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('scripts/fastclick.js')); ?>"></script>
<script src="<?php echo e(asset('scripts/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('scripts/bootstrap-datetimepicker.min.js')); ?>"></script>
 <script>
      jQuery(document).ready(function($) {  
      $(window).load(function(){
      $('#preloader').fadeOut('slow',function(){$(this).remove();});
      });
      });
      </script>  
 <script type="text/javascript">
    $(".eye-icon").click(function() {
      $(this).toggleClass("slash")
      $(".eye-slash-icon").addClass("active")

      var x = document.getElementById("password");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
});
    $(".eye-slash-icon").click(function() {
 $(this).removeClass("active")
 $(".eye-icon").removeClass("slash")
 var x = document.getElementById("password");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      });
  </script>
  <script>
        $(function() {
            // init zeynepjs
            var zeynep = $('.zeynep').zeynep({
                onClosed: function() {
                    // enable main wrapper element clicks on any its children element
                    $("body main").attr("style", "");

                    console.log('the side menu is closed.');
                },
                onOpened: function() {
                    // disable main wrapper element clicks on any its children element
                    $("body main").attr("style", "pointer-events: none;");

                    console.log('the side menu is opened.');
                }
            });

            // handle zeynep overlay click
            $(".zeynep-overlay").click(function() {
                zeynep.close();
            });

            // open side menu if the button is clicked
            $(".btn-open").click(function() {
                if ($("html").hasClass("zeynep-opened")) {
                    zeynep.close();
                } else {
                    zeynep.open();
                }
            });
        });
    </script>
      <script>
    $(document).ready(function() {
      $('select.custom:not(.ignore)').niceSelect();      
      FastClick.attach(document.body);
    });    
  </script>
  <script>
  $('#datetimepicker').datetimepicker({
    defaultDate: new Date(),
    format: 'DD/MM/YYYY',
    sideBySide: true
});
  $('#datetimepicker1').datetimepicker({
    defaultDate: new Date(),
    format: 'DD/MM/YYYY',
    sideBySide: true
});
</script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\leave-tracker\resources\views/employee/view_leave_document.blade.php ENDPATH**/ ?>