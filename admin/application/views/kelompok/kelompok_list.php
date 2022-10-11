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
        <li class="active">Manajemen Kelompok Mapel</li>
      </ol>
    </div>
    <!--/.row-->

    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Manajemen Kelompok Mapel</h1>
      </div>
    </div>
    <!--/.row-->

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Daftar Kelompok Mapel</div>
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
              <a class="btn btn-primary" href="<?= base_url("kelompok/tambah"); ?>">Tambah Kelompok Mapel</a>
            </div>
            <table data-toggle="table" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-toolbar="#toolbar">
              <thead>
                <tr>
                  <th data-field="no" data-sortable="true">No</th>
                  <th data-field="deskripsi" data-sortable="true">Deskripsi</th>
                  <th data-field="pengetahuan" data-sortable="true">Pengetahuan</th>
                  <th data-field="Keterampilan" data-sortable="true">Keterampilan</th>
                  <th data-field="desimal" data-sortable="true">Desimal</th>
                  <th data-field="is_active" data-sortable="true">Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data_kelompok as $kelompok_index => $kelompok) : ?>
                  <tr>
                    <td><?= $kelompok_index + 1; ?></td>
                    <td><?= $kelompok->deskripsi; ?></td>
                    <td><?= $kelompok->pengetahuan_persen . '%'; ?></td>
                    <td><?= $kelompok->keterampilan_persen . '%'; ?></td>
                    <td>
                      <strong><?= $kelompok->desimal; ?></strong>
                      (Cont: 75<?= $kelompok->desimal > 0 ? ',' : ''; ?><?= str_repeat("0", $kelompok->desimal); ?>)
                    </td>
                    <td><?= $kelompok->is_active ? 'Aktif' : 'Nonaktif'; ?></td>
                    <td>
                      <a class="btn btn-warning btn-sm" href="<?= base_url("kelompok/update/" . $kelompok->id_kelompok); ?>">
                        Ubah Kelompok Mapel
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