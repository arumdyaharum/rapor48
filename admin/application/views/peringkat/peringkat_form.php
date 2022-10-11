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
        <li><a href="<?= base_url('peringkat') ?>">Manajemen Peringkat</a></li>
        <li class="active"><?= isset($peringkat) ? "Ubah" : "Tambah" ?> Peringkat</li>
      </ol>
    </div>
    <!--/.row-->

    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Manajemen Peringkat</h1>
      </div>
    </div>
    <!--/.row-->

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading"><?= isset($peringkat) ? "Ubah" : "Tambah" ?> Peringkat &nbsp;
            <a class="btn btn-default" href="<?= base_url('peringkat'); ?>">Kembali</a> &nbsp;
            <?php if (!isset($peringkat)) : ?>
              <a class="btn btn-primary" href="<?= base_url("angkatan/import"); ?>">Import Excel</a>
            <?php endif; ?>
          </div>
          <div class="panel-body">

            <?php $this->load->view('_partials/message_form_error') ?>

            <form action="" method="post" class="form-horizontal">

              <div class="form-group<?= form_error('peringkat') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Peringkat</label>
                <div class="col-md-10" style="padding-top:7px;">
                  <input class="form-control" type="text" name="peringkat" placeholder="Cont: A+" value="<?= isset($peringkat) ? $peringkat->peringkat : set_value('peringkat') ?>" required />
                  <?= form_error('peringkat', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group<?= form_error('batas_bawah') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Batas Bawah</label>
                <div class="col-md-10">
                  <input class="form-control" type="number" name="batas_bawah" placeholder="Masukkan batas bawah nilai" value="<?= isset($peringkat) ? $peringkat->batas_bawah : set_value('batas_bawah') ?>" required />
                  <?= form_error('batas_bawah', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group<?= form_error('batas_atas') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Batas Atas</label>
                <div class="col-md-10">
                  <input class="form-control" type="number" name="batas_atas" placeholder="Masukkan batas atas nilai" value="<?= isset($peringkat) ? $peringkat->batas_atas : set_value('batas_atas') ?>" required />
                  <?= form_error('batas_atas', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group<?= form_error('is_active') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Status</label>
                <div class="col-md-10" style="padding-top:7px;">
                  <select name="is_active" class="form-control">
                    <option value="1" <?= set_select('is_active', '1', isset($peringkat) && $peringkat->is_active == 1); ?>>Aktif</option>
                    <option value="0" <?= set_select('is_active', '0', isset($peringkat) && $peringkat->is_active == 0); ?>>Tidak Aktif</option>
                  </select>
                  <?= form_error('is_active', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label"></label>
                <div class="col-md-10"><input type="submit" class="btn btn-primary" value="<?= isset($peringkat) ? "Ubah" : "Tambah" ?> Peringkat"></div>
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