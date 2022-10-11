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
        <li><a href="<?= base_url('kelas') ?>">Manajemen Kelas</a></li>
        <li class="active"><?= isset($kelas) ? 'Ubah' : 'Tambah'; ?> Kelas</li>
      </ol>
    </div>
    <!--/.row-->

    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Manajemen Kelas</h1>
      </div>
    </div>
    <!--/.row-->

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading"><?= isset($kelas) ? 'Ubah' : 'Tambah'; ?> Kelas &nbsp;
            <a class="btn btn-default" href="<?= base_url('kelas'); ?>">Kembali</a> &nbsp;
            <?php if (current_url() == base_url('kelas/tambah')) : ?>
              <a class="btn btn-primary" href="<?= base_url("angkatan/import"); ?>">Import Excel</a>
            <?php endif; ?>
          </div>
          <div class="panel-body">

            <?php $this->load->view('_partials/message_form_error') ?>

            <form action="" method="post" class="form-horizontal">

              <div class="form-group<?= form_error('tingkat') || form_error('tingkat[]') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Tingkat</label>
                <div class="col-md-10" style="padding-top:7px;">
                  <?php if (current_url() == base_url('kelas/tambah')) : ?>
                    <?php foreach ($tingkat_list as $tingkat_key => $tingkat_value) : ?>
                      <input type="checkbox" name="tingkat[]" value="<?= $tingkat_value; ?>" <?= set_checkbox('tingkat', $tingkat_value); ?> /> <?= $tingkat_value; ?> &nbsp; &nbsp;
                    <?php endforeach; ?>
                    <?= form_error('tingkat[]', '<p class="help-block text-danger">', '</p>') ?>
                  <?php else : ?>
                    <select name="tingkat" class="form-control">
                      <?php foreach ($tingkat_list as $tingkat_key => $tingkat_value) : ?>
                        <option value="<?= $tingkat_value; ?>" <?= set_select('tingkat', $tingkat_value, isset($kelas) && $kelas->tingkat === $tingkat_value); ?>>
                          <?= $tingkat_value; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                    <?= form_error('tingkat', '<p class="help-block text-danger">', '</p>') ?>
                  <?php endif; ?>
                </div>
              </div>

              <div class="form-group<?= form_error('jurusan') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Jurusan</label>
                <div class="col-md-10" style="padding-top:7px;">
                  <input class="form-control" type="text" name="jurusan" placeholder="Jurusan" value="<?= isset($kelas) ? $kelas->jurusan : set_value('jurusan') ?>" required />
                  <?= form_error('jurusan', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group<?= form_error('is_active') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Status</label>
                <div class="col-md-10" style="padding-top:7px;">
                  <select name="is_active" class="form-control">
                    <option value="1" <?= set_select('is_active', '1', isset($kelas) && $kelas->is_active == 1); ?>>Aktif</option>
                    <option value="0" <?= set_select('is_active', '0', isset($kelas) && $kelas->is_active == 0); ?>>Tidak Aktif</option>
                  </select>
                  <?= form_error('is_active', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label"></label>
                <div class="col-md-10"><input type="submit" class="btn btn-primary" value="<?= isset($kelas) ? 'Ubah' : 'Tambah'; ?> Kelas"></div>
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