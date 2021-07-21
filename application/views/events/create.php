<div class="row pt-5">
  <div class="col-md-6 offset-md-3 event-form">
    <h2 class="text-center fw-bold"><?= $title; ?></h2>

    <?php echo validation_errors(); ?>

    <?php echo form_open_multipart('events/create', ['id' => 'requestForm']); ?>
    <div class="form-group mb-3">
      <label>Date</label>
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
      <label for="formFile" class="form-label">Event Banner</label>
      <input class="form-control" type="file" id="image" name="image">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>