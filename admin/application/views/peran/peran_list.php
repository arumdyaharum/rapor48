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
        <li class="active">Manajemen Peran</li>
      </ol>
    </div>
    <!--/.row-->

    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Manajemen Peran</h1>
      </div>
    </div>
    <!--/.row-->

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Daftar Peran</div>
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
              <a class="btn btn-primary" href="<?= base_url("peran/tambah"); ?>">Tambah Peran</a>
            </div>
            <table data-toggle="table" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-toolbar="#toolbar">
              <thead>
                <tr>
                  <th data-field="no" data-sortable="true">No</th>
                  <th data-field="peran" data-sortable="true">Nama Peran</th>
                  <th data-field="keterangan" data-sortable="true">Keterangan</th>
                  <th data-field="status" data-sortable="true">Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data_peran as $peran_index => $peran) : ?>
                  <tr>
                    <td><?= $peran_index + 1; ?></td>
                    <td><?= $peran->nama_peran; ?></td>
                    <td>
                      <div><strong>Seorang wali kelas</strong> : <?= $peran->is_walas ? 'Ya' : 'Tidak'; ?></div>
                      <div> <strong>Izin Akses</strong>
                        <ul>
                          <?= $peran->do_nilai ? '<li>Nilai Akademik</li>' : '' ?>
                          <?= $peran->do_akademik ? '<li>Catatan Akademik</li>' : '' ?>
                          <?= $peran->do_prakerin ? '<li>Pratik Kerja Lapangan</li>' : '' ?>
                          <?= $peran->do_ekskul ? '<li>Kegiatan Ekstra Kurikuler</li>' : '' ?>
                          <?= $peran->do_absensi ? '<li>Ketidakhadiran</li>' : '' ?>
                          <?= $peran->do_kenaikan ? '<li>Kenaikan Kelas</li>' : '' ?>
                          <?= $peran->do_karakter ? '<li>Perkembangan Karakter</li>' : '' ?>
                          <?= $peran->do_leger ? '<li>Leger dan Rapor</li>' : '' ?>
                        </ul>
                      </div>
                    </td>
                    <td><?= $peran->is_active ? 'Aktif' : 'Nonaktif'; ?></td>
                    <td>
                      <a class="btn btn-warning btn-sm" href="<?= base_url("peran/update/" . $peran->id_peran); ?>">
                        Ubah Peran
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