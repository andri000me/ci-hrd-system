<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://dewanstudio.com/reporting/assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://dewanstudio.com/reporting/assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://dewanstudio.com/reporting/assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="http://dewanstudio.com/reporting/assets/ico/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="http://dewanstudio.com/reporting/assets/ico/favicon.png">

<title>Dewanstudio Reporting System</title>

<!-- Bootstrap core CSS -->
<link href="http://dewanstudio.com/reporting/assets/css/bootstrap.css" rel="stylesheet">
<link href="http://dewanstudio.com/reporting/assets/css/datepicker.css" rel="stylesheet">
<link href="http://dewanstudio.com/reporting/assets/css/bootstrap-wysihtml5.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="http://dewanstudio.com/reporting/assets/css/style.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="http://dewanstudio.com/reporting/assets/js/html5shiv.js"></script>
  <script src="http://dewanstudio.com/reporting/assets/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
    var base_url = 'http://dewanstudio.com/reporting/';
</script>        <style>
            .reason{color: red;}
        </style>
    </head>
    <body>
        
        <ul class="breadcrumb">
            <li><a href="<?=base_url()?>timesheet">Timesheet</a></li>
            <li class="active">List</li>
        </ul>
        <div class="col-lg-12 sub-menu">
            <form class="form-inline" role="form">
                <?php if($maps){?>
                    <div class="btn-group">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                          <span class="glyphicon glyphicon-filter"></span> Filter by supervise <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="<?=base_url()?>timesheet">My Timesheet</a></li>
                            <?php foreach ($maps as $r){?>
                            <li class="<?=$a=$supervise==$r['child_id']?'active':''?>"><a href="<?=base_url()?>timesheet?supervise=<?=$r['child_id']?>"><?=$r['name']?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                <?php }?>
                <a class="btn btn-success" data-toggle="modal" data-target="#modal-sort"><span class="glyphicon glyphicon-sort"></span> Sort</a>
                <a class="btn btn-danger" href="<?=base_url()?>timesheet"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
                <a class="btn btn-success" href="<?=base_url()?>timesheet/print_monthly/<?=$supervise?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Print</a>
                <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Search by date">
                </div>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
            </form>
        </div>
        <div class="col-lg-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Punch in</th>
                        <th>Punch out</th>
                        <th>Modified</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($rows){?>
                        <?php foreach ($rows as $r){?>
                            <?php
                                $punch_in = true;
                                $punch_out = true;
                                if($r['punch_in'] > setting('punch_in')){
                                    $punch_in = false;
                                }
                                if(!empty($r['punch_out'])){
                                    if($r['punch_out'] < setting('punch_out')){
                                        $punch_out = false;
                                    }
                                } 
                            ?>
                            <tr>
                                <td>
                                    <!--<a class="link-detail" data-toggle="modal" data-target="#report-<?=$r['id']?>" title="View report" href="#">--><?=format_date($r['punch_date'],'l jS \of M Y')?><!--</a>-->
                                    <!-- Modal -->
                                    <div class="modal fade" id="report-<?=$r['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title" id="myModalLabel">Detail report <?=format_date($r['punch_date'],'F d, Y')?></h4>
                                            </div>
                                            <div class="modal-body">
                                                <?=$desc=empty($r['report']) ? 'No report' :nl2br($r['report'])?>
                                            </div>
                                            <?php if($r['user_id'] == user_id()){?>
                                                <?php if($r['punch_date'] >= $update_date){?>
                                                    <div class="modal-footer">
                                                        <a class="btn btn-primary" href="<?=base_url().'timesheet/edit/'.$r['punch_date']?>">Edit report</a>
                                                    </div>
                                                <?php }?>
                                            <?php }?>
                                        </div><!-- /.modal-content -->
                                      </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </td>
                                <td>
                                    <?php $in=empty($r['punch_in'])?'-':substr($r['punch_in'],0,5);?>
                                    <?php if(!$punch_in){?>
                                    <a class="link-detail reason" data-toggle="modal" data-target="#reason-in-<?=$r['id']?>" title="View reason" href="#"><?=$in?></a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="reason-in-<?=$r['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title" id="myModalLabel">Detail reason (punch in)</h4>
                                            </div>
                                            <div class="modal-body">
                                                <?=$desc=empty($r['punch_in_desc']) ? 'No reason' :nl2br($r['punch_in_desc'])?>
                                            </div>
                                        </div><!-- /.modal-content -->
                                      </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    <?php }else{?>
                                        <?=$in?>
                                    <?php }?>
                                </td>
                                <td>
                                    <?php $out=empty($r['punch_out'])?'-':substr($r['punch_out'],0,5);?>
                                    <?php if(!$punch_out){?>
                                    <a class="link-detail reason" data-toggle="modal" data-target="#reason-out-<?=$r['id']?>" title="View reason" href="#"><?=$out?></a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="reason-out-<?=$r['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title" id="myModalLabel">Detail reason (punch out)</h4>
                                            </div>
                                            <div class="modal-body">
                                                <?=$desc=empty($r['punch_out_desc']) ? 'No reason' :nl2br($r['punch_out_desc'])?>
                                            </div>
                                        </div><!-- /.modal-content -->
                                      </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    <?php }else{?>
                                        <?=$out?>
                                    <?php }?>
                                </td>
                                <td><?=format_date(date_utc($r['modified']),'F d, Y H:i:s')?></td>
                            </tr>
                        <?php }?>
                    <?php }else{?>
                        <tr>
                            <td colspan="4">No data</td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
            <div class="pagination"><?=$pagination?></div>
        </div>
        <div class="modal fade" id="modal-sort" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                  <form>
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Sort Data</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Field</label>
                            <select class="form-control" name="field">
                                <option value="punch_date">Date</option>
                                <option value="punch_in">Punch in</option>
                                <option value="punch_out">Punch out</option>
                                <option value="modified">Modified</option>
                            </select>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="sort" id="sort1" value="asc" checked>
                            Sort by Ascending
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="sort" id="sort2" value="desc">
                            Sort by Descending
                          </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="submit-comment" class="btn btn-primary">Submit</button>
                    </div>
                      <?php foreach ($url_sort as $f=>$v){?>
                        <input type="hidden" name="<?=$f?>" value="<?=$v?>" />
                      <?php }?>
                  </form>
              </div>
            </div>
        </div>

         <!-- Footer -->
  <footer class="footer footer-transparent footer-light navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2 container center-layout">
      <span class="float-md-center d-block d-md-inline-block">Copyright &copy; 2018 DEWANSTUDIO, All rights reserved. </span>
    </p>
  </footer>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
            <!-- JavaScript plugins (requires jQuery) -->
            <script type="text/javascript" src="http://dewanstudio.com/reporting/assets/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="http://dewanstudio.com/reporting/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://dewanstudio.com/reporting/assets/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="http://dewanstudio.com/reporting/assets/js/wysihtml5-0.3.0.js"></script>
    <script type="text/javascript" src="http://dewanstudio.com/reporting/assets/js/bootstrap-wysihtml5.js"></script>

    <script type="text/javascript">
        $(window).load(function() {
            hideError();
        });
        $(function(){
            $('a.top-menu,a.link-detail').tooltip({
                placement:'bottom'
            });
            $('a.link-top').tooltip({
                placement:'top'
            });
            if($( ".datepicker" ).length){
                $( ".datepicker" ).datepicker({
                        format:'yyyy-mm-dd'
                });
            }
            if($( ".htmlarea" ).length){
                $('.htmlarea').wysihtml5();
            }
            $('div.list-group-item-link').click(function(){
                if($(this).attr('href') != undefined)
               location.href = $(this).attr('href'); 
            });
        });
        function hideError()
        {
            if($('.error').length > 0){
                setTimeout("$('.error').fadeOut()",5000);
            }
        }

        function validateEmail(email) 
        { 
            var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        } 
    </script>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
    </body>
</html>