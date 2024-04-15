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
     <link rel="stylesheet" href="<?php echo e(asset('content/css/bootstrap-datepicker.min.css')); ?>" type=" text/css">
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
    <li><a class="top_menuactive" href="company-dashboard.html"><i class="material-icons md-light">dashboard</i>Dashboard</a></li>



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
          <div class="col-lg-2 col-xl-3"></div>
          <div class="col-lg-8 col-xl-6">
            <div class="card mt-3 mb-3">
              <h3 class="form-head">Request Leave</h3>
              <div class="form-wrap">
                <form method="POST" id="leave_form" action="<?php echo e(route('employee.request_leave_store')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                  
             <div class="form-group">
               <label >Employee ID <span class="required-icon"></span></label>
                <input class="form-control" type="text" name="employee_id" value="<?php echo e(auth()->user()->employee_id); ?>" readonly required>
                <?php if($errors->has('employee_id')): ?>
                 <span class="invalid-feedback" role="alert">
                 <?php echo e($errors->first('employee_id')); ?>

                 </span>
                <?php endif; ?>
             </div>
                   <div class="form-group">
           <label>Select Date(s) <span class="required-icon"></span></label> 
           
    <input class="date form-control start" id='datetimepicker' name="dates" value="<?php echo e(old('dates')); ?>" autocomplete="off">
    <div><i style="float: right;margin-top: -30px;margin-right: 15px !important;" class="material-icons mr-2">calendar_today</i></div>
    <?php if($errors->has('dates')): ?>
                 <span class="invalid-feedback" role="alert">
                 <?php echo e($errors->first('dates')); ?>

                 </span>
                <?php endif; ?>
        </div>

       

             <div class="form-group">
               <label >Number of days <span class="required-icon"></span></label>
                <input class="form-control" type="text" name="days" id="days" value="<?php echo e(old('days')); ?>" readonly>
                <?php if($errors->has('days')): ?>
                 <span class="invalid-feedback" role="alert">
                 <?php echo e($errors->first('days')); ?>

                 </span>
                <?php endif; ?>
             </div>
           
             
            <div class="form-group">
               <label >Leave Type <span class="required-icon"></span></label>
                <select class="form-control w-100 custom" name="leave_type" id="leave_type">
                  <option value="">Select Leave Type</option>
                  <?php if(auth()->user()->casual_rem>0): ?>
                  <option id="cas" value="casual_leave" <?php if(old('leave_type') == 'casual_leave'): ?> selected <?php endif; ?>>Casual Leave</option>
                  <?php else: ?>
                  <option value="casual_leave" <?php if(old('leave_type') == 'casual_leave'): ?> selected <?php endif; ?> disabled>Casual Leave</option>
                  <?php endif; ?>
                  <?php if(auth()->user()->medical_rem>0): ?>
                  <option id="med" value="medical_leave" <?php if(old('leave_type') == 'medical_leave'): ?> selected <?php endif; ?>>Medical Leave</option>
                  <?php else: ?>
                  <option value="medical_leave" <?php if(old('leave_type') == 'medical_leave'): ?> selected <?php endif; ?> disabled>Medical Leave</option>
                  <?php endif; ?>
                  <?php if(auth()->user()->gender=='M'): ?>
                  <?php if(auth()->user()->paternity_rem>0): ?>
                  <option id="pat" value="paternity_leave" <?php if(old('leave_type') == 'paternity_leave'): ?> selected <?php endif; ?>>Paternity Leave</option>
                  <?php else: ?>
                  <option value="paternity_leave" <?php if(old('leave_type') == 'paternity_leave'): ?> selected <?php endif; ?> disabled>Paternity Leave</option>
                  <?php endif; ?>
                  <?php elseif(auth()->user()->gender=='F'): ?>
                  <?php if(auth()->user()->maternity_rem>0): ?>
                  <option id="pat" value="maternity_leave" <?php if(old('leave_type') == 'maternity_leave'): ?> selected <?php endif; ?>>Maternity Leave</option>
                  <?php else: ?>
                  <option value="maternity_leave" <?php if(old('leave_type') == 'maternity_leave'): ?> selected <?php endif; ?> disabled>Maternity Leave</option>
                  <?php endif; ?>
                  <?php endif; ?>
                  <?php if(auth()->user()->bereavement_rem>0): ?>
                  <option id="ber" value="bereavement_leave" <?php if(old('leave_type') == 'bereavement_leave'): ?> selected <?php endif; ?>>Bereavement Leave</option>
                  <?php else: ?>
                  <option value="bereavement_leave" <?php if(old('leave_type') == 'bereavement_leave'): ?> selected <?php endif; ?> disabled>Bereavement Leave</option>
                  <?php endif; ?>
                  <option value="loss_of_pay" <?php if(old('leave_type') == 'loss_of_pay'): ?> selected <?php endif; ?>>Loss of Pay</option>
                  <option value="half_day" <?php if(old('leave_type') == 'half_day'): ?> selected <?php endif; ?>>Half Day</option>
                  <option value="comp_off" <?php if(old('leave_type') == 'comp_off'): ?> selected <?php endif; ?>>Comp Off</option>
                  <?php if(auth()->user()->seniority_rem>0): ?>
                  <option id="sen" value="seniority_leave" <?php if(old('leave_type') == 'seniority_leave'): ?> selected <?php endif; ?>>Seniority Leave</option>
                  <?php else: ?>
                  <option value="seniority_leave" <?php if(old('leave_type') == 'seniority_leave'): ?> selected <?php endif; ?> disabled>Seniority Leave</option>
                  <?php endif; ?>
                  <?php if(auth()->user()->marriage_rem>0): ?>
                  <option id="mar" value="marriage_leave" <?php if(old('leave_type') == 'marriage_leave'): ?> selected <?php endif; ?>>Marriage Leave</option>
                  <?php else: ?>
                  <option value="marriage_leave" <?php if(old('leave_type') == 'marriage_leave'): ?> selected <?php endif; ?> disabled>Marriage Leave</option>
                  <?php endif; ?>
                  <?php if($errors->has('leave_type')): ?>
                 <span class="invalid-feedback" role="alert">
                 <?php echo e($errors->first('leave_type')); ?>

                 </span>
                <?php endif; ?>
                </select>
                <?php if($errors->has('leave_type')): ?>
                    <span class="invalid-feedback" role="alert">
                      <?php echo e($errors->first('leave_type')); ?>

                    </span>
                  <?php endif; ?>
             </div>

             <input type="hidden" id="cl" name="cl" value="<?php echo e($user->casual_rem); ?>">
             <input type="hidden" id="ml" name="ml" value="<?php echo e($user->medical_rem); ?>">
             <?php if($user->gender=='M'): ?>
              <input type="hidden" id="pl" name="pl" value="<?php echo e($user->paternity_rem); ?>">
             <?php elseif($user->gender=='F'): ?>
              <input type="hidden" id="pl" name="pl" value="<?php echo e($user->maternity_rem); ?>">
             <?php endif; ?>
             <input type="hidden" id="bl" name="bl" value="<?php echo e($user->bereavement_rem); ?>">
             <input type="hidden" id="sl" name="sl" value="<?php echo e($user->seniority_rem); ?>">

             <div class="form-group leaves" id="medical_leave" style="display:none;">
                <label>Submit Medical Certificate <span class="required-icon"></span></label>
                <div class="field" align="left">
                    <span>
                      <input type="file" id="medical" name="medical" accept=".pdf,.docx,.doc,.jpg,.png,.jpeg,.gif"/>
                    </span>
                  </div>
                  <?php if($errors->has('medical')): ?>
                    <span class="invalid-feedback" role="alert">
                      <?php echo e($errors->first('medical')); ?>

                    </span>
                  <?php endif; ?>
             </div>

             <div class="form-group leaves" id="paternity_leave" style="display:none;">
                <label>Submit Document <span class="required-icon"></span></label>
                <div class="field" align="left">
                    <span>
                      <input type="file" id="paternity" name="paternity" accept=".pdf,.docx,.doc,.jpg,.png,.jpeg,.gif"/>
                    </span>
                  </div>
                  <?php if($errors->has('paternity')): ?>
                    <span class="invalid-feedback" role="alert">
                      <?php echo e($errors->first('paternity')); ?>

                    </span>
                  <?php endif; ?>
             </div>

             <div class="form-group leaves" id="maternity_leave" style="display:none;">
                <label>Submit Document <span class="required-icon"></span></label>
                <div class="field" align="left">
                    <span>
                      <input type="file" id="maternity" name="maternity" accept=".pdf,.docx,.doc,.jpg,.png,.jpeg,.gif"/>
                    </span>
                  </div>
                  <?php if($errors->has('maternity')): ?>
                    <span class="invalid-feedback" role="alert">
                      <?php echo e($errors->first('maternity')); ?>

                    </span>
                  <?php endif; ?>
             </div>

             <div class="form-group leaves" id="bereavement_leave" style="display:none;">
                <label>Submit Document <span class="required-icon"></span></label>
                <div class="field" align="left">
                    <span>
                      <input type="file" id="bereavement" name="bereavement" accept=".pdf,.docx,.doc,.jpg,.png,.jpeg,.gif"/>
                    </span>
                  </div>
                  <?php if($errors->has('bereavement')): ?>
                    <span class="invalid-feedback" role="alert">
                      <?php echo e($errors->first('bereavement')); ?>

                    </span>
                  <?php endif; ?>
             </div>

             <div class="form-group leaves" id="comp_off" style="display:none;">
                <label>Submit Document <span class="required-icon"></span></label>
                <div class="field" align="left">
                    <span>
                      <input type="file" id="comp" name="comp" accept=".pdf,.docx,.doc,.jpg,.png,.jpeg,.gif"/>
                    </span>
                  </div>
                  <?php if($errors->has('comp')): ?>
                    <span class="invalid-feedback" role="alert">
                      <?php echo e($errors->first('comp')); ?>

                    </span>
                  <?php endif; ?>
             </div>

             <div class="form-group leaves" id="casual" style="display:none;">
                <label>Submit Document <span class="required-icon"></span></label>
                <div class="field" align="left">
                    <span>
                      <input type="file" id="cas" name="cas" accept=".pdf,.docx,.doc,.jpg,.png,.jpeg,.gif"/>
                    </span>
                  </div>
                  <?php if($errors->has('cas')): ?>
                    <span class="invalid-feedback" role="alert">
                      <?php echo e($errors->first('cas')); ?>

                    </span>
                  <?php endif; ?>
             </div>

             <div class="alert alert-danger" id="casual_warning" role="alert" style="display:none;">Can't take more than 2 casual leaves without prior approval before 30 days. If already taken approval upload evidence email or letter screenshot or document</div>

             <div class="form-group">
               <label >Reason<span class="required-icon"></span></label>
               <textarea class="form-control" rows="4" name="leave_reason"><?php echo e(old('leave_reason')); ?></textarea>
               <?php if($errors->has('leave_reason')): ?>
                 <span class="invalid-feedback" role="alert">
                 <?php echo e($errors->first('leave_reason')); ?>

                 </span>
                <?php endif; ?>
             </div>
             <div class="button-holder">
                <a href="<?php echo e(route('employee.leaves')); ?>" class="btn btn-default mt-4 filz mr-3"><span>Cancel</span></a>
             <button type="submit" class="btn btn-cancel mt-4 fils"><span>Submit</span></button>
           </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-xl-3"></div>
        </div>
        </div>

