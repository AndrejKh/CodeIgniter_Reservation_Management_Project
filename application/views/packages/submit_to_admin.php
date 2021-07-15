<div class="row">
  <div class="col-md-8 offset-md-2">
    <h2><?= $title; ?></h2>

    <?php echo validation_errors(); ?>

    <?php echo form_open_multipart('request/submit_to_admin', ['id' => 'requestForm']); ?>
    <input type="hidden" name="reqID" value="<?php echo $this->uri->segment('3'); ?>">
    <div class="form-group">
      <label>Email</label>
      <input type="email" class="form-control" required name="email" placeholder="Add email">
    </div>
    <div class="form-group">
      <label>Username</label>
      <input type="text" class="form-control" minlength="5" required name="username" placeholder="Add username">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>