<div class="row">
  <div class="col-md-8 offset-md-2">
    <h2><?= $title; ?></h2>

    <?php echo validation_errors(); ?>

    <?php echo form_open_multipart('request/create', ['id' => 'requestForm']); ?>
    <div class="form-group">
      <label>Email</label>
      <input type="email" class="form-control" required name="email" placeholder="Add email">
    </div>
    <div class="form-group">
      <label>Username</label>
      <input type="text" class="form-control" minlength="5" required name="username" placeholder="Add username">
    </div>
    <div class="form-group">
      <label>Post Url</label>
      <input type="url" class="form-control" required name="referer" placeholder="Add post url">
    </div>

    <div class="form-group">
      <label>Text</label>
      <textarea type="text" class="form-control" required name="req-text"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>


<script>
  let form = document.getElementById('requestForm')
  form.addEventListener('submit', function(event) {
    event.preventDefault();

    grecaptcha.ready(function() {
      grecaptcha.execute('6Ldl0nobAAAAAJrOorSildIoHe00e5_XB9dNrD4G', {
        action: 'submit_request'
      }).then(function(token) {
        let tokenInput = document.createElement('input');
        tokenInput.type = 'hidden'
        tokenInput.value = token
        tokenInput.name = 'token'
        let actionInput = document.createElement('input');
        actionInput.type = 'hidden'
        actionInput.value = 'submit_request'
        actionInput.name = 'action'
        form.prepend(actionInput);
        form.prepend(tokenInput);
        form.submit();
      });
    });
  });
</script>