<span class="powered">Copyright © 2021 Leave Tracker, All rights reserved. Powered by <a href="http://skiloratech.com/" target="_blank">Skilora Technologies</a></span>


      </div>
    </div>
  </div>
</div>

<?php if($message = Session::get('error')): ?>
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
<script src="<?php echo e(asset('scripts/bootstrap-datepicker.min.js')); ?>"></script>
<script type="text/javascript">
  var casual = $('#leave_type').val();
  if (casual=='casual_leave') {
    $('#casual').show();
  }
  if (casual=='medical_leave') {
    $('#medical_leave').show();
  }
  if (casual=='paternity_leave') {
    $('#paternity_leave').show();
  }
  if (casual=='maternity_leave') {
    $('#maternity_leave').show();
  }
  if (casual=='bereavement_leave') {
    $('#bereavement_leave').show();
  }
  if (casual=='comp_off') {
    $('#comp_off').show();
  }
  $(function() {
        $('#leave_type').change(function(){
          alert("sdfgbskd");
            $('.leaves').hide();
            $('#' + $(this).val()).show();

            var lt = $('#leave_type').val();
            var days = $('#days').val();
            var d = new Date();
            var cl = $('#cl').val();
            var ml = $('#ml').val();
            var pl = $('#pl').val();
            var bl = $('#bl').val();
            var sl = $('#sl').val();

            if (lt=='casual_leave' && days>2) {
              // alert(d);
              $('#casual').show();
              $('#casual_warning').show();
            }

            if (lt=='casual_leave' && days<=2) {
              // alert(d);
              $('#casual').hide();
              $('#casual_warning').hide();
            }

            if (lt!='casual_leave') {
              // alert("Yes");
              $('#casual_warning').hide();
            }

            if(days>cl){
        $("#cas").attr('disabled','disabled');
      }

      if(days>ml){
        $("#med").attr('disabled','disabled');
      }
        });
    });
