<!DOCTYPE html>
<html>

<head>
  <?php $this->load->view('_partials/head') ?>
</head>

<body>
  <?php $this->load->view('_partials/header') ?>
  <?php $this->load->view('_partials/side_nav') ?>

  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <ol class="breadcrumb">
        <li>
          <a href="<?= base_url(); ?>">
            <svg class="glyph stroked home">
              <use xlink:href="#stroked-home"></use>
            </svg>
          </a>
        </li>
        <li><a href="<?= base_url('tahun_ajar') ?>">Manajemen Tahun Ajar</a></li>
        <!-- <li class="active">< ?= isset($ekskul) ? "Ubah" : "Tambah" ?> Tahun Ajar</li> -->
        <li class="active">Tambah Tahun Ajar</li>
      </ol>
    </div>
    <!--/.row-->

    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Manajemen Tahun Ajar</h1>
      </div>
    </div>
    <!--/.row-->

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <!-- <div class="panel-heading">< ?= !isset($ekskul) ? "Tambah" : "Ubah" ?> Ekskul &nbsp; -->
          <div class="panel-heading">Tambah Tahun Ajar &nbsp;
            <a class="btn btn-default" href="<?= base_url('tahun_ajar'); ?>">Kembali</a>
          </div>
          <div class="panel-body">

            <!-- < ?php $this->load->view('_partials/message_form_error') ?> -->

            <form action="" method="post" class="form-horizontal">

              <div class="form-group">
                <label class="col-md-2 control-label"></label>
                <div class="col-md-10"><input type="submit" class="btn btn-primary" value="<?= isset($ekskul) ? "Ubah" : "Tambah" ?> Ekskul"></div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--/.row-->
  </div>
  <!--/.main-->

  <?php $this->load->view('_partials/js_import') ?>
  <?php $this->load->view('_partials/js_default') ?>
  <script>

  </script>
</body>

</html>