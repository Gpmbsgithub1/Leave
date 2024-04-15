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
        <a href="<?php echo e(route('hr.home')); ?>" class="logo">
        <h1><?php echo e(auth()->user()->company); ?></h1>
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
    <a class="dropdown-item" href="<?php echo e(route('hr.change_password')); ?>">Change Password</a>
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
    <li><a href="<?php echo e(route('hr.home')); ?>"><i class="material-icons md-light">dashboard</i> Dashboard</a></li>
    <li><a href="<?php echo e(route('hr.employees')); ?>" ><i class="material-icons md-light">person</i> Employee</a></li>
    <li><a href="<?php echo e(route('hr.groups')); ?>" class="active"><i class="material-icons md-light">people</i> Groups</a></li>
    <li><a href="<?php echo e(route('hr.leave_requests')); ?>"><i class="material-icons md-light">holiday_village</i> Leave Request</a></li>
    <li><a href="<?php echo e(route('hr.documents')); ?>"><i class="material-icons md-light">folder</i> Document</a></li>
    <li><a href="<?php echo e(route('hr.salary')); ?>"><i class="material-icons md-light">account_balance_wallet</i> Employee Salary</a></li>
    <li><a href="<?php echo e(route('hr.awards')); ?>"><i class="material-icons md-light">star</i> Awards</a></li>
    <li><a href="<?php echo e(route('hr.expense')); ?>"><i class="material-icons md-light">account_balance_wallet</i> Expense</a></li>
    <li><a href="<?php echo e(route('hr.holiday')); ?>"><i class="material-icons md-light">holiday_village</i> Holiday</a></li>
  </ul>
</div>
<div class="zeynep">
                <ul>
    <li><a class="top_menuactive" href="<?php echo e(route('hr.home')); ?>"><i class="material-icons md-light">dashboard</i>Dashboard</a></li>



<li class="has-submenu">
          <a href="<?php echo e(route('hr.employees')); ?>" data-submenu="stores"><i class="material-icons md-light">person</i>Employee</a>

          <div id="stores" class="submenu">
            <div class="submenu-header" data-submenu-close="stores">
              <a href="#">Back</a>
            </div>

            <ul>
              <li>
                <a href="<?php echo e(route('hr.create_employee')); ?>"><span class="plus-icon"></span> Create Employee</a></a>
              </li>
               <li> <a href="<?php echo e(route('hr.employees')); ?>" class="active">Employees</a>   </li>
               <li> <a href="<?php echo e(route('hr.inactive_employees')); ?>" class="active">Inactive Employees</a>   </li>
            </ul>
          </div>
        </li>
         <li class="has-submenu">
          <a href="<?php echo e(route('hr.groups')); ?>" data-submenu="stores1"><i class="material-icons md-light">people</i>Groups</a>

          <div id="stores1" class="submenu">
            <div class="submenu-header" data-submenu-close="stores1">
              <a href="#">Back</a>
            </div>

            <ul>
               <li>
                <a href="<?php echo e(route('hr.create_group')); ?>">Create Group</a></a>
              </li>

              <li>
                <a href="<?php echo e(route('hr.groups')); ?>">Groups</a>
              </li>

             
            </ul>
          </div>
        </li>
<li><a href="data-bank.html"><i class="material-icons md-light">holiday_village</i>Leave Request</a></li>   
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
          <li><a href="<?php echo e(route('hr.create_group')); ?>"><i class="material-icons">add_circle</i> Create Group</a></li>
             <li><a href="<?php echo e(route('hr.groups')); ?>" class="active"><i class="material-icons">people</i> Groups</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-10 pr-0 pl-0">
        <div class="dash-right-wrap">
        <div class="row">
          <div class="col-lg-4 col-xl-6 col-md-3">
            <h2 class="page-head">Groups</h2>
          </div>
          <div class="col-lg-8 col-xl-6 col-md-9">
            
          </div>
          <div class="col-lg-12 col-xl-12">
           <div class="row">
            <?php if($grp->count()): ?>
            <?php $__currentLoopData = $grp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $grps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- item -->
             <div class="col-xl-4 col-md-6 col-lg-6">
              
               <div class="card p-4">
                <div class="dropdown dropleft">
  <a class="btn p-0 dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="material-icons">more_vert</i>
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="<?php echo e(route('hr.group_members', $grps->id)); ?>">View</a>
    <a class="dropdown-item" href="<?php echo e(route('hr.edit_group', $grps->id)); ?>">Edit</a>
    <a class="dropdown-item" href="#" data-toggle="modal" data-target=".bd-example-modal-sm-<?php echo e($grps->id); ?>">Delete</a>
  </div>
</div>
                <span><i class="material-icons icon">supervised_user_circle</i><b><?php echo e($grp[$k]->members); ?> Members</b></span>
                 <a href="<?php echo e(route('hr.group_members', $grps->id)); ?>"><h6><?php echo e($grps->group_name); ?></h6> </a>
                 <ul class="pl-0 mb-0">
                   <li><span><i class="material-icons">watch_later</i> <?php echo e(date('d-m-y', strtotime($grps->created_at))); ?></span></li>
                   <li><span><i class="material-icons">settings</i> <?php echo e(@$grp[$k]->user->name); ?></span></li>
                 </ul>
               </div>
            
             </div>
<!-- item -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
  <tr style="background: #fff !important;">
    <td colspan="10">
  <div class="empty-data">
    <img width="100" class="img-fluid mx-auto d-block pb-3" src="<?php echo e(asset('content/img/nothing.svg')); ?>" />
    <h5>Nothing to show at this time</h5>
  </div>
</td>
  </tr>
<?php endif; ?>
           </div>
            
         </div>      
        </div>
        </div>

<span class="powered">Copyright © 2021 Leave Tracker, All rights reserved. Powered by <a href="http://skiloratech.com/" target="_blank">Skilora Technologies</a></span>

        
      </div>
    </div>
  </div>
</div>
<!-- delete modal -->
<?php $__currentLoopData = $grp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $grps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade bd-example-modal-sm-<?php echo e($grps->id); ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content p-4">
     <i class="material-icons md-light red">person_off</i>
     <span class="content">Do you really want to delete?</span>
      <div class="button-holder">
                
             <button type="submit" class="btn btn-cancel mt-4 fils mr-3" data-dismiss="modal"><span>Cancel</span></button>
             <a href="<?php echo e(route('hr.delete_group', $grps->id)); ?>" class="btn btn-default mt-4 filz "><span>Delete</span></a>
           </div>
    </div>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!-- delete modal -->
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
    $('input:checkbox').change(function(){
    if($(this).is(":checked")) {
        $('.action-pannel').addClass("active");
    } else {
        $('.action-pannel').removeClass("active");
    }
});
  </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\leave-tracker\resources\views/hr/groups.blade.php ENDPATH**/ ?>