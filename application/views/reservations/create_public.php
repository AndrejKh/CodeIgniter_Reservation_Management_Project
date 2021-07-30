<div class="row">
    <div class="col-md-6 offset-md-3 event-form">
        <div class="card" style="max-width: 27rem; margin: 20px auto; border: 0 !important;">
            <img src="<?= base_url() ?>/assets/images/events/<?= $event['image'] ?>" style="width: 100%; height: 100%;max-height: 300px;" class="card-img-top" alt="...">
        </div>

        <h2 class="text-center fw-bold"><?= $title; ?></h2>

        <?php echo validation_errors(); ?>

        <?php echo form_open_multipart('reservations/register/' . $this->uri->segment(3), ['id' => 'requestForm']); ?>


        <div class="form-group mb-3">
            <label>Emri</label>
            <input type="text" class="form-control" required name="name" placeholder="Shto emër">
        </div>

        <div class="form-group mb-3">
            <label>Mbiemri</label>
            <input type="text" class="form-control" required name="last_name" placeholder="Shto mbiemër">
        </div>

        <div class="form-group mb-3">
            <label>Numër celulari</label>
            <input type="tel" class="form-control" required name="phone_nr" placeholder="Shto numrin e telefonit">
        </div>

        <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" class="form-control" required name="email" placeholder="Shto email">
        </div>

        <div class="form-group mb-3">
            <label>Numëri i personave</label>
            <input type="number" class="form-control" required name="total_persons" placeholder="Shto numrin e personave" min="1">
        </div>

        <button type="submit" class="btn btn-primary">Dërgo</button>
        </form>
    </div>
</div>