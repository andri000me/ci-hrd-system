<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="POWER MANAGEMENT">
  <title>Izin - Dewanstudio Power Management</title>
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
  <!-- CUSTOM CSS -->
  <style type="text/css">
    .custompagination a {
      border: 1px solid #BABFC7;
      padding: .5rem .75rem;
      margin-left: -1px;
      display: block;
      line-height: 1.25;
      border-top-left-radius: .25rem;
      border-bottom-left-radius: .25rem;
    }
  </style>
  <!-- END CUSTOM CSS -->

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
                  <span class="user-name text-bold-700"><?=$this->session->userdata('full_name')?></span>
                </span>
                <span class="avatar avatar-online">
                  <?php if (!empty($this->session->userdata('img'))) { ?>
                  <img src="<?=base_url()?>clients/user/<?=$this->session->userdata('img')?>" alt="avatar"><!-- <i></i> --></span>
                  <?php } ?>
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
			<h1 class="text-center" style="padding:40px 0 40px 0;"><b>IZIN</b></h1>
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
                    <!-- Task List table -->
                    <div class="table-responsive">
                      <table id="project-bugs-list" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                        <thead>
                          <tr>
                            <th>NO.</th>
                            <th>NAME</th>
                            <th>MULAI TANGGAL</th>
                            <th>SAMPAI TANGGAL</th>
              				<th>ALASAN</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          if ($number != null) {
                            $i = $number+1;
                          }
                          else{
                            $i = 1;
                          } 
                          ?>
                          <?php if(!empty($ambil_izin)){ ?>
                          <?php foreach($ambil_izin as $a => $izin){ ?>
                          <?php 
                          if($izin['approved'] == 0) {
                              $status = 'Pending';
                          }
                          elseif($izin['approved'] == 1) {
                              $status = 'Approved';
                          }
                          else {
                            $status = 'Rejected';
                          }

                          $tanggalmulai = date('d F Y', strtotime($izin['tanggal_mulai']));
                          $tanggalakhir = date('d F Y', strtotime($izin['tanggal_akhir']));
                          ?>
                          <tr>
                            <td><a href="#" class="text-bold-600"><?php echo $i; ?></a></td>
                            <td>
                              <a href="team-detail.html" class="text-bold-600"><h5><?=$izin['name']?></h5></a>
                            </td>
                            <td>
                              <h5><?=$tanggalmulai?></h5>
                            </td>
							              <td>
                              <h5><?=$njay = (!empty($izin['tanggal_akhir'])) ? $tanggalakhir:'-'?></h5>
                            </td>
							<td>
                              <h5><a href="#"><?=$izin['alasan']?></a></h5>
                            </td>
                            <td>
                              <h5><a href="#"><?=$status?></a></h5>
                            </td>
                            <td>
                              <span class="dropdown">
                                  <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-info">
                                    <i class="ft-eye">Approval</i>
                                  </button>
                                  <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                    <a href="<?=base_url()?>izin/approve?a=<?=$izin['id']?>&x=1" class="dropdown-item info">
                                      Approve
                                    </a>
                                    <a href="<?=base_url()?>izin/reject?a=<?=$izin['id']?>&x=2" class="dropdown-item danger">
                                      Reject
                                    </a>
                                  </span>
                                </span>
                            </td>
                          </tr>
                          <?php $i++; ?>
                          <?php } ?>
                          <?php } ?>

                        </tbody>
                      </table>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                          <div class="dataTables_info" id="project-bugs-list_info" role="status" aria-live="polite" style="padding-top: 0.85em;">
                            <?php
                              $hitungdata = $number+5;
                              if ($hitungdata > $datacount) {
                                $hitungdata = $datacount;
                              }
                            ?>
                            Showing <?php echo $number+1; ?> to <?php echo $hitungdata; ?> of <?php echo $datacount; ?> entries
                          </div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                          <div class="dataTables_paginate paging_simple_numbers" id="project-bugs-list_paginate">
                            <?=$pagination?>
                          </div>
                        </div>
                      </div>
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
  
  <!-- <script src="<?=base_url()?>assets/vendors/js/tables/jquery.dataTables.min.js" type="text/javascript"></script> -->
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