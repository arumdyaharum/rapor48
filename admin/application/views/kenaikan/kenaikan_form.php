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
        <li><a href="<?= base_url('kenaikan') ?>">Manajemen Keterangan Naik</a></li>
        <li class="active"><?= isset($kenaikan) ? "Ubah" : "Tambah" ?> Keterangan</li>
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
          <div class="panel-heading"><?= isset($kenaikan) ? "Ubah" : "Tambah" ?> Keterangan &nbsp;
            <a class="btn btn-default" href="<?= base_url('kenaikan'); ?>">Kembali</a> &nbsp;
            <?php if (!isset($kenaikan)) : ?>
              <a class="btn btn-primary" href="<?= base_url("angkatan/import"); ?>">Import Excel</a>
            <?php endif; ?>
          </div>
          <div class="panel-body">

            <?php $this->load->view('_partials/message_form_error') ?>

            <form action="" method="post" class="form-horizontal">

              <div class="form-group<?= form_error('id_kelas') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Kelas</label>
                <div class="col-md-10">
                  <select class="form-control" name="id_kelas">
                    <?php foreach ($data_kelas as $kelas_index => $kelas) : ?>
                      <option value="<?= $kelas->id_kelas; ?>" <?= set_select('id_kelas', $kelas->id_kelas, isset($kenaikan) && $kenaikan->id_kelas === $kelas->id_kelas); ?>>
                        <?= $kelas->is_active ? '(Aktif) ' . $kelas->tingkat . '-' . $kelas->jurusan : '(Nonaktif) ' . $kelas->tingkat . '-' . $kelas->jurusan; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                  <?= form_error('id_kelas', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group<?= form_error('status') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Kenaikan</label>
                <div class="col-md-10">
                  <select class="form-control" name="status">
                    <?php foreach ($data_status as $status_key => $status_value) : ?>
                      <option value="<?= $status_key; ?>" <?= set_select('status', $status_key, isset($kenaikan) && $kenaikan->status === $status_key); ?>>
                        <?= $status_value; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                  <?= form_error('status', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group<?= form_error('keterangan') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Keterangan</label>
                <div class="col-md-10" style="padding-top:7px;">
                  <input class="form-control" type="text" name="keterangan" placeholder="Masukkan keterangan kenaikan" value="<?= isset($kenaikan) ? $kenaikan->keterangan : set_value('keterangan') ?>" required />
                  <?= form_error('keterangan', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group<?= form_error('is_active') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Status</label>
                <div class="col-md-10" style="padding-top:7px;">
                  <select name="is_active" class="form-control">
                    <option value="1" <?= set_select('is_active', '1', isset($mapel) && $mapel->is_active == 1); ?>>Aktif</option>
                    <option value="0" <?= set_select('is_active', '0', isset($mapel) && $mapel->is_active == 0); ?>>Tidak Aktif</option>
                  </select>
                  <?= form_error('is_active', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label"></label>
                <div class="col-md-10"><input type="submit" class="btn btn-primary" value="<?= isset($mapel) ? "Ubah" : "Tambah" ?> Mapel"></div>
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