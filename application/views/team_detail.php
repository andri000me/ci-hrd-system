<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="POWER MANAGEMENT">
  <title>Team Detail - Dewanstudio Power Management</title>
  <link rel="apple-touch-icon" href="<?=base_url()?>assets/images/ico/apple-touch-icon-72-precomposed.png">
  <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>assets/images/ico/favicon.png">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/vendors.min.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/app.min.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/core/menu/menu-types/horizontal-menu.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">

  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendors/css/tables/extensions/rowReorder.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendors/css/tables/extensions/responsive.dataTables.min.css">
  <!-- END CSS -->

</head>


<body class="horizontal-layout horizontal-menu horizontal-menu-padding content-detached-left-sidebar   menu-expanded"
data-open="click" data-menu="horizontal-menu" data-col="content-detached-left-sidebar">
  
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-static-top navbar-light navbar-brand-center">
    <div class="navbar-wrapper">

      <!-- menu left navbar -->
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="dashboard.html">
              <img class="brand-logo" alt="logo" src="<?=base_url()?>assets/images/logo/logo-ds.png">
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-options-vertical"></i></a>
          </li>
        </ul>
      </div>
      <!-- end menu left navbar -->

      <!-- menu right notification -->
      <div class="navbar-container container center-layout">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
            
            <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
              <div class="search-input">
                <input class="input" type="text" placeholder="Search...">
              </div>
            </li>
          </ul>
          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1">Hello,
                  <span class="user-name text-bold-700">Naufal</span>
                </span>
                <span class="avatar avatar-online">
                  <img src="<?=base_url()?>assets/images/portrait/small/avatar-s-19.png" alt="avatar"><i></i></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a>
                <a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a>
                <a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a>
                <a
                class="dropdown-item" href="#"><i class="ft-message-square"></i> Chats</a>
                  <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="ft-power"></i> Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <!-- end menu right notification -->
    </div>
  </nav>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  
  
  <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow"
  role="navigation" data-menu="menu-wrapper">
  <!-- menu navbar dahsboard dll -->
    <div class="navbar-container main-menu-content container center-layout" data-menu="menu-container">
      <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
        <!--<li class="nav-item" data-menu="">
          <a class="nav-link" href="dashboard.html" data-toggle=""><i class="icon-home"></i>
            <span>DASHBOARD</span>
          </a>
        </li>-->
        <li class="nav-item" data-menu=""><a class="nav-link" href="team-list.html" data-toggle=""><i class="icon-list"></i><span>TEAM LIST</span></a>
        </li>
        <li class="nav-item" data-menu=""><a class="nav-link" href="dashboard.html" data-toggle=""><i class="icon-grid"></i><span>HRD SYSTEM</span></a>
        </li>
        <li class="nav-item" data-menu=""><a class="nav-link" href="project-report.html" data-toggle=""><i class="icon-note"></i><span>PROJECT LIST</span></a>
        </li>
      </ul>
    </div>
    <!-- end menu navbar dahsboard dll -->
  </div>


  <div class="app-content container center-layout mt-2">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2">
          <div>
      			<h1 class="text-center" style="padding:40px 0 40px 0;"><b>TEAM DETAIL</b></h1>
      		</div>
        </div>
      </div>

      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <div class="row breadcrumbs-top">
          </div>
          <!-- <h3 class="content-header-title mb-0">Horizontal Forms</h3> -->
        </div>
        <div class="content-header-right col-md-6 col-12">
          <div class="btn-group float-md-right pb-xl-2 my-1">
        <a href="<?=base_url()?>teamlist">
              <button class="btn btn-info round" type="button"><i class="ft-arrow-left icon-left"></i> Back to list</button>
      </a>
          </div>
        </div>
      </div>

      <div class="content-detached content-right">
        <div class="">
          <section class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-content">
                  <div class="card-body">

                    <div class="form-group row">
                      <div class="col-md-2">
                        <?php if(!empty($info->img)){ ?>
                        <img id="blah" src="<?=base_url()?>clients/user/<?php echo $info->img; ?>" alt="your image" width="100%" />
                        <?php } ?>
                      </div>
                      <div class="col-md-5">
                        <div class="col-md-12 pb-xl-1 py-xl-1">
                            <input type="text" id="projectinput1" class="form-control" placeholder="<?php echo $info->name; ?>"
                            name="fname" disabled="">
                          </div>

                          <div class="col-md-12 pb-xl-1 py-xl-1">
                            <input type="email" id="" class="form-control" placeholder="<?=$info->email?>"
                            name="email" disabled="">
                          </div>

                          <div class="col-md-12 pb-xl-1 py-xl-1">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ft-calendar"></i></span>
                              </div>
                              <input id="" class="form-control" name="date" type="" value="<?=$info->since?>" disabled="">
                            </div>
                          </div>
                      </div>
                      <div class="col-md-5">

                          <div class="col-md-12 pb-xl-1 py-xl-1">
                            <input class="form-control" name="selected" placeholder="<?=$rule?>" disabled="">
                          </div>

                        <div class="col-md-12 pb-xl-1 py-xl-1">
                          <input class="form-control" name="selected" placeholder="<?=$info->company?>" disabled="">
                        </div>

                        <div class="col-md-12 pb-xl-1 py-xl-1">
                          <input type="text" id="" class="form-control" placeholder="Total Cuti : 6 Hari" disabled="">
                        </div>
                      </div>
                    </div>
                    <!-- Task List table -->
                    <div class="table-responsive">
                      <table id="project-bugs-list" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                        <thead>
                          <tr>
                            <th>NO.</th>
                            <th>MONTH</th>
                            <th>TOTAL</th>
              							<th>ABSEN</th>
              							<th>SAKIT</th>
              							<th>CUTI</th>
              							<th>IZIN</th>
              							<th>PROJECT</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><a href="#" class="text-bold-600">1</a></td>
                            <td>
                              <h5>MAY 2018</h5>
                            </td>
                            <td>
                              <h5>234</h5>
                            </td>
                            <td>
                              <h5>20</h5>
                            </td>
							               <td>
                              <h5>40</h5>
                            </td>
							               <td>
                              <h5>5</h5>
                            </td>
							               <td>
                              <h5>24</h5>
                            </td>
							               <td>
                              <h5>49</h5>
                            </td>
                          </tr>
						              <tr>
                            <td><a href="#" class="text-bold-600">2</a></td>
                            <td>
                              <h5>APRIL 2018</h5>
                            </td>
                            <td>
                              <h5>20</h5>
                            </td>
							               <td>
                              <h5>40</h5>
                            </td>
							               <td>
                              <h5>10</h5>
                            </td>
							               <td>
                              <h5>50</h5>
                            </td>
							               <td>
                              <h5>30</h5>
                            </td>
                            <td>
                              <h5>30</h5>
                            </td>
                          </tr>
						  
						                <tr>
                            <td><a href="#" class="text-bold-600">3</a></td>
                            <td>
                              <h5>MARET 2018</h5>
                            </td>
                            <td>
							               <h5>350</h5>
                            </td>
                            <td>
                              <h5>30</h5>
                            </td>
							               <td>
                              <h5>20</h5>
                            </td>
							               <td>
                              <h5>5</h5>
                            </td>
							               <td>
                              <h5>8</h5>
                            </td>
							               <td>
                              <h5>23</h5>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8 pb-xl-1 py-xl-1">
              <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <div>
                      <h4><b>HASIL PENILAIAN 2017 : 350 Point</b></h4>
                      <h5>GOAL 2018 : Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4 pb-xl-1 py-xl-1">
              <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <div>
                      <h4><b>PENILAIAN 2018</b></h4>
                      <a href="penilaian.html" class="sort btn btn-block btn-outline-success btn-round">IKUTI</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  
 <!-- Footer -->
  <footer class="footer footer-transparent footer-light navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2 container center-layout">
      <span class="float-md-center d-block d-md-inline-block">Copyright &copy; 2018 DEWANSTUDIO, All rights reserved. </span>
    </p>
  </footer>
  <!-- end Footer -->
  
  <!-- JS -->
  <script src="<?=base_url()?>assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/vendors/js/ui/jquery.sticky.js"></script>
  <script src="<?=base_url()?>assets/js/core/app-menu.min.js" type="text/javascript"></script>
  <script src="<?=base_url()?>assets/js/core/app.min.js" type="text/javascript"></script>
  <script src="<?=base_url()?>assets/js/scripts/customizer.min.js" type="text/javascript"></script>
  
  <script src="<?=base_url()?>assets/vendors/js/tables/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="<?=base_url()?>assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"
  type="text/javascript"></script>
  <script src="<?=base_url()?>assets/vendors/js/tables/datatable/dataTables.responsive.min.js"
  type="text/javascript"></script>
  <script src="<?=base_url()?>assets/vendors/js/tables/datatable/dataTables.rowReorder.min.js"
  type="text/javascript"></script>
  <script src="<?=base_url()?>assets/js/scripts/pages/project-bug-list.min.js" type="text/javascript"></script>
  <!-- JS -->
  
</body>

</html>

