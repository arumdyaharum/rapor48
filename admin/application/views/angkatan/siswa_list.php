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
        <li><a href="<?= base_url("angkatan"); ?>">Manajemen Angkatan</a></li>
        <li class="active">Angkatan <?= $angkatan; ?></li>
      </ol>
    </div>
    <!--/.row-->

    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Manajemen Angkatan</h1>
      </div>
    </div>
    <!--/.row-->

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Daftar Siswa Angkatan <?= $angkatan; ?> &nbsp;
            <a class="btn btn-default" href="<?= base_url('angkatan'); ?>">Kembali</a>
          </div>
          <div class="panel-body">
            <div id="toolbar">
              <a class="btn btn-primary" href="<?= base_url("angkatan/tambah/" . $angkatan); ?>">Tambah Siswa</a>
            </div>
            <table data-toggle="table" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-toolbar="#toolbar">
              <thead>
                <tr>
                  <th data-field="no" data-sortable="true">No</th>
                  <th data-field="nis" data-sortable="true">NIS</th>
                  <th data-field="nama_siswa" data-sortable="true">Nama Siswa</th>
                  <th data-field="kelas_awal" data-sortable="true">Kelas Awal</th>
                  <th data-field="kelas_terakhir" data-sortable="true">Kelas Terakhir</th>
                  <th data-field="status" data-sortable="true">Status</th>
                  <th data-field="username" data-sortable="true">Username</th>
                  <th>action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data_siswa as $siswa_index => $siswa) : ?>
                  <tr>
                    <td><?= $siswa_index + 1; ?></td>
                    <td><?= $siswa->nis; ?></td>
                    <td><?= $siswa->nama_siswa; ?></td>
                    <td><?= $siswa->awal_tingkat . '-' . $siswa->awal_jurusan; ?></td>
                    <td><?= $siswa->akhir_tingkat . '-' . $siswa->akhir_jurusan; ?></td>
                    <td><?= $siswa->status; ?></td>
                    <td><?= $siswa->username; ?></td>
                    <td>
                      <a class="btn btn-warning btn-sm" href="<?= base_url("angkatan/update/" . $siswa->id_siswa); ?>">Ubah Siswa</a>
                      <a class="btn btn-primary btn-sm" href="<?= base_url("rapor/siswa/" . $siswa->id_siswa); ?>">Lihat Rapor</a>
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