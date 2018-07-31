<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="POWER MANAGEMENT">
  <title>Absen - Dewanstudio Power Management</title>
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
  <!-- END CSS -->

</head>



<body class="horizontal-layout horizontal-menu horizontal-menu-padding 2-columns   menu-expanded"
data-open="click" data-menu="horizontal-menu" data-col="2-columns">
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
        <li class="nav-item" data-menu=""><a class="nav-link" href="#" data-toggle=""><i class="icon-list"></i><span>TEAM LIST</span></a>
        </li>
        <li class="nav-item" data-menu=""><a class="nav-link" href="<?=base_url()?>dashboard" data-toggle=""><i class="icon-grid"></i><span>HRD SYSTEM</span></a>
        </li>
        <li class="nav-item" data-menu=""><a class="nav-link" href="#" data-toggle=""><i class="icon-note"></i><span>PROJECT LIST</span></a>
        </li>
      </ul>
    </div>
    <!-- end menu navbar dahsboard dll -->
  </div>


  <div class="app-content container center-layout mt-2">
    <div class="content-wrapper">
      <div class="content-body">
    		<div>
    			<h1 class="text-center" style="padding:40px 0 40px 0;"><b>HRD SYSTEM</b></h1>
    		</div>

        <!-- menu absen dll -->
        <div class="row">

          <div class="col-xl-2 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <a href="<?=base_url()?>absen">
                  <div class="card-body">
                    <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="info">Absen</h3>
                    </div>
                    <div>
                      <i class="icon-check info font-large-2 float-right"></i>
                    </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-xl-2 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
              <a href="<?=base_url()?>reportproject">
                  <div class="card-body-report">
                    <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="warning">Project Report</h3>
                    </div>
                    <div>
                      <i class="icon-pie-chart warning font-large-2 float-right"></i>
                    </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-xl-2 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
              <a href="<?=base_url()?>cuti">
                  <div class="card-body">
                    <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="success">Cuti</h3>
                    </div>
                    <div>
                      <i class="icon-user-follow success font-large-2 float-right"></i>
                    </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-xl-2 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
              <a href="<?=base_url()?>sakit">
                  <div class="card-body">
                    <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="danger">Sakit</h3>
                    </div>
                    <div>
                      <i class="icon-heart danger font-large-2 float-right"></i>
                    </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-xl-2 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
              <a href="<?=base_url()?>izin">
                  <div class="card-body">
                    <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="warning">Izin</h3>
                    </div>
                    <div>
                      <i class="icon-doc warning font-large-2 float-right"></i>
                    </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-xl-2 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
              <a href="<?=base_url()?>penilaian">
                  <div class="card-body">
                    <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="info">Penilaian</h3>
                    </div>
                    <div>
                      <i class="icon-pencil info font-large-2 float-right"></i>
                    </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>

        </div>
        <!-- end menu absen dll -->

        
        <div class="row">
          <div id="recent-transactions" class="col-xl-8 col-lg-6 col-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title-center">ABSEN</h2>
              </div>
              <div class="pr-xl-1 px-xl-1">
                <button class="btn btn-lg btn-block font-medium-1 btn-outline-success mb-1 block-element"> CHECK IN</button>
              </div>
              <div class="pl-xl-1 px-xl-1">
                <button class="btn btn-lg btn-block font-medium-1 btn-outline-success mb-1 block-element"> CHECK OUT</button>
              </div>
            </div>
          </div>

          <div id="recent-transactions" class="col-xl-4 col-lg-6 col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title-center">JUNE 2018</h4>
                <h5 class="p-xl-1"><b>TOTAL ABSEN : 20</b></h5>
                <div class="pl-xl-1 pr-xl-1 px-xl-1">
                  <b>JUNE 5, 2018</b>
                  <p class="m-xl-0">CHECK IN : 08.20 - LATE (-1)</p>
                  <p class="m-xl-0">CHECK OUT : 17.20 - OOW (-1)</p>
                </div>

                <div class="p-xl-1">
                  <b>JUNE 4, 2018</b>
                  <p class="m-xl-0">CHECK IN : 08.00 - OK (+1)</p>
                  <p class="m-xl-0">CHECK OUT : 17.00 - OK (+1)</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/ Recent Transactions -->       
      </div>
    </div>
  </div>
  
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
  <!-- JS -->

</body>
</html>