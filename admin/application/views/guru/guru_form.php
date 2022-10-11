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
        <li><a href="<?= base_url('guru') ?>">Manajemen Guru</a></li>
        <li class="active"><?= isset($guru) ? "Ubah" : "Tambah" ?> Guru</li>
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
          <div class="panel-heading"><?= isset($guru) ? "Ubah" : "Tambah" ?> Guru &nbsp;
            <a class="btn btn-default" href="<?= base_url('guru'); ?>">Kembali</a> &nbsp;
            <?php if (!isset($guru)) : ?>
              <a class="btn btn-primary" href="<?= base_url("angkatan/import"); ?>">Import Excel</a>
            <?php endif; ?>
          </div>
          <div class="panel-body">

            <?php $this->load->view('_partials/message_form_error') ?>

            <form action="" method="post" class="form-horizontal">

              <div class="form-group<?= form_error('nip') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">NIP/NIKI</label>
                <div class="col-md-10" style="padding-top:7px;">
                  <input class="form-control" type="text" name="nip" placeholder="Masukkan NIP/NIKI guru" value="<?= isset($guru) ? $guru->nip : set_value('nip') ?>" required />
                  <?= form_error('nip', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group<?= form_error('nama_guru') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Nama Guru</label>
                <div class="col-md-10" style="padding-top:7px;">
                  <input class="form-control" type="text" name="nama_guru" placeholder="Masukkan nama guru" value="<?= isset($guru) ? $guru->nama_guru : set_value('nama_guru') ?>" required />
                  <?= form_error('nama_guru', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group<?= form_error('username') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Username</label>
                <div class="col-md-10">
                  <input class="form-control" type="text" name="username" placeholder="Masukkan username guru" value="<?= isset($guru) ? $guru->username : set_value('username') ?>" required />
                  <?= form_error('username', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group<?= form_error('pass') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Password</label>
                <div class="col-md-10">
                  <input class="form-control" type="text" name="pass" placeholder="Masukkan password guru" value="<?= isset($guru) ? $guru->pass : set_value('pass') ?>" required />
                  <?= form_error('pass', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label"></label>
                <div class="col-md-10"><input type="submit" class="btn btn-primary" value="<?= isset($guru) ? "Ubah" : "Tambah" ?> Guru"></div>
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