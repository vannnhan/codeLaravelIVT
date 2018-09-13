<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Vạn Liên Hoa | @yield('title')</title>
  <base href="{{asset('')}}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="Theme/Admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="Theme/Admin/bower_components/font-awesome/css/font-awesome.min.css">
  
  <!-- Ionicons -->
  <link rel="stylesheet" href="Theme/Admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Theme/Admin/dist/css/AdminLTE.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="Theme/Admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="Theme/Admin/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="Theme/Admin/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="Theme/Admin/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="Theme/Admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="Theme/Admin/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="Theme/Admin/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="Theme/Admin/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="Theme/Admin/bower_components/select2/dist/css/select2.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="Theme/Admin/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="Theme/Admin/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">


  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="Theme/Admin/dist/css/skins/_all-skins.min.css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style>
      .example-modal .modal {
        position: relative;
        top: auto;
        bottom: auto;
        right: auto;
        left: auto;
        display: block;
        z-index: 1;
      }
  
      .example-modal .modal {
        background: transparent !important;
      }
    </style>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="admin" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>VLH</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Vạn Liên Hoa</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          {{-- <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="Theme/Admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li> --}}
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          {{-- <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li> --}}
          <!-- Tasks Menu -->
          {{-- <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li> --}}

          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="upload/user/{{Auth::user()->avatar != "avatar.png" ? Auth::user()->user.'/' : ''}}{{Auth::user()->avatar != "avatar.png" ? 'avatar/' : ''}}{{Auth::user()->avatar}}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="upload/user/{{Auth::user()->avatar != "avatar.png" ? Auth::user()->user.'/' : ''}}{{Auth::user()->avatar != "avatar.png" ? 'avatar/' : ''}}{{Auth::user()->avatar}}" class="img-circle" alt="User Image">

                <p>
                  {{Auth::user()->name}}
                  <small>{{Auth::user()->created_at}}</small>
                </p>
              </li>
              <!-- Menu Body -->
              {{--  <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>  --}}
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="admin/profile/{{Auth::id()}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{url('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          {{-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> --}}
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="upload/user/{{Auth::user()->avatar != "avatar.png" ? Auth::user()->user.'/' : ''}}{{Auth::user()->avatar != "avatar.png" ? 'avatar/' : ''}}{{Auth::user()->avatar}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="{{route('search')}}" method="get" class="sidebar-form" role="form">
        <div class="input-group">
          <input type="text" name="key" class="form-control" placeholder="Tên Cty hoặc MST">
          <span class="input-group-btn">
              <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
               
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree" id="nav">
        <li class="header">MENU</li>        
        <!-- Optionally, you can add icons to the links -->
        
        {{--  <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>  --}}
        <li><a href="{{route('Admin')}}"><i class="fa fa-calendar"></i> <span>DashBoard</span></a></li>

        @if(Auth::user()->hasRole('1') || Auth::user()->hasRole('2'))
        <li class="treeview">
          <a href="admin/company"><i class="fa fa-bank"></i> <span>Quản lý khách hàng</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            {!! Auth::user()->role=='1' ? '<li><a href="admin/company">Tất cả công ty</a></li>' : '' !!}
            {!! Auth::user()->role=='1' ? '<li><a href="admin/customer">Tất cả liên hệ</a></li>' : '' !!}
            @if(Auth::user()->hasRole('2'))<li><a href="admin/company/assign-{{Auth::id()}}">Danh sách công ty</a></li>@endif
            @if(Auth::user()->hasRole('2'))<li><a href="admin/customer/assign-{{Auth::id()}}">Danh sách liên hệ</a></li>@endif
          </ul>
        </li>
        @endif
        
        <li class="treeview">
          <a href="admin/contract"><i class="fa fa-diamond"></i> <span>Quản lý hợp đồng</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            @if(Auth::user()->hasRole('1')) 
              <li><a href="admin/contract"><i class="fa fa-angle-double-right"></i> Tất cả hợp đồng</a></li>
            @endif

            @if(Auth::user()->hasRole('2'))
              <li><a href="admin/contract/mycontract-{{Auth::id()}}"><i class="fa fa-angle-double-right"></i> Hợp đồng của tôi</a></li>
            @endif

            @if(Auth::user()->hasRole('1') || Auth::user()->hasRole('3'))
              <li><a href="admin/contract/show-1"><i class="fa fa-angle-double-right"></i> Đang xử lý</a></li>
            @endif

            @if(Auth::user()->hasRole('1') || Auth::user()->hasRole('4') AND Auth::user()->sub_role == '1')
              <li><a href="admin/contract/show-2"><i class="fa fa-angle-double-right"></i> Đã xác nhận</a></li>
              <li><a href="admin/contract/show-3"><i class="fa fa-angle-double-right"></i> Đang thực hiện</a></li>
            @endif

            @if(Auth::user()->hasRole('4'))
              <li><a href="admin/contract/contractwork"><i class="fa fa-angle-double-right"></i> Hợp đồng đang thực hiện</a></li>
            @endif

            @if(Auth::user()->hasRole('1'))
              <li><a href="admin/contract/show-4"><i class="fa fa-angle-double-right"></i> Đã hoàn thành</a></li>
              <li><a href="admin/contract/show-5"><i class="fa fa-angle-double-right"></i> Hợp đồng hủy</a></li>
            @endif

          </ul>
        </li>
        
        <li><a href="admin/calendar"><i class="fa fa-calendar"></i> <span>Lịch</span></a></li>
        <li><a href="admin/file"><i class="fa fa-folder-open-o"></i> <span>Quản lý file</span></a></li>

        @if(Auth::user()->hasRole('1'))
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gear"></i> <span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="admin/setting/user"><i class="fa fa-user"></i> Nhân viên</a></li>

            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> City & CoType
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="admin/setting/city"><i class="fa fa-key"></i> Thành phố</a></li>
                <li><a href="admin/setting/cotype"><i class="fa fa-key"></i> Loại khách hàng</a></li>
                {{--  <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>  --}}
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class="fa fa-newspaper-o"></i> Hợp đồng
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="admin/setting/cttype"><i class="fa fa-paper-plane"></i> Loại hợp đồng</a></li>
                <li><a href="admin/setting/form"><i class="fa fa-cog"></i> Form mẫu</a></li>
              </ul>
            </li>
          </ul>
        </li>
        @endif
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('main')
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Hôm nay là {{date('d/m/Y')}} - VLH System <b>v1.0.1</b> 
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; {{date('Y')}} -  <a href="https://www.vanlienhoa.com">Công ty môi trường Vạn Liên Hoa</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  {{-- <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside> --}}
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 3 -->
<script src="Theme/Admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="Theme/Admin/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="Theme/Admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="Theme/Admin/dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="Theme/Admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="Theme/Admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="Theme/Admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="Theme/Admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="Theme/Admin/dist/js/demo.js"></script>
<!-- date-range-picker -->
<script src="Theme/Admin/bower_components/moment/min/moment.min.js"></script>
<script src="Theme/Admin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="Theme/Admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="Theme/Admin/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="Theme/Admin/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="Theme/Admin/plugins/iCheck/icheck.min.js"></script>
<!-- InputMask -->
<script src="Theme/Admin/plugins/input-mask/jquery.inputmask.js"></script>
<script src="Theme/Admin/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="Theme/Admin/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="Theme/Admin/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- CK Editor -->
<script src="Theme/Admin//bower_components/ckeditor/ckeditor.js"></script>
<!-- page script -->

<!-- Form input setup -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
<!-- END Form input setup -->

<script>
  /** add active class and stay opened when selected */
  var url = window.location;

  // for sidebar menu entirely but not cover treeview
  $('ul.sidebar-menu a').filter(function() {
    return this.href == url;
  }).parent().addClass('active');

  // for treeview
  $('ul.treeview-menu a').filter(function() {
    return this.href == url;
  }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');

</script>

<!-- fullCalendar -->
<script src="Theme/Admin/bower_components/moment/moment.js"></script>
<script src="Theme/Admin/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script>
    $(function () {
  
      /* initialize the external events
       -----------------------------------------------------------------*/
      function init_events(ele) {
        ele.each(function () {
  
          // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
          // it doesn't need to have a start or end
          var eventObject = {
            title: $.trim($(this).text()) // use the element's text as the event title
          }
  
          // store the Event Object in the DOM element so we can get to it later
          $(this).data('eventObject', eventObject)
  
          // make the event draggable using jQuery UI
          $(this).draggable({
            zIndex        : 1070,
            revert        : true, // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
          })
  
        })
      }
  
      init_events($('#external-events div.external-event'))
  
      /* initialize the calendar
       -----------------------------------------------------------------*/
      //Date for the calendar events (dummy data)
      var date = new Date()
      var d    = date.getDate(),
          m    = date.getMonth(),
          y    = date.getFullYear()
      $('#calendar').fullCalendar({
        header    : {
          left  : 'prev,next today',
          center: 'title',
          right : 'month,agendaWeek,agendaDay'
        },
        buttonText: {
          today: 'today',
          month: 'month',
          week : 'week',
          day  : 'day'
        },
        //Random default events
        events    : [
          {
            title          : 'All Day Event',
            start          : new Date(y, m, 1),
            backgroundColor: '#f56954', //red
            borderColor    : '#f56954' //red
          },
          {
            title          : 'Long Event',
            start          : new Date(y, m, d - 5),
            end            : new Date(y, m, d - 2),
            backgroundColor: '#f39c12', //yellow
            borderColor    : '#f39c12' //yellow
          },
          {
            title          : 'Meeting',
            start          : new Date(y, m, d, 10, 30),
            allDay         : false,
            backgroundColor: '#0073b7', //Blue
            borderColor    : '#0073b7' //Blue
          },
          {
            title          : 'Lunch',
            start          : new Date(y, m, d, 12, 0),
            end            : new Date(y, m, d, 14, 0),
            allDay         : false,
            backgroundColor: '#00c0ef', //Info (aqua)
            borderColor    : '#00c0ef' //Info (aqua)
          },
          {
            title          : 'Birthday Party',
            start          : new Date(y, m, d + 1, 19, 0),
            end            : new Date(y, m, d + 1, 22, 30),
            allDay         : false,
            backgroundColor: '#00a65a', //Success (green)
            borderColor    : '#00a65a' //Success (green)
          },
          {
            title          : 'Click for Google',
            start          : new Date(y, m, 28),
            end            : new Date(y, m, 29),
            url            : 'http://google.com/',
            backgroundColor: '#3c8dbc', //Primary (light-blue)
            borderColor    : '#3c8dbc' //Primary (light-blue)
          }
        ],
        editable  : true,
        droppable : true, // this allows things to be dropped onto the calendar !!!
        drop      : function (date, allDay) { // this function is called when something is dropped
  
          // retrieve the dropped element's stored Event Object
          var originalEventObject = $(this).data('eventObject')
  
          // we need to copy it, so that multiple events don't have a reference to the same object
          var copiedEventObject = $.extend({}, originalEventObject)
  
          // assign it the date that was reported
          copiedEventObject.start           = date
          copiedEventObject.allDay          = allDay
          copiedEventObject.backgroundColor = $(this).css('background-color')
          copiedEventObject.borderColor     = $(this).css('border-color')
  
          // render the event on the calendar
          // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
          $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)
  
          // is the "remove after drop" checkbox checked?
          if ($('#drop-remove').is(':checked')) {
            // if so, remove the element from the "Draggable Events" list
            $(this).remove()
          }
  
        }
      })
  
      /* ADDING EVENTS */
      var currColor = '#3c8dbc' //Red by default
      //Color chooser button
      var colorChooser = $('#color-chooser-btn')
      $('#color-chooser > li > a').click(function (e) {
        e.preventDefault()
        //Save color
        currColor = $(this).css('color')
        //Add color effect to button
        $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
      })
      $('#add-new-event').click(function (e) {
        e.preventDefault()
        //Get value and make sure it is not null
        var val = $('#new-event').val()
        if (val.length == 0) {
          return
        }
  
        //Create events
        var event = $('<div />')
        event.css({
          'background-color': currColor,
          'border-color'    : currColor,
          'color'           : '#fff'
        }).addClass('external-event')
        event.html(val)
        $('#external-events').prepend(event)
  
        //Add draggable funtionality
        init_events(event)
  
        //Remove event from text input
        $('#new-event').val('')
      })
    })
</script>
<!-- EndCalender -->
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>