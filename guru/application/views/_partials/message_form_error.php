<?php if ($this->session->flashdata('message_form_error') || validation_errors()) : ?>
  <div class="alert bg-danger" role="alert">
    <svg class="glyph stroked cancel">
      <use xlink:href="#stroked-cancel"></use>
    </svg>
    <?= $this->session->flashdata('message_form_error')
      ? $this->session->flashdata('message_form_error')
      : ''; ?>
    <?php if (validation_errors()) : ?>
      <strong>Validasi gagal!</strong>
      <ul>
        <?= validation_errors('<li>', '</li>') ?>
      </ul>
    <?php endif; ?>
    <!-- <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a> -->
  </div>
<?php endif ?>