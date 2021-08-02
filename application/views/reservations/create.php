<div class="row pt-5">
    <div class="col-md-6 offset-md-3 event-form">
        <div class="card" style="width: 27rem; margin: 20px auto; border: 0 !important;">
            <img src="<?= base_url() ?>/assets/images/events/<?= $event['image'] ?>" style="width: 100%" class="card-img-top" alt="...">
        </div>

        <h2 class="text-center fw-bold"><?= $title; ?></h2>

        <?php echo validation_errors(); ?>

        <?php echo form_open_multipart('reservations/create/' . $this->uri->segment(3), ['id' => 'requestForm']); ?>


        <div class="form-group mb-3">
            <label>Name</label>
            <input type="text" class="form-control" required name="name" placeholder="Add name">
        </div>

        <div class="form-group mb-3">
            <label>Last name</label>
            <input type="text" class="form-control" required name="last_name" placeholder="Add last  name">
        </div>

        <div class="form-group mb-3">
            <label>Phone</label>
            <input type="tel" class="form-control" required name="phone_nr" placeholder="Add phone">
        </div>

        <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" class="form-control" required name="email" placeholder="Add email">
        </div>

        <div class="form-group mb-3">
            <label>Total persons </label>
            <input type="number" class="form-control" required name="total_persons" placeholder="Add total" min="1">
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="payment_status" id="flexCheckChecked">
            <label class="form-check-label" for="flexCheckChecked">
                Payed
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>