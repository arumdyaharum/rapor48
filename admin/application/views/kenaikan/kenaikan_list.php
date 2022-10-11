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
        <li class="active">Manajemen Keterangan Naik</li>
      </ol>
    </div>
    <!--/.row-->

    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Manajemen Keterangan Naik</h1>
      </div>
    </div>
    <!--/.row-->

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Daftar Keterangan Naik</div>
          <div class="panel-body">

            <?php if ($this->session->flashdata('message_form_error')) : ?>
              <div class="alert bg-danger" role="alert">
                <svg class="glyph stroked cancel">
                  <use xlink:href="#stroked-cancel"></use>
                </svg>
                <?= $this->session->flashdata('message_form_error') ?>
                <!-- <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a> -->
              </div>
            <?php endif ?>

            <div id="toolbar">
              <a class="btn btn-primary" href="<?= base_url("kenaikan/tambah"); ?>">Tambah Keterangan</a>
            </div>
            <table data-toggle="table" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-toolbar="#toolbar">
              <thead>
                <tr>
                  <th data-field="no" data-sortable="true">No</th>
                  <th data-field="kelas" data-sortable="true">Kelas</th>
                  <th data-field="kenaikan" data-sortable="true">Kenaikan</th>
                  <th data-field="keterangan" data-sortable="true">Keterangan</th>
                  <th data-field="status" data-sortable="true">Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data_kenaikan as $kenaikan_index => $kenaikan) : ?>
                  <tr>
                    <td><?= $kenaikan_index + 1; ?></td>
                    <td><?= $kenaikan->tingkat . '-' . $kenaikan->jurusan; ?></td>
                    <td><?= $data_status[$kenaikan->status]; ?></td>
                    <td><?= $kenaikan->keterangan; ?></td>
                    <td><?= $kenaikan->is_active ? 'Aktif' : 'Nonaktif'; ?></td>
                    <td>
                      <a class="btn btn-warning btn-sm" href="<?= base_url("kenaikan/update/" . $kenaikan->id_keterangan_naik); ?>">
                        Ubah Keterangan
                      </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!--/.row-->
  </div>
  <!--/.main-->

  <?php $this->load->view('_partials/js_import') ?>
  <?php $this->load->view('_partials/js_default') ?>
</body>

</html>