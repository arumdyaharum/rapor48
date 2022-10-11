<!DOCTYPE html>
<html>

<head>
  <?php $this->load->view('_partials/head') ?>
</head>

<body>
  <div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default">
        <div class="panel-heading">Log in</div>
        <div class="panel-body">
          <?php if ($this->session->flashdata('message_login_error')) : ?>
            <div class="alert bg-danger" role="alert">
              <svg class="glyph stroked cancel">
                <use xlink:href="#stroked-cancel"></use>
              </svg>
              <?= $this->session->flashdata('message_login_error') ?>
              <!-- <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a> -->
            </div>
          <?php endif ?>
          <form role="form" action="" method="post">
            <fieldset>
              <div class="form-group<?= form_error('username') ? ' has-error' : '' ?>">
                <input class="form-control" placeholder="Username" name="username" type="text" value="<?= set_value('username') ?>" required autofocus="">
                <?= form_error('username', '<p class="help-block text-danger">', '</p>') ?>
              </div>
              <div class="form-group<?= form_error('password') ? ' has-error' : '' ?>">
                <input class="form-control" placeholder="Password" name="password" type="password" value="<?= set_value('password') ?>" required>
                <?= form_error('password', '<p class="help-block text-danger">', '</p>') ?>
              </div>
              <!-- <a href="index.html" class="btn btn-primary">Login</a> -->
              <button type="submit" class="btn btn-primary">Login</button>
            </fieldset>
          </form>
        </div>
      </div>
    </div><!-- /.col-->
  </div><!-- /.row -->

  <?php $this->load->view('_partials/js_import') ?>
  <?php $this->load->view('_partials/js_default') ?>
</body>

</html>