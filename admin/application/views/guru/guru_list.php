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
        <li class="active">Manajemen Guru</li>
      </ol>
    </div>
    <!--/.row-->

    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Manajemen Guru</h1>
      </div>
    </div>
    <!--/.row-->

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Daftar Guru</div>
          <div class="panel-body">
            <div id="toolbar">
              <a class="btn btn-primary" href="<?= base_url("guru/tambah"); ?>">Tambah Guru</a>
            </div>
            <table data-toggle="table" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-toolbar="#toolbar">
              <thead>
                <tr>
                  <th data-field="no" data-sortable="true">No</th>
                  <th data-field="nip" data-sortable="true">NIP/NIKI</th>
                  <th data-field="nama_guru" data-sortable="true">Nama Guru</th>
                  <th data-field="username" data-sortable="true">Username</th>
                  <th>action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data_guru as $guru_index => $guru) : ?>
                  <tr>
                    <td><?= $guru_index + 1; ?></td>
                    <td><?= $guru->nip; ?></td>
                    <td><?= $guru->nama_guru; ?></td>
                    <td><?= $guru->username; ?></td>
                    <td>
                      <a class="btn btn-warning btn-sm" href="<?= base_url("guru/update/" . $guru->id_guru); ?>">Ubah Guru</a>
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