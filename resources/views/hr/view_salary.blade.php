<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Leave Tracker</title>
    <!-- CSS -->
     <link rel="icon" href="{{asset('content/img/fav.png')}}" type="image/gif" sizes="32x32">
    <link rel="stylesheet" href="{{asset('content/css/bootstrap.min.css')}}" type="text/css">
     <link href="{{asset('content/css/latofont.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('content/css/_lv_automation.css')}}" type=" text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="stylesheet" href="{{asset('content/css/mobile-nav.css')}}" type=" text/css">
       <link rel="stylesheet" href="{{asset('content/css/custom-select.css')}}" type=" text/css">
       <style type="text/css">
       .user-name{
        color: white;
       }
     </style>
</head>
<body class="grey-bg">
    <div id="preloader">
        <div class="loader">
         <img width="30" class="img-fluid d-block mx-auto mt-2" src="{{asset('content/img/loader.svg')}}" />
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
        <a href="{{route('hr.home')}}" class="logo">
        <h1>{{auth()->user()->company}}</h1>
      </a>
      </div>
    
      <div class="col-lg-6 col-4">
        <ul class="top-right-nav float-right mb-0">
      
          <li class="nav-item dropdown show user-info">
  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="user-name">{{auth()->user()->name}}</span>
   <span class="user-icon">
   <i class="material-icons md-light">account_circle</i>
   </span>
  </a>

  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="{{route('hr.change_password')}}">Change Password</a>
    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                            <span class="sign-out-icon"></span>Sign Out
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
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
    <li><a href="{{route('hr.home')}}"><i class="material-icons md-light">dashboard</i> Dashboard</a></li>
    <li><a href="{{route('hr.employees')}}" ><i class="material-icons md-light">person</i> Employee</a></li>
    <li><a href="{{route('hr.groups')}}" ><i class="material-icons md-light">people</i> Groups</a></li>
    <li><a href="{{route('hr.leave_requests')}}"><i class="material-icons md-light">holiday_village</i> Leave Request</a></li>
    <li><a href="{{route('hr.documents')}}" class="active"><i class="material-icons md-light">folder</i> Document</a></li>
    @if(date('m')>=25 && date('m')<=31)
    <li title="This link will be enabled next month"><a href="{{route('hr.salary')}}" style="pointer-events: none"><i class="material-icons md-light">account_balance_wallet</i> Employee Salary</a></li>
    @else
    <li><a href="{{route('hr.salary')}}" id="salary"><i class="material-icons md-light">account_balance_wallet</i> Employee Salary</a></li>
    @endif
    <li><a href="{{route('hr.awards')}}"><i class="material-icons md-light">star</i> Awards</a></li>
    <li><a href="{{route('hr.expense')}}"><i class="material-icons md-light">account_balance_wallet</i> Expense</a></li>
    <li><a href="{{route('hr.holiday')}}"><i class="material-icons md-light">holiday_village</i> Holiday</a></li>
  </ul>
</div>
<div class="zeynep">
                <ul>
    <li><a class="top_menuactive" href="{{route('hr.home')}}"><i class="material-icons md-light">dashboard</i>Dashboard</a></li>



<li class="has-submenu">
          <a href="#" data-submenu="stores"><i class="material-icons md-light">person</i>Employee</a>

          <div id="stores" class="submenu">
            <div class="submenu-header" data-submenu-close="stores">
              <a href="#">Back</a>
            </div>

            <ul>
              <li>
                <a href="{{route('hr.create_employee')}}"><span class="plus-icon"></span> Create Employee</a></a>
              </li>
               <li> <a href="{{route('hr.employees')}}" class="active">Employees</a>   </li>
               <li> <a href="{{route('hr.inactive_employees')}}">Inactive Employees</a>   </li>
            </ul>
          </div>
        </li>
         <li class="has-submenu">
          <a href="{{route('hr.groups')}}" data-submenu="stores1"><i class="material-icons md-light">people</i>Groups</a>

          <div id="stores1" class="submenu">
            <div class="submenu-header" data-submenu-close="stores1">
              <a href="#">Back</a>
            </div>

            <ul>
               <li>
                <a href="{{route('hr.create_group')}}">Create Group</a></a>
              </li>

              <li>
                <a href="{{route('hr.groups')}}">Groups</a>
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
                                <li><a href="{{route('hr.add_document')}}"><i class="material-icons">publish</i> Upload Document</a></li>
                                    <li><a href="{{route('hr.documents')}}"><i class="material-icons">folder</i> Documents</a></li>
                                    <li><a href="{{route('hr.my_docs')}}"><i class="material-icons">folder</i> My Documents</a></li>
                                    <li><a href="{{route('hr.slip')}}" class="active"><i class="material-icons">folder</i>Salary Slip</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-10 pr-0 pl-0">
                            <div class="dash-right-wrap">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card p-4 mt-2">
                                            <embed src="{{asset('storage')}}/pdf/{{$salary->path}}" height="2100px" />
                                        </div>
                                    </div>

                                </div>
                            </div>



                            <span class="powered">Copyright © 2021 Leave Tracker, All rights reserved. Powered by <a href="http://skiloratech.com/" target="_blank">Skilora Technologies</a></span>

                        </div>
                    </div>
                </div>
            </div>


@if ($message = Session::get('success'))
<div class="success-message">
  <i class="material-icons md-light green">done</i>
  <span>{{$message}}</span>
</div>
@endif


  </div>
</div>
  <!-- hyrbee end-->
<footer>
            
</footer>

<!-- jQuery plugins -->
<script src="{{asset('scripts/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('scripts/popper.min.js')}}"></script>
<script src="{{asset('scripts/bootstrap.min.js')}}"></script> 
<script src="{{asset('scripts/jquery.zeynep.min.js')}}"></script>
<script src="{{asset('scripts/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('scripts/fastclick.js')}}"></script>
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