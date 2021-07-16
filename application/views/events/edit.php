<div class="row">
  <div class="col-md-8 offset-md-2">
    <h2><?= $title; ?></h2>

    <?php echo validation_errors(); ?>

    <?php echo form_open_multipart('request/update'); ?>

    <div class="form-group">
      <label>ID</label>
      <input type="text" class="form-control" value="<?= $request['id'] ?>" name="reqID" readonly placeholder="Add ID">
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="email" readonly value="<?= $request['email'] ?>" class="form-control" name="email" placeholder="Add email">
    </div>
    <div class="form-group">
      <label>Username</label>
      <input type="text" readonly value="<?= $request['name'] ?>" class="form-control" name="username" placeholder="Add username">
    </div>
    <div class="form-group">
      <label>Referer</label>
      <input type="text" readonly value="<?= $request['referer'] ?>" class="form-control" name="referer" placeholder="Add username">
    </div>
    <div class="form-group">
      <label>Text</label>
      <textarea type="text" readonly value="" class="form-control" name="req-text"><?= $request['text'] ?></textarea>
    </div>
    <div class="form-group">

      <label>Urls</label>
      <textarea type="text" value="" class="form-control" required name="req-urls" rows="5"><?= $request['urls'] ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>