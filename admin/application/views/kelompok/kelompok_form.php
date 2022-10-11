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
        <li><a href="<?= base_url('kelompok') ?>">Manajemen Kelompok Mapel</a></li>
        <li class="active"><?= isset($kelompok) ? "Ubah" : "Tambah" ?> Kelompok Mapel</li>
      </ol>
    </div>
    <!--/.row-->

    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Manajemen Kelompok Mapel</h1>
      </div>
    </div>
    <!--/.row-->

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading"><?= isset($kelompok) ? "Ubah" : "Tambah" ?> Kelompok &nbsp;
            <a class="btn btn-default" href="<?= base_url('kelompok'); ?>">Kembali</a> &nbsp;
            <?php if (!isset($kelompok)) : ?>
              <a class="btn btn-primary" href="<?= base_url("angkatan/import"); ?>">Import Excel</a>
            <?php endif; ?>
          </div>
          <div class="panel-body">

            <?php $this->load->view('_partials/message_form_error') ?>

            <form action="" method="post" class="form-horizontal">

              <div class="form-group<?= form_error('deskripsi') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Deskripsi</label>
                <div class="col-md-10" style="padding-top:7px;">
                  <input class="form-control" type="text" name="deskripsi" placeholder="Cont: A. Kelompok Mapel" value="<?= isset($kelompok) ? $kelompok->deskripsi : set_value('deskripsi') ?>" required />
                  <?= form_error('deskripsi', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group<?= form_error('pengetahuan_persen') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Persentase Pengetahuan</label>
                <div class="col-md-10 input-group" style="padding: 7px 15px 0px;">
                  <input class="form-control" type="number" min="0" max="100" name="pengetahuan_persen" placeholder="Masukkan persentase pengetahuan untuk penilaian" value="<?= isset($kelompok) ? $kelompok->pengetahuan_persen : set_value('pengetahuan_persen') ?>" required aria-describedby="pengetahuan-persen-addon2" />
                  <span class="input-group-addon" id="pengetahuan-persen-addon2">%</span>
                  <?= form_error('pengetahuan_persen', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group<?= form_error('keterampilan_persen') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Persentase Keterampilan</label>
                <div class="col-md-10 input-group" style="padding: 7px 15px 0px;">
                  <input class="form-control" type="number" min="0" max="100" name="keterampilan_persen" placeholder="Masukkan persentase keterampilan untuk penilaian" value="<?= isset($kelompok) ? $kelompok->keterampilan_persen : set_value('keterampilan_persen') ?>" required aria-describedby="keterampilan-persen-addon2" />
                  <span class="input-group-addon" id="keterampilan-persen-addon2">%</span>
                  <?= form_error('keterampilan_persen', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group<?= form_error('desimal') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Jumlah Desimal</label>
                <div class="col-md-10">
                  <input class="form-control" type="number" min="0" name="desimal" placeholder="Masukkan jumlah angka di belakang koma" value="<?= isset($kelompok) ? $kelompok->desimal : set_value('desimal') ?>" required />
                  <?= form_error('desimal', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group<?= form_error('is_active') ? ' has-error' : '' ?>">
                <label class="col-md-2 control-label">Status</label>
                <div class="col-md-10" style="padding-top:7px;">
                  <select name="is_active" class="form-control">
                    <option value="1" <?= set_select('is_active', '1', isset($kelompok) && $kelompok->is_active == 1); ?>>Aktif</option>
                    <option value="0" <?= set_select('is_active', '0', isset($kelompok) && $kelompok->is_active == 0); ?>>Tidak Aktif</option>
                  </select>
                  <?= form_error('is_active', '<p class="help-block text-danger">', '</p>') ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label"></label>
                <div class="col-md-10"><input type="submit" class="btn btn-primary" value="<?= isset($kelompok) ? "Ubah" : "Tambah" ?> Kelompok Mapel"></div>
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