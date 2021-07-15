<div class="row">
  <div class="col-md-8 offset-md-2">
    <h2><?= $title; ?></h2>

    <div class="text-warning">
      <?php echo validation_errors(); ?>
    </div>

    <?php echo form_open_multipart('request/create-admin', ['id' => 'requestForm']); ?>

    <div class="form-group">
      <label>Form title</label>
      <input type="text" class="form-control" required name="form-title" placeholder="Ad form title">
    </div>

    <div class="form-group">
      <label>Post Url</label>
      <input type="url" class="form-control" required name="referer" placeholder="Add post url">
    </div>

    <div class="form-group">
      <label>Urls</label>
      <textarea type="text" class="form-control" required name="urls"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>