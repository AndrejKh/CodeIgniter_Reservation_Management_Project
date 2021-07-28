<div class="row pt-5">
    <div class="col-md-6 offset-md-3 event-form">
        <h2 class="text-center fw-bold"><?= $title; ?></h2>

        <?php echo validation_errors(); ?>

        <?php echo form_open_multipart('reservations/' . ($this->session->userdata('logged_in') ? 'create' : 'register') . '/' . $this->uri->segment(3), ['id' => 'requestForm']); ?>


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

        <?php if ($this->session->userdata('logged_in')) { ?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="payment_status" id="flexCheckChecked">
                <label class="form-check-label" for="flexCheckChecked">
                    Payed
                </label>
            </div>
        <?php } ?>


        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>