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
                        <li><a href="<?php echo e(route('hr.salary')); ?>" class="active"><i class="material-icons md-light">account_balance_wallet</i> Employee Salary</a></li>
                        <li><a href="<?php echo e(route('hr.awards')); ?>"><i class="material-icons md-light">star</i> Awards</a></li>
                        <li><a href="<?php echo e(route('hr.expense')); ?>"><i class="material-icons md-light">account_balance_wallet</i> Expense</a></li>
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
                        <div class="col-lg-2">
                            <div class="side-bar d-lg-block d-none">
                                <ul>

                                    <li><a href="<?php echo e(route('hr.salary')); ?>" class="active"><i class="material-icons">person</i> Employee Salary</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-10 pr-0 pl-0">
                            <div class="dash-right-wrap">
                                <div class="row">
                                    <div class="col-lg-4 col-xl-6 col-md-3">
                                        <h2 class="page-head">Employee Salary - <?php echo e($salary_month); ?></h2>
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
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#sal-modal">Edit</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target=".bd-example-modal-sm">Delete</a>
                                                            </div>
                                                        </div>
                                                        <span><b>Emp ID</b></span>
                                                        <span class="sub">Sk001</span>
                                                        <span><b>Name</b></span>
                                                        <span class="sub">Krishnajith K</span>
                                                        <span><b>Worked Days</b></span>
                                                        <span class="sub">12</span>
                                                        <span><b>Leave Taken</b></span>
                                                        <span class="sub">5</span>
                                                        <span><b>Sarary</b></span>
                                                        <span class="sub">15000</span>
                                                        <span><b>Leave Deduction</b></span>
                                                        <span class="sub">5000</span>
                                                        <span><b>Total Earnings</b></span>
                                                        <span class="sub">15000</span>
                                                        <button type="submit" class="btn btn-default mt-4 filz "><span>Generate</span></button>
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
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#sal-modal">Edit</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target=".bd-example-modal-sm">Delete</a>
                                                            </div>
                                                        </div>
                                                        <span><b>Emp ID</b></span>
                                                        <span class="sub">Sk001</span>
                                                        <span><b>Name</b></span>
                                                        <span class="sub">Krishnajith K</span>
                                                        <span><b>Worked Days</b></span>
                                                        <span class="sub">12</span>
                                                        <span><b>Leave Taken</b></span>
                                                        <span class="sub">5</span>
                                                        <span><b>Sarary</b></span>
                                                        <span class="sub">15000</span>
                                                        <span><b>Leave Deduction</b></span>
                                                        <span class="sub">5000</span>
                                                        <span><b>Total Earnings</b></span>
                                                        <span class="sub">15000</span>
                                                        <button type="submit" class="btn btn-default mt-4 filz "><span>Generate</span></button>
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
                                                            <th scope="col">Emp ID</th>
                                                            <th scope="col">Working Days</th>
                                                            <th scope="col">Worked Days</th>
                                                            <th scope="col">Leave Taken</th>
                                                            <th scope="col">Earned Leaves</th>
                                                            <th scope="col">Loss of pay</th>
                                                            <th scope="col">Salary</th>
                                                            <th scope="col">Leave Deduction</th>
                                                            <th scope="col">Total Earnings</th>
                                                            <th scope="col"></th>
                                                            <th scope="col"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if($employee->count()): ?>
                                                        <?php $__currentLoopData = $employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $employees): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e(++$i); ?></td>
                                                            <td><a href="<?php echo e(route('hr.employee_profile', @$employees->employee_id)); ?>"><?php echo e(@$employees->employee_id); ?></a></td>
                                                            <td>30</td>
                                                            <td><?php echo e($employee[$k]->worked); ?></td>
                                                            <td><?php echo e($employee[$k]->days); ?></td>
                                                            <td><?php echo e($employee[$k]->free); ?></td>
                                                            <td><?php echo e($employee[$k]->paid); ?></td>
                                                            <td><?php echo e($employees->base_salary); ?></td>
                                                            <td><?php echo e($employee[$k]->ded); ?></td>
                                                            <td><?php echo e($employee[$k]->earn); ?></td>
                                                            <td>
                                                                <a href="<?php echo e(route('hr.salary_slip', $employees->employee_id)); ?>" class="btn btn-cancel fils"><span>Generate</span></a>

                                                            </td>
                                                            <td>
                                                                <div class="dropdown dropleft">
                                                                    <a class="btn p-0 dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="material-icons">more_vert</i>
                                                                    </a>

                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                        <!-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#sal-modal">Edit</a> -->
                                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target=".bd-example-modal-sm">Delete</a>
                                                                    </div>
                                                                </div>
                                                            </td>
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
                                        <?php echo $employee->appends(request()->query())->links(); ?>

                                    </div>
                                </div>
                            </div>

                            <span class="powered">Copyright © 2021 Leave Tracker, All rights reserved. Powered by <a href="http://skiloratech.com/" target="_blank">Skilora Technologies</a></span>


                        </div>
                    </div>
                </div>
            </div>

            <!-- add to salary modal -->
            <div class="modal fade " id="sal-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog ">

                    <div class="modal-content p-4">
                        <div class="modal-head mb-3">
                            <h5>Add Staff Salary</h5>
                        </div>
                        <form>
                            <div class="form-group">
                                <label>Month <span class="required-icon"></span></label>

                                <input class="date form-control" id='datetimepicker'>
                                <div><i style="float: right;margin-top: -32px;margin-right: 15px !important;" class="material-icons mr-2">calendar_today</i></div>
                            </div>
                            <div class="form-group">
                                <label>Group <span class="required-icon"></span></label>
                                <select class="form-control w-100 custom">
                  <option>Tech</option>
                  <option>Product</option>
                </select>
                            </div>
                            <div class="form-group">
                                <label>Employee <span class="required-icon"></span></label>
                                <select class="form-control w-100 custom">
                  <option>Shahabas</option>
                  <option>Midhun</option>
                </select>
                            </div>
                            <div class="form-group">
                                <label>Basic Salary <span class="required-icon"></span></label>
                                <input class="form-control" />
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Working Days <span class="required-icon"></span></label>
                                        <input class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Worked Days <span class="required-icon"></span></label>
                                        <input class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Leave Taken <span class="required-icon"></span></label>
                                        <input class="form-control" readonly value="5" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Leave Deduction <span class="required-icon"></span></label>
                                        <input class="form-control" readonly value="1500" />
                                    </div>
                                </div>
                            </div>
                        <div class="button-holder">
                            <button type="submit" class="btn btn-default mt-3 filz mr-3" data-dismiss="modal"><span>Cancel</span></button>
                            <button type="submit" class="btn btn-cancel mt-3 fils "><span>Submit</span></button>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- add to salary modal -->
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
        $('#datetimepicker').datetimepicker({
            defaultDate: new Date(),
            format: 'MM/YYYY',
            sideBySide: true
        });
        $('#datetimepicker1').datetimepicker({
            defaultDate: new Date(),
            format: 'MM/YYYY',
            sideBySide: true
        });
    </script>
    <script>
        jQuery(document).ready(function($) {
            $(window).load(function() {
                $('#preloader').fadeOut('slow', function() {
                    $(this).remove();
                });
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
        $('input:checkbox').change(function() {
            if ($(this).is(":checked")) {
                $('.action-pannel').addClass("active");
            } else {
                $('.action-pannel').removeClass("active");
            }
        });
    </script>
</body>

</html><?php /**PATH C:\xampp\htdocs\leave-tracker\resources\views/hr/salary.blade.php ENDPATH**/ ?>