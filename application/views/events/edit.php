<div class="row pt-5">
  <div class="col-md-6 offset-md-3 event-form">
    <h2 class="fw-bold mb-3"><?= $title; ?></h2>

    <?php echo validation_errors(); ?>

    <?php echo form_open_multipart('events/update/' . $event['idevents'], ['id' => 'requestForm']); ?>
    <div class="form-group mb-3">
      <label>Email</label>
      <input type="datetime-local" class="form-control" id="date" required value="<?= $event['date'] ?>" name="date" placeholder="Add date">
    </div>

    <div class="form-group mb-3">
      <label>Guests</label>
      <input type="text" class="form-control" value="<?= $event['guest'] ?>" required name="guest" placeholder="Add guest">
    </div>

    <div class="form-group mb-3">
      <label>Ticket Price</label>
      <input type="text" class="form-control" value="<?= $event['ticket_price'] ?>" required name="ticket_price" placeholder="Add price">
    </div>

    <div class="mb-3">
      <label for="formFile" class="form-label">Image</label>
      <input class="form-control" type="file" id="image" name="image">
    </div>
    <div class="mb-3">
      <img src="<?= base_url('assets/images/events/' . $event['image']) ?>" class="card-img" style="height: 80px;object-fit: cover;width: 150px;" alt="..."></td>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php echo form_open_multipart('events/thank-email/' . $event['idevents'], ['id' => 'requestForm']); ?>
    <input type="hidden" name="event_id" value="<?= $event['idevents'] ?>">
    <input type="submit" class="btn btn-danger" value="End event" style="float:right; margin-top: -38px;">
    </form>
  </div>
</div>