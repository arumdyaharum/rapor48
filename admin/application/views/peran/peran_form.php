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
        <li><a href="<?= base_url('peran') ?>">Manajemen Peran</a></li>
        <li class="active"><?= isset($peran) ? "Ubah" : "Tambah" ?> Peran</li>
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
          <div class="panel-heading"><?= !isset($peran) ? "Tambah" : "Ubah" ?> Peran &nbsp;
            <a class="btn btn-default" href="<?= base_url('peran'); ?>">Kembali</a> &nbsp;
            <?php if (!isset($peran)) : ?>
              <a class="btn btn-primary" href="<?= base_url("angkatan/import"); ?>">Import Excel</a>
            <?php endif; ?>
          </div>
          <div class="panel-body">

            <?php $this->load->view('_partials/message_form_error') ?>

            <form action="" method="post" class="form-horizontal">

              <div class="form-group<?= form_error('nama_peran') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Nama Peran</label>
                <div class="col-md-10" style="padding-top:7px;">
                  <input class="form-control" type="text" name="nama_peran" placeholder="Masukkan nama peran" value="<?= isset($peran) ? $peran->nama_peran : set_value('nama_peran') ?>" required />
                  <?= form_error('nama_peran', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group<?= form_error('is_walas') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Wali Kelas</label>
                <div class="col-md-10" style="padding-top:7px;">
                  <select name="is_walas" class="form-control">
                    <option value="0" <?= set_select('is_walas', '0', isset($peran) && $peran->is_walas == 0); ?>>Tidak</option>
                    <option value="1" <?= set_select('is_walas', '1', isset($peran) && $peran->is_walas == 1); ?>>Ya</option>
                  </select>
                  <?= form_error('is_walas', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group<?= form_error('do_nilai') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Nilai Akademik</label>
                <div class="col-md-10" style="padding-top:7px;">
                  <select name="do_nilai" class="form-control">
                    <option value="0" <?= set_select('do_nilai', '0', isset($peran) && $peran->do_nilai == 0); ?>>Akses ditolak</option>
                    <option value="1" <?= set_select('do_nilai', '1', isset($peran) && $peran->do_nilai == 1); ?>>Akses diberikan</option>
                  </select>
                  <?= form_error('do_nilai', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group<?= form_error('do_akademik') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Catatan Akademik</label>
                <div class="col-md-10" style="padding-top:7px;">
                  <select name="do_akademik" class="form-control">
                    <option value="0" <?= set_select('do_akademik', '0', isset($peran) && $peran->do_akademik == 0); ?>>Akses ditolak</option>
                    <option value="1" <?= set_select('do_akademik', '1', isset($peran) && $peran->do_akademik == 1); ?>>Akses diberikan</option>
                  </select>
                  <?= form_error('do_akademik', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group<?= form_error('do_prakerin') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Pratik Kerja Lapangan</label>
                <div class="col-md-10" style="padding-top:7px;">
                  <select name="do_prakerin" class="form-control">
                    <option value="0" <?= set_select('do_prakerin', '0', isset($peran) && $peran->do_prakerin == 0); ?>>Akses ditolak</option>
                    <option value="1" <?= set_select('do_prakerin', '1', isset($peran) && $peran->do_prakerin == 1); ?>>Akses diberikan</option>
                  </select>
                  <?= form_error('do_prakerin', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group<?= form_error('do_ekskul') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Kegiatan Ekstra Kurikuler</label>
                <div class="col-md-10" style="padding-top:7px;">
                  <select name="do_ekskul" class="form-control">
                    <option value="0" <?= set_select('do_ekskul', '0', isset($peran) && $peran->do_ekskul == 0); ?>>Akses ditolak</option>
                    <option value="1" <?= set_select('do_ekskul', '1', isset($peran) && $peran->do_ekskul == 1); ?>>Akses diberikan</option>
                  </select>
                  <?= form_error('do_ekskul', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group<?= form_error('do_absensi') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Ketidakhadiran</label>
                <div class="col-md-10" style="padding-top:7px;">
                  <select name="do_absensi" class="form-control">
                    <option value="0" <?= set_select('do_absensi', '0', isset($peran) && $peran->do_absensi == 0); ?>>Akses ditolak</option>
                    <option value="1" <?= set_select('do_absensi', '1', isset($peran) && $peran->do_absensi == 1); ?>>Akses diberikan</option>
                  </select>
                  <?= form_error('do_absensi', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group<?= form_error('do_kenaikan') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Kenaikan Kelas</label>
                <div class="col-md-10" style="padding-top:7px;">
                  <select name="do_kenaikan" class="form-control">
                    <option value="0" <?= set_select('do_kenaikan', '0', isset($peran) && $peran->do_kenaikan == 0); ?>>Akses ditolak</option>
                    <option value="1" <?= set_select('do_kenaikan', '1', isset($peran) && $peran->do_kenaikan == 1); ?>>Akses diberikan</option>
                  </select>
                  <?= form_error('do_kenaikan', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group<?= form_error('do_karakter') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Perkembangan Karakter</label>
                <div class="col-md-10" style="padding-top:7px;">
                  <select name="do_karakter" class="form-control">
                    <option value="0" <?= set_select('do_karakter', '0', isset($peran) && $peran->do_karakter == 0); ?>>Akses ditolak</option>
                    <option value="1" <?= set_select('do_karakter', '1', isset($peran) && $peran->do_karakter == 1); ?>>Akses diberikan</option>
                  </select>
                  <?= form_error('do_karakter', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group<?= form_error('do_leger') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Leger dan Rapor</label>
                <div class="col-md-10" style="padding-top:7px;">
                  <select name="do_leger" class="form-control">
                    <option value="0" <?= set_select('do_leger', '0', isset($peran) && $peran->do_leger == 0); ?>>Akses ditolak</option>
                    <option value="1" <?= set_select('do_leger', '1', isset($peran) && $peran->do_leger == 1); ?>>Akses diberikan</option>
                  </select>
                  <?= form_error('do_leger', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group<?= form_error('is_active') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Status</label>
                <div class="col-md-10" style="padding-top:7px;">
                  <select name="is_active" class="form-control">
                    <option value="1" <?= set_select('is_active', '1', isset($peran) && $peran->is_active == 1); ?>>Aktif</option>
                    <option value="0" <?= set_select('is_active', '0', isset($peran) && $peran->is_active == 0); ?>>Tidak Aktif</option>
                  </select>
                  <?= form_error('is_active', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label"></label>
                <div class="col-md-10"><input type="submit" class="btn btn-primary" value="<?= isset($peran) ? "Ubah" : "Tambah" ?> Peran"></div>
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