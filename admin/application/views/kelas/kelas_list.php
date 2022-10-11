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
        <li class="active">Manajemen Kelas</li>
      </ol>
    </div>
    <!--/.row-->

    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Manajemen Kelas
          <sup>
            <a class="btn btn-success btn-sm" href="<?= base_url("kelas/tambah"); ?>">
              <strong>Tambah Kelas</strong>
            </a>
          </sup>
        </h1>
      </div>
    </div>
    <!--/.row-->

    <?php if ($this->session->flashdata('message_form_error')) : ?>
      <div class="alert bg-danger" role="alert">
        <svg class="glyph stroked cancel">
          <use xlink:href="#stroked-cancel"></use>
        </svg>
        <?= $this->session->flashdata('message_form_error') ?>
        <!-- <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a> -->
      </div>
    <?php endif ?>

    <div class="row">
      <?php foreach ($tingkat_list as $tingkat_index => $tingkat_value) : ?>
        <div class="col-md-<?= floor(12 / count($tingkat_list)); ?>">
          <div class="panel panel-blue">
            <div class="panel-heading dark-overlay">Kelas <?= $tingkat_value; ?> (Aktif)</div>
            <div class="panel-body">
              <ul class="todo-list">
                <?php foreach ($kelas_aktif[$tingkat_index] as $kelas_index => $kelas) : ?>
                  <li class="todo-list-item">
                    <div class="checkbox">
                      <a><strong>Kelas <?= $kelas->tingkat . '-' . $kelas->jurusan; ?></strong></a>
                    </div>
                    <div class="pull-right">
                      <a href="<?= base_url("kelas/update/" . $kelas->id_kelas); ?>">
                        <svg class="glyph stroked pencil">
                          <use xlink:href="#stroked-pencil"></use>
                        </svg>
                      </a>
                    </div>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <!--/.row-->

    <div class="row">
      <?php foreach ($tingkat_list as $tingkat_index => $tingkat_value) : ?>
        <div class="col-md-<?= floor(12 / count($tingkat_list)); ?>">
          <div class="panel panel-red">
            <div class="panel-heading dark-overlay">Kelas <?= $tingkat_value; ?> (Nonaktif)</div>
            <div class="panel-body">
              <ul class="todo-list">
                <?php foreach ($kelas_nonaktif[$tingkat_index] as $kelas_index => $kelas) : ?>
                  <li class="todo-list-item">
                    <div class="checkbox">
                      <strong>Kelas <?= $kelas->tingkat . '-' . $kelas->jurusan; ?></strong>
                    </div>
                    <div class="pull-right">
                      <a href="<?= base_url("kelas/update/" . $kelas->id_kelas); ?>">
                        <svg class="glyph stroked pencil">
                          <use xlink:href="#stroked-pencil"></use>
                        </svg>
                      </a>
                    </div>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <!--/.row-->

  </div>
  <!--/.main-->

  <?php $this->load->view('_partials/js_import') ?>
  <?php $this->load->view('_partials/js_default') ?>
</body>

</html>