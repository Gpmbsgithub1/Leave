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
    <li><a href="<?php echo e(route('employee.home')); ?>" class="active"><i class="material-icons md-light">dashboard</i> Dashboard</a></li>

    <li><a href="<?php echo e(route('employee.leaves')); ?>"><i class="material-icons md-light">holiday_village</i> Leave Info</a></li>
    <li><a href="<?php echo e(route('employee.documents')); ?>"><i class="material-icons md-light">folder</i> Documents</a></li>
    <?php if(isset($grp)): ?>
    <li><a href="<?php echo e(route('employee.groups')); ?>"><i class="material-icons md-light">people</i> Groups</a></li>
    <?php endif; ?>
    <li><a href="<?php echo e(route('employee.holidays')); ?>" class="active"><i class="material-icons md-light">holiday_village</i> Holiday</a></li>
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
                                    <li><a href="<?php echo e(route('employee.holidays')); ?>" class="active"><i class="material-icons">folder</i> Holidays</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-10 pr-0 pl-0">
                            <div class="dash-right-wrap">
                                <div class="row">
                                    <div class="col-lg-4 col-xl-6 col-md-3">
                                        <h2 class="page-head">Uploaded Documents</h2>
                                    </div>
                                    <div class="col-lg-8 col-xl-6 col-md-9">

                                    </div>
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="responsive-block d-lg-none">
                                            <div class="row">
                                                <!-- item -->
                                                <div class="col-12 col-md-6">
                                                    <div class="card p-4">
                                                        <div class="dropdown dropleft">
                                                            <a class="btn p-0 dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="material-icons">more_vert</i>
                                                            </a>

                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                <a class="dropdown-item" href="#">View</a>
                                                                <a class="dropdown-item" href="#">Edit</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target=".bd-example-modal-sm">Delete</a>
                                                            </div>
                                                        </div>
                                                        <span><b>Document Name</b></span>
                                                        <span class="sub">Salary Slip</span>
                                                        <span><b>Emp ID</b></span>
                                                        <span class="sub">Sk003</span>
                                                        <span><b>Name</b></span>
                                                        <span class="sub">Krishnajith K</span>
                                                        <span><b>Description</b></span>
                                                        <span class="sub">Embed the icon font in your site and learn how to style your icons using CSS</span>

                                                    </div>
                                                </div>
                                                <!-- item -->
                                                <!-- item -->
                                                <div class="col-12 col-md-6">
                                                    <div class="card p-4">
                                                        <div class="dropdown dropleft">
                                                            <a class="btn p-0 dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="material-icons">more_vert</i>
                                                            </a>

                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                <a class="dropdown-item" href="#">View</a>
                                                                <a class="dropdown-item" href="#">Edit</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target=".bd-example-modal-sm">Delete</a>
                                                            </div>
                                                        </div>
                                                        <span><b>Document Name</b></span>
                                                        <span class="sub">Salary Slip</span>
                                                        <span><b>Emp ID</b></span>
                                                        <span class="sub">Sk003</span>
                                                        <span><b>Name</b></span>
                                                        <span class="sub">Krishnajith K</span>
                                                        <span><b>Description</b></span>
                                                        <span class="sub">Embed the icon font in your site and learn how to style your icons using CSS</span>

                                                    </div>
                                                </div>
                                                <!-- item -->
                                            </div>
                                        </div>
                                        <div class="table-list">

                                            <div class="card d-none d-lg-block">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>

                                                            <th scope="col">#</th>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Day</th>
                                                            <th scope="col">Holiday</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if($holiday->count()): ?>
                                                        <?php $__currentLoopData = $holiday; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $holidays): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>

                                                            <th scope="row"><?php echo e(++$i); ?></th>
                                                            <td><?php echo e($holidays->date); ?></td>
                                                            <td><?php echo e($holidays->day); ?></td>
                                                            <td><?php echo e($holidays->holiday); ?></td>
                                                        </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                        <tr>
                                                            <td class="empty-table" colspan="10">
                                                              <div class="empty-data">
                                                                  <img width="100" class="img-fluid mx-auto d-block pb-3" src="<?php echo e(asset('content/img/nothing.svg')); ?>" />
                                                                    <h5>Nothing to show at this time</h5>
                                                              </div>
                                                            </td>
                                                        </tr>
                                                        <?php endif; ?>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                        <?php echo $holiday->appends(request()->query())->links(); ?>

                                    </div>
                                </div>
                            </div>

                            <span class="powered">Copyright © <?php echo e(date('Y')); ?> Leave Tracker, All rights reserved. Powered by <a href="http://skiloratech.com/" target="_blank">Skilora Techologies</a></span>


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
<?php /**PATH C:\xampp\htdocs\leave-tracker\resources\views/employee/holidays.blade.php ENDPATH**/ ?>