<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Leave Tracker</title>
    <!-- CSS -->
     <link rel="icon" href="<?php echo e(asset('content/img/fav.png')); ?>" type="image/gif" sizes="32x32">
    <link rel="stylesheet" href="<?php echo e(asset('content/css/bootstrap.min.css')); ?>" type="text/css">
     <link href="<?php echo e(asset('content/css/latofont.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('content/css/_lv_automation.css')); ?>" type=" text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--     <link rel="stylesheet" href="content/css/intlTelInput.css"> -->

<style type="text/css">
  .form-section .invalid-feedback {
    display: block;
    position: relative;
    font-size: 11px;
    color: #d0332f !important;
    left: 0 !important;
    animation: slide-up-fade-in ease 1s;
    font-weight: 500;
    margin-top: 10px !important;
    margin-bottom: 10px;
    text-align: left;
}
</style>
</head>
<body>
  <!-- hyrbee -->
<div class="lv-automation">
  <div class="auth">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-7 gradient-bg d-none d-lg-block">
        <div class="large-img-wrap">
        <img width="600" class="img-fluid" src="<?php echo e(asset('content/img/register.svg')); ?>" />
      </div>
      </div>
      <div class="col-lg-5">
        <div class="form-section">
          <h1>Leave Tracker</h1>
          <span class="sub-title">Register an account</span>
          <form method="POST" action="<?php echo e(route('register')); ?>">
            <?php echo csrf_field(); ?>
             <div class="form-group">
               <label >Name <span class="required-icon" title="This field is required."></span></label>
                <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>">
                <?php if($errors->has('name')): ?>
                 <span class="invalid-feedback" role="alert">
                 <?php echo e($errors->first('name')); ?>

                 </span>
                <?php endif; ?>
             </div>
              <div class="form-group">
               <label >Company <span class="required-icon" title="This field is required."></span></label>
                <input id="company" type="text" class="form-control" name="company" value="<?php echo e(old('company')); ?>">
                <?php if($errors->has('company')): ?>
                 <span class="invalid-feedback" role="alert">
                 <?php echo e($errors->first('company')); ?>

                 </span>
                <?php endif; ?>
             </div>
             <div class="form-group">
               <label >Employee ID <span class="required-icon" title="This field is required."></span></label>
                <input id="employee_id" type="text" class="form-control" name="employee_id" value="<?php echo e(old('employee_id')); ?>">
                <?php if($errors->has('employee_id')): ?>
                 <span class="invalid-feedback" role="alert">
                 <?php echo e($errors->first('employee_id')); ?>

                 </span>
                <?php endif; ?>
             </div>
             <div class="form-group">
               <label >Email <span class="required-icon" title="This field is required."></span></label>
                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>">
                <?php if($errors->has('email')): ?>
                 <span class="invalid-feedback" role="alert">
                 <?php echo e($errors->first('email')); ?>

                 </span>
                <?php endif; ?>
             </div>
              <div class="form-group">
               <label >Phone <span class="required-icon" title="This field is required."></span></label>
                <input id="phone" type="text" class="form-control" name="phone" value="<?php echo e(old('phone')); ?>"> 
                <?php if($errors->has('phone')): ?>
                 <span class="invalid-feedback" role="alert">
                 <?php echo e($errors->first('phone')); ?>

                 </span>
                <?php endif; ?>
             </div>
             <div class="form-group">
               <label >Password <span class="required-icon" title="This field is required."></span></label>
                <input id="password" type="password" class="form-control" name="password" value="<?php echo e(old('password')); ?>">
                <a class="eye-icon"><i class="material-icons md-light">visibility</i></a>
                <a class="eye-slash-icon"><i class="material-icons md-light">visibility_off</i></a>
                <?php if($errors->has('password')): ?>
                 <span class="invalid-feedback" role="alert">
                 <?php echo e($errors->first('password')); ?>

                 </span>
                <?php endif; ?>
             </div>
             <button type="submit" class="btn btn-default w-100 mt-3 mb-4 filz"><span>Register</span></button>
          </form>
          <span>
            <a href="<?php echo e(route('login')); ?>" class="link">Already Registered ? Sign In</a>
          </span>
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
<!-- <script src="scripts/intlTelInput.min.js"></script> -->
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

</body>
</html>
<?php /**PATH C:\xampp\htdocs\leave-tracker\resources\views/auth/register.blade.php ENDPATH**/ ?>