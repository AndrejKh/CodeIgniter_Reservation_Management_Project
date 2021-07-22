<div class="row pt-5">
    <div class="col-md-6 offset-md-3 event-form">
        <h2 class="text-center fw-bold"><?= $title; ?></h2>

        <?php echo validation_errors(); ?>

        <?php echo form_open_multipart('reservations/update/' . $this->uri->segment(3), ['id' => 'requestForm']); ?>


        <div class="form-group mb-3">
            <label>Name</label>
            <input type="text" class="form-control" required name="name" value="<?= $reservation['name'] ?>" placeholder="Add name">
        </div>

        <div class="form-group mb-3">
            <label>Last name</label>
            <input type="text" class="form-control" required name="last_name" value="<?= $reservation['lastname'] ?>" placeholder="Add last  name">
        </div>

        <div class="form-group mb-3">
            <label>Phone</label>
            <input type="tel" class="form-control" required name="phone_nr" value="<?= $reservation['phone_nr'] ?>" placeholder="Add phone">
        </div>

        <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" class="form-control" required name="email" value="<?= $reservation['email'] ?>" placeholder="Add email">
        </div>

        <div class="form-group mb-3">
            <label>Total persons </label>
            <input type="number" class="form-control" required name="total_persons" value="<?= $reservation['total_persons'] ?>" placeholder="Add total" min="1">
        </div>


        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="payment_status" <?= $reservation['payment_status'] ? 'checked' : '' ?> id="flexCheckChecked">
            <label class="form-check-label" for="flexCheckChecked">
                Payed
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>



        </form>
        <?php echo form_open_multipart('reservations/delete/' . $reservation['idreservations'], ['id' => 'requestForm']); ?>
        <input type="hidden" name="event_id" value="<?= $reservation['event_id'] ?>">
        <input type="submit" href="<?= base_url() ?>" class="btn btn-danger" value="Delete" style="float:right">
        </form>
    </div>
</div>