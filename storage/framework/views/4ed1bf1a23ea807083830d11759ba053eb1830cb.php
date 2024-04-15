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
    <link rel="stylesheet" href="<?php echo e(asset('content/css/select2.min.css')); ?>" type=" text/css">
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
                        <li><a href="<?php echo e(route('hr.employees')); ?>"><i class="material-icons md-light">person</i> Employee</a></li>
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
                                    <li> <a href="#" data-toggle="modal" data-target=".bd-example-modal-smm"><i class="material-icons">add_circle</i> Add Member</a> </li>
                                    <li> <a href="#" class="active"><i class="material-icons">people</i> Members</a> </li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-10 pr-0 pl-0">
                            <div class="dash-right-wrap">
                                <div class="row">
                                    <div class="col-lg-5 col-xl-6 col-md-6">
                                        <h2 class="page-head">Groups - <?php echo e($grp->group_name); ?> - Members</h2>
                                    </div>
                                    <div class="col-lg-7 col-xl-6 col-md-6">
                                        <div class="action-pannel">
                                            <ul>


                                                <li>
                                                    <a href="#" data-toggle="modal" data-target=".bd-example-modal-sm1">
                                                        <i class="material-icons">group_add</i> Add to Group
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="modal" data-target=".bd-example-modal-sm">
                                                        <i class="material-icons">person_off</i> Inactivate
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="responsive-block d-lg-none">
                                            <div class="row">
                                                <!-- item -->
                                                <div class="col-12 col-md-6">
                                                    <div class="card p-4">
                                                        <div class="custom-checkbox mb-3">
                                                            <input type="checkbox" id="box-1">
                                                            <label for="box-1"></label>
                                                        </div>
                                                        <div class="dropdown dropleft">
                                                            <a class="btn p-0 dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="material-icons">more_vert</i>
                                                            </a>

                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                <a class="dropdown-item" href="#">Profile</a>
                                                                <a class="dropdown-item" href="#">Make Manager</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target=".bd-example-modal-sm1">Add to Group</a>
                                                            </div>
                                                        </div>
                                                        <span><b>Emp ID</b></span>
                                                        <span class="sub">Sk001</span>
                                                        <span><b>Name</b></span>
                                                        <span class="sub">Krishnajith K</span>
                                                        <span><b>Joining Date</b></span>
                                                        <span class="sub">12-05-2021</span>
                                                        <span><b>Company</b></span>
                                                        <span class="sub">Skilora</span>
                                                        <span><b>Email</b></span>
                                                        <span class="sub">krishnajith@skilora.in</span>
                                                        <span><b>Phone</b></span>
                                                        <span class="sub">+91 97476 33769</span>
                                                    </div>
                                                </div>
                                                <!-- item -->
                                                <!-- item -->
                                                <div class="col-12 col-md-6">
                                                    <div class="card p-4">
                                                        <div class="custom-checkbox mb-3">
                                                            <input type="checkbox" id="box-1">
                                                            <label for="box-1"></label>
                                                        </div>
                                                        <div class="dropdown dropleft">
                                                            <a class="btn p-0 dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="material-icons">more_vert</i>
                                                            </a>

                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                <a class="dropdown-item" href="#">Profile</a>
                                                                <a class="dropdown-item" href="#">Make Manager</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target=".bd-example-modal-sm1">Add to Group</a>
                                                            </div>
                                                        </div>
                                                        <span><b>Emp ID</b></span>
                                                        <span class="sub">Sk001</span>
                                                        <span><b>Name</b></span>
                                                        <span class="sub">Krishnajith K</span>
                                                        <span><b>Joining Date</b></span>
                                                        <span class="sub">12-05-2021</span>
                                                        <span><b>Company</b></span>
                                                        <span class="sub">Skilora</span>
                                                        <span><b>Email</b></span>
                                                        <span class="sub">krishnajith@skilora.in</span>
                                                        <span><b>Phone</b></span>
                                                        <span class="sub">+91 97476 33769</span>
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
                                                            <!-- <th>
                                                                <div class="custom-checkbox">
                                                                    <input type="checkbox" id="0">
                                                                    <label for="0"></label>
                                                                </div>
                                                            </th> -->
                                                            <th scope="col">#</th>
                                                            <th scope="col">Emp ID</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Company</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Phone</th>
                                                            <th scope="col"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $__currentLoopData = $member; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $members): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <!-- <th>
                                                                <div class="custom-checkbox">
                                                                    <input type="checkbox" id="box-1">
                                                                    <label for="box-1"></label>
                                                                </div>
                                                            </th> -->
                                                            <th scope="row"><?php echo e(++$i); ?></th>
                                                            <td><?php echo e($member[$k]->user->employee_id); ?></td>
                                                            <?php if($members->manager == 1): ?>
                                                            <td class="admin"><?php echo e($member[$k]->user->name); ?></td>
                                                            <?php else: ?>
                                                            <td><?php echo e($member[$k]->user->name); ?></td>
                                                            <?php endif; ?>
                                                            <td><?php echo e($member[$k]->cmp->company_name); ?></td>

                                                            <td><?php echo e($member[$k]->user->email); ?></td>
                                                            <td>+91 <?php echo e($member[$k]->user->phone); ?></td>
                                                            <td>
                                                                <div class="dropdown dropleft">
                                                                    <a class="btn p-0 dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="material-icons">more_vert</i>
                                                                    </a>

                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                        <a class="dropdown-item" href="<?php echo e(route('hr.employee_profile', $member[$k]->user->employee_id)); ?>">Profile</a>
                                                                        <?php if($members->manager!=1): ?>
                                                                        <a class="dropdown-item" href="<?php echo e(route('hr.make_manager',['id'=> $grp->id, 'uid'=>$member[$k]->user->id])); ?>">Make Manager</a>
                                                                        <?php endif; ?>
                                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target=".bd-example-modal-sm1-<?php echo e($member[$k]->user->id); ?>">Add to Group</a>
                                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target=".bd-example-modal-sm-<?php echo e($member[$k]->id); ?>">Remove</a>

                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                        <?php echo $member->appends(request()->query())->links(); ?>

                                    </div>
                                </div>
                            </div>

                            <span class="powered">Copyright © 2021 Leave Tracker, All rights reserved. Powered by <a href="http://skiloratech.com/" target="_blank">Skilora Technologies</a></span>


                        </div>
                    </div>
                </div>
            </div>
            <!-- delete modal -->
            <?php $__currentLoopData = $member; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $members): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="modal fade bd-example-modal-sm-<?php echo e($member[$k]->id); ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content p-4">
                        <i class="material-icons md-light red">person_off</i>
                        <span class="content">Do you really want to remove employee from group?</span>
                        <div class="button-holder">

                            <button type="submit" class="btn btn-cancel mt-4 fils mr-3" data-dismiss="modal"><span>Cancel</span></button>
                            <a href="<?php echo e(route('hr.remove_group',['id'=> $grp->id, 'gid'=>$member[$k]->id])); ?>" class="btn btn-default mt-4 filz "><span>Remove</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!-- delete modal -->
            <!-- add to group modal -->
            <?php $__currentLoopData = $member; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $members): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="modal fade bd-example-modal-sm1-<?php echo e($member[$k]->user->id); ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">

                    <div class="modal-content p-4">
                        <div class="modal-head mb-3">
                            <h5>Add to Group</h5>
                        </div>
                        <form method="POST" action="<?php echo e(route('hr.from_group_employee', ['id'=>$member[$k]->user->id, 'gid'=>$grp->id])); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label>Select Group <span class="required-icon"></span></label>
                                <select class="form-control w-100 custom" name="group" required>
                                 <?php if(count($member[$k]->group)>0): ?>
                                    <?php $__currentLoopData = $member[$k]->group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groups): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <option value="<?php echo e($groups->id); ?>"><?php echo e($groups->group_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <option value="">No Results</option>
                                <?php endif; ?>
                                </select>
                            </div>
                        
                        <div class="button-holder">
                            <button class="btn btn-default mt-3 filz mr-3" data-dismiss="modal"><span>Cancel</span></button>
                            <button type="submit" class="btn btn-cancel mt-3 fils "><span>Submit</span></button>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!-- add to group modal -->
            <!-- add member modal -->
            <div class="modal fade bd-example-modal-smm" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">

                    <div class="modal-content p-4">
                        <div class="modal-head mb-3">
                            <h5>Add Member</h5>
                        </div>
                        <form method="POST" action="<?php echo e(route('hr.add_group', $grp->id)); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label>Select Employee <span class="required-icon"></span></label>
                                <select class="form-control w-100 select2" multiple="multiple" name="employee[]">
                                <?php $__currentLoopData = $emp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($emps->id); ?>"><?php echo e($emps->name); ?> - <?php echo e($emps->employee_id); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        
                        <div class="button-holder">
                            <button class="btn btn-default mt-3 filz mr-3" data-dismiss="modal"><span>Cancel</span></button>
                            <button type="submit" class="btn btn-cancel mt-3 fils "><span>Add</span></button>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- add member modal -->


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
    <script src="<?php echo e(asset('scripts/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('scripts/jquery.nice-select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('scripts/fastclick.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            $('select.custom:not(.ignore)').niceSelect();
            FastClick.attach(document.body);
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Select Data",
                allowClear: true
            });
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
        $('input:checkbox').change(function() {
            if ($(this).is(":checked")) {
                $('.action-pannel').addClass("active");
            } else {
                $('.action-pannel').removeClass("active");
            }
        });
    </script>

</body>

</html><?php /**PATH C:\xampp\htdocs\leave-tracker\resources\views/hr/group_members.blade.php ENDPATH**/ ?>