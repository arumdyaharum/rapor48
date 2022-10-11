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
        <li><a href="<?= base_url('mapel') ?>">Manajemen Mapel</a></li>
        <li class="active"><?= isset($mapel) ? "Ubah" : "Tambah" ?> Mapel</li>
      </ol>
    </div>
    <!--/.row-->

    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Manajemen Mapel</h1>
      </div>
    </div>
    <!--/.row-->

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading"><?= isset($mapel) ? "Ubah" : "Tambah" ?> Mapel &nbsp;
            <a class="btn btn-default" href="<?= base_url('mapel'); ?>">Kembali</a> &nbsp;
            <?php if (!isset($mapel)) : ?>
              <a class="btn btn-primary" href="<?= base_url("angkatan/import"); ?>">Import Excel</a>
            <?php endif; ?>
          </div>
          <div class="panel-body">

            <?php $this->load->view('_partials/message_form_error') ?>

            <form action="" method="post" class="form-horizontal">

              <div class="form-group<?= form_error('id_kelompok') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Kelompok Mapel</label>
                <div class="col-md-10">
                  <select class="form-control" name="id_kelompok">
                    <?php foreach ($data_kelompok as $kelompok_index => $kelompok) : ?>
                      <option value="<?= $kelompok->id_kelompok; ?>" <?= set_select('id_kelompok', $kelompok->id_kelompok, isset($mapel) && $mapel->id_kelompok === $kelompok->id_kelompok); ?>>
                        <?= $kelompok->is_active ? '(Aktif) ' . $kelompok->deskripsi : '(Nonaktif) ' . $kelompok->deskripsi; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                  <?= form_error('id_kelompok', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group<?= form_error('nama_mapel') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Nama Mapel</label>
                <div class="col-md-10" style="padding-top:7px;">
                  <input class="form-control" type="text" name="nama_mapel" placeholder="Masukkan nama mapel" value="<?= isset($mapel) ? $mapel->nama_mapel : set_value('nama_mapel') ?>" required />
                  <?= form_error('nama_mapel', '<p class="help-block text-danger">', '</p>') ?>
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