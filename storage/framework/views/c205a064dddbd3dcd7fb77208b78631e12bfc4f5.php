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
    <li><a href="<?php echo e(route('employee.home')); ?>" class="active"><i class="material-icons md-light">dashboard</i> Dashboard</a></li>

    <li><a href="<?php echo e(route('employee.leaves')); ?>"><i class="material-icons md-light">holiday_village</i> Leave Info</a></li>
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
                      
                        <div class="col-lg-12 pr-0 pl-0">
                            <div class="dash-right-wrap main-dash">
                                <div class="row">
                                    <div class="col-lg-6 col-md-4">
                                        <h2 class="page-head  pb-0">Welcome, <?php echo e($user->name); ?></h2>
                                        <span class="mb-3 d-block"><?php echo e($day); ?>, <?php echo e(date('d M Y')); ?></span>
                                    </div>
                                    <div class="col-lg-3 col-md-4">
                                       <ul class="pl-0">
                                        <li><span class="title">Emp ID :</span>
                                            <span class="text"><?php echo e($user->employee_id); ?></span>
                                        </li>
                                        <li>
                                                            <span class="title">Date of Join :</span>
                                                            <span class="text"><?php echo e(date('d M Y', strtotime($user->joining_date))); ?></span>

                                                        </li>
                                                        <li>
                                                            <span class="title">Working Period :</span>
                                                            <span class="text"><?php echo e($time_at_company); ?></span>
                                                          
                                                        </li>
                                       </ul>

                                    </div>
                                     <div class="col-lg-3 col-md-4">
                                       <ul class="pl-0">
                                        <li>
 <span class="title">Designation :</span>
                                                            <span class="text"><?php echo e($user->designation); ?></span>
                                                        </li>
                                                        <li>
 <span class="title">Line Manager :</span>
                                                          <?php if(isset($g)): ?>
                                                            <span class="text"><?php echo e(@$gm->name); ?></span>
                                                          <?php elseif(isset($grp)): ?>
                                                            <span class="text"><?php echo e(@$hr->name); ?></span>
                                                          <?php elseif($user->groups==0): ?>
                                                            <span class="text"><?php echo e(@$hr->name); ?></span>
                                                          <?php endif; ?>
                                                        </li>
                                       </ul>

                                    </div>
<div class="col-lg-7">
    <h2 class="page-head mt-4">Leave Details (<?php echo e(date('Y')); ?>)</h2>
    <div class="table-responsive">
    <table class="table table-hover mb-0">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Total</th>
      <th scope="col">Utilized</th>
      <th scope="col">Remaining</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Casual Leaves</th>
        <td><?php echo e($tcas); ?></td>
     <td><?php echo e($casu); ?></td>
      <td><?php echo e($rem); ?></td>
    </tr>
    <tr>
      <th scope="row">Medical Leaves</th>
        <td>5</td>
     <td><?php echo e($medu); ?></td>
      <td><?php echo e($user->medical_leave); ?></td>
    </tr>
    <tr>
      <th scope="row">Bereavement Leaves</th>
        <td>5</td>
     <td><?php echo e($beru); ?></td>
      <td><?php echo e($user->bereavement_leave); ?></td>
    </tr>
    <?php if($user->gender=='F'): ?>
    <tr>
      <th scope="row">Maternity Leaves</th>
       <td>60</td>
     <td><?php echo e($patu); ?></td>
      <td><?php echo e($user->maternity_leave); ?></td>
    </tr>
    <?php endif; ?>
    <?php if($user->gender=='M'): ?>
    <tr>
      <th scope="row">Paternity Leaves</th>
     <td>3</td>
     <td><?php echo e($patu); ?></td>
      <td><?php echo e($user->paternity_leave); ?></td>
    </tr>
    <?php endif; ?>
     <tr>
      <th scope="row">Loss of Pay</th>
     <td>0</td>
     <td><?php echo e($loss); ?></td>
      <td>0</td>
    </tr>
      <tr>
      <th scope="row">Seniority Leaves</th>
     <td><?php echo e($senl); ?></td>
     <td><?php echo e($senu); ?></td>
      <td><?php echo e($user->seniority_leave); ?></td>
    </tr>
  </tbody>
</table>
</div>
</div>
<div class="col-lg-5">
    <h2 class="page-head mt-4">Salary Details</h2>
 <table class="table table-hover mb-0">
  <thead>
  <tr>
   
      <th scope="col">Item</th>
      <th scope="col">Amount</th>
    </tr>
  </thead>
   <tbody>
     <tr>
      <th scope="row">Basic Salary</th>
     <td><?php echo e($user->basic_salary); ?></td>
    </tr>
     <tr>
      <th scope="row">HRA</th>
     <td><?php echo e($user->hra); ?></td>
    </tr>
     <!-- <tr>
      <th scope="row">PF</th>
     <td>1000</td>
    </tr>
     <tr>
      <th scope="row">Insurance</th>
     <td>1000</td>
    </tr>
     <tr>
      <th scope="row">TA</th>
     <td>1000</td>
    </tr> -->
      <tr>
      <th scope="row">Other Allowances</th>
     <td><?php echo e($user->other_allow); ?></td>
    </tr>
    <tr>
      <th scope="row">Total Salary</th>
     <td><?php echo e($user->base_salary); ?></td>
    </tr>
     </tbody>
</table> 
</div>

<?php if(count($award)): ?>
<div class="col-lg-12">
    <h2 class="page-head mt-4">Award and Achievements</h2>
    <table class="table table-hover mb-0">
 <tbody>
    <tr>
       <?php $__currentLoopData = $award; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $awards): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <th><?php echo e($awards->award_name); ?> </th>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tr>
 </tbody>
    </table>
</div>
<?php endif; ?>
                                </div>
                                
                               

                            </div>



                            <span class="powered">Copyright © <?php echo e(date('Y')); ?> Leave Tracker, All rights reserved. Powered by <a href="http://skiloratech.com/" target="_blank">Skilora Technologies</a></span>

                        </div>
                    </div>
                </div>
            </div>

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
<?php /**PATH C:\xampp\htdocs\leave-tracker\resources\views/employee/home.blade.php ENDPATH**/ ?>