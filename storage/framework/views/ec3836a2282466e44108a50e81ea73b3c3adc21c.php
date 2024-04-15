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
                                            <a class="dropdown-item" href="#">Change Password</a>
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
                        <li><a href="<?php echo e(route('hr.employees')); ?>"><i class="material-icons md-light">person</i> Employee</a></li>
                        <li><a href="<?php echo e(route('hr.groups')); ?>"><i class="material-icons md-light">people</i> Groups</a></li>
                        <li><a href="<?php echo e(route('hr.leave_requests')); ?>"><i class="material-icons md-light">holiday_village</i> Leave Request</a></li>
                        <li><a href="<?php echo e(route('hr.documents')); ?>"><i class="material-icons md-light">folder</i> Document</a></li>
                        <li><a href="<?php echo e(route('hr.salary')); ?>"><i class="material-icons md-light">account_balance_wallet</i> Employee Salary</a></li>
                        <li><a href="<?php echo e(route('hr.awards')); ?>"><i class="material-icons md-light">star</i> Awards</a></li>
                        <li><a href="<?php echo e(route('hr.expense')); ?>" class="active"><i class="material-icons md-light">account_balance_wallet</i> Expense</a></li>
                        <li><a href="<?php echo e(route('hr.holiday')); ?>"><i class="material-icons md-light">holiday_village</i> Holiday</a></li>
                    </ul>
                </div>
                <div class="zeynep">
                    <ul>
                        <li><a class="top_menuactive" href="company-dashboard.html"><i class="material-icons md-light">dashboard</i>Dashboard</a></li>



                        <li class="has-submenu">
                            <a href="#" data-submenu="stores"><i class="material-icons md-light">person</i>Employee</a>

                            <div id="stores" class="submenu">
                                <div class="submenu-header" data-submenu-close="stores">
                                    <a href="#">Back</a>
                                </div>

                                <ul>
                                    <li>
                                        <a href="user-creation1.html"><span class="plus-icon"></span> Create Employee</a></a>
                                    </li>
                                    <li> <a href="manage-user.html" class="active">Employees</a> </li>
                                    <li> <a href="manage-user.html" class="active">Inactive Employees</a> </li>
                                </ul>
                            </div>
                        </li>
                        <li class="has-submenu">
                            <a href="#" data-submenu="stores1"><i class="material-icons md-light">people</i>Groups</a>

                            <div id="stores1" class="submenu">
                                <div class="submenu-header" data-submenu-close="stores1">
                                    <a href="#">Back</a>
                                </div>

                                <ul>
                                    <li>
                                        <a href="plan-creation.html">Create Group</a></a>
                                    </li>

                                    <li>
                                        <a href="manage-plan.html">Groups</a>
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
      
      <div class="col-lg-12 pr-0 pl-0">
        <div class="dash-right-wrap main-dash">
        <div class="row">

       
       <div class="col-lg-6 col-md-6">
            
         <div >
         <h2 class="page-head">Expense</h2>
         <div class="card ">
             <table class="table table-hover mb-0">
  <thead>
    <tr>
      <th scope="col">Year</th>
      <th scope="col">Month</th>
      <th scope="col">Total Salary</th>
    </tr>
  </thead>
  <tbody>
    <?php if($expense->count()): ?>
    <?php $__currentLoopData = $expense; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $expenses): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <th scope="row"><?php echo e($expenses->year); ?></th>
      <td><?php echo e(@$expenses->month); ?></td>
      <td>INR <?php echo e(@$expenses->amount); ?></td>
    </tr>
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
  </tbody>
</table>
 </div>



         


       </div>
        </div>

<div class="col-lg-6 col-md-6">
  <div class="row">
    <div class="col-lg-12">
      <h2 class="page-head">Expense Analytics</h2>
   <div class="card " >
  <div class="chart" >
    <canvas id="myChart" width="400" height="300"></canvas>
  </div>
</div>
</div>
<div class="col-lg-12">
<h2 class="page-head">Expense</h2>
 <div class="card ">
             <table class="table table-hover mb-0">
  <thead>
    <tr>
      <th scope="col">Year</th>
      <th scope="col">Total Expense</th>
    </tr>
  </thead>
  <tbody>
      <tr>
      <th scope="row">2021</th>
      <td>INR 1,5000,00</td>
    </tr>
      <tr>
      <th scope="row">2021</th>
      <td>INR 1,5000,00</td>
    </tr>
      <tr>
      <th scope="row">2021</th>
      <td>INR 1,5000,00</td>
    </tr>
      <tr>
      <th scope="row">2021</th>
      <td>INR 1,5000,00</td>
    </tr>
  </tbody>
</table>

</div>
  </div>
  </div>

    

 
    
      </div>   
      </div>
        </div>

<span class="powered">Copyright © 2021 Leave Tracker, All rights reserved. Powered by <a href="http://skiloratech.com/" target="_blank">Skilora Technologies</a></span>


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script>
 <script>
      jQuery(document).ready(function($) {  
      $(window).load(function(){
      $('#preloader').fadeOut('slow',function(){$(this).remove();});
      });
      });
      </script>  
 <script type="text/javascript">
   var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
  // The type of chart we want to create
  type: 'line', // also try bar or other graph types
 height:500,
  // The data for our dataset
  data: {
    labels: ["Jan 2021", "Feb 2012", "Mar 2021", "Apr 2021", "May 2021","Jun 2021", "Jul 2021", "Aug 2021", "Sep 2021", "Oct 2021", "Nov 2021", "Dec 2021"],
    // Information about the dataset
    datasets: [{
      label: "Expense",
      backgroundColor: 'lightblue',
      borderColor: 'royalblue',
      data: [26.4, 39.8, 66.8, 66.4, 40.6, 55.2, 77.4, 69.8, 57.8, 76, 110.8, 142.6],
    }]
  },

  // Configuration options
  options: {
    layout: {
      padding: 10,
    },
    legend: {
      position: 'bottom',
    },
    title: {
      display: true,
      text: 'Expense Analytics'
    },
    scales: {
      yAxes: [{
        scaleLabel: {
          display: true,
          labelString: 'Amount'
        }
      }],
      xAxes: [{
        scaleLabel: {
          display: true,
          labelString: 'Month of the Year'
        }
      }]
    }
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
     
</body>
</html>
<?php /**PATH C:\xampp\htdocs\leave-tracker\resources\views/hr/expense.blade.php ENDPATH**/ ?>