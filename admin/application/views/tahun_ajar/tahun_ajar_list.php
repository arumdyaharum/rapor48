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
        <li class="active">Manajemen Tahun Ajar</li>
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
          <div class="panel-heading">Daftar Tahun Ajar</div>
          <div class="panel-body">
            <div id="toolbar">
              <a class="btn btn-primary" href="<?= base_url("tahun_ajar/tambah"); ?>">Tambah Tahun Ajar</a>
            </div>
            <table data-toggle="table" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-toolbar="#toolbar">
              <thead>
                <tr>
                  <th data-field="no" data-sortable="true">No</th>
                  <th data-field="periode" data-sortable="true">Tahun Pelajaran</th>
                  <th data-field="semester" data-sortable="true">Semester</th>
                  <th data-field="status" data-sortable="true">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data_tahun_ajar as $tahun_ajar_index => $tahun_ajar) : ?>
                  <tr>
                    <td><?= $tahun_ajar_index + 1; ?></td>
                    <td><?= $tahun_ajar->periode; ?></td>
                    <td><?= $tahun_ajar->semester; ?></td>
                    <td><?= $tahun_ajar->status; ?></td>
                    <!-- <td>
                      <a class="btn btn-warning btn-sm" href="< ?= base_url("ekskul/update/" . $ekskul->id_ekskul); ?>">
                        Ubah Ekskul
                      </a>
                    </td> -->
                  </tr>
                <?php endforeach; ?>
                <tr>
                  <td>1</td>
                  <td>Dyah</td>
                  <td>5000</td>
                  <td>5000</td>
                </tr>
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