</script>
<script type="text/javascript">
// $('#datetimepicker1').on('dp.change', function(e){
//   var start = $('.start').val();
//   var end = $('.end').val();
//   var days = daysdifference(start, end)+1;
  
//   // console.log(days);
//   $('#days').val(days);
  
//   function daysdifference(firstDate, secondDate){
//       var startDay = new Date(firstDate);
//       var endDay = new Date(secondDate);
     
//       var millisBetween = startDay.getTime() - endDay.getTime();
//       var days = millisBetween / (1000 * 3600 * 24);
     
//       return Math.round(Math.abs(days));
//   }

//       var lt = $('#leave_type').val();
//       var days = $('#days').val();

//       if (lt=='casual_leave' && days<3) {
//               // alert(d);
//               $('#casual').hide();
//               $('#casual_warning').hide();
//             }
// });
</script>
<!-- <script type="text/javascript">
$('.form-group').on('input', '.dat', function(){
  var start = #(.start).val();
  var end = #(.end).val();
   
var days = daysdifference(start, end);
$('#days').val(days);
  
console.log(days);
  
function daysdifference(firstDate, secondDate){
    var startDay = new Date(firstDate);
    var endDay = new Date(secondDate);
   
    var millisBetween = startDay.getTime() - endDay.getTime();
    var days = millisBetween / (1000 * 3600 * 24);
   
    return Math.round(Math.abs(days));
}
});
</script> -->
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
    $(document).ready(function() {
      var sites = <?php echo json_encode($holiday->toArray()); ?>;
      var dat = <?php echo json_encode($lr->toArray()); ?>;
      var dta2 = [];
      $.each(dat, function (i) {
        var ar = dat[i].split(",");
        $.each(ar, function (j){
          dta2.push(ar[j]);
        });
      });
      var site = $.merge( sites, dta2 );
      // var a = $('#holi_dates').val();
      // alert(sites);
    $('#datetimepicker').datepicker({
        multidate: true,
        format: "yyyy-mm-dd",
        daysOfWeekDisabled: [0],
        datesDisabled: site,
        language: 'en'
    }).on('changeDate', function(e) {
        // `e` here contains the extra attributes
        $('#days').val(e.dates.length);
        var lt = $('#leave_type').val();
        var days = $('#days').val();

      if (lt=='casual_leave' && days<3) {
              // alert(d);
              $('#casual').hide();
              $('#casual_warning').hide();
            }
      
    });
});
  // $('#datetimepicker').datepicker({
  //   defaultDate: new Date(),
  //   format: 'mm/dd/yyyy',
  //   todayBtn:  1,
  //   autoclose: true,
  //   multidate: true,
    // }).on('changeDate', function (selected) {
    //     var f = '';
    //     $('#datetimepicker1').val(f);
    //     var minDate = new Date(selected.date.valueOf());
    //     $('#datetimepicker1').datepicker('setStartDate', minDate);
