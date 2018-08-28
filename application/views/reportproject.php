<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="POWER MANAGEMENT">
  <title>Project Report - Dewanstudio Power Management</title>
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
      <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2">
          <div>
			<h1 class="text-center" style="padding:40px 0 40px 0;"><b>PROJECT REPORT</b></h1>
		  </div>
        </div>
      </div>
      <div class="content-detached content-right">
        <div class="">
          <section class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <div class="heading-elements">
                    <a href="<?=base_url()?>reportproject/add"><button class="btn btn-primary btn-md"><i class="ft-plus white"></i> CREATE PROJECT</button></a>
                  </div>
                </div>

                <div class="card-content">
                  <div class="card-body">
                    <!-- Task List table -->
                    <?php if(empty($row)){
                      echo "<h1 style='text-align:center;'>TIDAK ADA DATA</h1>";
                    }?>
                    <?php if(!empty($row)) { ?>
                    <div class="table-responsive">
                      <table id="project-bugs-list" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                        <thead>
                          <tr>
                            <th>NO.</th>
                            <th>PROJECT NAME</th>
                            <th>UPDATED DATE</th>
                            <th>STATUS</th>
                            <th>UPDATE BY</th>
              							<th>TOTAL REPORT</th>
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
                        <?php foreach ($row as $key => $isi) { ?>
                        <?php
                          $tanggal = date('F d, Y', strtotime($isi['project_start']));
                          if ($isi['project_status'] == '1') {
                            $status = '<button type="button" class="btn btn-sm btn-outline-danger round">Billing</button>';
                          }
                          elseif ($isi['project_status'] == '2') {
                            $status = '<button type="button" class="btn btn-sm btn-outline-warning round">Development</button>';
                          }
                          elseif ($isi['project_status'] == '3') {
                            $status = '<button type="button" class="btn btn-sm btn-outline-success round">Marketing</button>';
                          }
                          elseif ($isi['project_status'] == '4') {
                            $status = '<button type="button" class="btn btn-sm btn-outline-info round">Maintenance</button>';
                          }

                        ?>
                          <tr>
                            <td><p class="text-bold-600"><?=$i?></p></td>
                            <td>
                              <a href="<?=base_url()?>reportproject/detail/<?=$isi['id'];?>" class="text-bold-600"><?=$isi['project_name'];?></a>
                            </td>
                            <td class="text-center">
                               <?php if(!empty($lastupdate[$i])) { ?>
							                 <h5><?php echo date('F d, Y', strtotime($lastupdate[$i]->date));?></h5>
                               <?php } else { ?>
                               <h5>-</h5>
                               <?php } ?>
                               <h6>(Project Since <?=$tanggal?>)</h6>
                            </td>
                            <td>
                              <?=$status?>
                            </td>
                            <?php if(!empty($lastupdate[$i])){?>
							              <td class="text-truncate">
                              <span class="avatar avatar-xs">
                                <img class="box-shadow-2" src="<?=base_url()?>clients/user/<?=$lastupdate[$i]->img?>" alt="avatar">
                              </span>
                              <span><?=$lastupdate[$i]->name?></span>
                            </td>
							              <td>
                              <h5><?=$jumlahreport[$i]?></h5>
                            </td>
                            <?php } else { ?>
                            <td class="text-truncate">
                              <span class="avatar avatar-xs">
                                <img class="box-shadow-2" src="<?=base_url()?>clients/user/<?=$isi['img']?>" alt="avatar">
                              </span>
                              <span><?=$isi['name']?></span>
                            </td>
                            <td>
                              <h5>0</h5>
                            </td>
							              <?php } ?>
                            <td>
                              <span class="dropdown">
                                <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" class="btn btn-info"><i class="ft-eye"> View</i></button>
                                <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                  <a href="<?=base_url()?>reportproject/detail/<?=$isi['id'];?>" class="dropdown-item"><i class="ft-edit"></i> Report</a>
                                  <a href="<?=base_url()?>reportproject/edit/<?=$isi['id'];?>" class="dropdown-item"><i class="ft-edit-2"></i> Edit</a>
                                  <!-- <a href="<?=base_url()?>reportproject/delete/<?=$isi['id'];?>" class="dropdown-item"><i class="ft-trash"></i> Delete</a> -->
                                </span>
                              </span>
                            </td>
                          </tr>
                          <?php $i++; ?>
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
                    <?php } ?>
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

