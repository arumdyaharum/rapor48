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
        <li><a href="<?= base_url(); ?>">Test</a></li>
        <li class="active">Icons</li>
      </ol>
    </div>
    <!--/.row-->

    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Home</h1>
      </div>
    </div>
    <!--/.row-->

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Advanced Table</div>
          <div class="panel-body">
            <div id="toolbar">
              <a class="btn btn-default" href="<?= base_url("guru/tambah"); ?>">Tambah Guru</a>
              <a class="btn btn-primary" href="<?= base_url("guru/print"); ?>">Cetak Daftar Guru</a>
            </div>
            <table data-toggle="table" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-toolbar="#toolbar">
              <thead>
                <tr>
                  <!-- <th data-field="state" data-checkbox="true">Item ID</th> -->
                  <th data-field="id" data-sortable="true">Item ID</th>
                  <th data-field="name" data-sortable="true">Item Name</th>
                  <th data-field="price" data-sortable="true">Item Price</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <!-- <td></td> -->
                  <td>1</td>
                  <td>Dyah</td>
                  <td>5000</td>
                </tr>
                <tr>
                  <!-- <td></td> -->
                  <td>1</td>
                  <td>Dyah</td>
                  <td>5000</td>
                </tr>
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