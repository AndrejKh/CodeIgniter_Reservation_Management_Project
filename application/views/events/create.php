<div class="row">
  <div class="col-md-8 offset-md-2">
    <h2><?= $title; ?></h2>

    <?php echo validation_errors(); ?>

    <?php echo form_open_multipart('events/create', ['id' => 'requestForm']); ?>
    <div class="form-group mb-3">
      <label>Email</label>
      <input type="datetime-local" class="form-control" required name="date" placeholder="Add date">
    </div>

    <div class="form-group mb-3">
      <label>Guests</label>
      <input type="text" class="form-control" required name="guest" placeholder="Add guest">
    </div>

    <div class="form-group mb-3">
      <label>Ticket Price</label>
      <input type="text" class="form-control" required name="ticket_price" placeholder="Add price">
    </div>

    <div class="mb-3">
      <label for="formFile" class="form-label">Default file input example</label>
      <input class="form-control" type="file" id="image" name="image">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>