// });
  // $('#datetimepicker1').datepicker({
  //   format: 'mm/dd/yyyy',
  //   autoclose: true,
  //   })
  // .change(changed)
  // .on('changeDate', changed);

    // function changed(ev) {
    //   var start = $('.start').val();
    //   var end = $('.end').val();
    //   var days = daysdifference(start, end)+1;
      
    //   // console.log(days);
    //   $('#days').val(days);
      
    //   function daysdifference(firstDate, secondDate){
    //       var startDay = new Date(firstDate);
    //       var endDay = new Date(secondDate);
         
    //       var millisBetween = startDay.getTime() - endDay.getTime();
    //       var days = millisBetween / (1000 * 3600 * 24);
         
    //       return Math.round(Math.abs(days));
    //   }

    //   var lt = $('#leave_type').val();
    //   var days = $('#days').val();

    //   if (lt=='casual_leave' && days<3) {
    //           // alert(d);
    //           $('#casual').hide();
    //           $('#casual_warning').hide();
    //         }
    // }

// $(document).ready(function(){

//     $("#startdate").datepicker({
//         todayBtn:  1,
//         autoclose: true,
//     }).on('changeDate', function (selected) {
//         var minDate = new Date(selected.date.valueOf());
//         $('#enddate').datepicker('setStartDate', minDate);
//     });

//     $("#enddate").datepicker()
//         .on('changeDate', function (selected) {
//             var maxDate = new Date(selected.date.valueOf());
//             $('#startdate').datepicker('setEndDate', maxDate);
//         });

// });
</script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\leave-tracker\resources\views/employee/request_leave.blade.php ENDPATH**/ ?>