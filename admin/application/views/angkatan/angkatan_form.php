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
        <li><a href="<?= base_url('angkatan') ?>">Manajemen Angkatan</a></li>
        <?php if (isset($siswa)) { ?>
          <li><a href="<?= base_url('angkatan/siswa/' . $siswa->angkatan) ?>">Angkatan <?= $siswa->angkatan; ?></a></li>
        <?php } else if (isset($angkatan)) { ?>
          <li><a href="<?= base_url('angkatan/siswa/' . $angkatan) ?>">Angkatan <?= $angkatan; ?></a></li>
        <?php } ?>
        <li class="active"><?= isset($siswa) ? "Ubah" : "Tambah" ?> Siswa</li>
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
          <div class="panel-heading"><?= isset($siswa) ? "Ubah" : "Tambah" ?> Siswa &nbsp;
            <a class="btn btn-default" href="<?php if (isset($siswa)) {
                                                echo base_url('angkatan/siswa/' . $siswa->angkatan);
                                              } else if (isset($angkatan)) {
                                                echo base_url('angkatan/siswa/' . $angkatan);
                                              } else {
                                                echo base_url('angkatan');
                                              } ?>">Kembali</a> &nbsp;
            <?php if (!isset($siswa)) : ?>
              <a class="btn btn-primary" href="<?= base_url("angkatan/import"); ?>">Import Excel</a>
            <?php endif; ?>
          </div>
          <div class="panel-body">

            <?php $this->load->view('_partials/message_form_error') ?>

            <form action="" method="post" class="form-horizontal">

              <div class="form-group<?= form_error('nis') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">NIS</label>
                <div class="col-md-10" style="padding-top:7px;">
                  <input class="form-control" type="text" name="nis" placeholder="Masukkan NIS siswa" value="<?= isset($siswa) ? $siswa->nis : set_value('nis') ?>" required />
                  <?= form_error('nis', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group<?= form_error('nama_siswa') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Nama Siswa</label>
                <div class="col-md-10" style="padding-top:7px;">
                  <input class="form-control" type="text" name="nama_siswa" placeholder="Masukkan nama siswa" value="<?= isset($siswa) ? $siswa->nama_siswa : set_value('nama_siswa') ?>" required />
                  <?= form_error('nama_siswa', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group<?= form_error('id_kelas_awal') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Kelas Saat Diinput</label>
                <div class="col-md-10">
                  <select class="form-control" name="id_kelas_awal">
                    <?php foreach ($data_kelas as $kelas_index => $kelas) : ?>
                      <option value="<?= $kelas->id_kelas; ?>" <?= set_select('id_kelas_awal', $kelas->id_kelas, isset($siswa) && $siswa->id_kelas_awal === $kelas->id_kelas); ?>>
                        <?= $kelas->is_active ? '(Aktif) ' . $kelas->tingkat . '-' . $kelas->jurusan : '(Nonaktif) ' . $kelas->tingkat . '-' . $kelas->jurusan; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                  <?= form_error('id_kelas_awal', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group<?= form_error('angkatan') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Tahun Masuk</label>
                <div class="col-md-10">
                  <input class="form-control" type="number" name="angkatan" placeholder="Masukkan tahun masuk siswa" value="<?php
                                                                                                                            if (isset($siswa)) {
                                                                                                                              echo $siswa->angkatan;
                                                                                                                            } else if (isset($angkatan)) {
                                                                                                                              echo $angkatan;
                                                                                                                            } else {
                                                                                                                              echo set_value('angkatan');
                                                                                                                            } ?>" required min="0" />
                  <?= form_error('angkatan', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group<?= form_error('username') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Username</label>
                <div class="col-md-10">
                  <input class="form-control" type="text" name="username" placeholder="Masukkan username siswa" value="<?= isset($siswa) ? $siswa->username : set_value('username') ?>" required />
                  <?= form_error('username', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group<?= form_error('pass') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Password</label>
                <div class="col-md-10">
                  <input class="form-control" type="text" name="pass" placeholder="Masukkan password siswa" value="<?= isset($siswa) ? $siswa->pass : set_value('pass') ?>" required />
                  <?= form_error('pass', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group<?= form_error('status') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Status</label>
                <div class="col-md-10">
                  <select class="form-control" name="status">
                    <?php foreach ($status as $status_name => $status_view) : ?>
                      <option value="<?= $status_name; ?>" <?= set_select('status', $status_name, isset($siswa) && $siswa->status == $status_name); ?>>
                        <?= $status_view; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                  <?= form_error('status', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label"></label>
                <div class="col-md-10"><input type="submit" class="btn btn-primary" value="<?= isset($siswa) ? "Ubah" : "Tambah" ?> Siswa"></div>
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
</body>

</html>