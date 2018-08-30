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
      			<h1 class="text-center" style="padding:40px 0 40px 0;"><b>PENILAIAN <?=$row->name?></b></h1>
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
          <a href="<?=base_url()?>penilaian/edit/<?=$row->id?>">
            <button class="btn btn-info round" type="button">EDIT</button>
          </a>
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

                    
                    <div class="table-responsive">
                      <table id="project-bugs-list" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                        <thead>
                          <tr>
                            <th>QUESTION</th>
                            <th>ANSWER/POINT</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
							               <td>
                              <h5>Pemahaman pembuatan rencana / program kerja sesuai jabatannya</h5>
                            </td>
							               <td>
                              <h5><?=$row->pemahaman_tugas1?></h5>
                            </td>
                          </tr>
                          <tr>
                             <td>
                              <h5>Pemahaman terhadap proses / alur bisnis di unit kerjanya</h5>
                            </td>
                             <td>
                              <h5><?=$row->pemahaman_tugas2?></h5>
                            </td>
                          </tr>
                          <tr>
                             <td>
                              <h5>Pemahaman terhadap prosedur standar pelayanan konsumen</h5>
                            </td>
                             <td>
                              <h5><?=$row->pemahaman_tugas3?></h5>
                            </td>
                          </tr>
                          <tr>
                             <td>
                              <h5>Pemahaman terhadap prosedur standar kebersihan lingkungan kerja</h5>
                            </td>
                             <td>
                              <h5><?=$row->pemahaman_tugas4?></h5>
                            </td>
                          </tr>
                          <tr>
                             <td>
                              <h5>Pemahaman tentang strategi pengembangan diri</h5>
                            </td>
                             <td>
                              <h5><?=$row->pemahaman_tugas5?></h5>
                            </td>
                          </tr>
                          <tr>
                             <td>
                              <h5>Pemahaman terhadap nilai-nilai budaya perusahaan (GROUP)</h5>
                            </td>
                             <td>
                              <h5><?=$row->pemahaman_tugas6?></h5>
                            </td>
                          </tr>
                          <tr>
                             <td>
                              <h5>Ketepatan waktu pelaksanaan rencana kerja</h5>
                            </td>
                             <td>
                              <h5><?=$row->pelaksanaan_tugas1?></h5>
                            </td>
                          </tr>
                          <tr>
                             <td>
                              <h5>Kecepatan waktu pelaksanaan kerja</h5>
                            </td>
                             <td>
                              <h5><?=$row->pelaksanaan_tugas2?></h5>
                            </td>
                          </tr>
                          <tr>
                             <td>
                              <h5>Ketelitian dalam pengerjaan tugas</h5>
                            </td>
                             <td>
                              <h5><?=$row->pelaksanaan_tugas3?></h5>
                            </td>
                          </tr>
                          <tr>
                             <td>
                              <h5>Kerapihan dalam penataan arsip / dokumen pekerjaan</h5>
                            </td>
                             <td>
                              <h5><?=$row->pelaksanaan_tugas4?></h5>
                            </td>
                          </tr>
                          <tr>
                             <td>
                              <h5>Ketahanan dalam bekerja</h5>
                            </td>
                             <td>
                              <h5><?=$row->pelaksanaan_tugas5?></h5>
                            </td>
                          </tr>
                          <tr>
                             <td>
                              <h5>Sistematika kerja (prosedural – sesuai SOP)</h5>
                            </td>
                             <td>
                              <h5><?=$row->pelaksanaan_tugas6?></h5>
                            </td>
                          </tr>
                          <tr>
                             <td>
                              <h5>Kebugaran dan kebersihan diri</h5>
                            </td>
                             <td>
                              <h5><?=$row->penampilan_diri1?></h5>
                            </td>
                          </tr>
                          <tr>
                             <td>
                              <h5>Kerapihan dalam berpakaian</h5>
                            </td>
                             <td>
                              <h5><?=$row->penampilan_diri2?></h5>
                            </td>
                          </tr>
                          <tr>
                             <td>
                              <h5>Semangat kerja</h5>
                            </td>
                             <td>
                              <h5><?=$row->sikap_kerja1?></h5>
                            </td>
                          </tr>
                          <tr>
                             <td>
                              <h5>Kepatuhan menjalankan peraturan perusahaan</h5>
                            </td>
                             <td>
                              <h5><?=$row->sikap_kerja2?></h5>
                            </td>
                          </tr>
                          <tr>
                             <td>
                              <h5>Kepatuhan terhadap instruksi kerja unit / pimpinan</h5>
                            </td>
                             <td>
                              <h5><?=$row->sikap_kerja3?></h5>
                            </td>
                          </tr>
                          <tr>
                             <td>
                              <h5>Penyesuaian diri terhadap lingkungan kerja</h5>
                            </td>
                             <td>
                              <h5><?=$row->sikap_kerja4?></h5>
                            </td>
                          </tr>
                          <tr>
                             <td>
                              <h5>Kepedulian terhadap lingkungan kerja</h5>
                            </td>
                             <td>
                              <h5><?=$row->sikap_kerja5?></h5>
                            </td>
                          </tr>
                          <tr>
                             <td>
                              <h5>Kedisiplinan</h5>
                            </td>
                             <td>
                              <h5><?=$row->sikap_kerja6?></h5>
                            </td>
                          </tr>
                          <tr>
                             <td>
                              <h5>CATATAN KHUSUS</h5>
                            </td>
                             <td>
                              <h5><?=$row->catatan_khusus?></h5>
                            </td>
                          </tr>
                          <tr>
                             <td>
                              <h5>AREA YANG HARUS DIPERBAIKI</h5>
                            </td>
                             <td>
                              <h5><?=$row->area_ygharusdiperbaiki?></h5>
                            </td>
                          </tr>
                          <tr>
                             <td>
                              <h5>AREA YANG HARUS DIPERTAHANKAN</h5>
                            </td>
                             <td>
                              <h5><?=$row->area_ygharusdipertahankan?></h5>
                            </td>
                          </tr>
                          <tr>
                             <td>
                              <h5>REKOMENDASI</h5>
                            </td>
                             <td>
                              <h5><?=$row->rekomendasi?></h5>
                            </td>
                          </tr>


                        </tbody>
                      </table>
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

