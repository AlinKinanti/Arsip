<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ARSIP Bakorwil 3 Malang</title>
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url().'/assets/gambar/logoIkon.ico';?>" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/skins/_all-skins.min.css">
  <script type="text/javascript" src="<?php echo base_url()?>assets/myJS.js"></script>

  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/iCheck/square/blue.css">
  <!-- iCheck -->
  <script src="<?php echo base_url()?>assets/plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
  </script>
  <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
  </script>

  <!-- jQuery 3 -->
  <script src="<?php echo base_url()?>assets/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url()?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="<?php echo base_url()?>assets/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url()?>assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?php echo base_url()?>assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url()?>assets/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url()?>assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url()?>assets/dist/js/demo.js"></script>
  <!-- page script -->
  <script>
    $(function () {
      $('#example1').DataTable({
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
      })
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
  </script>
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('dashboard'); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src='<?php echo base_url().'assets/gambar/logoBaperwil.png' ?>' width='30'></span>

      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>ARSIP </b>Bakorwil 3</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <i class="fa fa-user" style="font-size:15px;"></i>&nbsp;
              <b><span class="hidden-xs" style="font-size:15px;"><?php echo $this->session->userdata("nama"); ?></span></b>&nbsp;<i class="fa fa-angle-down" style="font-size:15px;"></i>
            </a>
            <ul class="dropdown-menu" style="width:10px;">
              <li>
                <a href="<?php echo base_url('keluar'); ?>" class="btn btn-flat bg-blue margin" style="margin:5px 5px 5px 5px;"><i class="fa fa-power-off"></i>Keluar</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Navigasi Menu</li>
        <li>
          <a href="<?php echo base_url('dashboard'); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="active">
          <a href="<?php echo base_url('suratmasuk'); ?>">
            <i class="fa fa-envelope-o"></i>
            <span>Surat Masuk</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('suratkeluar'); ?>">
            <i class="fa fa-send-o"></i>
            <span>Surat Keluar</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('ControllerSurat/daftarDisposisi'); ?>">
            <i class="fa fa-file"></i>
            <span>Daftar Disposisi</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Surat Masuk
        <small>Daftar Surat Masuk</small>
      </h1>
      <ol class="breadcrumb">
        <span id="date_time" style="font-size:15px;"></span>
        <script type="text/javascript">window.onload = date_time('date_time');</script><br>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">

            </div>

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-hover display nowrap" style="width:100%;">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>Tanggal Diterima</th>
                  <th>Tanggal Surat</th>
                  <th>Nomor Surat</th>
                  <th>Penerima</th>
                  <th>Perihal</th>
                  <th>Keterangan</th>
                  <th>Operasi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                   if(is_array($itemSurat)){
                    $i = 1;
                    foreach ($itemSurat as $item) {
                      $nS = $item['noSurat'];
                      ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo date("d/m/Y", strtotime($item['tgl'])); ?></td>
                        <td><?php echo date("d/m/Y", strtotime($item['tglSurat'])); ?></td>
                        <td><?php echo $item['noSurat']; ?></td>
                        <td><?php echo $item['pengirim']; ?></th>
                        <td><?php echo $item['perihal']; ?></th>
                        <td><?php echo $item['keterangan']; ?></td>
                          <td align=center>
                            <a href="<?php echo base_url().'lihatSurat/'.$item['id']; ?>" title="Lihat" class="btn bg-navy" target="_blank"><i class="fa  fa-folder-open-o"></i></a>
                          </td>
                        </tr>
                    <?php
                    $i++;
                    }
                   }
                 ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type = "text/javascript">
  function cetakDisposisi(noSurat)
    {
      $.ajax({
        url : "<?php echo site_url('admin/cetakSurat')?>/" + noSurat,
        type: "POST",
        success: function(data)
        {
          window.location.href = "<?php echo site_url('ControllerSurat/viewDisposisi/')?>"+noSurat
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log(errorThrown);
        }
    });
    }
  </script>
  <?php
                    if(is_array($itemDisposisi)){
                      $i = 1;
                      foreach ($itemDisposisi as $data) {
                        $nS = $data->noSurat;
                        ?>

                         <!---- !-- /.modal Lihat -->
<div class="modal fade" id="lihat-data<?php echo $i?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-titlee">Tambah Disposisi</h4>
        </div>
        <div class="modal-body">
        <!-- <div class="col-md-3"> -->
          <h2>Data Surat</h2>
          <form class="form-horizontal" action="<?php echo base_url('ControllerSurat/updateDisposisi');?> " method="post">
            <table style="font-size:15px;">
                <tr height=25>
                  <td>Pengirim</td>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td align=left>: <b><?php echo $data->pengirim; ?></b></td>
                </tr>
                <tr height=25>
                   <td>Tanggal Surat</td>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td align=left>:<b><?php echo date("d/m/Y", strtotime($data->tglSurat)); ?></b></td>
                </tr>
                <tr height=25>
                  <td>No Surat</td>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <input id="id_surat" type="hidden" name="id_surat" value="<?php echo $data->id; ?>">
                  <td align=left>: <b><?php echo $data->noSurat; ?></b></td>
                </tr>
                <tr height=25>
                  <td>Tanggal Diterima</td>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td align=left>:<b> <?php echo $data->tgl; ?></b></td>
                </tr>
                <tr height=25>
                  <td>Perihal</td>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td align=left>: <b><?php echo $data->perihal; ?></b></td>
                </tr>
                <tr height=25>
                  <td>Keterangan</td>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td align=left>: <b><?php echo $data->keterangan; ?></b></td>
                </tr>
              </table>
              <div class="form-group">
              <label class="col-lg-3 col-sm-3 control-label">Catatan KTU</label>
                <div class="col-lg-9">
                  <input class="form-control" type="text" name="catatan_ktu" value="<?php echo $data->catatan_ktu;?>" <?php if($this->session->userdata('jabatan')!=2){echo 'readonly';}else{echo 'required';}?>>
                </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 col-sm-3 control-label">Tanggal Disposisi KTU</label>
                <div class="col-lg-9">
                  <input class="form-control" type="date" name="tanggal_ktu" value="<?php  echo $data->tanggal_ktu;?>" readonly>
                </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 col-sm-3 control-label">Catatan SEKBAN</label>
                <div class="col-lg-9">
                  <input class="form-control" type="text" name="catatan_sekban" value="<?php echo  $data->catatan_sekban;?>" readonly>
                </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 col-sm-3 control-label">Tanggal Disposisi SEKBAN</label>
                <div class="col-lg-9">
                  <input class="form-control" type="date" name="tanggal_sekban" value="<?php  echo $data->tanggal_sekban;?>" readonly>
                </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 col-sm-3 control-label">Catatan KABAN</label>
                <div class="col-lg-9">
                  <input class="form-control" type="text" name="catatan_kaban" value="<?php  echo $data->catatan_kaban;?>"readonly>
                </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 col-sm-3 control-label">Tanggal Disposisi KABAN</label>
                <div class="col-lg-9">
                  <input class="form-control" type="date" name="tanggal_kaban" value ="<?php  echo $data->tanggal_kaban;?>" readonly>
                </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 col-sm-3 control-label">Ditujukan Ke</label>
                <div class="col-lg-9" style="margin-top:8px;">
                  <input type="checkbox" name="check_list1[]" <?php if(preg_match('/\bsekban\b/' ,$data->tujuan)){echo 'checked'; }?> value="sekban" disabled> SEKBAN &nbsp;&nbsp;&nbsp;
                  <input type="checkbox" name="check_list1[]" <?php if(preg_match('/\btu2\b/' ,$data->tujuan)){echo 'checked'; }?> value="tu2" disabled> TU 2 &nbsp;&nbsp;&nbsp;
                  <input type="checkbox" name="check_list1[]" <?php if(preg_match('/\bsungram\b/' ,$data->tujuan)){echo 'checked';}?> value="sungram" disabled> Penyusunan Program &nbsp;&nbsp;&nbsp;
                  <input type="checkbox" name="check_list1[]" <?php if(preg_match('/\bkeungan\b/' ,$data->tujuan)){echo 'checked';}?> value="keungan" disabled> Keuangan &nbsp;&nbsp;&nbsp; <br>
                  <input type="checkbox" name="check_list1[]" <?php if(preg_match('/\bpe\b/' ,$data->tujuan)){echo 'checked';}?> value="pe" disabled> Pembangunan Ekonomi &nbsp;&nbsp;&nbsp;
                  <input type="checkbox" name="check_list1[]" <?php if(preg_match('/\bkemas\b/' ,$data->tujuan)){echo 'checked';}?> value="kemas" disabled> Kemasyarakatan &nbsp;&nbsp;&nbsp;
                  <input type="checkbox" name="check_list1[]" <?php if(preg_match('/\bsarpras\b/' ,$data->tujuan)){echo 'checked';}?> value="sarpras" disabled> Sarana Prasarana
                  <input type="checkbox" name="check_list1[]" <?php if(preg_match('/\bpemer\b/' ,$data->tujuan)){echo 'checked';}?> value="pemer" disabled> Pemerintahan &nbsp;&nbsp;&nbsp;
                </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 col-sm-3 control-label">Status Disposisi</label>
                 <div class="col-lg-9" style="margin-top:8px;">                 
                  <input type="checkbox" name="Selesai"  value="Selesai" disabled> Selesai &nbsp;&nbsp;&nbsp;
                </div>
            </div>
            <button type="button" id ="tutup" class="btn btn-default pull-right" data-dismiss="modal">Tutup</button>
            <!-- <button id="selesai"> Selesai</button> -->
            </form>
        </div>      
        <div class="modal-footer">
            
        </div>
              
          <!-- </div> -->
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->






    <?php
                    $i++;
                    }
                  }
                 ?>